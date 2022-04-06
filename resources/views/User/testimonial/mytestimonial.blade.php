@extends('layouts.header')

@section('content')

@include('includes.colorswitcher')
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Testimonials</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Testimonials</li>
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
    <div class="row">
        <div class="col-md-3 col-sm-3">
            @include('includes.siderbar')
      <div class="col-md-8 col-sm-8">
      <div class="profile_wrap">
          <h5 class="uppercase underline">My Testimonials </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
                @foreach($tbltestimonial as $tbltestimony)
            <li>

            <div>

                <p><?php echo htmlentities($tbltestimony->Testimonial);?></p>
                <p><b>Posting Date:</b><?php echo htmlentities($tbltestimony->PostingDate);?> </p>

                <?php if($tbltestimony->status==1){ ?>
                        <div class="vehicle_status"> <a class="btn outline btn-xs active-btn">Active</a>
                        <div class="clearfix"></div>
                        </div>
                <?php } else {?>
                        <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Waiting for approval</a>
                        <div class="clearfix"></div>
                        </div>
                <?php } ?>

            </div>

         </li>
         @endforeach
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
</section>
<!--/my-vehicles-->
@endsection
