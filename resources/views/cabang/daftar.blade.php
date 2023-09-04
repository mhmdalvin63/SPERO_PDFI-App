@extends('admin.template')
@section('title', 'Pendaftar')
@section('layout')


<div class="page-heading">
    <h3>Table Pendaftar {{$agenda->judul_agenda}}</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
          
            
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
                            <th>No. Telepon</th>
                            <th>Bukti Transfer</th>
                            <th>Join Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pendaftar as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <form action="{{ url('cabang/agenda/pendaftar/', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $item->id }}"><i class="bi bi-trash-fill"></i></button>   
                                </form>
                                @if($item->status == 'Unproved')
                                <form action="{{  url('cabang/agenda/pendaftar/approve/'.$item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info btn-sm-lg text-white"><i class="bi bi-check"></i></button>
                                </form>
                                @else
                                    <button disabled class="btn btn-info btn-sm-lg text-white"><i class="bi bi-check-all"></i></button>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->no_telp}}</td>
                        <td class="text-center"><img src="{{asset('img/'.$item->bukti_transfer)}}"  height="100" alt=""></td>                        
                        <td class="text-center">{{date('d F Y', strtotime($item->created_at))}}</td>
                        <td class="text-center">
                            @if($item->status == 'Unproved')
                            <button class="btn btn-warning">Unproved</button>
                            @else
                            <button class="btn btn-primary">Approved</button>
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