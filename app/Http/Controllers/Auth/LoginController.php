<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\PaypalSubscription;
use App\Package;
use App\Menu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated()
    {
        $auth = Auth::user();
       
        $subscribed = null;
        if ( Auth::user()->is_admin ==1 ) {// do your margic here
             $subscribed = 1;
            return redirect('/admin');
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
                  
                      $subscribed = 1;

   
        $packageid=PaypalSubscription::select('package_id')->where('user_id',$auth->id)->get();
            foreach($packageid as $package){
              $packagename=Package::select('plan_id')->where('id',$package->package_id)->get();
          }
           if(isset($packagename)){ foreach($packagename as $pn){
       return   $planmenus= DB::table('package_menu')->where('package_id', $pn->plan_id)->get();
          
          }}
           if(isset($planmenus)){ 
          foreach ($planmenus as $key => $value) {
                     $menus[]=$value->menu_id;
                }
              }
               if(isset($menus)){ 
         $nav_menus=Menu::whereIn('id',$menus)->get();
           foreach ($nav_menus as $nav => $menus) {
            
              return redirect($menus->slug);
           }
              
         }
        

                
                  }else {

                        return back();

                    }
                      
                  }
                } 
                }
                
                
              } else if (isset($auth->paypal_subscriptions) && count($auth->paypal_subscriptions) > 0) {  
                
                //Check Paypal Subscription of user
                $last_payment = $auth->paypal_subscriptions->last();

                if (isset($last_payment) && $last_payment->status == 1) {
                    //check last date to current date
                    $current_date = Carbon::now();
                    if (date($current_date) <= date($last_payment->subscription_to)) {
      $packageid=PaypalSubscription::select('package_id')->where('user_id',$auth->id)->get();
            foreach($packageid as $package){
              $packagename=Package::select('plan_id')->where('id',$package->package_id)->get();
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
           foreach ($nav_menus as $nav => $menus) {
           
              return redirect($menus->slug);
           }
         }
        

         
             

                    } else {
                        $last_payment->status = 0;
                        $last_payment->save();
                        return redirect('/')->with('deleted', 'Your subscription has been expired!');
                    }
                }

                return redirect('account/purchaseplan')->with('deleted', 'Your subscription has been expired');

            } else {

                return redirect('/')->with('deleted', 'You have no subscription please subscribe');

            }

     
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
