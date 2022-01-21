<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Bookings;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function profile(){
        return view('User.profile.index');
    }

    public function password(){
        return view('User.password.update-password');
    }
    public function testimonial(){
        return view('User.testimonial.testimonial');
    }
    public function mytestimonial(){
        $tbltestimonial = Testimonial::with(['user.testimonial','user:name'])->get();
        return view('User.testimonial.mytestimonial',compact('tbltestimonial'))
                ->with('tbltestimonial', $tbltestimonial);
    }
    
    public function bookings(){
        $tblvehicles = Vehicle::with(['brands.vehicle','bookings.vehicle'])->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('User.bookings.bookings',compact('tblvehicles','tblbookings'))
            ->with('tblvehicles', $tblvehicles)
            ->with('tblbookings', $tblbookings);
       
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'.Auth::user()->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'  => ['required', 'char', 'max:10', 'unique:user'],
            'Dob'    => ['required', 'string', 'max:100', 'unique:user'],
            'address' => ['required', 'string'],
            'city'  => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:105'],
            'RegDate' => ['required', 'timestamp', ],
            'UpdationDate' => ['required'],

        ]);
        
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'Dob'=>$request->Dob,
                'address'=>$request->address,
                'city'=>$request->city,
                'country'=>$request->country,
                'RegDate'=>$request->RegDate,
            ]);
            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
            }
       }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
