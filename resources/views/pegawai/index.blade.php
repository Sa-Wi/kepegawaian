@extends('dashboard.main')

@section('content')
    <div class="container">
        <form action="{{ route('employee.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-user fa-fw"></i> Add New Employee
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP">
                            @error('nip')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Position">
                            @error('position')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                            @error('phone')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                            @error('address')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection