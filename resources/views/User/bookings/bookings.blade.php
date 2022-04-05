@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')
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
        <p>{{Auth::user()->address}}<br>
        {{Auth::user()->city}}&nbsp;{{Auth::user()->country}}</p>
      </div>
    </div>

    <div class="row ">
     <div class="col-md-3 col-sm-3">
        @include('includes.siderbar')
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
            <li>
                @foreach($tblvehicles as $tblvehicle)
                <div class="vehicle_img"><a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>"><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6>@foreach($tblvehicle->brands as $brand) <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($brand->id);?>"><?php echo htmlentities($brand->BrandName);?>@endforeach ,<?php echo htmlentities($tblvehicle->VehiclesTitle);?></a></h6>
                  @foreach($tblvehicle->bookings as $booking)
                  <p><b>From Date:</b> <?php echo htmlentities($booking->FromDate);?><br/><b>To Date:</b> <?php echo htmlentities($booking->ToDate);?></p>
                </div>
                <?php if($booking->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($booking->Status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>



                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($booking->message);?> </p></div>
       @endforeach
            </li>

       @endforeach


            </ul>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<!--/my-vehicles-->
@endsection
