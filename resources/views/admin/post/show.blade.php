@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Post View</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post View</li>
            <li class="breadcrumb-item active">Show</li>
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
            <h5 class="m-0">Post Show</h5>
            <a href="#" class="btn btn-primary">Post List</a>
        </div>
      </div>
      <div>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{Session::get('success')}}</p>
        @endif
      </div>
      <div class="card-body p-0">
        <table class="table table-bordered table-primary">
            <tbody>
                <tr>
                    <th class="w-25">Image</th>
                    <td>
                        <div style="max-width:100px; max-height: 90px; overflow:hidden"> 
                            <img src="{{asset('image/'. $post_data[0]->posts_image)}}" class="img-fluid" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="w-25">Title</th>
                    <td>{{ $post_data[0]->posts_title }}</th>
                </tr>
                <tr>
                    <th class="w-25">Category Name</th>
                    <td>{{ $post_data[0]->categories_name  }}</th>
                </tr>
                <tr>
                    <th class="w-25">Author</th>
                    <td>{{ $post_data[0]->user_name  }}</th>
                </tr>
                <tr>
                    <th class="w-25">Tags</th>
                    <td>
                        @foreach ($tags as $value)
                            {{-- {{ $value->tages_name }} --}}
                            @if ($post_data[0]->tages_id == $value->tages_id)
                                {{ $value->tages_name }}
                            @endif
                        @endforeach
                        
                    </th>
                </tr>
                <tr>
                    <th class="w-25">Description</th>
                    <td>{!! $post_data[0]->posts_description !!}</th>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection