@extends('admin.template')
@section('title', 'Update')
@section('layout')
<div class="page-heading">
    <h3>Table Update</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
          
            <div class="card-title d-flex justify-content-end mb-5">
                <a href="/admin/update/create" class="btn btn-primary btn-lg btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i>
                    +
                </a>
            </div>
            
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Title</th>
                            <th>Topic</th>
                            <th>Image Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($update as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ url('admin/update/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <form action="{{ url('admin/update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm-lg text-white"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item->judul_update}}</td>
                        <td class="col-4">{{ Str::limit($item->isi_berita, 25)}}</td>
                        <td><img src="{{asset('img/'.$item->foto)}}"  height="60" alt=""></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection