@extends('Admin.Layout.admin-dashboard')
@section('page_title','Brands- ')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Brands</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Update Brands</li>
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title">UPDATION FILEDS</h3>
                </div>
                <form name="brands" id = "brands" method = "post" action="{{URL::to('admin/managebrands/update/'.$brand->id)}}" >
                    @csrf
                <!-- /.card-header -->

                <!-- form start -->
                <div class="row justify-content-center">
                <div class="col-md-6 " >
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Brand Name</label>
                      <input type="text" class="form-control" id="BrandName" name="BrandName" value="{{$brand->BrandName}}">
                    </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                  </div>
                </form>
              </div>
              </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
@endsection
