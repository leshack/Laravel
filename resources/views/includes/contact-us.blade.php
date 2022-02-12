@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')
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

<!--Page Header-->
<section class="page-header contactus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Contact Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Contact-us-->
  <section class="contact_us section-padding">
    <div class="container">
      <div  class="row">
        <div class="col-md-6">
          <h3>Get in touch using the form below</h3>
            <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
          else if(session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }}</div><?php }?>
          <div class="contact_form gray-bg">
            <form  method="POST" action="contact-us" id="ContactusForm">
                @csrf
              <div class="form-group">
                <label class="control-label">Full Name <span>*</span></label>
                <input type="text" name="name" class="form-control white_bg" id="fullname" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
              </div>
              <div class="form-group">
                <label class="control-label">Phone Number <span>*</span></label>
                <input type="text" name="phone_number" class="form-control white_bg" id="phonenumber" required>
              </div>
              <div class="form-group">
                <label class="control-label">Subject <span>*</span></label>
                <input type="text" name="subject" class="form-control white_bg" id="subject" required>
              </div>
              <div class="form-group">
                <label class="control-label">Message <span>*</span></label>
                <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <button class="btn" type="submit" name="send" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Contact Info</h3>
          <div class="contact_detail">
           @foreach($tblcontactusinfo as $tblcontactus)
                      <ul>
                        <li>
                          <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                          <div class="contact_info_m"><?php   echo htmlentities($tblcontactus->Address); ?></div>
                        </li>
                        <li>
                          <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                          <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php   echo htmlentities($tblcontactus->EmailId); ?></a></div>
                        </li>
                        <li>
                          <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                          <div class="contact_info_m"><a href="mailto:contact@exampleurl.com"><?php   echo htmlentities($tblcontactus->ContactNo); ?></a></div>
                        </li>
                      </ul>
            @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- /Contact-us-->

            <!--Back to top-->
                     <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
            <!--/Back to top-->
@endsection

