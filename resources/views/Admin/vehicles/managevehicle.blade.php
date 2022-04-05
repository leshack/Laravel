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
            <li class="breadcrumb-item active">Manage Vehicles</li>
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
          <div class="card card-dark card-body">
            <div class="card-header">
              <h3 class="card-title">VEHICLE DETAILS</h3>
            </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Vehicle Tittle</th>
                  <th>Brand</th>
                  <th>Price per Day</th>
                  <th>Fuel Type</th>
                  <th>Model Year</th>
                  <th style="width: 15px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)

                            <tr>
                                <td>{{$vehicle->id}}</td>
                                <td>{{$vehicle->VehiclesTitle}}</td>
                                <td>{{$vehicle->BrandName}}</td>
                                <td>{{$vehicle->PricePerDay}}</td>
                                <td>{{$vehicle->FuelType}}</td>
                                <td>{{$vehicle->ModelYear}}</td>
                                <td>
                                    <a href="{{URL:: to('admin/managevehicles/edit/'.$vehicle->id)}}"><em class="fa fa-edit"></em> </a>
                                    <a href="{{URL:: to('admin/managevehicles/delete/'.$vehicle->id)}}" onclick="return confirm('Do you want to delete vehicle?');"><em class="fa fa-trash"></em> </a>
                                </td>
                            </tr>

                        @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Vehicle Tittle</th>
                    <th>Brand</th>
                    <th>Price per Day</th>
                    <th>Fuel Type</th>
                    <th>Model Year</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        </div>


          </div>
      </div>
    </div>
   </section>
@endsection
