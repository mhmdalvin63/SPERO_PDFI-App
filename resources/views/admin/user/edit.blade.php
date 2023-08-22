@extends('admin.template')
@section('title', 'Input User')
@section('layout')
<div class="page-heading">
    <h3>Insert Data User</h3>
</div>

<div class="row d-flex" style="justify-content: center;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ url('admin/user-management', $userEdit->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Name<span class="text-danger">*</span></label>
                        <input type="text" value="{{$userEdit->name}}" class="form-control" id="exampleInputUsername1" placeholder="Input Name User..." name="name">
                        @error('name')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1" class="fw-bold">Email<span class="text-danger">*</span></label>
                        <input type="Email" value="{{$userEdit->email}}" class="form-control" id="exampleInputUsername1" placeholder="Input Email User..." name="email">
                        @error('email')
                                <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="modal-footer gap-1 mt-5">
                        <a href="/admin/user-management" class="btn btn-outline-warning btn-icon-text">
                            Cancel
                        </a>
                        <button type="submit" id="dis" class="btn btn-outline-primary btn-icon-text">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection