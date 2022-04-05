@extends('Admin.Layout.admin-dashboard')
@section('page_title','Dashboard - ')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>5</h3>

              <p>Registered Users</p>
            </div>
            <div class="icon">
              <i class="ion-android-contacts"></i>
            </div>
            <a href="{{ route('admin.regusers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>5<sup style="font-size: 20px"></sup></h3>

              <p>Listed Vehicles</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="{{ route('admin.vehiclemanage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>5</h3>

              <p>Total Bookings</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-clipboard"></i>
            </div>
            <a href="{{ route('admin.bookingmanage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Listed Brands</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-list"></i>
            </div>
            <a href="{{ route('admin.brandsmanage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>3</h3>

                <p>Queries</p>
              </div>
              <div class="icon">
                <i class="ion ion-social-dropbox"></i>
              </div>
              <a href="{{ route('admin.contact') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>2</h3>

                <p>Testimonial</p>
              </div>
              <div class="icon">
                <i class="ion ion-social-pinterest"></i>
              </div>
              <a href="{{ route('admin.testimonialmanage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>1</h3>

                <p>Subscribers</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="{{ route('admin.subscriber') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>1</h3>

                <p>Blogs</p>
              </div>
              <div class="icon">
                <i class="ion ion-social-linkedin"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      </div>
      <!-- /.row -->

      {{-- make the widgets sortable  --}}
      <div class="row">
      <section class="col-lg-5 connectedSortable ui-sortable">
      <div class="card bg-gradient-success" style="position: relative; left: 0px; top: 0px;">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0" style="display: block;">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">February 2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="01/30/2022" class="day old weekend">30</td><td data-action="selectDay" data-day="01/31/2022" class="day old">31</td><td data-action="selectDay" data-day="02/01/2022" class="day">1</td><td data-action="selectDay" data-day="02/02/2022" class="day">2</td><td data-action="selectDay" data-day="02/03/2022" class="day">3</td><td data-action="selectDay" data-day="02/04/2022" class="day">4</td><td data-action="selectDay" data-day="02/05/2022" class="day weekend">5</td></tr><tr><td data-action="selectDay" data-day="02/06/2022" class="day weekend">6</td><td data-action="selectDay" data-day="02/07/2022" class="day">7</td><td data-action="selectDay" data-day="02/08/2022" class="day">8</td><td data-action="selectDay" data-day="02/09/2022" class="day">9</td><td data-action="selectDay" data-day="02/10/2022" class="day">10</td><td data-action="selectDay" data-day="02/11/2022" class="day">11</td><td data-action="selectDay" data-day="02/12/2022" class="day weekend">12</td></tr><tr><td data-action="selectDay" data-day="02/13/2022" class="day weekend">13</td><td data-action="selectDay" data-day="02/14/2022" class="day">14</td><td data-action="selectDay" data-day="02/15/2022" class="day">15</td><td data-action="selectDay" data-day="02/16/2022" class="day">16</td><td data-action="selectDay" data-day="02/17/2022" class="day">17</td><td data-action="selectDay" data-day="02/18/2022" class="day">18</td><td data-action="selectDay" data-day="02/19/2022" class="day weekend">19</td></tr><tr><td data-action="selectDay" data-day="02/20/2022" class="day active today weekend">20</td><td data-action="selectDay" data-day="02/21/2022" class="day">21</td><td data-action="selectDay" data-day="02/22/2022" class="day">22</td><td data-action="selectDay" data-day="02/23/2022" class="day">23</td><td data-action="selectDay" data-day="02/24/2022" class="day">24</td><td data-action="selectDay" data-day="02/25/2022" class="day">25</td><td data-action="selectDay" data-day="02/26/2022" class="day weekend">26</td></tr><tr><td data-action="selectDay" data-day="02/27/2022" class="day weekend">27</td><td data-action="selectDay" data-day="02/28/2022" class="day">28</td><td data-action="selectDay" data-day="03/01/2022" class="day new">1</td><td data-action="selectDay" data-day="03/02/2022" class="day new">2</td><td data-action="selectDay" data-day="03/03/2022" class="day new">3</td><td data-action="selectDay" data-day="03/04/2022" class="day new">4</td><td data-action="selectDay" data-day="03/05/2022" class="day new weekend">5</td></tr><tr><td data-action="selectDay" data-day="03/06/2022" class="day new weekend">6</td><td data-action="selectDay" data-day="03/07/2022" class="day new">7</td><td data-action="selectDay" data-day="03/08/2022" class="day new">8</td><td data-action="selectDay" data-day="03/09/2022" class="day new">9</td><td data-action="selectDay" data-day="03/10/2022" class="day new">10</td><td data-action="selectDay" data-day="03/11/2022" class="day new">11</td><td data-action="selectDay" data-day="03/12/2022" class="day new weekend">12</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month active">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year active">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>
      </section>
      <section class="col-lg-7 connectedSortable ui-sortable">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Car Tracking</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="d-md-flex">
            <div class="p-1 flex-fill" style="overflow: hidden">
              <!-- Map will be created here -->
              <div id="world-map-markers" style="height: 325px; overflow: hidden" class="mapael">
                <div class="map">
                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://www.openstreetmap.org/export/embed.html?bbox=34.02191162109376%2C-0.39825118767147194%2C36.12579345703126%2C1.2715630876314767&amp;layer=mapnik&amp;https://www.openstreetmap.org/export/embed.html?bbox=34.02191162109376%2C-0.39825118767147194%2C36.12579345703126%2C1.2715630876314767&amp;layer=mapnik&amp;marker=-1.2743089918452106%2C36.73828125"
               ></iframe>
                    <div class="mapTooltip" style="display: none;"></div></div>
              </div>
            </div>
            <div class="card-pane-right bg-dark pt-2 pb-2 pl-4 pr-4">
              <div class="description-block mb-4">
                <h5 class="description-header">10,000Km</h5>
                <span class="description-text">Distance Covered</span>
              </div>
              <!-- /.description-block -->
              <div class="description-block mb-4">
                <h5 class="description-header">60%</h5>
                <span class="description-text">Fuel consumption</span>
              </div>
              <!-- /.description-block -->
              <div class="description-block">
                <h5 class="description-header">10%</h5>
                <span class="description-text">Towns covered</span>
              </div>
              <!-- /.description-block -->
            </div><!-- /.card-pane-right -->
          </div><!-- /.d-md-flex -->
        </div>
        <!-- /.card-body -->
      </div>
        </section>
      </div>

  @endsection
