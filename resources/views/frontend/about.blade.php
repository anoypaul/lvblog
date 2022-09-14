@extends('layouts.frontend_master')
@section('frontend_content')
    
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('image')}}/about/about.jpg');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3"></span>
              <h1 class="mb-4"><a href="#">About Page</a></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="p-4">
             <h5>{{$registration_data->registrations_name}}</h5>
             <p>{{$registration_data->registrations_description}}</p>
          </div>
        </div>
        <div class="col-4">
          <div class="p-4" >
            <img class="w-100 h-100 img-fluid" src="{{asset('image/user/'.$registration_data->registrations_image)}}" alt="">
          </div>
        </div>
      </div>
    </div>
    
    

@endsection
    
    
