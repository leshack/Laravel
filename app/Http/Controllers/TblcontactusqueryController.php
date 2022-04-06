<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TblcontactusqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'string','email:rfc,dns', 'max:255'],
            'phone_number' => ['required','numeric', 'min:11'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);


        if($this->isonline()){
           $mail_data =[
               'recipient'=>'kesleytulienge@gmail.com',
               'fromEmail'=>$request->email,
               'fromName'=>$request->name,
               'subject'=>$request->subject,
               'body'=>$request->message
           ];
           Mail::send('includes.email-template',$mail_data,function($message) use ($mail_data){
               $message->to($mail_data['recipient'])
                       ->from($mail_data['fromEmail'],$mail_data['fromName'])
                       ->subject($mail_data['subject']);
           });
           $contact = new Contact;

           $contact->name = $request->name;
           $contact->email = $request->email;
           $contact->phone_number = $request->phone_number;
           $contact->subject = $request->subject;
           $contact->message = $request->message;

           $contact->save();

        return redirect()->back()->with('success', 'Email Sent:Thank you for contacting us!.we will contact you shortly');
        }else{
            return redirect()->back()->with('errors','Check internet connection and try again');
        }
    }
        public function isonline($site = "https://youtube.com/"){
         if(@fopen($site, "r")){
             return true;
         }else{
             return false;
         }



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
    public function update(Request $request, $id)
    {
        //
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
