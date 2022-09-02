@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tag List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tag List</li>
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
            <h5 class="m-0">Tag Create</h5>
            <a href="#" class="btn btn-primary">Tag List</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{route('tag.store')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Tag Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Tag description</label>
                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter Description"></textarea>
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