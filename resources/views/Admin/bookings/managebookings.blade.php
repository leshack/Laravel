@extends('Admin.Layout.admin-dashboard')
@section('page_title','Bookings - ')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bookings</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Bookings</li>
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
              <h3 class="card-title">BOOKINGS INFO</h3>
            </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Vehicle</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Posting Date</th>
                  <th style="width: 15px">Action</th>
                </tr>
                </thead>
                <tbody>

                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td>{{$booking->name}}</td>
                                <td><a href="edit-vehicle.php?id=<?php echo htmlentities($booking->id);?>"><?php echo htmlentities($booking->BrandName);?>, <?php echo htmlentities($booking->VehiclesTitle);?></a></td>
                                <td>{{$booking->FromDate}}</td>
                                <td>{{$booking->ToDate}}</td>
                                <td>{{$booking->messages}}</td>
                                <td><?php
                                    if($booking->status==0)
                                    {
                                    echo htmlentities('Not Confirmed yet');
                                    } else if ($booking->status==1) {
                                    echo htmlentities('Confirmed');
                                    }
                                     else{
                                         echo htmlentities('Cancelled');
                                     }
                                                                            ?></td>
                                <td>{{$booking->created_at}}</td>
                                <td>
                                    <a href="{{URL:: to('admin/bookings/confirm/'.$booking->id)}}" onclick="return confirm('Do you want to confirm booking?');"><em class="fa fa-edit"></em> </a>
                                    <a href="{{URL:: to('admin/bookings/cancel/'.$booking->id)}}" onclick="return confirm('Do you want to cancel booking?');"><em class="fa fa-trash"></em> </a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Vehicle</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Posting Date</th>
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
