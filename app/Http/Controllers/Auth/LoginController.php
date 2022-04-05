<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
         if(!is_null($verifyUser)){
             $user = $verifyUser->user;

             if(!$user->email_verified){
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('login')
                    ->with('info', 'You email is verified succesfully. You can now login')
                    ->with('verifiedEmail',$user->email);
             }else{
                return redirect()->route('login')
                ->with('info','You email is already verified you can now login')
                ->with('verifiedEmail',$user->email);
             }
         }
    }

}

