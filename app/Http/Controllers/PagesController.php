<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use App\Models\Brands;
use App\Models\Testimonial;
use App\Models\Bookings;

class PagesController extends Controller
{
    public function index()
    {
        $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->get();
        $tbltestimonial = Testimonial::with(['user.testimonial','user:name'])->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('index',compact('tblvehicles','tbltestimonial','tblbookings'))
            ->with('tblvehicles', $tblvehicles)->with('tbltestimonial', $tbltestimonial) 
            ->with('tblbookings', $tblbookings);

    }
}
