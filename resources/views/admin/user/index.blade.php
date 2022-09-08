@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Admin User List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Admin User List</li>
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
            <h5 class="m-0">Admin User</h5>
            <a href="" class="btn btn-primary">Create</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Image</th>
                <th>Description</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admin_data as $key => $value)
                    <tr>
                        <td style="width: 5%;">{{$value->registrations_id }}</td>
                        <td style="width: 15%;">{{$value->registrations_name }}</td>
                        <td style="width: 15%;">{{$value->registrations_phone }}</td>
                        <td style="width: 15%;">{{$value->registrations_email }}</td>
                        <td style="width: 20%;">
                            <div>
                                @if ($value->registrations_image)
                                  <img src="{{asset('image/user/'.$value->registrations_image)}}" alt="" style="max-width:70%; max-height: 50%; overflow:hidden; margin-left:auto d-flex">
                                @else
                                  <img src="{{asset('image/noimages.png')}}" alt="No Image" class="img-fluid" style="max-width:70%; max-height: 50%; overflow:hidden; margin-left:auto d-flex">
                                @endif
                            </div>
                        </td>
                        <td style="width: 20%;">{{$value->registrations_description }}</td>
                        <td class="d-flex" style="width: 10%;">
                            <a href="{{url('/admin-user/edit/'. $value->registrations_id)}}" class="btn btn-sm btn-primary mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{url('/admin-user/delete/'.$value->registrations_id)}}" method="get">
                                @csrf
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fa-regular fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            
          </table>
      </div>
      {{-- {{ $category->links() }} --}}
    </div>
</div>

@endsection