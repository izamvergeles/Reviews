@extends('layouts.app')


@section('content')
 
   <!--***** Header Area End ***** -->
  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>SHARE YOUR DREAMS</h6>
            <div class="line-dec"></div>
            <h4>Dive <em>Into The DREAMS</em> <span>With DiscLove</span></h4>
            <p>DiscLove is the best social website where you can share everything that makes you alive.Share and enjoy what you like the most.</p>
          </div>
          @if(Auth::user())
            @if(Auth::user()->hasVerifiedEmail())
            <div class="second-button"><a href="{{ url('review/create')}}">Create Post</a></div> 
            @endif
          @endif
          
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2>We Provide <em>Web Side</em> to share your loves
                </h2>
                <div class="line-dec"></div>
              </div>
            </div>
            
            <a href="{{ url('post/book')}}" class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/services-01.jpg" alt="discover SEO" class="templatemo-feature">
                </div>
                <h4>Book</h4>
              </div>
            </a>
            
            <a href="{{ url('post/films')}}" class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/services-02.jpg" alt="data analysis" class="templatemo-feature">
                </div>
                <h4>Films</h4>
              </div>
            </a>
              
            <a href="{{ url('post/record')}}" class="col-lg-6 col-sm-6">  
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/services-03.jpg" alt="precise data" class="templatemo-feature">
                </div>
                <h4>Records</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="projects section" id="projects">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover the <em> Newest </em><span> reviews </span></h2>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-12" >
          <div class="owl-features owl-carousel" >
            
            <!--For each para mostrar las reviews mas nuevas-->
            @foreach($reviews as $review)
              <div class="item" style="height: 400px">
                <img src="data:image/jpeg;base64,{{ $review->thumbnail }}" class="h-75">
                <div class="down-content">
                  <h4>{{ $review->name}}</h4>
                  <a href="{{ url('review/' . $review->id)}}"><i class="fa fa-link"></i></a>
                </div>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
   <!--Scripts -->
   <!--Bootstrap core JavaScript -->
  <script src="{{ url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

  <script src="{{ url('assets/js/isotope.min.js')}}"></script>
  <script src="{{ url('assets/js/owl-carousel.js')}}"></script>
  <script src="{{ url('assets/js/tabs.js')}}"></script>
  <script src="{{ url('assets/js/popup.js')}}"></script>
  <script src="{{ url('assets/js/custom.js')}}"></script>

@endsection