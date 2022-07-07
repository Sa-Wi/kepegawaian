@extends('dashboard.main')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fa fa-list fa-fw"></i> List Available Position
    </div>
    <div class="card-body table-responsive">
        @forelse($positions as $posisi)
            <div class="row mb-3">
                <div class="col-9 col-sm-6">
                    <input type="text" readonly class="form-control" value="{{ $posisi->nama }}">
                </div>
                <div class="col-3">
                 <form action="{{ route('position.destroy', $posisi->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('sure want to delete?')">Delete</button>
                </form>  
                </div>
            </div>
        @empty
            
        @endforelse
        <form action="{{ route('position.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-9 col-sm-6">
                    <input type="text" name="posisi" placeholder="Add new positions" required class="form-control">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-sm btn-outline-primary">+Add</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection