@extends('Admin.Layout.admin-dashboard')
@section('page_title','Vehicle - ')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Vehicle</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">update vehicle</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   {{-- error messages and info message --}}
 <div class="row justify-content-center">
    <div class="card-body col-md-4 ">
  <?php if($errors->any()){?><div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>{{ $errors }}</div><?php }
            else if(session()->get('success') ){?><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session()->get('success') }}
              </div><?php }?>
</div>
  </div>
   {{-- /.error messages and info message --}}
  <!-- Main content -->
<section class="content">
<div class="container-fluid">
<form  class="form-horizontal" method="POST" action="#" enctype="multipart/form-data" id="form">
    @csrf
    @foreach($vehicle as $vehicle)
 <div class="row">
     <!-- general form elements -->
    <div class="col-md-12">
        {{-- info --}}
        <div class="card card-dark card-body ">
        <div class="card-header">
            <h3 class="card-title">BASIC INFO</h3>
        </div>
        <div class="row">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label >Vehicle Title<span style="color:red">*</span></label>
            <div class="col-sm-10">
            <input type="text" name="VehiclesTitle" class="form-control"  id="VehiclesTitle" value="{{ $vehicle->VehiclesTitle}}"  >
            <span class="text-danger error-text VehiclesTitle_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label>Vehical Overview<span style="color:red">*</span></label>
            <div class="col-sm-13">
            <textarea class="form-control" name="VehiclesOverview" rows="3" >{{ $vehicle->VehiclesOverview }}</textarea>
            <span class="text-danger error-text VehiclesOverview_error"></span>
            </div>
            </div>
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
            <label>Select Brand<span style="color:red">*</span></label>
            <select class="form-control select2 select2-purple" style="width: 100%;" name="VehiclesBrands" >
                <option value="<?php echo htmlentities($vehicle->bid);?>"><?php echo htmlentities($vehicle->brandname); ?> </option>
                @foreach($tblvehicles as $tblvehicle)
                    @foreach($tblvehicle->brands as $brand)
                <option value="<?php echo htmlentities($brand->id);?>"><?php echo htmlentities($brand->BrandName);?></option>
                    @endforeach
                @endforeach
          </select>
          <span class="text-danger error-text VehiclesBrands_error"></span>
        </div>
        <!-- /.form-group -->

        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Price Per Day(in Ksh)<span style="color:red">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="PricePerDay" value="{{ $vehicle->PricePerDay }}" class="form-control" >
                <span class="text-danger error-text PricePerDay_error"></span>
                </div>

          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Model Year<span style="color:red">*</span></label>
            <div class="col-sm-10">
            <input type="text" name="ModelYear" value="{{ $vehicle->ModelYear }}" class="form-control" >
            <span class="text-danger error-text ModelYear_error"></span>
            </div>

          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Select Fuel Type<span style="color:red">*</span></label>
            <select class="form-control select2 select2-purple" style="width: 100%;" name="FuelType" >
                <option value="<?php echo htmlentities($vehicle->FuelType);?>"> <?php echo htmlentities($vehicle->FuelType);?> </option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="CNG">CNG</option>


          </select>
          <span class="text-danger error-text FuelType_error"></span>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Seating Capacity<span style="color:red">*</span></label>
            <div class="col-sm-10">
            <input type="text" name="SeatingCapacity" value="{{ $vehicle->SeatingCapacity }}" class="form-control" >
            <span class="text-danger error-text SeatingCapacity_error"></span>
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- /.row -->
  </div>

</div>

</div>
        </div>
        {{-- image --}}
