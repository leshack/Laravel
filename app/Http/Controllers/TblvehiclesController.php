<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TblvehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postvehicle()
    {

       // return view('Admin.vehicles.postvehicle');
        $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->get();
        return  view('Admin.vehicles.postvehicle',compact('tblvehicles'))
            ->with('tblvehicles', $tblvehicles);

    }
    public function managevehicle()
    {
        //return view('Admin.vehicles.managevehicle');
        $vehicles = DB::table("tblvehicles")
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.VehiclesTitle", "tblbrands.BrandName", "tblvehicles.PricePerDay", "tblvehicles.FuelType", "tblvehicles.ModelYear", "tblvehicles.id")
        ->get();
        return view ('Admin.vehicles.managevehicle', [
            'vehicles' => $vehicles
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addvehicle(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'VehiclesTitle' =>'required|string|',
            'VehiclesBrands' => ['required', 'string'],
            'VehiclesOverview' => ['required', 'string'],
            'PricePerDay' => ['required', 'numeric'],
            'FuelType' => ['required', 'string'],
            'ModelYear' => ['required', 'numeric'],
            'SeatingCapacity' => ['required', 'numeric', 'max:100'],
            'Vimage1' => ['required', 'image'],
            'Vimage2' => ['required', 'image'],
            'Vimage3' => ['required', 'image'],
            'Vimage4' => ['required', 'image'],
            'Vimage5' => ['required', 'image'],
            'AirConditioner' =>['numeric', 'max:1'],
            'PowerDoorLocks' =>['numeric', 'max:1'],
            'AntiLockBrakingSystem' =>['numeric', 'max:1'],
            'BrakeAssit' =>['numeric', 'max:1'],
            'PowerSteering' =>['numeric', 'max:1'],
            'DriverAirbag' =>['numeric', 'max:1'],
            'PassegerAirbag' =>['numeric', 'max:1'],
            'PowerWindows' =>['numeric', 'max:1'],
            'CDPlayer' =>['numeric', 'max:1'],
            'CentralLocking' =>['numeric', 'max:1'],
            'CrashSensor' =>['numeric', 'max:1'],
            'LeatherSeats' =>['numeric', 'max:1'],
        ],[
            'Vimage1.required' => 'Vehicle image 1 is required',
            'Vimage1.image' => 'Vehicle file must be an image',
            'Vimage2.required' => 'Vehicle image 2 is required',
            'Vimage2.image' => 'Vehicle file must be an image',
            'Vimage3.required' => 'Vehicle image 3 is required',
            'Vimage3.image' => 'Vehicle file must be an image',
            'Vimage4.required' => 'Vehicle image 4 is required',
            'Vimage4.image' => 'Vehicle file must be an image',
            'Vimage5.required' => 'Vehicle image 5 is required',
            'Vimage5.image' => 'Vehicle file must be an image',

        ]);
        if($validator->fails()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            if($request->hasFile("Vimage1")){
                $path = 'vehicleimages/';
                $file = $request->file('Vimage1') ;
                $file_name1 = time().'_'.$file->getClientOriginalName();
                //    $upload = $file->storeAs($path, $file_name);
                $upload = $file->storeAs($path, $file_name1, 'public');

            }
            if($request->hasFile("Vimage2")){
                $path = 'vehicleimages/';
                $file = $request->file('Vimage2') ;
                $file_name2 = time().'_'.$file->getClientOriginalName();
                //    $upload = $file->storeAs($path, $file_name);
                $upload1 = $file->storeAs($path, $file_name2, 'public');
            }
            if($request->hasFile("Vimage3")){
                $path = 'vehicleimages/';
                $file = $request->file('Vimage3') ;
                $file_name3 = time().'_'.$file->getClientOriginalName();
                //    $upload = $file->storeAs($path, $file_name);
                $upload2 = $file->storeAs($path, $file_name3, 'public');
            }
            if($request->hasFile("Vimage4")){
                $path = 'vehicleimages/';
                $file = $request->file('Vimage4') ;
                $file_name4 = time().'_'.$file->getClientOriginalName();
                //    $upload = $file->storeAs($path, $file_name);
                $upload3 = $file->storeAs($path, $file_name4, 'public');
            }
            if($request->hasFile("Vimage5")){
                $path = 'vehicleimages/';
                $file = $request->file('Vimage5') ;
                $file_name5 = time().'_'.$file->getClientOriginalName();
                //    $upload = $file->storeAs($path, $file_name);
                $upload4 = $file->storeAs($path, $file_name5, 'public');
            }
             if($upload){

                Vehicle::create([
                    'VehiclesTitle' => $request->VehiclesTitle,
                    'VehiclesBrand' => $request->VehiclesBrand,
                    'VehiclesOverview' => $request->VehiclesOverview,
                    'PricePerDay' => $request->PricePerDay,
                    'FuelType' => $request->FuelType,
                    'ModelYear' => $request->ModelYear,
                    'SeatingCapacity' => $request->SeatingCapacity,
                    'Vimage1' => $request->file_name1,
                    'Vimage2' => $request->file_name2,
                    'Vimage3' => $request->file_name3,
                    'Vimage4' => $request->file_name4,
                    'Vimage5' => $request->file_name5,
                    'AirConditioner' => $request->AirConditioner,
                    'PowerDoorLocks' => $request->PowerDoorLocks,
                    'AntiLockBrakingSystem' => $request->AntiLockBrakingSystem,
                    'BrakeAssit' => $request->BrakeAssit,
                    'PowerSteering' => $request->PowerSteering,
                    'DriverAirbag' => $request->DriverAirbag,
                    'PassegerAirbag' => $request->PassegerAirbag,
                    'PowerWindows' => $request->PowerWindows,
                    'CDPlayer' => $request->CDPlayer,
                    'CentralLocking' => $request->CentralLocking,
                    'CrashSensor' => $request->CrashSensor,
                    'LeatherSeats' => $request->LeatherSeats,
                ]);
                return response()->json(['status'=>1,'msg'=>'New Vehicle has been saved successfully']);
             }

        }

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
        // $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->get();
        // $vehicle = Vehicle::findOrFail($id);
        // return view('Admin.vehicles.updatevehicle')
        // ->with('vehicle',$vehicle)
        // ->with('tblvehicles', $tblvehicles);

        $vehicle = DB::table("tblvehicles")
        ->join("tblbrands", function($join){
            $join->on("tblbrands.id", "=", "tblvehicles.VehiclesBrand");
        })
        ->select("tblvehicles.*", "tblbrands.brandname", "tblbrands.id as bid")
        ->where("tblvehicles.id", "=", $id)
        ->get();
        $tblvehicles = Vehicle::with(['brands.vehicle',/*'brands:id'*/])->get();
        return view('Admin.vehicles.updatevehicle')
                ->with('vehicle',$vehicle)
                ->with('tblvehicles', $tblvehicles);
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
    public function delete($id)
    {
        Vehicle::find($id)->delete();
        return redirect()->route('admin.managevehicles')->with('success', 'Vehicle successfully deleted');
    }

    public function image(){
        $imgid=intval($_GET['imgid']);
       // $filename =["Vimage1","Vimage2","Vimage3","Vimage4","Vimage5"];
        $sql='select Vimage1, Vimage2 , Vimage3 , Vimage4 ,  Vimage5  from tblvehicles where tblvehicles.id = :imgid';
        $vehicle = DB::select($sql,['imgid' => $imgid]);
          return view('Admin.vehicles.changeimage',compact('vehicle', 'imgid'))
          ->with('vehicle', $vehicle)
          ->with('imgid', $imgid);

    }
}
