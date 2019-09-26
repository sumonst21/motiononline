<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Stripe\Plan;
use \Stripe\Stripe;
use App\Menu;
use DB;
use App\PaypalSubscription;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pkgstatus(Request $request, $id)
    {
        $pkg = Package::findOrFail($id);
        $pkg->status = $request->status;
        $pkg->save();

        if($request->status ==1)
        {
            return back()->with('updated','Status has been to active!');
        }else{
            return back()->with('updated','Status has been to deactive!');
        }
        

    }

    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.package.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (config('services.stripe.secret') != null) {
            Stripe::setApiKey(config('services.stripe.secret'));
        }

        $input = $request->all();

        $request->validate([
            'plan_id' => 'required',
            'amount' => 'required',
            'interval' => 'required',
            'interval_count' => 'required',
        ]);


        $input['plan_id'] = strtolower($input['plan_id']);
 $image = null;

          if ($file = $request->file('image')) {
            $image = 'qrcode_'.time().$file->getClientOriginalName();
            $file->move('images/package', $image);
             $input['image']=$image;
          } 
          
        if ($request->interval == 'year') {
            $request->validate([
                'interval_count' => 'required|max:1|numeric'
            ]);
        }
// package_menu
         $menus = null;

        if (isset($request->menu) && count($request->menu) > 0) {
          $menus = $request->menu;
          for ($i=0; $i < sizeof($menus) ; $i++) { 
            if($menus[$i]==100){
                unset($menus); 
                $men=Menu::all();
                foreach ($men as $key => $value) {
                    # code...
                     $menus[]=$value->id;
                }
                  DB::table('package_menu')->insert(
     array(
            'menu_id'     =>    $menus[$i], 
            'package_id'   =>   $input['plan_id']
     )
);

            }else{

               DB::table('package_menu')->insert(
     array(
            'menu_id'     =>    $menus[$i], 
            'package_id'   =>   $input['plan_id']
     )
);
            }
              


          }
        
        }
     
        if (config('services.stripe.secret') != null) {
            Plan::create(array(
                "id" => $input['plan_id'],
                "currency" => $input['currency'],
                "product" => [
                    "name" => $input['name'],
                ],
                "amount" => ($input['amount']*100),
                "interval" => $input['interval'],
                "interval_count" => $input['interval_count'],
                "trial_period_days" => $input['trial_period_days'],
            ));
        }

        Package::create($input);
        return redirect('admin/packages')->with('added', 'Package has been created');
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
        $package = Package::findOrFail($id);
         $menus = Menu::all();
        return view('admin.package.edit', compact('package','menus'));
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
        $package = Package::findOrFail($id);
        if (config('services.stripe.secret') != null) {
            // Set your secret key: remember to change this to your live secret key in production
            Stripe::setApiKey(config('services.stripe.secret'));
        }

        $input = $request->all();
          if ($file = $request->file('image')) {
          $name = "qrcode_".time().$file->getClientOriginalName();
          if ($package->image != null) {
        $content = @file_get_contents(public_path().'/images/package/'.$package->image);
              if ($content) { 
                unlink(public_path()."/images/package/".$package->image);
              }
          }
          $file->move('images/package', $name);
          $input['image'] = $name;
        }
         
  

        if (config('services.stripe.secret') != null) {
            $stripe_plan = Plan::retrieve($package->plan_id);

            $stripe_plan->nickname = $input['name'];

            $stripe_plan->save();
        }
        $deletemenu= DB::table('package_menu')->where('package_id',$input['plan_id'])->delete();
        // package_menu
         $menus = null;

        if (isset($request->menu) && count($request->menu) > 0) {
          $menus = $request->menu;
          for ($i=0; $i < sizeof($menus) ; $i++) { 
            if($menus[$i]==100){
                unset($menus); 
                $men=Menu::all();
                foreach ($men as $key => $value) {
                    # code...
                     $menus[]=$value->id;
                }
                  DB::table('package_menu')->insert(
     array(
            'menu_id'     =>    $menus[$i], 
            'package_id'   =>   $input['plan_id']
     )
);

            }else{

               DB::table('package_menu')->insert(
     array(
            'menu_id'     =>    $menus[$i], 
            'package_id'   =>   $input['plan_id']
     )
);
            }
              


          }
        
        }

        $package->update($input);
        return redirect('admin/packages')->with('updated', 'Package has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (config('services.stripe.secret') != null) {
            // Set your secret key: remember to change this to your live secret key in production
            Stripe::setApiKey(config('services.stripe.secret'));
        }

        $package = Package::findOrFail($id);
        if (config('services.stripe.secret') != null) {
                $stripe_plan = Plan::retrieve($package->plan_id);
                $stripe_plan->delete();
        }
        $package->delete();
        return redirect('admin/packages')->with('deleted', 'Package has been deleted');
    }

    public function softDelete(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        //$paypalsub = PaypalSubscription::findOrFail($id);
        $package->delete_status = 0;

        $package->save();
        return redirect('admin/packages')->with('deleted', 'Package has been deleted');
    }

    public function bulk_delete(Request $request)
    {
        if (config('services.stripe.secret') != null) {
            // Set your secret key: remember to change this to your live secret key in production
            Stripe::setApiKey(config('services.stripe.secret'));
        }

        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {

            return back()->with('deleted', 'Please select one of them to delete');
        }

        foreach ($request->checked as $checked) {

            $package = Package::findOrFail($checked);
            if (config('services.stripe.secret') != null) {
                $stripe_plan = Plan::retrieve($package->plan_id);
                $stripe_plan->delete();
            }
            $package->delete_status = 0;
            $package->save();

        }

        return back()->with('deleted', 'Plans has been deleted');
    }
}
