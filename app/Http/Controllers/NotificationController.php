<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\User;
use App\Director;
use Notification;
use Auth;
use Carbon\Carbon;
use App\Notifications\MyNotification;
  
class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::all();
        return view('admin.director.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $request->validate([
          'title' => 'required',
        ]);
        
        $user=User::all();
        $input = $request->all();
       
       $title = $request->title;
       $desc = $request->description;
       $movie_id = $request->movie_id;
       $tvid =  $request->tv_id;

        $alluser[]=$input['user_id'];
          if ($input['user_id']==['0']) {

            foreach ($user as $key => $value) {
                $alluser[]=$value->id;
                 User::findOrFail($value->id)->notify(new MyNotification($title,$desc,$movie_id,$tvid,$alluser));
            
            }
             array_shift($alluser);
             $input['user_id'] = $alluser;
            
          }else{
              foreach ($input['user_id'] as $singleuser) {
                  User::findOrFail($singleuser)->notify(new MyNotification($title,$desc,$movie_id,$tvid,$alluser));
              }
               $input['user_id'] = $alluser;
          }
          
         // return $alluser;
       // return $input;
        return back()->with('added', 'Notification has been Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::findOrFail($id);
        return view('admin.director.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $director = Director::findOrFail($id);

        $request->validate([
          'name' => 'required',
          'image' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $input = $request->all();

        if ($file = $request->file('image')) {
          $name = "director_".time().$file->getClientOriginalName();
          if ($director->image != null) {
              $content = @file_get_contents(public_path().'/images/directors/'.$director->image);
              if ($content) { 
                unlink(public_path()."/images/directors/".$director->image);
              }
          }
          $file->move('images/directors', $name);
          $input['image'] = $name;
        }

        $director->update($input);
        return redirect('admin/directors')->with('updated', 'Director has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director = Director::findOrFail($id);

        if ($director->image != null) {
              $content = @file_get_contents(public_path().'/images/directors/'.$director->image);
              if ($content) { 
                unlink(public_path()."/images/directors/".$director->image);
              }
        }
        $director->delete();
        return redirect('admin/directors')->with('deleted', 'Director has been deleted');
    }

    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('deleted', 'Please select one of them to delete');
        }

        foreach ($request->checked as $checked) {

            $director = Director::findOrFail($checked);

            if ($director->image != null) {
              $content = @file_get_contents(public_path().'/images/directors/'.$director->image);
              if ($content) { 
                unlink(public_path()."/images/directors/".$director->image);
              }
            }

            Director::destroy($checked);
        }

        return back()->with('deleted', 'Directors has been deleted');   
    }
    public function sendNotification()
    {
        $user = User::first();
  
        $details = [
            'title' => 'title',
        'description' =>'description',
            
        ];

        Notification::send($user, new MyNotification($details));
   return back()->with('added','Notification is Sent');
       
    }
    public function notificationread($id)
    {
        
        $userunreadnotification=auth()->
        user()->unreadNotifications->
        where('id',$id)->first();
         
        if ($userunreadnotification) {
           $userunreadnotification->markAsRead();
        }

        return 'Done';
       
    }
  
}