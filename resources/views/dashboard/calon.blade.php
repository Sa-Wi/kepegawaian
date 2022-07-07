@extends('dashboard.main')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Recruitment
    </div>
    <div class="card-body table-responsive">
        <table id="tablePolos" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Added at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calons as $calon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $calon->status ?? 'not inputed yet' }}</td>
                    <td>{{ $calon->posisi->nama }}</td>
                    <td>{{ $calon->nama }}</td>
                    <td>{{ $calon->email }}</td>
                    <td>{{ $calon->telepon }}</td>
                    <td>{{ Carbon\Carbon::parse($calon->created_at)->diffForHumans() }}</td>
                    <td>
                        <div>
                            <a href="javascript::void(0)" onclick="show('{{ route('recruitment.show',$calon->id) }}','modal-lg')" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="{{ route('recruitment.edit', $calon->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            {{-- <a href="javascript::void(0)" onclick="show('{{ route('recruitment.edit',$calon->id) }}','modal-lg' , 'Edit Data {{$calon->id}}')" class="btn btn-sm btn-outline-warning">Edit</a> --}}
                            <form class="d-inline" action="{{ route('recruitment.destroy', $calon->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('sure want to delete?')">Delete</button>
                            </form>   
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection