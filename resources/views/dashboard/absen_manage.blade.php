@extends('dashboard.main')

@section('content')
    <div class="container d-grid mx-0 p-0 my-3">

        @error('import_absen')
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Import failed. {{ $message }}
            </div>
        @enderror
        @if (session('error'))
            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                {{ session('error') }}</div>
        @endif

        <div class="row mx-1">
            <a href="{{ route('attendance.create') }}" class="btn btn-outline-primary m-2"><i class="fa fa-plus"
                    aria-hidden="true"></i> Add Attendance</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#ModalImport">
                <i class="fa fa-upload" aria-hidden="true"></i> Import
            </button>

            <!-- Modal Import -->
            <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="/attendance/import" method="post" id="formImport" enctype="multipart/form-data">
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
                                    <input type="file" name="import_absen" class="custom-file-input" required
                                        id="inputGroupFile04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit" id="buttonImport">Import</button>
                                <button class="btn btn-primary" style="display: none;" type="button" id="loadingImport"
                                    disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Importing, Please wait..
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#ModalFilter">
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
                                        <input type="date" name="from" class="form-control"
                                            value="{{ $from ?? '' }}">
                                    </div>
                                    <div class="col">
                                        <label for="to">To</label>
                                        <input type="date" name="to" class="form-control"
                                            value="{{ $to ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit" form="dateFilter">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @if (isset($from) || isset($to))
                <a href="{{ route('attendance.index') }}" class="btn btn-warning m-2">Reset</a>
            @endif
        </div>
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
                            <td>{{ $absensi->pegawai->nama ?? '! name not registered' }}</td>
                            <td>{{ $absensi->in }}</td>
                            <td>{{ $absensi->out }}</td>
                            <td>{{ $absensi->status }}</td>
                            <td>{{ $absensi->keterangan ?? '-' }}</td>
                            <td>
                                <div>
                                    {{-- <a href="javascript::void(0)"
                                        onclick="show('{{ route('attendance.show', $absensi->id) }}','modal-lg', 'Data {{ $absensi->pegawai_id }}')"
                                        class="btn btn-sm btn-outline-primary">Show</a> --}}

                                    <!-- ini tombol edit yang di buat show -->
                                    <a href="javascript::void(0)"
                                        onclick="show('{{ route('attendance.edit', $absensi->id) }}','modal-lg' , 'Data {{ $absensi->pegawai_id }}')"
                                        class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Show</a>

                                    {{-- <form class="d-inline" action="{{ route('attendance.destroy', $absensi->id) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger swalDelete" type="submit"
                                            data-alert="This data">Delete</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