<div class="card card-dark card-body ">
        <div class="card-header">
            <h3 class="card-title">Upload Images</h3>
        </div>
        <div class="row">
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">Image 1</label>
            <div class="form-group">
                 <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage1)}}" width="300" height="200" style="border:solid 1px #000">
            </div>
            <a href="{{ route('admin.changeimage')}}?imgid=<?php echo htmlentities($vehicle->id)?>">Change Image 1</a>
            {{-- <div class="btn-group ">
                <button class="btn btn-sm btn-primary" data-id="{{ $vehicle->id }}" id="editBtn">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </div> --}}
            <br><br>
            <label for="">Image 4</label>
            <div class="form-group">
                 <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage4)}}" width="300" height="200" style="border:solid 1px #000">
            </div>
            <a href="{{ route('admin.changeimage')}}?imgid=<?php echo htmlentities($vehicle->id)?>">Change Image 4</a>
            {{-- <div class="btn-group ">
                <button class="btn btn-sm btn-primary" data-id="{{ $vehicle->id }}" id="editBtn">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </div> --}}
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <label for="">Image 2</label>
            <div class="form-group">
                <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage2)}}" width="300" height="200" style="border:solid 1px #000">
            </div>
            <a href="{{ route('admin.changeimage')}}?imgid=<?php echo htmlentities($vehicle->id)?>">Change Image 2</a>
            <br><br>
            <!-- /.form-group -->
            <label for="">Image 5</label>
            <div class="form-group">
                <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage5)}}" width="300" height="200" style="border:solid 1px #000">
            </div>
            <a href="{{ route('admin.changeimage')}}?imgid=<?php echo htmlentities($vehicle->id)?>">Change Image 5</a>

            <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <div class="card-body">
            <label for="">Image 3</label>
        <div class="row">
        <div class="form-group">
            <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage3)}}" width="300" height="200" style="border:solid 1px #000">
        </div>
        </div>
        <a href="{{ route('admin.changeimage')}}?imgid=<?php echo htmlentities($vehicle->id)?>">Change Image 3</a>
     </div>
    </div>
