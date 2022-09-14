@extends('layouts.admin_master')
@section('admin_content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Contact View</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contact View</li>
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
            <h5 class="m-0">Contact Show</h5>
            <a href="#" class="btn btn-primary">Contact List</a>
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
                    <th class="w-25">Name</th>
                    <td>{{ $contact_data->contacts_name }}</th>
                </tr>
                <tr>
                    <th class="w-25">Email</th>
                    <td>{{ $contact_data->contacts_email  }}</th>
                </tr>
                <tr>
                    <th class="w-25">Subject</th>
                    <td>{{ $contact_data->contacts_subject  }}</th>
                </tr>
                <tr>
                    <th class="w-25">Message</th>
                    <td>{{ $contact_data->contacts_message  }}</th>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection