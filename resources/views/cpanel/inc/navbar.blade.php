<div id="wrapper" class="wrapper">
    <!-- HEADER & TOP NAVIGATION -->
    <nav class="navbar">
        <!-- Logo Area -->
        <div class="navbar-header">
            <a href="/cpanel" class="navbar-brand">
                <img class="logo-expand" alt="" src="{{ asset('images/logo1.png') }}">
                <img class="logo-collapse" alt="" src="{{ asset('images/logo4.png') }}">
                <!-- <p>OSCAR</p> -->
            </a>
        </div>
        <!-- /.navbar-header -->
        <!-- Left Menu & Sidebar Toggle -->
        <ul class="nav navbar-nav">
            <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a></li>
        </ul>
        <!-- /.navbar-left -->
        <!-- Search Form -->
        <form class="navbar-search d-none d-sm-block" role="search"><i class="material-icons list-icon">search</i> 
            <input type="text" class="search-query" placeholder="Search anything..."> <a href="javascript:void(0);" class="remove-focus"><i class="material-icons">clear</i></a>
        </form>
        <!-- /.navbar-search -->
        <div class="spacer"></div>
        <!-- User Image with Dropdown -->
        <ul class="nav navbar-nav">
            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-sm"><img src="assets/demo/users/user-image.png" class="rounded-circle" alt=""> <i class="material-icons list-icon">expand_more</i></span></a>
                <div
                class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide dropdown-card-dark text-inverse">
                <div class="card">
                    <header class="card-heading-extra">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="mr-b-10 sub-heading-font-family fw-300">{{ Auth::user()->name }}</h3>
                                {{--  <span class="user--online">Available <i class="material-icons list-icon">expand_more</i></span> --}}
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                {{-- Log out --}}
                                <a  class="mr-t-10" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="material-icons list-icon">power_settings_new</i> Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              {{-- end here --}}
                          </div>
                          <!-- /.col-4 -->
                      </div>
                      <!-- /.row -->
                  </header>
              </div>
          </div>
      </li>
  </ul>
  <!-- /.navbar-right -->
</nav>
    <!-- /.navbar -->