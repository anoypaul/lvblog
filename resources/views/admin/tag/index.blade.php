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
            <h5 class="m-0">Tag</h5>
            <a href="{{route('tag.create')}}" class="btn btn-primary">Create</a>
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
                <th>Description</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tag as $key => $value)
                    <tr>
                        <td>{{$value->tages_id}}</td>
                        <td>{{$value->tages_name }}</td>
                        <td>{{$value->tages_slug }}</td>
                        <td>{{$value->tages_description }}</td>
                        <td class="d-flex">
                            <a href="{{route('tag.edit', $value->tages_id)}}" class="btn btn-sm btn-primary mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{route('tag.destroy', $value->tages_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fa-regular fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
          </table>
      </div>
      {{ $tag->links() }}
    </div>
</div>

@endsection