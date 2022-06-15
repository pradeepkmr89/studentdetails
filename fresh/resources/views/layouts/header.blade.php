<nav class="navbar">
      <div class="logo"> <a href="#"> <img src="{{ asset('front_assets/images/logo.png')}}" alt="Image"> </a> </div>
      <!-- end logo -->
      <div class="custom-menu">
        <ul>
          @guest
                            @if (Route::has('login'))
          <li><a href="#"><i class="far fa-sign-in-alt" title="Login"></i></a></li> 
           @endif| 
           @if (Route::has('register'))
          <li><a href="#"><i class="far fa-user-plus" title="Register"></i></a></li>
            @endif
             @else
<li><a href="#"> {{ Auth::user()->name }}</a><i class="far fa-user-plus" title="Register"></i></li>
 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
             @endif
        </ul>
      </div>
      <!-- end custom-menu -->
      <div class="site-menu">
       <ul>
          <li><a href="#l">home</a></li>
          <li><a href="#">shop</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Bulk Ordering</a>
            <li><a href="#">faq</a></li>
            <li><a href="#">contact</a></li>
        </ul>
      </div>
      <!-- end site-menu -->
      <div class="search-button"> <i class="far fa-search"></i> </div>
      <!-- end search-button -->
      <div class="hamburger-menu">
        <svg class="hamburger" width="30" height="30" viewBox="0 0 30 30">
          <path class="line line-top" d="M0,9h30"/>
          <path class="line line-center" d="M0,15h30"/>
          <path class="line line-bottom" d="M0,21h30"/>
        </svg>
      </div>
      <!-- end hamburger-menu -->
      <div class="navbar-button"> <a href="#">Vendor Registration</a> </div>
      <!-- end navbar-button --> 
    </nav>