<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class TbltestimonialController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function managetestimonial()
    {
        $testimonial = DB::table("tbltestimonial")
        ->join("users", function($join){
            $join->on("users.email", "=", "tbltestimonial.email");
        })
        ->select("users.name", "tbltestimonial.email", "tbltestimonial.Testimonial", "tbltestimonial.created_at", "tbltestimonial.status", "tbltestimonial.id")
        ->get();
        return view('Admin.testimonial.managetestimonial', [
            'testimonial' => $testimonial
        ]);
        // $tbltestimonial = Testimonial::with(['testimonial.testimonial','testimonial:name'])->get();
        //    return view('index',compact('tbltestimonial'))
        //          ->with('tbltestimonial', $tbltestimonial);
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
    public function status(Request $request, $id)
    {

        $testimonial = Testimonial::findOrFail($request->id);
        $testimonial->status = $request->status;
        $testimonial->save();

        return response()->json(['msg' => 'Testimonial status updated successfully.']);
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
