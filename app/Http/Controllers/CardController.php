<?php

namespace App\Http\Controllers;

use App\User;
use App\Menu;
use App\Package;
use DB;
use Auth;
use App\PaypalSubscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuser=Auth::user()->id;
        $userdetail=User::findOrfail($currentuser);
       $auth=Auth::user();
              $subscribed = null;
              $subscribedtill=null;
                    $nav_menus=null;
                    $packagename=null;
                    $pkgname=null;
            if (isset($auth)) {
              $current_date = date("d/m/y");
                  
              $auth = Auth::user();
              if ($auth->is_admin == 1) {
                $subscribed = 1;
                   $nav_menus=Menu::all();
              } else if ($auth->stripe_id != null) {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                if(isset($invoices) && $invoices != null && count($invoices->data) > 0)
                
                {
                $user_plan_end_date = date("d/m/y", $invoice->lines->data[0]->period->end);
                $plans = Package::all();
                foreach ($plans as $key => $plan) {
                  if ($auth->subscriptions($plan->plan_id)) {
                   
                  if($current_date <= $user_plan_end_date)
                  {
                    $subscribedtill=$user_plan_end_date;
                       if($auth->is_admin==0){

          $packageid=PaypalSubscription::select('package_id')->where('user_id',$auth->id)->get();
            foreach($packageid as $package){
              $packagename=Package::select('plan_id')->where('id',$package->package_id)->get();
               $pkgname=Package::where('id',$package->package_id)->first();
          }
           if(isset($packagename)){ foreach($packagename as $pn){
          $planmenus= DB::table('package_menu')->where('package_id', $pn->plan_id)->get();
          
          }}
           if(isset($planmenus)){ 
          foreach ($planmenus as $key => $value) {
                     $menus[]=$value->menu_id;
                }
              }
               if(isset($menus)){ 
         $nav_menus=Menu::whereIn('id',$menus)->get();
         }
        }
                      $subscribed = 1;
                  }
                      
                  }
                } 
                }
              } else if (isset($auth->paypal_subscriptions)) {  
                //Check Paypal Subscription of user
                $last_payment = $auth->paypal_subscriptions->last();
                if (isset($last_payment) && $last_payment->status == 1) {
                  //check last date to current date
                  $current_date = Carbon::now();
                  if (date($current_date) <= date($last_payment->subscription_to)) {
                    $subscribed = 1;
                    $subscribedtill=$last_payment->subscription_to;
                     if($auth->is_admin==0){

          $packageid=PaypalSubscription::select('package_id')->where('user_id',$auth->id)->get();
            foreach($packageid as $package){
              $packagename=Package::select('plan_id')->where('id',$package->package_id)->get();
              $pkgname=Package::where('id',$package->package_id)->first();
          }
           if(isset($packagename)){ foreach($packagename as $pn){
          $planmenus= DB::table('package_menu')->where('package_id', $pn->plan_id)->get();
          
          }}
           if(isset($planmenus)){ 
          foreach ($planmenus as $key => $value) {
                     $menus[]=$value->menu_id;
                }
              }
               if(isset($menus)){ 
         $nav_menus=Menu::whereIn('id',$menus)->get();
         }
        }
                  }
                }
              }
            }
        
        return view('virtalcard', compact('userdetail','subscribed','subscribedtill','nav_menus','pkgname'));
    }


}
