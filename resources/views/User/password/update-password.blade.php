@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')
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
        <h1>Update Password</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Update Password</li>
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
        <form name="chngpwd" method="post" action="{{route('user.passwordchange')}}" id="PasswordForm">

            @csrf
            <div class="gray-bg field-title">
              <h6>Update password</h6>
            </div>
             <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
        else  if (session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }} </div><?php }?>
            <div class="form-group">
              <label class="control-label">Current Password</label>
              <input class="form-control white_bg" id="password" name="currentpassword"  type="text" required>
              <span class="text-danger error-text currentpassword_error"></span>
            </div>
            <div cl
            <div class="form-group">
              <label class="control-label">Password</label>
              <input class="form-control white_bg" id="newpassword" type="text" name="newpassword" required>
              <span class="text-danger error-text newpassword_error"></span>
            </div>
            <div class="form-group">
              <label class="control-label">Confirm Password</label>
              <input class="form-control white_bg" id="confirmpassword" type="text" name="confirmpassword" required >
              <span class="text-danger error-text confirmpassword_error"></span>
            </div>

            <div class="form-group">
               <input type="submit" value="Update" name="update" id="submit" class="btn btn-block">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting-->


<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
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
      $('#PasswordForm').on('submit',function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#PasswordForm')[0].reset();
                alert(data.msg);
              }
            }
         });
      });


    });

  </script>

@endsection


