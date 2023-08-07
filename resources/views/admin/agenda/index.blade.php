@extends('admin.template')
@section('title', 'Event')
@section('layout')
<div class="page-heading">
    <h3>Table Event</h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
  
        <div class="card-body">
          
            <div class="card-title d-flex justify-content-end mb-5">
                <a href="/admin/agenda/create" class="btn btn-primary btn-lg btn-icon-text">
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
                            <th>Title Event</th>
                            <th>Topic</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Location</th>
                            <th>Organizer</th>
                            <th>Image Event</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agenda as $item)
                    <tr class="fw-bold">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td >
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ url('admin/agenda/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm-lg text-white"><i class="bi bi-vector-pen"></i></a>
                                <form action="{{ url('admin/agenda', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm-lg text-white"><i class="bi bi-trash-fill"></i></button>
                                </form>
                               
                        </td>
                        <td>{{ $item->judul_agenda}}</td>
                        <td>{{ Str::limit($item->deskripsi, 25)}}</td>
                        <td>{{ date('j F Y', strtotime($item->start_date)) }}</td>
                        <td>{{ date('j F Y', strtotime($item->end_date)) }}</td>
                        <td>{{ $item->location}}</td>
                        <td>{{ $item->anggota->nama_anggota}}</td>
                        <td><img src="{{asset('img/'.$item->foto)}}"  height="100" alt=""></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection