<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.admin.login');

    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'Username' => 'required','string', 'max:255',
            'password' => 'required','string', 'min:8', 'confirmed',
        ]);
      if($validator->fails()){
            return redirect()->back()->withInput()->withErrors(["Please enter username and password"]);
     }else{
        if (auth()->guard('admin')->attempt(['Username' => $request->input('Username'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();
            return redirect()->route('admin.dashboard');

        } else {
            return redirect()->back()->withInput()->withErrors(['error','your username and password are wrong.']);
        }
    }
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        return  redirect()->route('admin.login')->withInput()->with('success','You are logout successfully');
    }
}
