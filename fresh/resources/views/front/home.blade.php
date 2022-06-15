@extends('layouts.base')
@section('title', 'idreamt | Art & History Museum ')
 
@push('styles') 
<style type="text/css">
.newsletter {
    width: 30%;
    background: #ff6d0a;
    padding: 0;
    height: 36px;
        height: 70px;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #080808;
    background: #ff6d0a;
    border: none;
    padding: 0 50px;
}
 
</style>
@endpush
 
 @section('content')
     <section class="gallery-idreamtp-wrapper mb-3">
      <div class="container">
        <div class="owl-carousel owl-theme">
          @php $i = 3; @endphp
          @foreach($product as $key=>$val)
          <?php $cl=''; if($i%2=='0') { $cl = 'mt-5'; }  ?>
          <div class="item {{$cl}}">
            <img src="{{ asset('storage/products/'.$val->image)}}" alt="{{$val->product_name}}" class="img-responsive">
            <h4>{{$val->product_name}}</h4>
            <h6>Artist : @if($val->author){{$val->author->name}} @else admin @endif</h6>
          </div>
           @php $i++; @endphp
          @endforeach
        
        </div>
      </div>
          </section>
    <section class="content-section" data-background="#fffbf7">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="section-title text-center">
              <figure><img src="{{ asset('front_assets/images/title-shape.png')}}" alt="Image"></figure>
              <h2>Art Inspiration</h2>
            </div>
            <!-- end section-title --> 
          </div>
          <!-- end col-12 -->
          <div class="col-lg-7">
            <figure class="image-box" data-scroll data-scroll-speed="-1" > <img src="{{ asset('front_assets/images/home/art-inspiration-702x503PX.jpg')}}" alt="Image"> </figure>
          </div>
          <!-- end col-7 -->
          <div class="col-lg-5">
            <div class="side-icon-list right-side">
              <ul>
                <li>
                  <figure> <img src="{{ asset('front_assets/images/icon01.png')}}" alt="Image"> </figure>
                  <div class="content">
                    <h5>Exposure to young Artists.</h5>
                  </div>
                  <!-- end content --> 
                </li>
                <li>
                  <figure> <img src="{{ asset('front_assets/images/icon02.png')}}" alt="Image"> </figure>
                  <div class="content">
                    <h5>Platform to meet different artists from different directions.</h5>
                  <!-- end content --> 
                </li>
                <li>
                  <figure> <img src="{{ asset('front_assets/images/icon03.png')}}" alt="Image"> </figure>
                  <div class="content">
                    <h5>Discover a touch of nature. </h5>
                   
                  </div>
                  <!-- end content --> 
                </li>
              </ul>
            </div>
            <!-- end side-icon-list --> 
          </div>
          <!-- end col-5 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </section>
    <!-- end content-section -->
     <!-- end content-section -->
     <section class="content-section">
      <div class="video-bg">
        <video src="{{ asset('front_assets/images/home/idreamt-video.mp4')}}" loop autoplay playsinline muted></video>
      </div>
      <!-- end video-bg -->
      <div class="container">
        <div class="cta-box" data-scroll data-scroll-speed="-1">
          <h2>Art for the soul<br>Art for the inspiration!</h2>
          <h6>Discover a collection of unique art for art devotees!</h6>
          
          <a href="#" class="custom-button">Start Selling</a> <a href="#" class="custom-button">Buy Art </a></div>
        <!-- end cta-box --> 
      </div>
      <!-- end container --> 
    </section>
    <section style="padding: 50px 0px 0px;" class="wrapper-tab-wizard">
      <div class="container">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#featured-art">Featured Art</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Bestseller-art">Bestseller Art</a>
          </li>
          
        </ul>
        <div class="tab-content">
          <div id="featured-art" class="container tab-pane active">
            <div class="container mySlides-wrapper">
              @foreach($gallery as $key=>$galData)
              <div class="mySlides">
                <div class="numbertext">{{++$key}} / {{count($gallery)}}</div>  
                <img src="{{ asset('storage/galleries/'.$galData->images)}}" style="width:100%">
              </div>
              @endforeach
          
              <a class="prev" onclick="plusSlides(-1)">❮</a>
              <a class="next" onclick="plusSlides(1)">❯</a>
            
              <div class="caption-container">
                <p id="caption"></p>
              </div>
            
              <div class="row">
                @foreach($gallery as $key=>$galData)
                <div class="column">
                  <img class="demo cursor" src="{{ asset('front_assets/images/home/img_woods.jpg')}}" style="width:100%" onclick="currentSlide({{++$key}})" alt="{{$galData->name}}">
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
          <div id="Bestseller-art" class="container tab-pane gallery-idreamtp-wrapper">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <img src="{{ asset('front_assets/images/banner.jpg')}}" alt="Gallery" class="img-responsive">
                <h4>Gallery Title</h4>
              </div>
              <div class="item">
                <img src="{{ asset('front_assets/images/banner.jpg')}}" alt="Gallery" class="img-responsive">
                <h4>Gallery Title</h4>
              </div>
              <div class="item">
                <img src="{{ asset('front_assets/images/banner.jpg')}}" alt="Gallery" class="img-responsive">
                <h4>Gallery Title</h4>
              </div>
              <div class="item">
                <img src="{{ asset('front_assets/images/banner.jpg')}}" alt="Gallery" class="img-responsive">
                <h4>Gallery Title</h4>
              </div>
              <div class="item">
                <img src="{{ asset('front_assets/images/banner.jpg')}}" alt="Gallery" class="img-responsive">
                <h4>Gallery Title</h4>
              </div>
            </div>
          </div>
          </div>
      </div>
      

    </section>
    <!-- end content-section -->
    <section class="content-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="section-title">
              <figure><img src="{{ asset('front_assets/images/title-shape.png') }}" alt="Image"></figure>
              <h2>EXPLORE</h2>
            </div>
            <!-- end section-title --> 
          </div>
          <!-- end col-9 -->
          
          <!-- end col-3 --> 
        </div>
        <!-- end row -->
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6">
            <div class="exhibition-box" data-scroll data-scroll-speed="-1" >
              <figure> <a href="#"><img src="{{ asset('front_assets/images/home/Folks-350x280PX.jpg') }}" alt="Image" class="img"></a>
                <div class="info">
                  <figure class="i"><img src="{{ asset('front_assets/images/icon-info.png') }}" alt="Image"></figure>
                  <span>50% off exhibitions</span> </div>
                <!-- end info --> 
              </figure>
              <div class="content-box">
                <h4><a href="#">Folk</a></h4>
                <p>Discover impeccable original folk artworks of various Indian artists online. Buy and sell original artwork effortlessly. </p>
              </div>
              <!-- end content-box --> 
            </div>
            <!-- end exhibition-box --> 
          </div>
          <!-- end col-4 -->
          <div class="col-lg-4 col-md-6">
            <div class="exhibition-box" data-scroll data-scroll-speed="1">
              <figure> <a href="#"><img src="{{ asset('front_assets/images/home/Modern-350x390PX.jpg') }}" alt="Image" class="img"></a>
                <div class="info">
                  <figure class="i"><img src="{{ asset('front_assets/images/icon-info.png') }}" alt="Image"></figure>
                  <span>50% off exhibitions</span> </div>
                <!-- end info --> 
              </figure>
              <div class="content-box">
                <h4><a href="#">Modern</a></h4>
                <p>Check out the perfect modern artwork illustrated by thousands of emerging artists across the globe. </p>
              </div>
              <!-- end content-box --> 
            </div>
            <!-- end exhibition-box --> </div>
          <!-- end col-4 -->
          <div class="col-lg-4 col-md-6">
            <div class="exhibition-box" data-scroll data-scroll-speed="-0.5" >
              <figure> <a href="#"><img src="{{ asset('front_assets/images/home/abstract-350X280PX.jpg') }}" alt="Image" class="img"></a>
                <div class="info">
                  <figure class="i"><img src="{{ asset('front_assets/images/icon-info.png') }}" alt="Image"></figure>
                  <span>50% off exhibitions</span> </div>
                <!-- end info --> 
              </figure>
              <div class="content-box">
                <h4><a href="#">Abstract</a></h4>
                <p>idreamt is the best place for artists to sell and the best place for Art lovers to buy abstract art in various shapes, colours, and forms.</p>
              </div>
              <!-- end content-box --> 
            </div>
            <!-- end exhibition-box --></div>
          <!-- end col-4 -->
          <div class="col-12 text-center"> <a href="#" class="custom-button">VIEW ALL</a> </div>
          <!-- end col-12 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </section>
 <section class="testimonial-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 section-title" style="margin-bottom: 40px;">
