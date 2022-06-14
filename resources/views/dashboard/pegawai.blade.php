@extends('dashboard.main')

@section('content')
<a href="{{ route('employee.create') }}" class="btn btn-sm btn-outline-primary mb-3">+Add Employee</a>
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Employee
    </div>
    <div class="card-body table-responsive">
        <table id="table" class="table table-striped table-bordered">
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
                    <td>{{ $pegawai->nip }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->posisi }}</td>
                    <td>{{ $pegawai->phone }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>
                        <div>
                            <a href="javascript::void(0)" onclick="show('{{ route('employee.show',$pegawai->nip) }}','modal-lg')" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="javascript::void(0)" onclick="show('{{ route('employee.edit',$pegawai->nip) }}','modal-lg' , 'Edit Data {{$pegawai->nip}}')" class="btn btn-sm btn-outline-warning">Edit</a>
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