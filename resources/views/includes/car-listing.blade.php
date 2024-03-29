@extends('layouts.header')


@section('content')

@include('includes.colorswitcher')
<!--Page Header-->
<section class="page-header listing_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>Car Listing</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Car Listing</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Page Header-->

  <!--Listing-->
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
            <div class="sorting-count">
                <p><span> {{ $tblvehicles->count() }} Listings of Hoonicorn</span></p>
            </div>
            </div>
            @foreach($tblvehicles as $tblvehicle)
            <div class="product-listing-m gray-bg">
            <div class="product-listing-img"><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" class="img-responsive" alt="Image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>"><?php echo htmlentities($tblvehicle->BrandName);?>, <?php echo htmlentities($tblvehicle->VehiclesTitle);?></a></h5>
              <p class="list-price"><?php echo htmlentities($tblvehicle->PricePerDay);?> Ksh Per/Day</p>
              <ul>
                <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->SeatingCapacity);?> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->ModelYear);?> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($tblvehicle->FuelType);?></li>
              </ul>
              <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>" class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
          </div>
          @endforeach
           </div>

                <!--Side-Bar-->
                <aside class="col-md-3 col-md-pull-9">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your  Car </h5>
                    </div>
                    <div class="sidebar_filter">
                    <form action="search-carresult.php" method="post">
                        @csrf
                        <div class="form-group select">
                        <select class="form-control" name="brand">
                            <option>Select Brand</option>
                            <option value="<?php echo htmlentities($tblvehicle->id);?>"><?php echo htmlentities($tblvehicle->BrandName);?></option>
                                            </select>
                                            </div>
                                            <div class="form-group select">
                                            <select class="form-control" name="fueltype">
                                                <option>Select Fuel Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="CNG">CNG</option>
                                            </select>
                                            </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                        </div>
                    </form>
                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                    <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
                    </div>
                    <div class="recent_addedcars">
                    <ul>
                        <li class="gray-bg">
                        <div class="recent_post_img"> <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>"><img src="{{url('images/Adminimages/vehicleimages/'.$tblvehicle->Vimage1)}}" alt="image"></a> </div>
                        <div class="recent_post_title"> <a href="{{ route('vehicle-details')}}?vhid=<?php echo htmlentities($tblvehicle->id);?>"><?php echo htmlentities($tblvehicle->BrandName);?>, <?php echo htmlentities($tblvehicle->VehiclesTitle);?></a>
                            <p class="widget_price">$<?php echo htmlentities($tblvehicle->PricePerDay);?> Per Day</p>
                        </div>
                        </li>
                    </ul>
                    </div>
                </div>
                </aside>
                <!--/Side-Bar-->
             </div>
        </div>

  </section>
  <!-- /Listing-->



@endsection
