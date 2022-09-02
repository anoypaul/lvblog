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
            <h5 class="m-0">Category Update</h5>
            <a href="#" class="btn btn-primary">Category List</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{route('category.update',$category->categories_id)}}" method="post">
            @csrf
            @method("PUT")
            <div class="card-body">
              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->categories_name }}" placeholder="Category Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Category description</label>
                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter Description">{{$category->categories_description}}</textarea>
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