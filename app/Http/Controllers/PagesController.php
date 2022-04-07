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
    public function index($tid=1)
    {
        $tblvehicles = DB::table("tblvehicles")
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.VehiclesTitle", "tblbrands.BrandName","tblvehicles.PricePerDay", "tblvehicles.FuelType", "tblvehicles.ModelYear", "tblvehicles.id", "tblvehicles.SeatingCapacity", "tblvehicles.VehiclesOverview", "tblvehicles.Vimage1")
        ->get();

        $tbltestimonial = DB::table("tbltestimonial")
        ->join("users", function($join){
            $join->on("tbltestimonial.email", "=", "users.email");
        })
        ->select("tbltestimonial.Testimonial", "users.name")
        ->where("tbltestimonial.status", "=", $tid)
        ->get();

        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('index',compact('tblvehicles','tbltestimonial','tblbookings'))
            ->with('tblvehicles', $tblvehicles)->with('tbltestimonial', $tbltestimonial)
            ->with('tblbookings', $tblbookings);

    }
    public function vehicledetails()
    {
        $vhid=intval($_GET['vhid']);
        $tblvehicles = DB::table("tblvehicles")
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.*", "tblbrands.BrandName", "tblbrands.id as bid")
        ->where("tblvehicles.id", "=", $vhid)
        ->get();
        $tbltestimonial = Testimonial::with(['user.testimonial','user:name'])->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('includes.vehicle-details',compact('tblvehicles','tbltestimonial','tblbookings'))
            ->with('tblvehicles', $tblvehicles)->with('tbltestimonial', $tbltestimonial)
            ->with('tblbookings', $tblbookings);

    }
    public function carlisting()
    {
        $tblvehicles = DB::table("tblvehicles")
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.*", "tblbrands.BrandName", "tblbrands.id as bid")
        ->get();
        $tblbookings = Bookings::with(['user.bookings'])->get();
        return view('includes.car-listing',compact('tblvehicles','tblbookings'))
            ->with('tblvehicles', $tblvehicles)
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
    public function managepage(Request $request)
    {
        // $type = $_GET['type'];
       // $sql= 'Select  detail from tblpages where type = :type';

       $pages = DB::table("tblpages")
       ->select("detail")
       ->where("type", "=", $request->type)
       ->get();
        // DB::select($sql,['type' => $type]);
        return view('Admin.pages.managepage',[
            'pages' => $pages,
            // 'type' => $type
        ]);
    }

    public function updatepage(Request $request)
    {
        DB::table('tblpages')->where("type", "=", $request['type'])->update([
                'detail' =>$request['summernote']
        ]);
        return back()->with('success', 'page successfully updated');
    }
}
