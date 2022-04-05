<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url ('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ auth()->guard('admin')->user()->picture }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block admin_name">{{ auth()->guard('admin')->user()->Username }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               {{-- Dashboard   --}}
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
              </p>
            </a>
          </li>

            {{-- Brands --}}
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
              Brands
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.brands') }}" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Creat Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brandsmanage') }}" class="nav-link">
                  <i class="nav-icon fas fa-copyright"></i>
                  <p>Manage Brands</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Vehicle --}}
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-car"></i>
              <p>
              Vehicles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.vehicle') }}" class="nav-link ">
                    <i class=" nav-icon fas fa-pen"></i>
                  <p>Post a Vehicle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.vehiclemanage') }}" class="nav-link">
                  <i class=" nav-icon fas fa-car"></i>
                  <p>Manage Vehicles</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Bookings --}}
          <li class="nav-item">
            <a href="{{ route('admin.bookingmanage') }}" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Manage Bookings
              <span class="right badge badge-warning right">100</span>
              </p>
            </a>
          </li>

          {{-- Testimonial  --}}
          <li class="nav-item">
            <a href="{{ route('admin.testimonialmanage') }}" class="nav-link ">
              <i class="nav-icon fas fa-blog"></i>
              <p>
              Manage Testimonial
              </p>
            </a>
          </li>

          {{-- Mailbox  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <span class="left badge badge-success left">15</span>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- User  --}}
          <li class="nav-item">
            <a href="{{ route('admin.regusers') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Registered Users
              <span class="right badge badge-info right">1000</span>
              </p>
            </a>
          </li>

          {{-- Pages  --}}
          <li class="nav-item">
            <a href="{{ route('admin.managepage') }}" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
             Manage Pages
              </p>
            </a>
          </li>

          {{-- Contact info --}}
          <li class="nav-item">
            <a href="{{ route('admin.contact') }}" class="nav-link ">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
             Update Contact
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.subscriber') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Subscribers
                <span class="right badge badge-dark right">New</span>
              </p>
            </a>
          </li>
          {{-- includes  --}}
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
               Event Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
