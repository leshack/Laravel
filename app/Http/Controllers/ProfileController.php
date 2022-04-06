<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Bookings;
use App\Models\Testimonial;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator\validateEmail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
        $tbltestimonial = DB::table("tbltestimonial")
        ->where("email", "=", Auth()->user()->email)
        ->get();
        return view('User.testimonial.mytestimonial',compact('tbltestimonial'))
                ->with('tbltestimonial', $tbltestimonial);
    }

    public function bookings(Request $request){

        $tblbookings = DB::table("tblbookings")
        ->join("tblvehicles", function($join){
            $join->on("tblbookings.vehicle_id", "=", "tblvehicles.id");
        })
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.Vimage1 as Vimage1", "tblvehicles.VehiclesTitle", "tblvehicles.id as id", "tblbrands.BrandName", "tblbookings.FromDate", "tblbookings.ToDate", "tblbookings.messages", "tblbookings.status")
        ->where("tblbookings.email", "=", Auth()->user()->email)
        ->get();
        return view('User.bookings.bookings',compact('tblbookings'))
            ->with('tblbookings', $tblbookings);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetestimonial(Request $request)
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
    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
           // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'  => ['required', 'numeric', 'min:11', 'unique:users'],
            'Dob'    => ['required', 'date', 'max:100'],
            'address' => ['required', 'string'],
            'city'  => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:105'],
            // 'user_image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'RegDate' => ['timestamp'],
            'UpdationDate' => ['timestamp'],

        ]);

        if($validator->fails()){
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
                // 'image_image' => $request->hasFile('user_image'),
                'RegDate'=>$request->RegDate,
                'UpdationDate'=>$request->UpdationDate,
            ]);
            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating profile in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile has been updated successfully']);
            }
       }

    }
    function updatePicture(Request $request){
        if($request->hasFile('user_image')){
            $path = 'images/usersprofilepic/';
            $file = $request->file('user_image');
            $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';


        //Upload new image
      $upload = $file->move(public_path($path), $new_name);
      //$upload =  $request->user_image->move(public_path($path), $new_name);

      if( !$upload ){
          return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
      }else{
          //Get Old picture
          $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

          if( $oldPicture != '' ){
              if( File::exists(public_path($path.$oldPicture))){
                  File::delete(public_path($path.$oldPicture));
              }
          }

          //Update DB
          $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

          if( !$upload ){
              return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
          }else{
              return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
          }

      }
        }

    }
   function changepassword(Request $request){
         //Validate form
         $validator = Validator::make($request->all(),[
            'currentpassword'=>['required', function($attribute, $value, $fail){
                             if(!(Hash::check($value, Auth::user()->password)) ){
                                     return $fail(__('The current password is incorrect'));
                                         }
                },
                'min:8',
                'max:30'
             ],
             'newpassword'=>'required|min:8|max:30',
             'confirmpassword'=>'required|same:newpassword'
            ],[
                'currentpassword.required'=>'Enter your current password',
                'currentpassword.min'=>'Old password must have atleast 8 characters',
                'currentpassword.max'=>'Old password must not be greater than 30 characters',
                'newpassword.required'=>'Enter new password',
                'newpassword.min'=>'New password must have atleast 8 characters',
                'newpassword.max'=>'New password must not be greater than 30 characters',
                'confirmnewpassword.required'=>'ReEnter your new password',
                'confirmnewpassword.same'=>'New password and Confirm new password must match'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

         $update = User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);

         if( !$update ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
         }else{
            return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
         }
        }

    }

    public function  testimony(Request $request) {
        $this->validate($request, [
            'email'=> 'email|unique:users,email,'.Auth::user()->id,
            'Testimonial'=>'required', 'string', 'max:200',
            'user_id' => 'string','numeric'.Auth::user()->id
        ]);
        $testimonial = new Testimonial;
        $testimonial->email =$request->email.Auth::user()->id;
        $testimonial->Testimonial = $request->Testimonial;
        $testimonial->user_id =$request->user_id.Auth::user()->id;

        $testimonial->save();

        return back()->with('success', 'Testimonail submitted successfully');
    }

    public function  booking(Request $request) {
        $this->validate($request, [
            'email'=> 'email|unique:users,email,'.Auth::user()->id,
            'FromDate'=>'required','string',
            'ToDate'=>'required','string',
            'message'=>'required', 'string', 'max:200',
            'user_id' => 'string','numeric'.Auth::user()->id
        ]);
        $bookings = new Bookings;
        $bookings->email =$request->email.Auth::user()->id;
        $bookings->FromDate =$request->FromDate;
        $bookings->ToDate =$request->ToDate;
        $bookings->messages =$request->message;
        $bookings->user_id =$request->user_id.Auth::user()->id;

        $bookings->save();

        return back()->with('success', 'Bookings submitted successfully');

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
