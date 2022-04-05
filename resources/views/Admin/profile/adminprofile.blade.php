@extends('Admin.Layout.admin-dashboard')
@section('page_title','Profile- ')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ auth()->guard('admin')->user()->picture }}" alt="profile picture">
            </div>

            <h3 class="profile-username text-center admin_name">{{ auth()->guard('admin')->user()->Username }}</h3>

            <p class="text-muted text-center ">{{ auth()->guard('admin')->user()->skills}}</p>

            <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
           <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change Picture</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab">Personal information</a></li>
              <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">chats</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

            <div class="active tab-pane" id="information">
                <form class="form-horizontal"  method="post" action="{{ route('admin.updateinfo') }}" id="AdminInfoForm" >
                    @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="Username" name="Username" value="{{ auth()->guard('admin')->user()->Username }}">
                        <span class="text-danger error-text Username_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="{{ auth()->guard('admin')->user()->email }}">
                      <span class="text-danger error-text email_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="skills" name="skills" value="{{ auth()->guard('admin')->user()->skills}}">
                      <span class="text-danger error-text skills_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Save Changes</button>
                    </div>
                  </div>
                </form>
            </div>

            <div class="tab-pane" id="activity">

            </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                        <img src="https://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->



              <div class="tab-pane" id="password">
                <form class="form-horizontal" name="chngpwd" method="post" action="{{ route('admin.password') }}" id="PasswordForm">
                    @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="currentpassword" placeholder="Enter current Password">
                        <span class="text-danger error-text currentpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">New password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Enter ew Password">
                      <span class="text-danger error-text newpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm new password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Re-enter new password">
                      <span class="text-danger error-text confirmpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update password</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
