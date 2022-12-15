<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
          <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        
        
           <!--Bootstrap core CSS -->
          <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
           <!--Additional CSS Files -->
          <link rel="stylesheet" href="{{url('assets/css/fontawesome.css');}}">
          <link rel="stylesheet" href="{{url('assets/css/templatemo-tale-seo-agency.css');}}">
          <link rel="stylesheet" href="{{url('assets/css/owl.css');}}">
          <link rel="stylesheet" href="{{url('assets/css/animate.css');}}">
          <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
          <link rel="stylesheet" href="{{url('assets/css/mycss.css');}}">
        <title>DiscLove</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
        <body class="h-100">
              <!--***** Preloader Start ***** -->
      <!--<div id="js-preloader" class="js-preloader">-->
      <!--  <div class="preloader-inner">-->
      <!--    <span class="dot"></span>-->
      <!--    <div class="dots">-->
      <!--      <span></span>-->
      <!--      <span></span>-->
      <!--      <span></span>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
       <!--***** Preloader End ***** -->
    
    
       <!--***** Header Area Start ***** -->
      <header class="header-area header-sticky">
        <div class="container w-100">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                 <!--***** Logo Start ***** -->
                <a href="index.html" class="logo">
                  <img src="assets/images/logo.svg" alt="" style="max-width: 60px;">
                </a>
                 <!--***** Logo End ***** -->
                 <!--***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="{{ url('/'); }}" class="active">Home</a></li>
                  <li class="scroll-to-section"><a href="{{ url('/profile'); }}">Profile</a></li>
                  <li class="scroll-to-section"><a href="{{ url('/post'); }}">Reviews</a></li>
                  <li class="has-sub">
                    <a href="javascript:void(0)">Sections</a>
                    <ul class="sub-menu">
                      <li><a href="{{ url('/post/films'); }}">Films</a></li>
                      <li><a href="{{ url('/post/record'); }}">Records</a></li>
                      <li><a href="{{ url('/post/book'); }}">Books</a></li>
                    </ul>
                  </li>
                </ul>
                <a class='menu-trigger'>
                  <span>Menu</span>
                </a>
                 <!--***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
      </header>
       
        @yield('modalContent')
        <main role="main">
            <div>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if(session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>