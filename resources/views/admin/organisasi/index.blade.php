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
                <table class="table table-responsive table-hover table-striped" id="table1">
                    <thead >
                        <tr style="text-align: center;">
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align: center;">Nama & Gelar</th>
                            <th style="text-align: center;">Posisi</th>
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
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection