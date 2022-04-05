<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Bookings;
use Illuminate\Support\Facades\DB;

class TblbookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function managebookings()
    {
        $bookings = DB::table("tblbookings")
        ->join("tblvehicles", function($join){
            $join->on("tblvehicles.id", "=", "tblbookings.vehicle_id");
        })
        ->join("users", function($join){
            $join->on("users.email", "=", "tblbookings.email");
        })
        ->join("tblbrands", function($join){
            $join->on("tblvehicles.VehiclesBrand", "=", "tblbrands.id");
        })
        ->select("users.name", "tblbrands.BrandName", "tblvehicles.VehiclesTitle", "tblbookings.FromDate", "tblbookings.ToDate", "tblbookings.messages", "tblbookings.vehicle_id as vid", "tblbookings.status", "tblbookings.created_at", "tblbookings.id")
        ->get();
        return view('Admin.bookings.managebookings', [
            'bookings' => $bookings
        ]);

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
    public function update(Request $request, $id)
    {
            $testimonial = Bookings::findOrFail($id);

            $testimonial->update([
                'status' => $request->get('status'),
            ]);


        return back()->with('success', 'Booking successfully updated');
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
