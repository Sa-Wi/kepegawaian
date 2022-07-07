@extends('dashboard.main')

@section('content')
<div class="container d-grid mx-0 p-0 my-3">
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalImport">
        <i class="fa fa-upload" aria-hidden="true"></i> Import
    </button>

    <!-- Modal Import -->
    <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/attendance/import" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" name="import_absen" class="custom-file-input" required id="inputGroupFile04" >
                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Import</button>
                </div>
                </div>
            </div>
        </form>
    </div>
        
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#ModalFilter">
        <i class="fa fa-calendar" aria-hidden="true"></i> Date Filter
    </button>

    <!-- Modal Date Filter -->
    <div class="modal fade" id="ModalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/attendance/filtered" method="post" id="dateFilter">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="date">From</label>
                            <input type="date" name="from" class="form-control" value="{{ $from ?? '' }}">
                        </div>
                        <div class="col">
                            <label for="to">To</label>
                            <input type="date" name="to" class="form-control" value="{{ $to ?? '' }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" form="dateFilter" >Filter</button>
                </div>
                </div>
            </div>
        </form>
    </div>

    @if (isset($from) || isset($to))
        <a href="{{ route('attendance.index') }}" class="btn btn-warning">Reset</a>
    @endif

</div>

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
                    <th>Remark</th>
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
                    <td>{{ $absensi->keterangan ?? '-' }}</td>
                    <td>
                        <div>
                            <a href="javascript::void(0)" onclick="show('{{ route('attendance.show', $absensi->id) }}','modal-lg', 'Data {{$absensi->pegawai_id}}')" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="javascript::void(0)" onclick="show('{{ route('attendance.edit', $absensi->id) }}','modal-lg' , 'Edit Data {{ $absensi->pegawai_id }} : {{$absensi->id}}')" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form class="d-inline" action="{{ route('attendance.destroy', $absensi->id)}}" method="post">
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