</div>

        {{-- accessories --}}
 <div class="card card-dark card-body ">
    <div class="card-header">
        <h3 class="card-title">Accessories</h3>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <?php if($vehicle->AirConditioner==1)
                        {?>
                       <div class=" checkbox-inline">
                        <input type="checkbox" id="AirConditioner" name="AirConditioner" checked value="1">
                        <label for="AirConditioner"> Air Conditioner </label>
                        </div>
                        <?php } else { ?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="AirConditioner" name="AirConditioner"  value="1">
                            <label for="AirConditioner"> Air Conditioner </label>
                            </div>
                            <?php } ?>

                </div>
                <div class="form-group">
                    <?php if($vehicle->PowerSteering==1)
                        {?>
                       <div class=" checkbox-inline">
                        <input type="checkbox" id="PowerSteering" name="PowerSteering" checked value="1">
                        <label for="PowerSteering"> Power Steering </label>
                        </div>
                        <?php } else { ?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="PowerSteering" name="PowerSteering" value="1">
                            <label for="PowerSteering"> Power Steering </label>
                            </div>
                            <?php } ?>
                </div>
                <div class="form-group">
                    <?php if($vehicle->CDPlayer==1)
                        {?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="CDPlayer" name="CDPlayer" checked value="1">
                            <label for="CDPlayer"> CD Player </label>
                        </div>
                        <?php } else { ?>
                           <div class=" checkbox-inline">
                                <input type="checkbox" id="CDPlayer" name="CDPlayer" value="1">
                                <label for="CDPlayer"> CD Player </label>
                            </div>
                            <?php } ?>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <?php if($vehicle->PowerDoorLocks==1)
                    {?>
                       <div class=" checkbox-inline">
                        <input type="checkbox" id="PowerDoorLocks" name="PowerDoorLocks" checked value="1">
                        <label for="PowerDoorLocks"> Power Door Locks </label>
                        </div>
                        <?php } else { ?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="PowerDoorLocks" name="PowerDoorLocks" value="1">
                            <label for="PowerDoorLocks"> Power Door Locks </label>
                            </div>
                            <?php } ?>
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                    <?php if($vehicle->DriverAirbag==1)
                    {?>
                       <div class=" checkbox-inline">
                        <input type="checkbox" id="DriverAirbag" name="DriverAirbag" checked value="1">
                        <label for="DriverAirbag">Driver Airbag</label>
                        </div>
                        <?php } else { ?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="DriverAirbag" name="DriverAirbag"  value="1">
                            <label for="DriverAirbag">Driver Airbag</label>
                            </div>
                            <?php } ?>
                </div>
                <div class="form-group">
                    <?php if($vehicle->CentralLocking==1)
                    {?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="CentralLocking" name="CentralLocking" checked value="1">
                            <label for="CentralLocking">Central Locking</label>
                        </div>
                        <?php } else { ?>
                           <div class=" checkbox-inline">
                                <input type="checkbox" id="CentralLocking" name="CentralLocking" value="1">
                                <label for="CentralLocking">Central Locking</label>
                            </div>
                            <?php } ?>
                </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="card-body">
            <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <?php if($vehicle->AntiLockBrakingSystem==1)
                {?>
               <div class=" checkbox-inline">
                <input type="checkbox" id="AntiLockBrakingSystem" name="AntiLockBrakingSystem" checked value="1">
                <label for="AntiLockBrakingSystem"> AntiLock Braking System </label>
                </div>
                <?php } else { ?>
               <div class=" checkbox-inline">
                    <input type="checkbox" id="AntiLockBrakingSystem" name="AntiLockBrakingSystem" value="1">
                    <label for="AntiLockBrakingSystem"> AntiLock Braking System </label>
                    </div>
                    <?php } ?>
            </div>
            <div class="form-group">
                <?php if($vehicle->DriverAirbag==1)
                {?>
               <div class=" checkbox-inline">
                    <input type="checkbox" id="PassegerAirbag" name="PassegerAirbag" checked value="1">
                    <label for="PassegerAirbag"> Passenger Airbag </label>
                </div>
                <?php } else { ?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="PassegerAirbag" name="PassegerAirbag" value="1">
                        <label for="PassegerAirbag"> Passenger Airbag </label>
                    </div>
                    <?php } ?>
            </div>
            <div class="form-group">
                <?php if($vehicle->CrashSensor==1)
                {?>
               <div class=" checkbox-inline">
                    <input type="checkbox" id="CrashSensor" name="CrashSensor" checked value="1">
                    <label for="CrashSensor"> Crash Sensor </label>
                </div>
                <?php } else { ?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="CrashSensor" name="CrashSensor" value="1">
                        <label for="CrashSensor"> Crash Sensor </label>
                    </div>
                    <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php if($vehicle->BrakeAssist==1)
                {?>
               <div class=" checkbox-inline">
                    <input type="checkbox" id="BrakeAssit" name="BrakeAssit" checked value="1">
                    <label for="BrakeAssit"> Brake Assist </label>
                </div>
                <?php } else { ?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="BrakeAssit" name="BrakeAssit" value="1">
                        <label for="BrakeAssit"> Brake Assist </label>
                    </div>
                    <?php } ?>

            </div>
            <div class="form-group">
                <?php if($vehicle->PowerWindows==1)
                {?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="PowerWindows" name="PowerWindows" checked value="1">
                        <label for="PowerWindows"> Power Windows </label>
                    </div>
                    <?php } else { ?>
                       <div class=" checkbox-inline">
                            <input type="checkbox" id="PowerWindows" name="PowerWindows" value="1">
                            <label for="PowerWindows"> Power Windows </label>
                        </div>
                        <?php } ?>
            </div>
            <div class="form-group">
                <?php if($vehicle->CrashSensor==1)
                {?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="LeatherSeats" name="LeatherSeats" checked value="1">
                        <label for="LeatherSeats"> Leather Seats </label>
                    </div>
                    <?php } else { ?>
                   <div class=" checkbox-inline">
                        <input type="checkbox" id="LeatherSeats" name="LeatherSeats" value="1">
                        <label for="LeatherSeats"> Leather Seats </label>
                    </div>
                    <?php } ?>
            </div>
        </div>
            </div>
          </div>
      </div>
</div>


          </div>
          {{-- buttons --}}
          <div class="row row d-flex justify-content-center align-content-center">
            <div class=" text-center" >
    <div class="form-group">
        <div class=" text-center">
            <button class="btn btn-default" type="reset">Cancel</button>
            <button class="btn btn-primary" name="submit" type="submit">Save</button>
        </div>
    </div>
</div>
          </div>
@endforeach
</form>

        </div>
    </div>
</section>
{{-- @include('Admin.vehicles.editvehiclemodal') --}}
@endsection
