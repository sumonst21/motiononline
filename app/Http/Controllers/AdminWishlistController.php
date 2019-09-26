<?php

namespace App\Http\Controllers;

use App\Movie;
use App\TvSeries;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\WishlistVideoGroup;
use App\WishlistUserGroup;
use App\WishlistAdmin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminWishlistController extends Controller
{
    public function index()
    { 
    
       $usergroup = WishlistUserGroup::all();
      $videogroup=WishlistVideoGroup::all();
       $user = User::all();
        $group = WishlistUserGroup::all();
         $movie = Movie::all();
        $tvseries=TvSeries::all();
       
       

return view('admin.wishlist.index', compact('usergroup','videogroup','user','group'
  ,'movie','tvseries'));
    }
     public function create()
    {
        // $movie = Movie::all();
        // $tvseries=TvSeries::all();
        // $group = WishlistVideoGroup::all();

        // return view('admin.wishlist.videogroup.create', compact('movie', 'group','tvseries'));
    }

     public function update(Request $request, $id)
    {
        $users = WishlistVideoGroup::findOrFail($id);
      
          $input = $request->all();
          $group=WishlistVideoGroup::all();
          if ($input['title']!=$users->title) {
          foreach ($group as $key => $value) {
          if ($input['title']==$value->title) {
          return back()->with('deleted', 'Group Already Exist');
      }
          }
        }

        $users->update($input);
        return redirect('admin/wishlist/videogroup')->with('updated', 'Group has been updated');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
      $movie = Movie::all();
      $tvseries = TvSeries::all();

      $group = WishlistVideoGroup::findOrFail($id);
    
      
        // get old Movie list
        $old_movie = collect();
         foreach ($group->movie_id as $key => $value) {
         
            $old3 = Movie::find(trim($value));
            if (isset($old3)) {
              $old_movie->push($old3);
            }
          
        
      
        }
        $movie = $movie->filter(function($value, $key) {
          return  $value != null;
        });
        $movie=  $movie->diff($old_movie);


    
           // get old Tv Series list
        $old_tv = collect();
         foreach ($group->tv_id as $key => $value) {
         
            $old4 = TvSeries::find(trim($value));
            if (isset($old4)) {
              $old_tv->push($old4);
            }
          
       
      
        }
        $tvseries = $tvseries->filter(function($value, $key) {
          return  $value != null;
        });
        $tvseries=  $tvseries->diff($old_tv);


  return view('admin.wishlist.videogroup.edit', compact('movie','tvseries', 'group','old_movie','old_tv'));
    }


    public function mystore(Request $request){
      
       WishlistAdmin::where('user_group_id', $request->user_group_id)->where('day', $request->day)->delete();

           $group=WishlistVideoGroup::all();
           $add= new WishlistAdmin();
           $add->video_group_id=$request->video_group_id;
           $add->user_group_id=$request->user_group_id;
           $add->day=$request->day;
           $add->save();
           return "Success";
    }

    public function store(Request $request)
    {

      return $request;

         // return 'kjdd';
     //  $request->validate([
     //        'video_group_id' => 'required',
     //        'user_group_id' =>'required',
     //    ]);
     //  return  $input = $request->all();
     // WishlistAdmin::where('user_group_id', $input['user_group_id'])->where('day', $input['day'])->delete();
     //      $group=WishlistVideoGroup::all();
     //       $add=new WishlistAdmin();
     //       $add->video_group_id=$request->video_group_id;
     //       $add->user_group_id=$request->user_group_id;
     //       $add->day=$request->day;
     //       $add->save();
     //       return back()->with('added', 'Video Has Been Added To User Groups');
    }

    
}