<h2 align="center">testimonials</h2>
      </div>
    </div>
      <div class="row">
        @foreach($testimonial as $teData)
      <div class="col-sm-6">
        <label>{!!$teData->description!!}<span> -{{$teData->name}}</span></label>
      </div>
      @endforeach
    </div>
  </div>
</section>
   
    <!-- end content-section -->
    <section class="content-section no-spacing" data-background="#ff6d0a">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="newsletter-box">
              <div class="form">
                <div class="titles">
                   <h2>subscribe newsletter to get the latest art!</h2>
                   <span id="newsres"></span>
                </div>
                <!-- end titles -->

                <div class="inner">

                  <input type="email" id="newslater_email" placeholder="Enter your e-mail address">
                  <!-- <input type="submit" value="SIGN UP">   -->
                  <button id="subscribe" style=" width: 30%;
    background: #ff6d0a;
    padding: 0;
    height: 36px !important;
        height: 70px;
    display: inline-block;
    font-size: 14px;
    font-weight: 600;
    color: #080808;
    background: #ff6d0a;
    border: none;
    padding: 0 50px;">subscribe</button>
                </div>
                <!-- end inner --> 
               </div>
              <!-- end form -->
              <figure class="newsletter-image" data-scroll data-scroll-speed="0.7"><img src="{{ asset('front_assets/images/home/Brush_200x150PX.png') }}" alt="Image"></figure>
            </div>
            <!-- end newsletter-box --> 
          </div>
          <!-- end col-12 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </section>
@endsection

@push('scripts') 

  <script type="text/javascript">
  $('#subscribe').click(function (e) { 
    var emailval = $('#newslater_email').val();
 
   if(emailval!== "") {

    if(!emailval.match(/\S+@\S+\.\S+/)){  
          alert("Enter Your Valid Email ID");

        return false;          
    }



    $.ajax({
        url: '{{url("newsletter")}}', 
        type: 'GET', 
         data: {
            email: emailval // here the email
        },
        success: function (data) {

          $("#newsres").html(` <div class="alert alert-success" role="alert">
            ${data}
        </div>`);
          $('#newslater_email').val('');   
        },
        error: function (e) {
           $("#newsres").html(` <div class="alert alert-danger" role="alert">
            ${data}
        </div>`); 
        } 
       
    });
  } else {
      alert("Enter Your Email ID");
  }
 });
</script>

 @endpush