<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\WelcomeUser;
use App\Config;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Please Choose a name',
            'email.required' => 'Email is required !',
            'email.email' => 'Email must be in valid format',
            'email.unique' => 'This email is already taken, Please choose another',
            'password.required' => 'Password cannot be empty',
            'password.confirmed' => "Password doesn't match",
            'password.min' => 'Password length must be greater than 6'
       ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'is_admin' => 0,
            'password' => bcrypt($data['password']),
        ]);

        $config = Config::first();

        if($config->wel_eml == 1){
            try{
                Mail::to($data['email'])->send(new WelcomeUser($user));
                
            }
            catch(\Swift_TransportException $e){

                

                header( "refresh:5;url=./login" );

                dd("Your Registration is successfull ! but email is not sent because your webmaster not updated the mail settings in admin dashboard ! Kindly go back and login");
                

            }
           
        }
        
        return $user;
        
    }
}
