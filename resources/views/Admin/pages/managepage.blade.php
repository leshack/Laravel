@extends('Admin.Layout.admin-dashboard')
@section('page_title','Page - ')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Pages</li>
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
              <h3 class="card-title">PAGE INFORMATION</h3>
            </div>
            <br>
            <div class="form-group">
                <label>select Page</label>
             <div class="">
                    <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
                    <option value="" selected="selected" class="form-control">***Select One***</option>
                    <option value="{{ route('admin.managepage')}}?type=terms">Terms and Condition</option>
                    <option value="{{ route('admin.managepage')}}?type=Privacy">Privacy and Policy</option>
                    <option value="{{ route('admin.managepage')}}?type=aboutus">About us</option>
                    <option value="{{ route('admin.managepage')}}?type=faqs">FAQs</option>
                    </select>
                </div>
            </div>
            <div class="hr-dashed"></div>

            <div class="form-group">
                <label>selected Page</label>
                <div class="">
                    <?php

                    switch(isset($_GET['type']))
                    {
                        case "terms" :
                            echo "Terms and Conditions";
                            break;

                        case "Privacy" :
                            echo "Privacy And Policy";
                            break;

                        case "aboutus" :
                            echo "About US";
                            break;

                        case "faqs" :
                            echo "FAQs";
                            break;

                        default :
                            echo "";
                            break;

                    }

                    ?>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                       Summernotes
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <form action = "{{ route('admin.updatepage') }}" method="post">
                        @csrf

                    <div class="card-body">
                        <textarea id="summernote" name="summernote">
                            @foreach ($pages as  $page)
                        <div id="summernote" name="summernote">{{$page->detail }}</div>
                            @endforeach
                        </textarea>
                    </div>
                      {{-- buttons --}}
                        <div class="row row d-flex justify-content-center align-content-center">
                            <div class=" text-center" >
                    <div class="form-group">
                        <div class=" text-center">
                            <button class="btn btn-primary" name="submit" type="submit">update page</button>
                        </div>
                    </div>
                </form>
                </div>
                        </div>
                    <div class="card-footer">
                        Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
                    </div>
                    </div>
                </div>
                <!-- /.col-->
                </div>
            </section>

          </div>
        </div>
      </div>
    </div>
   </section>
@endsection
