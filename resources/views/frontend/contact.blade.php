@extends('layouts.frontend_master')
@section('frontend_content')
    
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('image')}}/contact/contact.jpg');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3"></span>
              <h1 class="mb-4"><a href="#">Contract Page</a></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="p-4">
            <div class="card text-white bg-secondary mb-3">
              <div class="card-body ">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="first_name">First Name</label>
                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="last_name">Last Name</label>
                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email">
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
                  </div>
                  <div class="form-group">
                    <label for="subject">Message</label>
                    {{-- <input type="text" class="form-control" name="message" id="message" placeholder="Enter Message"> --}}
                    <textarea class="form-control" rows="4" name="message" id="message" value="" placeholder="Enter Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="p-4" >
            <div class="card text-white bg-secondary mb-3">
              <div class="card-body ">
                <p>Phone Number: {{$setting_data->seeting_phone}} </p>  
                <p>Email Address: {{$setting_data->seeting_email}} </p>  
                <p>Address: {{$setting_data->seeting_address}} </p> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    

@endsection
    
    
