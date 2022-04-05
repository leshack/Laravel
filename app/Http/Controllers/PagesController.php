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
    public function vehicledetails()
    {
        $vhid=intval($_GET['vhid']);
        $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->where('id', $vhid)->get();
        $tbltestimonial = Testimonial::with(['user.testimonial','user:name'])->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('includes.vehicle-details',compact('tblvehicles','tbltestimonial','tblbookings'))
            ->with('tblvehicles', $tblvehicles)->with('tbltestimonial', $tbltestimonial)
            ->with('tblbookings', $tblbookings);

    }
    public function carlisting()
    {
        $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->get();
        $tbltestimonial = Testimonial::with(['user.testimonial','user:name'])->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('includes.car-listing',compact('tblvehicles','tbltestimonial','tblbookings'))
            ->with('tblvehicles', $tblvehicles)->with('tbltestimonial', $tbltestimonial)
            ->with('tblbookings', $tblbookings);

    }
    public function page()
    {
        $type=$_GET['type'];
        $sql= 'Select  type,detail,PageName from tblpages where type = :type';
        $tblpages = DB::select($sql,['type' => $type]);
        return view('includes.page',compact('tblpages', 'type'))
        ->with('tblpages', $tblpages)
        ->with('type', $type);


    }
    public function managepage()
    {
        $type=$_GET['type'];
        $sql= 'Select  detail from tblpages where type = :type';
        $tblpages = DB::select($sql,['type' => $type]);
        return view('Admin.pages.managepage',compact('tblpages', 'type'))
        ->with('tblpages', $tblpages)
        ->with('type', $type);
    }
}
