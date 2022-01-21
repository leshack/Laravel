@extends('layouts.header')

@include('includes.colorswitcher')
@section('content')
    <!-- Banners-background image-->
<section id="banner">
    <div class="background-image ">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Find the right car for you.</h1>
            <p>We have more than a thousand cars for you to choose. </p>
            <a href="/blog" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Banners -->

    <!-- Continue -->
<section class="section-padding gray-bg">
    <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best Automobile Hoonicorn <span>CarForYou</span></h2>
      <p>Avanti savoia and his team have been serving KE Kenya and surrounding areas for over 5 years. We are a member of of the outsanding group and have an "A" rating. We know your time is very valuable and we will work hard to ensure your experience with us is like none other</p>
    </div>
<div class="row"> 
    <!-- Continue -->

     <!-- Nav tab for new car -->
     <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Car</a></li>
        </ul>
      </div>
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">
        

                        <!-- Database query from tblvehicle using foreach-->
      
       @foreach($tblvehicles as $tblvehicle)
        <div class="col-list-3">
        <div class="recent-car-list">
        <div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($tblvehicle->id);?>"><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" class="img-responsive" alt="image"></a>
        <ul>
        <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->FuelType);?></li>
        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->ModelYear);?> Model</li>
        <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->SeatingCapacity);?> seats</li>
        </ul>
        </div>
        <div class="car-title-m">     
        <h6> @foreach($tblvehicle->brands as $brand) <a href="vehical-details.php?vhid=<?php echo htmlentities($brand->id);?>"><?php echo htmlentities($brand->BrandName);?>  @endforeach ,<?php echo htmlentities($tblvehicle->VehiclesTitle);?></a></h6>
        <span class="price">$<?php echo htmlentities($tblvehicle->PricePerDay);?> /Day</span> 
        </div>
        <div class="inventory_info_m">
        <p><?php echo substr($tblvehicle->VehiclesOverview,0,70);?></p>
        </div>
        </div>
        </div>  
                               <!-- Database query from tblvehicle endforeach-->                              
       @endforeach    
      </div>
    </div>
  </div>
</section>
     <!-- Recently Listed New Cars -->
    

     <!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
            <p>New Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
            <p>Used Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 


<!--Testimonial -->
                    <!-- Database query from tbltestimonial using foreach-->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">



      @foreach($tbltestimonial as $tbltestimony)
        <div class="testimonial-m">
          <div class="testimonial-img"> <img src="{{url('images/cat-profile.png')}}" alt="" /> </div>
            <div class="testimonial-content">
              <div class="testimonial-heading">
             <h5><?php echo htmlentities($tbltestimony->name);?></h5>
             <p><?php echo htmlentities($tbltestimony->Testimonial);?></p>
            </div>
          </div>
        </div>
                <!-- Database query from tblvehicle endforeach-->       
      @endforeach
      </div>
    </div>
  </div>
  
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
    <!-- /Testimonial--> 
<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 
    
@endsection