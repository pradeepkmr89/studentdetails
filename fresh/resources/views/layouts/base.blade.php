<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#feed01"/>
<title>@yield('title')</title>
<meta name="author" content="The Market Hut">
<meta name="description" content="For all kind of exhibition museum website">
<meta name="keywords" content="idreamt, exhibition, museum, art, history, entry, ticket, contemporary, modern, booking, visit, culture, life, centuries, roots, fancy, themezinho">

<!-- SOCIAL MEDIA META -->
<meta property="og:description" content="idreamt | Art & History Museum">
<meta property="og:site_name" content="idreamt">
<meta property="og:title" content="idreamt">
<meta property="og:type" content="website">



<!-- FAVICON FILES -->
<link href="images/favicon.png" rel="apple-touch-icon" sizes="144x144">
<link href="images/favicon.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/favicon.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/favicon.png" rel="apple-touch-icon">
<link href="images/favicon.png" rel="shortcut icon">

<!-- CSS FILES -->

<link rel="stylesheet" href="{{ asset('front_assets/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/odometer.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}">
 
<style>
  body, h1, h2, h3, h4, h5, h6, p, span, div{text-transform: lowercase !important; font-family: Arial, Helvetica, sans-serif !important;}
  .gallery-idreamtp-wrapper .item h4 {
    text-align: center;
    padding: 15px 0px 0px;
    font-size: 24px;
    font-weight: 600;
    color: #000000;
}
.gallery-idreamtp-wrapper .item h6{font-size: 12px; color: #333; text-align: center; margin: 0; padding: 0;}
  /* Position the image container (needed to position the left and right arrows) */
  .container.mySlides-wrapper {
    position: relative;
    padding: 0;
}
.testimonial-wrapper{margin: 0px 0px 40px;}
.testimonial-wrapper label{background: #ffdfc9; padding: 20px; border-radius: 20px 0px 20px 0px;}
.testimonial-wrapper label span{font-weight: 600;
    color: #ff6d0a;
    font-size: 18px;}
.caption-container p{margin: 0; font-size: 24px;}
/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.mySlides-wrapper.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.mySlides-wrapper .prev,
.mySlides-wrapper .next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.mySlides-wrapper .next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.mySlides-wrapper .prev:hover,
.mySlides-wrapper .next:hover {
  background-color: rgba(0, 0, 0, 0.8);
  text-decoration: none;
}

/* Number text (1/3 etc) */
.mySlides-wrapper .numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.mySlides-wrapper .caption-container {
  text-align: center;
  background-color: #222;
  padding: 6px 16px;
  color: white;
}

.mySlides-wrapper .row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.mySlides-wrapper .column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.mySlides-wrapper .demo {
  opacity: 0.6;
}

.mySlides-wrapper .active,
.mySlides-wrapper .demo:hover {
  opacity: 1;
}
.wrapper-tab-wizard ul{margin: 0 auto; width: 380px;}
.wrapper-tab-wizard ul li{width: 50%; float: left;text-align: center;}
.wrapper-tab-wizard ul li a, .wrapper-tab-wizard ul li a:hover{font-size: 24px; font-weight: 500; text-decoration: none;}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ff6d0a;
    background-color: #ffffff;
    border-color: #ff6d0a #ff6d0a #fff;
    font-weight: 500;
}
div#Bestseller-art {
  padding-top: 0px;
}
.newsletter-box input[type="submit"] {
    height: 36px;
}
.newsletter-box input[type="email"] {
    
    height: 36px;
   
}
.newsletter-box{padding:20px;}
.footer .footer-bottom {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    padding: 20px 0;
    border-top: double 10px #f7f7f7;
    margin-top: 10px;
    font-size: 14px;
}
</style>

</head>
<body>
<div class="preloader" id="preloader">
  <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
    <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,1080 1294.66667,1080 960,1080 C625.333333,1080 305.333333,1080 0,1080 L0,0 Z"></path>
  </svg>
  <div class="inner">
    <canvas class="progress-bar" id="progress-bar" width="200" height="200"></canvas>
    <figure><img src="{{ asset('front_assets/images/preloader.png')}}" alt="Image"></figure>
    <small>Loading</small> </div>
  <!-- end inner --> 
