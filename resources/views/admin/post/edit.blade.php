@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Post List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post List</li>
            <li class="breadcrumb-item active">Update</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

<div class="col-lg-12">
    <div class="card">
      <div class="card-header ">
        <div class="d-flex justify-content-between align-item-center">
            <h5 class="m-0">Post Create</h5>
            <a href="#" class="btn btn-primary">Post List</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{route('post.update',$post[0]->posts_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="card-body">
              @php
                  // echo '<pre>';
                  // print_r($post[0]);
                  // exit;
              @endphp
              <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post[0]->posts_title }}" placeholder="Post Title">
                @error('title')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Select Category</label>
                <select name="category" id="" class="form-control">
                  {{-- <option value="{{$post[0]->categories_name}}" class="d-none" selected>{{$post[0]->categories_name}}</option> --}}
                  @foreach ($post as $value)
                      <option value="{{$value->categories_id}}">{{$value->categories_name}}</option>
                  @endforeach
                </select>
                @error('Post')
                <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">Post Image</label>
                <div class="row">
                  <div class="col-8">
                    <input type="file" class="form-control" id="image" name="image" value="" placeholder="Post Image">
                  </div>
                  <div class="col-4" >
                    <div style="max-width:100px; max-height: 70px; overflow:hidden; margin-left:auto">
                      <img src="{{asset('image/'.$post[0]->posts_image)}}" alt="">
                    </div>
                  </div>
                </div>
                @error('image')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                @foreach ($tags as $value)
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{$value->tages_id}}" value="{{$value->tages_id}}"
                    @foreach ($post as $tag)
                        @if ($value->tages_id == $tag->posts_id) checked @endif
                    @endforeach
                    >
                    <label for="tag{{$value->tages_id}}" class="custom-control-label">{{$value->tages_name}}</label>
                  </div>
                @endforeach
              </div>
              <div class="form-group">
                <label for="description">Post description</label>
                <textarea class="form-control" rows="4" name="description" id="description" value="" placeholder="Enter Description">{{$post[0]->posts_description}}</textarea>
                @error('description')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{$post[0]->user_name}}" placeholder="User Name">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
      </div>
    </div>
</div>

@endsection