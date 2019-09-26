<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'email', 'password', 'is_admin', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at','google_id','facebook_id','gitlab_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wishlist()
    {
      return $this->hasMany('App\Wishlist');
    }

    public function paypal_subscriptions()
    {
        return $this->hasMany('App\PaypalSubscription');
    }

    public function subscriptions()
    {
        return $this->hasMany('Laravel\Cashier\Subscription');
    }
}
