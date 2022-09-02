@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Category List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category List</li>
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
            <h5 class="m-0">Category Create</h5>
            <a href="#" class="btn btn-primary">Category List</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{route('post.store')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Select Category</label>
                <select name="" id="" class="form-control">
                  <option value="">ass</option>
                </select>
              </div>
              <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">Post Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Post Image">
              </div>
              <div class="form-group">
                <label for="description">Post description</label>
                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter Description"></textarea>
              </div>
              <div class="form-group">
                <label for="title">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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