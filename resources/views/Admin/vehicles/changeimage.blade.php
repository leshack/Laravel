@extends('Admin.Layout.admin-dashboard')
@section('page_title','Vehicle - ')
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
            <li class="breadcrumb-item active">update image</li>
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

  <section class="content">
    <div class="container-fluid">
    <form  class="form-horizontal" method="POST" action="#" enctype="multipart/form-data" id="form">
        @csrf
     <div class="row">
         <!-- general form elements -->
        <div class="col-md-12">
            {{-- info --}}
            <div class="card card-dark card-body ">
            <div class="card-header">
                <h3 class="card-title">VEHICLE IMAGE</h3>
            </div>
            <div class="row justify-content-center">
                <div class="form-group">
                    <label>Current Image</label>
                    <br><br>
                    @foreach ($vehicle as $vehicle )
                     <div class="col-sm-8">
                        <img src="{{url('images/Adminimages/vehicleimages/'.$vehicle->Vimage1)}}" width="300" height="200" style="border:solid 1px #000">
                    </div>
                     @endforeach
                        </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group">
                    <label>New Image <span style="color:red">*</span></label>
                    <div class="col-sm-8">
                <input type="file" name="img1" required>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <button class="btn btn-primary" name="update" type="submit">Update</button>
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
