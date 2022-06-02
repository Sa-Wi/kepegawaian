@extends('main')

@section('content')
<form action="/" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group col-4 mb-3">
        <div class="custom-file">
            <input type="file" name="import_absen" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Import</button>
        </div>
    </div>
</form>
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List
    </div>
    <div class="card-body table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Name</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection