@extends('dashboard.main')

@section('content')
   <div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Deleted Recruitment
    </div>
    <div class="card-body table-responsive">
        <table id="tablePolos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Deleted at</th>
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
                    <td>{{ Carbon\Carbon::parse($calon->deleted_at)->diffForHumans() }}</td>
                    <td>
                        <div>
                            <a href="/trash/recruitment/{{ $calon->id }}/restore"  class="btn btn-sm btn-outline-primary">Restore</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection