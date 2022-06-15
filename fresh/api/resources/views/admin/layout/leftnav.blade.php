   <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="{{asset('assets/images/app icon.svg')}}" alt="Admin Logo" class="img-fluid logo"><span>Codee</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{asset('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class=" user-name" data-toggle="dropdown"><strong>{{Auth::user()->name}}</strong></a>
                    <!--<ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                    </ul>-->
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                   
                    <li><a href="{{url('admin')}}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                    <li><a href="{{url('admin/user/list')}}"><i class="icon-user"></i><span>Users</span></a></li>
                    <li><a href="{{url('admin/reported/user')}}"><i class="icon-user-unfollow"></i><span>Report Users</span></a></li>
                    <li><a href="{{url('admin/cms')}}"><i class="icon-docs"></i><span>CMS Pages</span></a></li>
                    
                
                     <li>
                        <a href="#Pages" class="has-arrow"><i class="icon-speech"></i><span>Forum Post</span></a>
                        <ul>
                            <li><a href="{{url('admin/get/forum/category')}}">Forum Category</a></li>
                            <li><a href="{{url('admin/get/forum/post')}}">Listing</a></li>                            
                            <li><a href="{{url('admin/create/forum/post')}}">Add New</a></li>
                            
                        </ul>
                    </li> 
                     <li><a href="{{url('admin/get/question')}}"><i class="icon-question"></i><span>Question Listing</span></a></li>
                 </ul>
            </nav>     
        </div>
    </div>