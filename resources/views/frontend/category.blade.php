@extends('layouts.frontend_master')
@section('frontend_content')
    
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{$categories_data->categories_name}}</h3>
            @if ($categories_data->categories_description)
            <p>{{$categories_data->categories_description}}</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach ($post_data as $value)
            <div class="col-lg-4 mb-4">
              <div class="entry2">
                <a href="single.html"><img src="{{asset('image/'.$value->posts_image)}}" alt="Image" class="img-fluid rounded"></a>
                <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3">Politics</span>

                <h2><a href="{{url('single/'.$value->posts_slug)}}">{{$value->posts_title}}</a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                  <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('image/user/'.$value->registrations_image)}}" alt="Image" class="img-fluid"></figure>
                  <span class="d-inline-block mt-1">By <a href="#">{{$value->registrations_name}}</a></span>
                  <span>&nbsp;-&nbsp; {{date('d M Y', strtotime($value->created_at))}}</span>
                </div>
                
                  <p>{!! Str::limit($value->posts_description, '20', '...')  !!}</p>
                  <p><a href="{{url('/single/'.$value->posts_slug)}}">Read More</a></p>
                </div>
              </div>
            </div>
          @endforeach
          {{$post_data->links()}}
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
      </div>
    </div>
  </div>

@endsection
    
    
