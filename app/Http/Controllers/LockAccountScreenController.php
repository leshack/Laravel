<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LockAccountScreenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['adminauth', 'lock']);
    }

    public function lockscreen()
{
    session(['locked' => 'true', 'uri' => url()->previous()]);

    return view('includes.lockscreen')
        ->with('success', 'Account Locked Successfully!');
}

public function unlock(Request $request)
{

    $password = $request->password;

    $this->validate($request, [
        'password' => 'required|string',
    ]);

    if(Hash::check($password, auth()->guard('admin')->user()->password)){
        $uri = $request->session()->get('uri');

        $request->session()->forget(['locked', 'uri']);

        return redirect($uri)->with('success', 'Welcome Back! ' . auth()->guard('admin')->user()->Username);

    }

    return redirect()->back()->withInput()->withErrors(['error','Password does not match. Please try again.']);
}
}
