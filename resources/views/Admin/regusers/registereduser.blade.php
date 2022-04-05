@extends('Admin.Layout.admin-dashboard')
@section('page_title','Dashboard - ')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Users</li>
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
              <h3 class="card-title">REGESTERED USER</h3>
            </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 9px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>DoB</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Registration</th>

                </tr>
                </thead>
                <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->Dob}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->RegDate}}</td>

                            </tr>
                        @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>DoB</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Registration</th>

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
