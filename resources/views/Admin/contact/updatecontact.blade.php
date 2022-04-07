@extends('Admin.Layout.admin-dashboard')
@section('page_title','Contact - ')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Vehicle</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">update info</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
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
  <!-- Main content -->
<section class="content">
<div class="container-fluid">
<form  class="form-horizontal" method="POST" action="#">
    @csrf
 <div class="row">
     <!-- general form elements -->
    <div class="col-md-12">
        {{-- info --}}
        <div class="card card-dark card-body ">
        <div class="card-header">
            <h3 class="card-title">INFO</h3>
        </div>
        <div class="row">

                <div class="col-md-6 " >
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Brand Name</label>
                      <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Enter Car Brand Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Enter Car Brand Name">
                      </div>
                      <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Enter Car Brand Name">
                      </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              </div>


        </div>
        </div>
    </div>
 </div>
</form>
</div>
</section>


@endsection
