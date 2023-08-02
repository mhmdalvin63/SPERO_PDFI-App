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
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection