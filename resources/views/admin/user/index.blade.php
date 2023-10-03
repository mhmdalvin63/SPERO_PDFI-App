@extends('admin.template')
@section('title', 'User Management')
@section('layout')


<div class="page-heading">
    <h3>Table User Management</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
          
            <div class="card-title d-flex justify-content-end mb-5">
                <a href="/admin/user-management/create" class="btn btn-primary btn-lg btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i>
                    +
                </a>
            </div>
            @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close btn-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th>Verification</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($userindex as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ url('admin/user-management/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <form action="{{ url('admin/user-management', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>   
                                </form>
                                <form action="{{  url('admin/user-management/resetpassword/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info btn-sm-lg text-white"><i class="bi bi-key"></i></button>
                                </form>
                                @if($item->status == 'aktif')
                                <form action="{{  url('admin/user-management/nonactivated/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm-lg text-white">Nonaktifkan Akun</button>
                                </form>
                                @else
                                <form action="{{  url('admin/user-management/activated/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm-lg text-white">Aktifkan Akun</button>
                                </form>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{date('d F Y', strtotime($item->created_at))}}</td>
                        <td class="text-center">
                            @if($item->verification == 'verified')
                            <button class="btn btn-primary">Verified</button>
                            @else
                            <form action="{{  url('admin/user-management/verified/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning text-white">Unverified</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection