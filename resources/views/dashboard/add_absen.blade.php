@extends('dashboard.main')

@section('content')
    <div class="container">
        <a href="{{ route('attendance.index') }}" class="btn btn-primary my-3"><i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back</a>
        <form action="{{ route('employee.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-user fa-fw"></i> Add New Attendance
                </div>
                <div class="card-body">
                    <table id="tablePolos" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pegawai->id }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->posisi->nama }}</td>
                                    <td>{{ $pegawai->kantor }}</td>
                                    <td>
                                        <div>
                                            <a href="javascript::void(0)"
                                                onclick="show('{{ route('attendance.add', $pegawai->id) }}','modal-lg', 'Add Attendance for {{ $pegawai->id }}')"
                                                class="btn btn-sm btn-outline-primary">Add Attendance</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection
