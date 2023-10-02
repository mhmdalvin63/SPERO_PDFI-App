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
                            <th>Title</th>
                            <th>Update Type</th>
                            <th>Tag</th>
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
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}" class="btn btn-success btn-sm-lg text-white"><i class="bi bi-eye-fill"></i></i></a>

                                <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Update</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-3">
                                                <div class="col-4">Image Topic: </div>
                                                <div class="col-8"><img src="{{asset('img/'.$item->foto)}}"  width="100%" alt=""></div>
                                            </div>
                                            <hr>
                                            <div class="row mt-3">
                                                <div class="col-4">Title: </div>
                                                <div class="col-8 text-start">{{$item->judul_update}}</div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">Topic: </div>
                                                <div class="col-8 text-start">{{$item->isi_berita}}</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </td>
                        <td>{{ $item->judul_update}}</td>
                        <td>
                            @if($item->jenis_berita == 'umum')
                            <button class="btn btn-outline-primary">Public</button>
                            @else
                            <button class="btn btn-outline-primary">Private</button>
                            @endif
                        </td>
                        <td>
                            @foreach($item->tag as $womp)
                            <button class="btn btn-sm btn-primary">{{ $womp->tag_name}}</button>
                            @endforeach
                        </td>
                        <td>{{ Str::limit($item->isi_berita, 25)}}</td>
                        <td class="d-flex gap-1">
                        @foreach($item->foto as $foto)
                            <img src="{{asset('img/'.$foto->foto)}}" class="ms-2"  height="150" alt="">
                            @endforeach
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