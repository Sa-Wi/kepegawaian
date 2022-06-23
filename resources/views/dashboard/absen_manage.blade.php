@extends('dashboard.main')

@section('content')
<form action="/attendance/import" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group col-4 mb-3">
        <div class="custom-file">
            <input type="file" name="import_absen" class="custom-file-input" required id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Import</button>
        </div>
    </div>
</form>
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Attendance
    </div>
    <div class="card-body table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absensi->nip }}</td>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->nama }}</td>
                    <td>{{ $absensi->in }}</td>
                    <td>{{ $absensi->out }}</td>
                    <td>{{ $absensi->status }}</td>
                    <td>
                        <div>
                            <a href="javascript::void(0)" onclick="show('{{ route('attendance.show', $absensi->id) }}','modal-lg')" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="javascript::void(0)" onclick="show('{{ route('attendance.edit', $absensi->id) }}','modal-lg' , 'Edit Data {{$absensi->id}}')" class="btn btn-sm btn-outline-warning">Edit</a>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection