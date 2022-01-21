<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Car Hoonicorn') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/owl.transitions.css')}}" type="text/css">
    <link href="{{url('css/slick.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap-slider.min.css')}}" rel="stylesheet">
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
          <link rel="stylesheet" id="switcher-css" type="text/css" href="{{url('switcher/css/switcher.css')}}" media="all" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/red.css')}}" title="red" media="all" data-default-color="true" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/orange.css')}}" title="orange" media="all" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/blue.css')}}" title="blue" media="all" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/pink.css')}}" title="pink" media="all" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/green.css')}}" title="green" media="all" />
          <link rel="alternate stylesheet" type="text/css" href="{{url('switcher/css/purple.css')}}" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('images/favicon-icon/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('images/favicon-icon/apple-touch-icon-114-precomposed.html')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('images/favicon-icon/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url('images/favicon-icon/apple-touch-icon-57-precomposed.png')}}">
    <link rel="shortcut icon" href="{{url('images/favicon-icon/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="{{url('images/logg.png')}}" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:kesleytulienge@gmail.com">kesleytulienge@gmail.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:+254741704681">+254741704681</a> </div>
            <div class="social-follow">
              <ul>
                <li><a href="https://code-projects.org/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="https://code-projects.org/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                <li><a href="https://code-projects.org/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                <li><a href="https://code-projects.org/"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                <li><a href="https://code-projects.org/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </div>
  
            @guest
            <div class="login_btn"> <a href="{{ route('login') }}" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">{{ __('Login') }}</a> </div>
                 @if (Route::has('register'))
            <div class="login_btn"> <a href="{{ route('register') }}" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">{{ __('Sign up') }}</a> </div>
                 @endif
            @else
            <div class="login_btn"> <a href="{{ route('logout') }}" class="btn btn-xs uppercase" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-toggle="modal" data-dismiss="modal">{{ __('Logout') }}:<span>{{ Auth::user()->name }}</span></a> </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
            @endguest
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
          @guest
          
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
            <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                    @if (Route::has('register'))
                    <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
          <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
            <li><a href="{{ route('login') }}" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                   @endif
             @else 
             <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
             <span>{{ Auth::user()->name }}</span><i class="fa fa-angle-down" aria-hidden="true"></i></a>
             <ul class="dropdown-menu">
             <li><a href="{{ route('user.profile')}}">Profile Settings</a></li>
              <li><a href="{{ route('user.password')}}">Update Password</a></li>
            <li><a href="{{ route('user.bookings')}}">My Booking</a></li>
            <li><a href="{{ route('user.testimonial')}}">Post a Testimonial</a></li>
          <li><a href="{{ route('user.mytestimonial')}}">My Testimonial</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>Sign Out</a></li>
            @endguest
          </ul>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>

          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->
   <!-- Scripts -->
   <script src="{{asset('js/app.js')}}" defer></script>
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script> 
    <script src="{{url('js/interface.js')}}"></script> 
    <!--Switcher-->
    <script src="{{url('switcher/js/switcher.js')}}"></script>
    <!--bootstrap-slider-JS--> 
    <script src="{{url('js/bootstrap-slider.min.js')}}"></script> 
    <!--Slider-JS--> 
    <script src="{{url('js/slick.min.js')}}"></script> 
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
</header>
    <div>
         @yield('content')
    </div>
    <div>
    @include('layouts.footer')
     </div>
    </div>
    </body>
</html>