</div>
<!-- end preloder -->
<div class="page-transition">
  <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
    <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,980 1294.66667,930 960,930 C625.333333,930 305.333333,980 0,1080 L0,0 Z"></path>
  </svg>
</div>
<!-- end page-transition -->
<div class="smooth-scroll">
  <div class="section-wrapper" data-scroll-section>
    <div class="search-box">
      <div class="container">
        <div class="form">
          <h3>SEARCH EVENT</h3>
          <input type="search" placeholder="What are you looking for ?">
          <input type="submit" value="SEARCH">
        </div>
        <!-- end form -->
        <div class="search-events">
          <ul>
            <li>
              <h5><a href="#">Artemisia Gentileschi talk with Maria</a></h5>
              <small>15 August – 31 October 2020</small> </li>
            <li>
              <h5><a href="#">Artemisia Gentileschi talk with Maria</a></h5>
              <small>15 August – 31 October 2020</small> </li>
            <li>
              <h5><a href="#">Artemisia Gentileschi talk with Maria</a></h5>
              <small>15 August – 31 October 2020</small> </li>
          </ul>
        </div>
        <!-- end search-events --> 
      </div>
    </div>
    <!-- end search-box -->
    <aside class="side-widget">
      <svg viewBox="0 0 600 1080" preserveAspectRatio="none" version="1.1">
        <path d="M540,1080H0V0h540c0,179.85,0,359.7,0,539.54C540,719.7,540,899.85,540,1080z"></path>
      </svg>
      <figure class="logo"> <img src="{{ asset('front_assets/images/logo-light.png')}}" alt="Image"> </figure>
      <!-- end logo -->
      <div class="inner">
        <div class="widget">
          <figure><img src="{{ asset('front_assets/images/image07.jpg')}}" alt="Image"></figure>
          <p>idreamt is a first of its kind e commerce platform that provides young artists an avenue to showcase their creativity. it allows amateur artists to upload their own artwork onto a platform that ensures that their talent is admired by a wide audience in a supportive, uncompetitive atmosphere.</p>
        </div>
        <!-- end widget -->
        <div class="widget">
          <h6 class="widget-title">Opening Hours</h6>
          <p>Tuesday ‒ Friday: 09:00 ‒ 17:00<br>
            Friday ‒ Monday: 10:00 ‒ 20:00</p>
        </div>
        <!-- end widget --> 
      </div>
      <!-- end inner --> 
    <div class="display-mobile">
      <div class="custom-menu">
        <ul>
          <li><a href="#">Login</a></li> | 
          <li><a href="#">Register</a></li>
        </ul>
      </div>
      <!-- end custom-menu -->
      <div class="site-menu">
        <ul>
          <li><a href="#l">home</a></li>
          <li><a href="#">shop</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">more</a>
          <ul>
            <li><a href="#">Bulk Ordering</a></li>
            <li><a href="#">faq</a></li>
          </ul>
          </li>
        </ul>
      </div>
      <!-- end site-menu -->
    </div>
    <!-- end display-mobile -->
    </aside>
    
    @include('layouts.header') 
    @yield('content')
    <!-- end content-section -->
   @include('layouts.footer')
    
    <!-- end footer --> 
  </div>
</div>

<!-- JS FILES --> 
 <script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/gsap.min.js') }}"></script>
 <script src="{{ asset('front_assets/js/locomotive-scroll.min.js') }}"></script>
 <script src="{{ asset('front_assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('front_assets/js/kinetic-slider.js') }}"></script>
<script src="{{ asset('front_assets/js/fancybox.min.js') }}"></script>
 <script src="{{ asset('front_assets/js/odometer.min.js') }}"></script>
 <script src="{{ asset('front_assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('front_assets/js/scripts.js') }}"></script>
<script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
@stack('scripts')
<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    margin:30,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
<script>
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  </script>
</body>
</html>