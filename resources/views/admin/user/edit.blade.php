@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">User Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">user</li>
            <li class="breadcrumb-item active">edit</li>
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
            <h5 class="m-0">User Update</h5>
            <a href="#" class="btn btn-primary">User show</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{url('/admin-user/update/'.$admin_edit_data->registrations_id )}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @method("PUT") --}}
            <div class="card-body">
              <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$admin_edit_data->registrations_name}}" placeholder="User Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="number" class="form-control" id="mobile" name="mobile" min="9" value="{{$admin_edit_data->registrations_phone}}" placeholder="Enter Your Mobile number" autocomplete="off">
                @error('mobile')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
              </div>
              <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{$admin_edit_data->registrations_email }}" placeholder="Enter Your Email address" autocomplete="off">
                  @error('email')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
              <div class="form-group">
                <label for="title">User Image</label>
                <div class="row">
                  <div class="col-8">
                    <input type="file" class="form-control" id="image" name="image" value="" placeholder="User Image">
                  </div>
                  <div class="col-4" >
                    <div style="max-width:100px; max-height: 70px; overflow:hidden; margin-left:auto">
                      @if ($admin_edit_data->registrations_image)
                        <img src="{{asset('image/user/'.$admin_edit_data->registrations_image)}}" alt="" class="img-fluid">
                      @else
                        <img src="{{asset('image/noimages.png')}}" alt="No Image" class="img-fluid">
                      @endif
                    </div>
                  </div>
                </div>
                @error('image')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">user description</label>
                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter Description"> {{$admin_edit_data->registrations_description}}</textarea>
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