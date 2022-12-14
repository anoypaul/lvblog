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
            <li class="breadcrumb-item active">Create</li>
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
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" value="" placeholder="Post Title">
                @error('title')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Select Category</label>
                <select name="category" id="" class="form-control">
                  <option value="" class="d-none" selected>Select Category</option>
                  @foreach ($category as $value)
                      <option value="{{$value->categories_id}}">{{$value->categories_name}}</option>
                  @endforeach
                </select>
                @error('category')
                <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">Post Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Post Image">
                @error('image')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                @foreach ($tags as $value)
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{$value->tages_id}}" value="{{$value->tages_id}}">
                    <label for="tag{{$value->tages_id}}" class="custom-control-label">{{$value->tages_name}}</label>
                  </div>
                    {{-- <span>{{$value->tages_name}}</span> --}}
                @endforeach
              </div>
              <div class="form-group">
                <label for="Description">Post description</label>
                <textarea class="form-control" rows="4" name="description" id="description" value="{{old('description')}}" placeholder="Enter Description"></textarea>
                @error('description')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}" placeholder="User Name">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
</div>

@endsection


@section('style')
  <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/summernote-bs4.css">
@endsection
@section('script')
  <script src="{{ asset('admin') }}/dist/js/summernote-bs4.js"></script>
  <script>
    $('#description').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>
@endsection