@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Contact List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contact List</li>
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
            <h5 class="m-0">Contact</h5>
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
                <th style="width: 10px">Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @if ($contact_data->count())
                    @foreach ($contact_data as $key => $value)
                        <tr>
                            <td>{{$value->contacts_id }}</td>
                            <td>{{$value->contacts_name }}</td>
                            <td>{{$value->contacts_email }}</td>
                            <td>{{$value->contacts_subject }}</td>
                            <td><p> {!! Str::limit($value->contacts_message, '10', '...')  !!}</p></td>
                            <td class="d-flex">
                                {{-- <a href="{{route('contact.edit', $value->contacts_id)}}" class="btn btn-sm btn-primary mr-1"><i class="fa-regular fa-pen-to-square"></i></a> --}}
                                <a href="{{route('contact.show', $value->contacts_id)}}" class="btn btn-sm btn-primary mr-1"><span class="material-icons">preview</span></a>
                                <form action="{{route('contact.destroy', $value->contacts_id)}}" method="contact">
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
      {{-- {{ $Contact->links() }} --}}
    </div>
</div>

@endsection