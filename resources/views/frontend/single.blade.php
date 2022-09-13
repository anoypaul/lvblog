﻿@extends('layouts.frontend_master')
@section('frontend_content')
    
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('image/'.$single_data->posts_image)}}');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <span class="post-category text-white bg-success mb-3">{{$single_data->categories_name}}</span>
              <h1 class="mb-4"><a href="#">{{$single_data->posts_title}}</a></h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">{{$single_data->user_name}}</span>
                <span>&nbsp;-&nbsp; {{date("d M Y", strtotime($single_data->post_published_at))}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              <p>{!! $single_data->posts_description !!}</p>
            </div>

            
            <div class="pt-5">
              <p>Categories:  <a href="javascript:void(0)">{{$single_data->categories_name}}</a>  Tags: <a href="javascript:void(0)">{{$single_data->categories_name}}</a></p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard">
                        <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply rounded">Reply</a></p>
                      </div>


                      <ul class="children">
                        <li class="comment">
                          <div class="vcard">
                            <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Jean Doe</h3>
                            <div class="meta">January 9, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply rounded">Reply</a></p>
                          </div>

                            <ul class="children">
                              <li class="comment">
                                <div class="vcard">
                                  <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                  <h3>Jean Doe</h3>
                                  <div class="meta">January 9, 2018 at 2:21pm</div>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                  <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                              </li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('admin')}}/dist/img/anoy-1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                @foreach ($popular_post as $value)
                    <img src="{{asset('image/user/'.$value->registrations_image)}}" alt="Image Placeholder" class="img-fluid mb-5">
                    <div class="bio-body">
                      <h2>{{$value->registrations_name}}</h2>
                      <p class="mb-4">{{$value->registrations_description}}</p>
                      <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                      <p class="social">
                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                      </p>
                    </div>
                  @if ($value)
                    @break
                  @endif
                    
                @endforeach

              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  @foreach ($popular_post as $value)
                    <li>
                      <a href="">
                        <img src="{{asset('image/'.$value->posts_image)}}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>{{$value->posts_title}}</h4>
                          <div class="post-meta">
                            <span class="mr-2">{{date('d M Y'), strtotime($value->created_at)}}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                <li><a href="#">Food <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(22)</span></a></li>
                <li><a href="#">Lifestyle <span>(37)</span></a></li>
                <li><a href="#">Business <span>(42)</span></a></li>
                <li><a href="#">Adventure <span>(14)</span></a></li>
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
              </ul>
            </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5">
          <div class="col-12">
            <h2>More Related Posts</h2>
          </div>
        </div>

        <div class="row align-items-stretch retro-layout">
          
          <div class="col-md-5 order-md-2">
            @foreach ($fast_related_post as $value)
              <a href="single.html" class="hentry img-1 h-100 gradient" style="background-image: url({{asset('image/'.$value->posts_image)}});">
                <span class="post-category text-white bg-danger">{{$value->posts_slug}}</span>
                <div class="text">
                  <h2>{{$value->posts_title}}</h2>
                  <span>{{date('d M Y', strtotime($value->created_at))}}</span>
                </div>
              </a>
            @endforeach
          </div>

          <div class="col-md-7">

            @foreach ($third_related_post as $value)
              <a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url({{asset('image/'.$value->posts_image)}});">
                <span class="post-category text-white bg-success">{{$value->posts_slug}}</span>
                <div class="text text-sm">
                  <h2>{{$value->posts_title}}</h2>
                  <span>{{date('d M Y', strtotime($value->created_at))}}</span>
                </div>
              </a>
            @endforeach
            
            <div class="two-col d-block d-md-flex justify-content-between">
              @foreach ($second_related_post as $value)
                <a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url({{asset('image/'.$value->posts_image)}});">
                  <span class="post-category text-white bg-primary">{{$value->posts_slug}}</span>
                  <div class="text text-sm">
                    <h2>{{$value->posts_title}}</h2>
                    <span>{{date('d M Y', strtotime($value->created_at))}}</span>
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
    
    
