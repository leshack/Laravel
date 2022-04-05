@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')


<!--Listing-Image-Slider-->
@foreach($tblvehicles as $tblvehicle)
{
<section id="listing_img_slider">
    <div><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage2)}}" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage3)}}" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage4)}}" class="img-responsive"  alt="image" width="900" height="560"></div>
    <?php if($tblvehicle->Vimage5=="")
  {

  } else {
    ?>
    <div><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage5)}}" class="img-responsive" alt="image" width="900" height="560"></div>
    <?php } ?>
  </section>
  <!--/Listing-Image-Slider-->

  <!--Listing-detail-->
<section class="listing-detail">
    <div class="container">
      <div class="listing_detail_head row">
        <div class="col-md-9">
          <h2> @foreach($tblvehicle->brands as $brand)<?php echo htmlentities($brand->BrandName);?> @endforeach , <?php echo htmlentities($tblvehicle->VehiclesTitle);?></h2>
        </div>
        <div class="col-md-3">
          <div class="price_info">
            <p>$<?php echo htmlentities($tblvehicle->PricePerDay);?> </p>Per Day

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="main_features">
            <ul>

              <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                <h5><?php echo htmlentities($tblvehicle->ModelYear);?></h5>
                <p>Reg.Year</p>
              </li>
              <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                <h5><?php echo htmlentities($tblvehicle->FuelType);?></h5>
                <p>Fuel Type</p>
              </li>

              <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                <h5><?php echo htmlentities($tblvehicle->SeatingCapacity);?></h5>
                <p>Seats</p>
              </li>
            </ul>
          </div>
          <div class="listing_more_info">
            <div class="listing_detail_wrap">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs gray-bg" role="tablist">
                <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>

                <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <!-- vehicle-overview -->
                <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                  <p><?php echo htmlentities($tblvehicle->VehiclesOverview);?></p>
                </div>


                <!-- Accessories -->
                <div role="tabpanel" class="tab-pane" id="accessories">
                  <!--Accessories-->
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2">Accessories</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Air Conditioner</td>
  <?php if($tblvehicle->AirConditioner==1)
  {
  ?>
                        <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
     <td><i class="fa fa-close" aria-hidden="true"></i></td>
     <?php } ?> </tr>

  <tr>
  <td>AntiLock Braking System</td>
  <?php if($tblvehicle->AntiLockBrakingSystem==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else {?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
                      </tr>

  <tr>
  <td>Power Steering</td>
  <?php if($tblvehicle->PowerSteering==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>


  <tr>

  <td>Power Windows</td>

  <?php if($tblvehicle->PowerWindows==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

   <tr>
  <td>CD Player</td>
  <?php if($tblvehicle->CDPlayer==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

  <tr>
  <td>Leather Seats</td>
  <?php if($tblvehicle->LeatherSeats==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

  <tr>
  <td>Central Locking</td>
  <?php if($tblvehicle->CentralLocking==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

  <tr>
  <td>Power Door Locks</td>
  <?php if($tblvehicle->PowerDoorLocks==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
                      </tr>
                      <tr>
  <td>Brake Assist</td>
  <?php if($tblvehicle->BrakeAssist==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php  } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

  <tr>
  <td>Driver Airbag</td>
  <?php if($tblvehicle->DriverAirbag==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
   </tr>

   <tr>
   <td>Passenger Airbag</td>
   <?php if($tblvehicle->PassengerAirbag==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else {?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

  <tr>
  <td>Crash Sensor</td>
  <?php if($tblvehicle->CrashSensor==1)
  {
  ?>
  <td><i class="fa fa-check" aria-hidden="true"></i></td>
  <?php } else { ?>
  <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?>
  </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>


        </div>

        <!--Side-Bar-->
        <aside class="col-md-3">

          <div class="share_vehicle">
            <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
          </div>
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
              <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
        else  if (session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }} </div><?php }?>
            </div>
            <form method="post" action="{{ route('user.bookings') }}">
                @csrf
              <div class="form-group">
                <input type="date" class="form-control" name="FromDate" placeholder="From Date(dd/mm/yyyy)" required>
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="ToDate" placeholder="To Date(dd/mm/yyyy)" required>
              </div>
              <div class="form-group">
                <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
              </div>
            <?php  if(Route::has('register'))
                {?>
                <div class="form-group">
                  <input type="submit" class="btn"  name="submit" value="Book Now">
                </div>
                <?php } else { ?>
  <a href="{{ route('login') }}" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                <?php } ?>
            </form>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>

      <div class="space-20"></div>
      <div class="divider"></div>

      <!--Similar-Cars-->
      <div class="similar_cars">
        <h3>Similar Cars</h3>
        <div class="row">
          <div class="col-md-3 grid_listing">
            <div class="product-listing-m gray-bg">
              <div class="product-listing-img"> <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>"><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" class="img-responsive" alt="image" /> </a>
              </div>
              <div class="product-listing-content">
                <h5> @foreach($tblvehicle->brands as $brand) <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($brand->id);?>"><?php echo htmlentities($brand->BrandName);?> @endforeach , <?php echo htmlentities($tblvehicle->VehiclesTitle);?></a></h5>
                <p class="list-price">$<?php echo htmlentities($tblvehicle->PricePerDay);?></p>

                <ul class="features_list">

               <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->SeatingCapacity);?> seats</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->ModelYear);?> model</li>
                  <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->FuelType);?></li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!--/Similar-Cars-->

    </div>
  </section>
  <!--/Listing-detail-->
  @endforeach

  @endsection
