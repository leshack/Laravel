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
                @foreach($tblbookings as $tblbooking)
                <div class="vehicle_img"><a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblbooking->id);?>"><img src="{{url('images/Adminimages/vehicleimages/'.$tblbooking->Vimage1)}}" alt="image"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblbooking->id);?>"><?php echo htmlentities($tblbooking->BrandName);?>,<?php echo htmlentities($tblbooking->VehiclesTitle);?></a></h6>
                  <p><b>From Date:</b> <?php echo htmlentities($tblbooking->FromDate);?><br/><b>To Date:</b> <?php echo htmlentities($tblbooking->ToDate);?></p>
                </div>
                <?php if($tblbooking->status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($tblbooking->status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>



                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($tblbooking->messages);?> </p></div>
       @endforeach
            </li>




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
