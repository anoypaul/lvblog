@extends('layouts.frontend_master')
@section('frontend_content')

<div class="site-section bg-light">
  <div class="container">
    <div class="row align-items-stretch retro-layout-2">

      <div class="col-md-4">
        @foreach ($fastPost as $value)
          <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('image/'.$value->posts_image) }} ');">
            <div class="text">
              <h2>{{$value->posts_title}}</h2>
              <span class="date">{{date("d M Y", strtotime($value->post_published_at))}}</span>
            </div>
          </a>
        @endforeach
      </div>

      <div class="col-md-4">
        @foreach ($middlePost as $value)
        <a href="single.html" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ asset('image/'.$value->posts_image) }}');">
          
          <div class="text">
            <div class="post-categories mb-3">
              <span class="post-category bg-danger">{{$value->posts_title}}</span>
              <span class="post-category bg-primary">{{$value->posts_slug}}</span>
            </div>
            <h2>{{$value->posts_title}}</h2>
            <span class="date">{{date("d M Y", strtotime($value->post_published_at))}}</span>
          </div>
        </a>
        @endforeach
      </div>
      <div class="col-md-4">
        @foreach ($thirdPost as $value)
          <a href="single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset('image/'.$value->posts_image) }}');">
            
            <div class="text">
              <h2>{{$value->posts_title}}</h2>
              <span class="date">{{date("d M Y", strtotime($value->post_published_at))}}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Recent Posts</h2>
      </div>
    </div>
    <div class="row">
      @foreach ($recent_post as $value)
      <div class="col-lg-4 mb-4">
        <div class="entry2">
          <a href="{{url('single/'.$value->posts_slug)}}"><img src="{{ asset('image/'. $value->posts_image) }}" alt="Image" class="img-fluid rounded" style="width:100%; height:200px"></a>
          <div class="excerpt">
          <span class="post-category text-white bg-secondary mb-3">{{$value->categories_name}}</span>

          <h2><a href="{{url('single/'.$value->posts_slug)}}">{{$value->posts_title}}</a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('frontend') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="{{url('single/'.$value->posts_slug)}}">{{$value->user_name}}</a></span>
            <span>&nbsp;-&nbsp; {{date("d M Y", strtotime($value->post_published_at))}} </span>
          </div>
          
            <p>{!! Str::limit($value->posts_description, '20', '...')  !!}</p>
            {{-- <p>{!! $value->posts_description  !!}</p> --}}
            <p><a href="{{url('single/'.$value->posts_slug)}}">Read More</a></p>
          </div>
        </div>
      </div>
      @endforeach
     
    </div>
    <div class="row text-center pt-5 border-top">
      {{ $recent_post->links() }}
      {{-- <div class="col-md-12">
        <div class="custom-pagination">
          <span>1</span>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <span>...</span>
          <a href="#">15</a>
        </div>
      </div> --}}
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">

    <div class="row align-items-stretch retro-layout">
      
      <div class="col-md-5 order-md-2">
        @foreach ($fast_footer_post as $value)
          <a href="single.html" class="hentry img-1 h-100 gradient" style="background-image: url('{{ asset('image/'.$value->posts_image) }}');">
            <span class="post-category text-white bg-danger">{{$value->posts_slug}}</span>
            <div class="text">
              <h2>{{$value->posts_title}}</h2>
              <span>{{date("d M Y", strtotime($value->post_published_at))}}</span>
            </div>
          </a>
        @endforeach
      </div>

      <div class="col-md-7">
        @foreach ($third_footer_post as $value)
        <a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ asset('image/'.$value->posts_image) }}">
          <span class="post-category text-white bg-success">{{$value->posts_slug}}</span>
          <div class="text text-sm">
            <h2>{{$value->posts_title}}</h2>
            <span>{{date("d M Y", strtotime($value->post_published_at))}}</span>
          </div>
        </a>
        @endforeach

        
        <div class="two-col d-block d-md-flex justify-content-between">
        @foreach ($middle_footer_post as $value)

          <a href="single.html" class="hentry v-height img-2 gradient " style="background-image: url('{{ asset('image/'.$value->posts_image) }}')">
            <span class="post-category text-white bg-primary">{{$value->posts_slug}}</span>
            <div class="text text-sm">
              <h2>{{$value->posts_title}}</h2>
              <span>{{date("d M Y", strtotime($value->post_published_at))}}</span>
            </div>
          </a>
          
        @endforeach
          
        </div>  
        
      </div>
    </div>

  </div>
</div>


<div class="site-section bg-lightx">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-5">
        <div class="subscribe-1 ">
          <h2>Subscribe to our newsletter</h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
          <form action="#" class="d-flex">
            <input type="text" class="form-control" placeholder="Enter your email address">
            <input type="submit" class="btn btn-primary" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
