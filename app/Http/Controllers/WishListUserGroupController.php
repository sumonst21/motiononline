<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Menu;
use App\MenuVideo;
use App\Package;
use App\PaypalSubscription;

use App\User;
use Illuminate\Support\Facades\Validator;

use App\Season;
use App\WishlistUserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishListUserGroupController extends Controller
{
    public function index()
    {
    
        $usergroup = WishlistUserGroup::all();
        return view('admin.wishlist.usergroup.index', compact('usergroup'));
    }
     public function create()
    {
        $user = User::all();
        $group = WishlistUserGroup::all();

        return view('admin.wishlist.usergroup.create', compact('user', 'group'));
    }

     public function update(Request $request, $id)
    {
        $users = WishlistUserGroup::findOrFail($id);
      
        $input = $request->all();

          $group=WishlistUserGroup::all();
         
            if ($input['title']!=$users->title) {
               foreach ($group as $key => $value) {
            if ($input['title']==$value->title) {
         return back()->with('deleted', 'Group Already Exist');
      }
          }
          }
            
           
         

        $users->update($input);
        return redirect('admin/wishlist/usergroup')->with('updated', 'Group has been updated');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
      $user = User::all();
      $group = WishlistUserGroup::findOrFail($id);

      
        // get old User list
        $old_user = collect();
         foreach ($group->user_id as $key => $value) {
         
            $old3 = User::find(trim($value));
            if (isset($old3)) {
              $old_user->push($old3);
            }
        }
        $user = $user->filter(function($value, $key) {
          return  $value != null;
        });
        $user=  $user->diff($old_user);


      return view('admin.wishlist.usergroup.edit', compact('user', 'group','old_user'));
    }
    public function store(Request $request)
    {
         
      $request->validate([
            'title' => 'required'
        ]);
  $input = $request->all();
          $group=WishlistUserGroup::all();
          foreach ($group as $key => $value) {
            if ($input['title']==$value->title) {
         return back()->with('deleted', 'Group Already Exist');
      }
          }
          
           $add=new WishlistUserGroup();
           $add->title=$request->title;
           $add->user_id=$request->user_id;
           $add->save();
                

        return back()->with('added', 'Group Has Been Created');
    }

     public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {

            return back()->with('deleted', 'Please check one of them to delete');
        }

        foreach ($request->checked as $checked) {
              
            $group = WishlistUserGroup::findOrFail($checked);
             $group->delete();
        }

        return back()->with('deleted', 'Group has been deleted');
    }

     public function destroy($id)
    {
        $group = WishlistUserGroup::findOrFail($id);

       

        $group->delete();

        return back()->with('deleted', 'Group has been deleted');
    }
     public function userdestroy($groupid, $id)
    {
     

     $usergroup =  WishlistUserGroup::findOrFail($groupid); 

     foreach ($usergroup->user_id as $key => $value) {
       $up=$usergroup->user_id;

      if ($value==$id) {
  
      if (($keys = array_search($id, $up)) !== false) {

    unset($up[$keys]);
    // return $up;
    foreach ($up as $key1 => $values) {
     $userupdate[]= $values;
      
    }
    $usergroup->user_id=$userupdate;
$usergroup->save();
 
}

   
      }
     }
  // $usergroup->update($newarray);
        // $group->delete();
        return back()->with('deleted', 'User has been deleted');
    }


    public function showuser($id) {
        $usergroup =  WishlistUserGroup::findOrFail($id); 

        $old = User::whereIn('id',$usergroup->user_id)->get();
        
       return view('admin.wishlist.usergroup.user', compact('old','id'));

      }
}

