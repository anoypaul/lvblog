<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="{{url('/')}}" class="text-black h2 mb-0">lv Blog</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                @foreach ($categories as $value)
                  <li><a href="{{url('/categories/'.$value->categories_slug)}}">{{$value->categories_name}}</a></li>
                  {{-- <li><a href="category.html">Politics</a></li>
                  <li><a href="category.html">Tech</a></li>
                  <li><a href="category.html">Entertainment</a></li>
                  <li><a href="category.html">Travel</a></li>
                  <li><a href="category.html">Sports</a></li>
                  <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li> --}}
                @endforeach

              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>
    
    {{-- main-content-start --}}
        @yield('frontend_content')
    {{-- main-content-end --}}

    
    
    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>{!! $setting_data->seeting_about_site !!}</p>
          </div>
          <div class="col-md-3 ml-auto">
            <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
            <ul class="list-unstyled float-left mr-5">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{('/super-admin/about')}}">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
             
            </ul>
            <ul class="list-unstyled float-left">
              @foreach ($categories as $value)
                <li><a href="{{url('/categories/'.$value->categories_slug)}}">{{$value->categories_name }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-4">
            

            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                @if ($setting_data->seeting_facebook)
                  <a href="{{$setting_data->seeting_facebook}}"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                @endif 
                @if ($setting_data->seeting_twitter)
                  <a href="{{$setting_data->seeting_twitter}}"><span class="icon-twitter p-2"></span></a>
                @endif
                @if ($setting_data->seeting_instagram)
                  <a href="{{$setting_data->seeting_instagram}}"><span class="icon-instagram p-2"></span></a>
                @endif
                @if ($setting_data->seeting_email)
                  <a href="{{$setting_data->seeting_email}}"><span class="icon-envelope p-2"></span></a>
                @endif
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">lv block developer</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
  <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('frontend') }}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('frontend') }}/js/aos.js"></script>

  <script src="js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="../../gtag/js.js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    
  </body>
</html>