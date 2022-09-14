@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Seeting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Seeting</li>
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
            <h5 class="m-0">Edit Seeting</h5>
            {{-- <a href="#" class="btn btn-primary">Post List</a> --}}
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <form action="{{url('/super-admin/setting/update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method("PUT") --}}
            <div class="card-body">
              <div class="form-group">
                <label for="title">Site Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$seeting_data->seeting_name}}" placeholder="Post name">
                @error('name')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>


              <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{$seeting_data->seeting_facebook}}" placeholder="Post facebook">
                        @error('facebook')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{$seeting_data->seeting_twitter}}" placeholder="Post twitter">
                        @error('twitter')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{$seeting_data->seeting_instagram}}" placeholder="Post instagram">
                        @error('instagram')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Reddit</label>
                        <input type="text" class="form-control" id="reddit" name="reddit" value="{{$seeting_data->seeting_reddit}}" placeholder="Post reddit">
                        @error('reddit')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$seeting_data->seeting_email}}" placeholder="Post email">
                        @error('email')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Copyright</label>
                        <input type="text" class="form-control" id="copyright" name="copyright" value="{{$seeting_data->seeting_copyright}}" placeholder="Post copyright">
                        @error('copyright')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label for="title">Site Logo</label>
                <div class="row">
                  <div class="col-8">
                    <input type="file" class="form-control" id="logo" name="logo" value="" placeholder="Post logo">
                  </div>
                  <div class="col-4" >
                    <div class="img-fluid" style="max-width:70px; max-height: 70px; overflow:hidden; margin-left:auto">
                      <img class="img-fluid h-100" src="{{asset('image/setting/'.$seeting_data->seeting_site_logo)}}" alt="logo">
                    </div>
                  </div>
                </div>
                @error('logo')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Site description</label>
                <textarea class="form-control" rows="4" name="description" id="description" value="" placeholder="Enter Description">{{$seeting_data->seeting_about_site}}</textarea>
                @error('description')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
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