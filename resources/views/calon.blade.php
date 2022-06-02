@extends('main')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List
    </div>
    <div class="card-body table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calons as $calon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $calon->posisi }}</td>
                    <td>{{ $calon->nama }}</td>
                    <td>{{ $calon->email }}</td>
                    <td>{{ $calon->telepon }}</td>
                    <td>
                        <div>
                            <a href="javascript::void(0)" onclick="show('{{ route('recruitment.show',$calon->id) }}','modal-lg')" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="javascript::void(0)" onclick="show('{{ route('recruitment.edit',$calon->id) }}','modal-lg' , 'Edit Data {{$calon->id}}')" class="btn btn-sm btn-outline-warning">Edit</a>
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