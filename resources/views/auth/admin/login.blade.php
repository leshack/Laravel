<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Car Hoonicorn | Admin Login</title>
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/AdminCss/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{ url('css/AdminCss/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/AdminCss/bootstrap-social.css') }}">
	<link rel="stylesheet" href="{{ url('css/AdminCss/bootstrap-select.css') }}">
	<link rel="stylesheet" href="{{ url('css/AdminCssfileinput.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/AdminCss/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{url('css/AdminCss/style.css')}}" type="text/css">
</head>
<body>
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
	<div class="login-page bk-img" style="background-image: url(/images/header-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
                                <?php if($errors->any()){?><div class="errorWrap"><strong>ERROR</strong>:{{ $errors }}</div><?php }
                                else  if (session()->get('success') ){?><div class="succWrap"><strong>SUCCESS</strong>:{{ session()->get('success') }} </div><?php }?>
								<form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="username" name="Username" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="text" placeholder="password" name="password" class="form-control mb">



									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ url('js/Chart.min.js') }}"></script>
	<script src="{{ url('js/fileinput.js') }}"></script>
	<script src="{{ url('js/chartData.js') }}"></script>
	<script src="{{ url('js/main.js') }}"></script>

</body>

</html>
