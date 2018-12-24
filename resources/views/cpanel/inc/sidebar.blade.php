<div class="content-wrapper">
    <!-- SIDEBAR -->
    <aside class="site-sidebar scrollbar-enabled clearfix">
        <!-- User Details -->
        <div class="side-user">
            <a class="col-sm-12 media clearfix" href="javascript:void(0);">
                <figure class="media-left media-middle  thumb-sm mr-r-10 mr-b-0">
                    <img src="{{url('uploads/'.Auth::user()->image)}}" class="media-object rounded-circle" alt="">
                </figure>
                <div class="media-body hide-menu">
                    <h4 class="media-heading mr-b-5 text-uppercase">{{ Auth::user()->name }}</h4>
                    <span class="user-type fs-12">Edit Profile (...)</span>
                </div>
            </a>
            <div class="clearfix"></div>
            <ul class="nav in side-menu">
                <li><a href="{{ route('profile.index', Auth::user()) }}"><i class="list-icon material-icons">face</i> My Profile</a>
                </li>
                <li><a  class="list-icon material-icons" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="material-icons list-icon">settings_power</i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  {{-- end here --}}
              </li>
          </ul>
      </div>
      <!-- /.side-user -->
      <!-- Sidebar Menu -->
      <nav class="sidebar-nav">
        <ul class="nav in side-menu">
            <li><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">network_check</i> <span class="hide-menu">Control Panel </span></a> </li>


            <li class="{{ Request::path() == 'cpanel/home'  ? 'active current-page' : ''}}"><a href="{{ route('home_view') }}" class="ripple"><i class="list-icon material-icons">format_list_numbered</i><span class="hide-menu">Posts List</span></a></li>

            @can('posts.create', Auth::user())
            <li class="{{ Request::path() == 'cpanel/posts/show'   ? 'active current-page' : ''}}"><a href="{{ route('create_view') }}" class="ripple"><i class="list-icon material-icons">add_box</i><span class="hide-menu">Create New</span></a>
            </li>
            @endcan

            <li class="{{ Request::path() == 'categories/show'   ? 'active current-page' : ''}}"><a href="{{ route('categories') }}" class="ripple"><i class="list-icon material-icons">archive</i><span class="hide-menu">Categories</span></a>
            </li>

            <li class="{{ Request::path() == 'cpanel/show/admin'   ? 'active current-page' : ''}}"><a href="{{ route('admin.index') }}" class="ripple"><i class="list-icon material-icons">supervisor_account</i><span class="hide-menu">Admins</span></a></li>

            @can('roles', Auth::user())
            <li class="{{ Request::path() == 'roles/show'   ? 'active current-page' : ''}}"><a href="{{ route('role.show') }}" class="ripple"><i class="list-icon material-icons">book</i><span class="hide-menu">Roles</span></a></li>
            @endcan

            @can('permissions', Auth::user())
            <li class="{{ Request::path() == 'permission/show'   ? 'active current-page' : ''}}"><a href="{{ route('permission.show') }}" class="ripple"><i class="list-icon material-icons">block</i><span class="hide-menu">Permissions</span></a></li>
            {{-- <span class="color-color-scheme"></span> use this immediately after <a> tag to have green color --}}
                <li class="list-divider"></li>
                @endcan


                <li><a   href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="material-icons list-icon">settings_power</i><span class="hide-menu">Log Out</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  {{-- end here --}}
              </li>
          </ul>
          <!-- /.side-menu -->
      </nav>
      <!-- /.sidebar-nav -->
  </aside>
<!-- /.site-sidebar -->