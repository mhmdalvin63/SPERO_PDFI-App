@extends('admin.template')
@section('title', 'Kepengurusan')
@section('layout')
<div class="page-heading">
    <h3>Table Kepengurusan</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
            <div class="card-title d-flex justify-content-end mb-5">
                <a href="/admin/kepengurusan/create" class="btn btn-primary btn-lg btn-icon-text">
                    <i class="mdi mdi-upload btn-icon-prepend"></i>
                    +
                </a>
            </div>
            <div class="text-center">
                <table class="table table-responsive table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Nama & Gelar</th>
                            <th>Posisi</th>
                            <th>Domisili</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pengurus as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ url('admin/kepengurusan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <form action="{{ url('admin/kepengurusan', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->posisi->posisi}}</td>
                        <td>{{ $item->domisili}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection