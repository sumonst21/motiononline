<?php

namespace App\Http\Controllers;

use App\Excersice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExcersiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excersice = Excersice::orderBy('created_at', 'DESC')->get();
        return view('admin.excersice.index', compact('excersice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.excersice.create');
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
            'name' => 'required'
        ]);

        $input = $request->all();


        Excersice::create($input);

        return back()->with('added', 'Excersice has been added');
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
        $excersice = Excersice::findOrFail($id);
        return view('admin.excersice.edit', compact('excersice'));
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
        $request->validate([
            'name' => 'required'
        ]);

        $menu = Excersice::findOrFail($id);
        
        $input = $request->all();

        $menu->update($input);

        return redirect('admin/exercise')->with('updated', 'Excersice has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excersice = Excersice::findOrFail($id);
        $excersice->delete();
        return back()->with('deleted', 'Excersice has been deleted');
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
            $excersice = Excersice::findOrFail($checked);
            $excersice->delete();
          }
          return back()->with('deleted', 'Excersice has been deleted');   
    }
}
