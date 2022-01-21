@extends('layouts.header')

@include('includes.colorswitcher')
@section('content')
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
      </div>

      <div class="dealer_info">
        <h5>{{Auth::user()->name}}</h5>
        <p>{{Auth::user()->adress}}<br>
        {{Auth::user()->city}}&nbsp;{{Auth::user()->country}}</p>
      </div>
    </div>

    <div class="row">
    <div class="col-md-7 col-sm-15"> 
      <div class="col-md-15 col-sm-15">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
            <li>
                <div class="vehicle_img"> @foreach($tblvehicles as $tblvehicle) <a href="vehical-details.php?vhid=<?php echo htmlentities($tblvehicle->vid);?>""><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($tblvehicle->vid);?>""> @foreach($tblvehicle->brands as $brand) <?php echo htmlentities($brand->BrandName);?> , @endforeach <?php echo htmlentities($tblvehicle->VehiclesTitle);?> @endforeach</a></h6>
                @foreach($tblbookings as $tblbooking)
                  <p><b>From Date:</b> <?php echo htmlentities($tblbooking->FromDate);?><br/><b>To Date:</b> <?php echo htmlentities($tblbooking->ToDate);?></p>
                </div>
                <?php if($tblbooking->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($tblbooking->Status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>



                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($tblbooking->message);?> </p></div>
       @endforeach
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles-->
@endsection