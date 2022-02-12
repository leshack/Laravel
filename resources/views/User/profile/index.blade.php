@extends('layouts.header')

@include('includes.colorswitcher')
@section('content')
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->
<style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


<section class="user_profile inner_pages">
  <div class="container">
    <div class="row col-md-6 col-sm-8">
    <div class="user_profile_info gray-bg padding_4x4_40">
        <div class="col-md-9">

            <!-- Profile Image -->
            <div class="card card-primary card-outline ">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid " src="{{Auth::user()->picture}}" alt="User profile picture">
                </div>
                <input type="file" name="user_image" id="user_image" style="opacity: 0;height:1px;display:none">
           <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change Picture</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>


        <div class="dealer_info">
          <h5>{{Auth::user()->name}}</h5>
          <p>{{Auth::user()->address}}<br>
             {{Auth::user()->city}}&nbsp;{{Auth::user()->country}}</p>
        </div>
      </div>

    </div>
    <div class="row">

      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Profile Settings</h5>
          <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
          else if(session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }}</div><?php }?>
          <form  method="post" action="profile" id="Profileform" enctype="multipart/form-data">
              @csrf
           <div class="form-group">
              <label class="control-label">Reg Date -</label>
              {{Auth::user()->RegDate}}
            </div>
            <div class="form-group">
              <label class="control-label">Last Update at  -</label>
              {{Auth::user()->updated_at}}
            </div>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="name" value="{{Auth::user()->name}}" id="name" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="{{Auth::user()->email}}" name="email" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="phone" value="{{Auth::user()->phone}}" id="phone" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="{{Auth::user()->Dob}}" name="Dob" placeholder="dd/mm/yyyy" id="Dob" type="text" required >
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4"   id="address" required>{{Auth::user()->address}}</textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg"  name="country" value="{{Auth::user()->country}}" id="country" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg"  name="city" value="{{Auth::user()->city}}" id="city" type="text" required>
            </div>
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>

  </div>
</section>

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

{{-- CUSTOM JS CODES --}}
<script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });

    $(function(){

      /* UPDATE USER PERSONAL INFO */
      $(document).on('click','#change_picture_btn', function(){
        $('#user_image').click();
      });


      $('#user_image').ijaboCropTool({
            preview : '.user_picture',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("user.profilepic") }}',
            // withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
               alert(message);
            },
            onError:function(message, element, status){
              alert(message);
            }
         });


    });

  </script>

@endsection


