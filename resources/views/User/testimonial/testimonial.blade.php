@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Post Testimonial</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Post Testimonial</li>
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
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Post a Testimonial</h5>
          <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
        else  if (session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }} </div><?php }?>
          <form  method="post" action="{{route('user.testimonial') }}">
          @csrf

            <div class="form-group">
              <label class="control-label">Testimonial</label>
              <textarea class="form-control white_bg" name="Testimonial" rows="4" required=""></textarea>
            </div>


            <div class="form-group">
              <button type="submit" name="submit" class="btn">Save  <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<!--/Profile-setting-->
@endsection
