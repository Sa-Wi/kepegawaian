@extends('dashboard.main')

@section('content')
    <div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Deleted Position
    </div>
    <div class="card-body table-responsive">
        <table id="tablePolos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Deleted at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $posisi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $posisi->nama }}</td>
                    <td>{{ $posisi->deleted_at }}</td>
                    <td>
                        <div>
                            <a href="/trash/position/{{ $posisi->id }}/restore"  class="btn btn-sm btn-outline-primary swalRestore" data-alert="{{ $posisi->nama }}">Restore</a>             
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection