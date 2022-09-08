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
            <h5 class="m-0">Post</h5>
            <a href="{{route('post.create')}}" class="btn btn-primary">Create</a>
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
                <th>Slag</th>
                <th>Image</th>
                <th>Ddescription</th>
                <th>Category Name</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($post->count())
                    @foreach ($post as $key => $value)
                        <tr>
                            <td>{{$value->posts_id}}</td>
                            <td>{{$value->posts_title }}</td>
                            <td>{{$value->posts_slug }}</td>
                            <td>
                                <div style="max-width:70px; max-height: 50px; overflow:hidden"> 
                                    <img src="{{asset('image/'. $value->posts_image)}}" class="img-fluid" alt="">
                                </div>
                            </td>
                            <td><p> {!! Str::limit($value->posts_description, '10', '...')  !!}</p></td>
                            {{-- <p>{!! Str::limit($value->posts_description, '10', '...')  !!}</p> --}}
                            {{-- <td>{!! Str::limit($value->posts_description, 20)  !!}</td> --}}
                            <td>{{$value->categories_name }}</td>
                            <td class="d-flex">
                                <a href="{{route('post.edit', $value->posts_id)}}" class="btn btn-sm btn-primary mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{route('post.show', $value->posts_id)}}" class="btn btn-sm btn-primary mr-1"><span class="material-icons">preview</span></a>
                                <form action="{{route('post.destroy', $value->posts_id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fa-regular fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        
                @else
                    <tr>
                        <td colspan="7">
                            <h5 class="text-center">No tags founds</h5>
                        </td>    
                    </tr>  
                @endif
              

            </tbody>
            
          </table>
      </div>
      {{ $post->links() }}
    </div>
</div>

@endsection