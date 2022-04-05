<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator\validateEmail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminprofileController extends Controller
{
    public function profile(){
        return view('Admin.profile.adminprofile');
    }

    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'Username' => ['required', 'string', 'max:255'],
            'email'=> 'required|email|unique:admins,email,'.auth()->guard('admin')->user()->id,
            'skills' => ['required', 'string', 'max:105'],
           // 'admin_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = Admin::find(auth()->guard('admin')->user()->id)->update([
                'Username'=>$request->Username,
                'email'=>$request->email,
                'skills'=>$request->skills,
                //'admin_image' => $request->hasFile('admin_image'),

            ]);
            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating profile in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile has been updated successfully']);
            }
       }
    }

    function updatepicture(Request $request){

        $path = 'images/adminprofilepic/';
        //$file = $request->hasFile('admin_image');
          $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';


          //Upload new image
        //$upload = $file->move(public_path($path), $new_name);
        $upload =  $request->admin_image->move(public_path($path), $new_name);

          if( !$upload ){
              return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
          }else{
              //Get Old picture
              $oldPicture = Admin::find(auth()->guard('admin')->user()->id)->getAttributes()['picture'];

              if( $oldPicture != '' ){
                  if( File::exists(public_path($path.$oldPicture))){
                      File::delete(public_path($path.$oldPicture));
                  }
              }

              //Update DB
              $update = Admin::find(auth()->guard('admin')->user()->id)->update(['picture'=>$new_name]);

              if( !$upload ){
                  return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
              }else{
                  return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
              }

          }
    }
    function changepassword(Request $request){
        //Validate form
        $validator = Validator::make($request->all(),[
           'currentpassword'=>['required', function($attribute, $value, $fail){
                            if(!(Hash::check($value, auth()->guard('admin')->user()->password)) ){
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

        $update = Admin::find(auth()->guard('admin')->user()->id)->update(['password'=>Hash::make($request->newpassword)]);

        if( !$update ){
           return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
        }else{
           return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
        }
       }

   }

}
