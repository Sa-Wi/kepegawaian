@extends('dashboard.main')

@section('content')
    <div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Deleted Employee
    </div>
    <div class="card-body table-responsive">
        <table id="tablePolos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pegawai->id }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->posisi }}</td>
                    <td>{{ $pegawai->phone }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>
                        <div>
                            <a href="/trash/employee/{{ $pegawai->id }}/restore" onclick="return confirm('sure want to restore this data?')"  class="btn btn-sm btn-outline-primary">Restore</a>             
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection