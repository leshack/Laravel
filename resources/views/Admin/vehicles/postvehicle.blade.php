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
            <li class="breadcrumb-item active">post vehicle</li>
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
<form  class="form-horizontal" method="POST" action="{{ route('admin.addvehicle') }}" enctype="multipart/form-data" id="form">
    @csrf
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
            <input type="text" name="VehiclesTitle" id="VehiclesTitle" class="form-control"  >
            <span class="text-danger error-text VehiclesTitle_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label>Vehical Overview<span style="color:red">*</span></label>
            <div class="col-sm-13">
            <textarea class="form-control" name="VehiclesOverview" rows="3" ></textarea>
            <span class="text-danger error-text VehiclesOverview_error"></span>
            </div>
            </div>
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
            <label>Select Brand<span style="color:red">*</span></label>
            <select class="form-control select2 select2-purple" style="width: 100%;" name="VehiclesBrands" >
                <option selected="selected"> Select </option>
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
                <input type="text" name="PricePerDay" class="form-control" >
                <span class="text-danger error-text PricePerDay_error"></span>
                </div>

          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Model Year<span style="color:red">*</span></label>
            <div class="col-sm-10">
            <input type="text" name="ModelYear" class="form-control" >
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
                <option selected="selected"> Select </option>
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
            <input type="text" name="SeatingCapacity" class="form-control" >
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
            <div class="form-group">
                <label for="">Image 1 <span style="color:red">*</span></label>
                <input type="file" name="Vimage1"  class="form-control">
                <span class="text-danger error-text Vimage1_error"></span>
            </div>
            <div class="img-holder"></div>
            <div class="form-group">
                <label for="">Image 4<span style="color:red">*</span></label>
                <input type="file" name="Vimage4"  class="form-control">
                <span class="text-danger error-text Vimage4_error"></span>
            </div>
            <div class="img-holder4"></div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Image 2<span style="color:red">*</span></label>
                <input type="file" name="Vimage2"  class="form-control">
                <span class="text-danger error-text Vimage2_error"></span>
            </div>
            <div class="img-holder2"></div>
            <!-- /.form-group -->
            <div class="form-group">
                <label for="">Image 5<span style="color:red">*</span></label>
                <input type="file" name="Vimage5" class="form-control">
                <span class="text-danger error-text Vimage5_error"></span>
            </div>
               <div class="img-holder5"></div>

            <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <div class="card-body">
        <div class="row">
        <div class="form-group">
        <label for="">Image 3<span style="color:red">*</span></label>
        <input type="file" name="Vimage3"  class="form-control">
        <span class="text-danger error-text Vimage3_error"></span>
    </div>

        </div>
        <div class="img-holder3"></div>
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
                        <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="AirConditioner" name="AirConditioner" value="1">
                        <label for="AirConditioner"> Air Conditioner </label>
                        </div>
                </div>
                <div class="form-group">
                        <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="PowerSteering" name="PowerSteering" value="1">
                        <label for="PowerSteering"> Power Steering </label>
                        </div>
                </div>
                <div class="form-group">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="CDPlayer" name="CDPlayer" value="1">
                            <label for="CDPlayer"> CD Player </label>
                        </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                        <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="PowerDoorLocks" name="PowerDoorLocks" value="1">
                        <label for="PowerDoorLocks"> Power Door Locks </label>
                        </div>
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                        <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="DriverAirbag" name="DriverAirbag" value="1">
                        <label for="DriverAirbag">Driver Airbag</label>
                        </div>
                </div>
                <div class="form-group">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="CentralLocking" name="CentralLocking" value="1">
                            <label for="CentralLocking">Central Locking</label>
                        </div>
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
                <div class="checkbox checkbox-inline">
                <input type="checkbox" id="AntiLockBrakingSystem" name="AntiLockBrakingSystem" value="1">
                <label for="AntiLockBrakingSystem"> AntiLock Braking System </label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox checkbox-inline">
                    <input type="checkbox" id="PassegerAirbag" name="PassegerAirbag" value="1">
                    <label for="PassegerAirbag"> Passenger Airbag </label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox checkbox-inline">
                    <input type="checkbox" id="CrashSensor" name="CrashSensor" value="1">
                    <label for="CrashSensor"> Crash Sensor </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="checkbox checkbox-inline">
                    <input type="checkbox" id="BrakeAssit" name="BrakeAssit" value="1">
                    <label for="BrakeAssit"> Brake Assist </label>
                </div>
            </div>
            <div class="form-group">
                    <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="PowerWindows" name="PowerWindows" value="1">
                        <label for="PowerWindows"> Power Windows </label>
                    </div>
            </div>
            <div class="form-group">
                    <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="LeatherSeats" name="LeatherSeats" value="1">
                        <label for="LeatherSeats"> Leather Seats </label>
                    </div>
            </div>
        </div>
            </div>
          </div>
      </div>
</div>


          </div>
          {{-- buttons --}}
          <div class="row justify-content-center">
            <div class="col-md-6 " >
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-2">
            <button class="btn btn-default" type="reset">Cancel</button>
            <button class="btn btn-primary" name="submit" type="submit">Save</button>
        </div>
    </div>
</div>
          </div>
</form>

        </div>
    </div>
</section>

@endsection
