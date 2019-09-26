<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FAQ;
use App\Question;
use DB;
use App\User;
use Auth;
use Carbon\Carbon;
class AskQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexadmin()
    {
        $question=Question::orderBy('created_at', 'desc')->get();
        return view('admin.question.index',compact('question'));        
    }

      public function oldquestion()
    {
        $auth=Auth::user();
        $question=Question::where('user_id',$auth->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('oldquestion',compact('question'));        
    }
    
    
    public function index()
    {

        $date=Carbon::today();
        return view('askquestion',compact('date'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
          'question' => 'required'
         
        ]);

        $auth=Auth::user();
      
        $question=Question::where('user_id',$auth->id)->whereDate('created_at', '=', Carbon::today())->count();
        if ($question<5) {
              $input = $request->all();
        $input['user_id']=$auth->id;
        Question::create($input);
        return back()->with('success', 'You have Asked Question.');
        }else{
             return back()->with('deleted', 'Your Limit for Questions has been Reached.');
        }
      
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
        $question = Question::findOrFail($id);
        return view('admin.question.answer', compact('question'));
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
        $question = Question::findOrFail($id);

        $request->validate([
          'answer' => 'required',
        ]);

        $input = $request->all();
        $input['status']=1;
        $question->update($input);
        return redirect('admin/question')->with('updated', 'Answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();
        return back()->with('deleted', 'Question has been deleted');
    }

   
}
