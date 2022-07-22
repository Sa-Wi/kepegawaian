@extends('dashboard.main')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fa fa-list fa-fw"></i> List Available Position
        </div>
        <div class="card-body table-responsive">
            <form action="{{ route('position.store') }}" class="mb-3" method="post">
                @csrf
                <div class="row">
                    <div class="col-9 col-sm-6">
                        <input type="text" name="position" placeholder="Add new positions" required
                            class="form-control @error('position') is-invalid @enderror">
                        @error('position')
                            <div class="m-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <button type="submit" class="btn btn-sm btn-outline-primary">+Add</button>
                    </div>
                </div>

            </form>
            <hr>
            @forelse($positions as $posisi)
                <div class="row mb-3">
                    <div class="col-9 col-sm-6">
                        <input type="text" readonly class="form-control" value="{{ $posisi->nama }}">
                    </div>
                    <div class="col-3">

                        <form action="{{ route('position.destroy', $posisi->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="javascript::void(0)"
                                onclick="show('{{ route('position.edit', $posisi->id) }}','modal-lg')"
                                class="btn btn-sm btn-outline-warning">Edit</a>
                            <button class="btn btn-sm btn-outline-danger swalDelete" type="submit"
                                data-alert="{{ $posisi->nama }}">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </div>
@endsection
