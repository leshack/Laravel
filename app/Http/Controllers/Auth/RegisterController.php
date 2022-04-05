<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'  => ['required', 'numeric', 'min:11',],

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $save = $user->save();
        $last_id =$user->id;

        $token = $last_id.hash('sha256',Str::random(120));
        $verifyURL = route('verify',['token'=>$token,'service'=>'Email_verification']);

        VerifyUser::create([
              'user_id' => $last_id,
              'token' => $token
            ]);

            // $message = 'Dear <b>'.$request->name.'</b>';
            $message ='Thank you for signing up,we just need you to verify your email address to complete setting your
            account.';

            $mail_data =[
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>env('MAIL_FROM_NAME'),
                'subject'=>'Email verification',
                'body'=>$message,
                'actionLink'=>$verifyURL,

            ];
            Mail::send('includes.verifyemail-template',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });
            if( $save ){
                return redirect()->back()->with('info', 'You need to verify you account .We have sent you an activation link,
                please check your email');
            }else{
                return redirect()->back()->with('fail','something went wrong,failed to register');
            }
    }



}
