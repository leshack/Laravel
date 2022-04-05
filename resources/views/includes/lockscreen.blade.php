<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
   {{-- error messages and info message --}}
   <div class="row justify-content-center">
    <div class="card-body col-md-4 ">
  <?php if($errors->any()){?><div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>{{ $errors }}</div><?php }
            else if(session()->get('success') ){?><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session()->get('success') }}
              </div><?php }?>
</div>
  </div>
   {{-- /.error messages and info message --}}

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>Admin</b>HOONICORN</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">{{ auth()->guard('admin')->user()->Username }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ auth()->guard('admin')->user()->picture }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="{{ route('admin.unlock')}}">
        @csrf
      <div class="input-group">
        <input type="password" class="form-control" name="password"placeholder="password">

        <div class="input-group-append">
          <button type="submit" class="btn" name="submit">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Screen Locked enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="#">Or sign in as a different account</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2022-2022 <b><a href="#" class="text-black">Car Hoonicorn</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
