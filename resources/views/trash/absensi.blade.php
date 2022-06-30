@extends('dashboard.main')

@section('content')
    <div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Deleted Attendance
    </div>
    <div class="card-body table-responsive">
        <table id="tablePolos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Status</th>
                    <th>Deleted at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absensi->pegawai_id }}</td>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->pegawai->nama ?? '! name not registered'}}</td>
                    <td>{{ $absensi->in }}</td>
                    <td>{{ $absensi->out }}</td>
                    <td>{{ $absensi->status }}</td>
                    <td>{{ Carbon\Carbon::parse($absensi->deleted_at)->diffForHumans() }}</td>
                    <td>
                        <div>
                            <a href="/trash/attendance/{{ $absensi->id }}/restore" onclick="return confirm('sure want to restore this data?')"  class="btn btn-sm btn-outline-primary">Restore</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection