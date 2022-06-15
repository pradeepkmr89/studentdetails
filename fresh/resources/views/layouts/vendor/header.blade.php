  <div class="header-bg">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="{{url('/')}}" class="logo">
                            <span class="logo-light">
                                    <i class="mdi mdi-camera-control"></i> <img src="{{asset('front_assets/images/logo.png')}}" style="
    height: 40px;
">
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0">
                         

                        <ul class="navbar-right ml-auto list-inline float-right mb-0">
                            <!-- language-->

                          <!-- Material checked -->
                          <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                          <!-- Default switch -->
                          @if(Auth::user())
                                <div class="custom-control custom-switch">
                  <input  data-id="{{Auth::user()->id}}" type="checkbox" class="custom-control-input toggle-class" id="customSwitches"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ Auth::user()->is_vendor ? 'checked' : '' }}>
                  @endif
               

                                  <label class="custom-control-label" for="customSwitches">Swich to Seller</label>
                                </div>
                        </li>
     
                    

                            <!-- full screen -->
                            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                                </a>
                            </li>
 

                            <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="{{asset('storage/profile/'.Auth::user()->images)}}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="{{url('user/profile')}}"><i class="mdi mdi-account-circle"></i> Profile</a>
                                        
                                        <div class="dropdown-divider"></div>
                                 
                                      <a class="dropdown-item text-danger"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                      
                                    </div>
                                </div>
                            </li>

                            <li class="menu-item dropdown notification-list list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{url('user/dashboard')}}"><i class="icon-accelerator"></i> Dashboard</a>
                            </li>

                            
                            <li class="has-submenu">
                                <a href="#"><i class="icon-diamond"></i> Artwork <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="{{url('user/upload/artwork')}}">Upload Artwork</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="{{url('user/list/artwork')}}">Artwork List</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                 
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->