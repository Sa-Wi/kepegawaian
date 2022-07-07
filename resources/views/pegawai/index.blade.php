@extends('dashboard.main')

@section('content')
    <div class="container">
        <a href="{{ route('employee.index') }}" class="text-decoration-none">
            <button class="btn btn-primary my-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </a>
        <form action="{{ route('employee.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-user fa-fw"></i> Add New Employee
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="nip" class="ml-1">NIP</label>
                                <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror" >
                                @error('nip')
                                    <small class="form-text text-muted">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="name" class="ml-1">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <label for="position" class="ml-1">Position</label>
                            <select class="custom-select" id="position" name="posisi" aria-label="Default select example">
                                <option disabled selected>Select for Position</option>
                                @foreach ($positions as $posisi)
                                    <option value="{{ $posisi->id }}">{{ $posisi->nama }}</option>
                                @endforeach
                                <option value="">Other</option>
                            </select>
                            @error('posisi')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="office" class="ml-1">Office</label>
                                <input type="text" name="office" class="form-control @error('office') is-invalid @enderror">
                                @error('office')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="join" class="ml-1">Join Date</label>
                                <input type="date" name="join" class="form-control @error('join') is-invalid @enderror">
                                @error('join')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <label for="status" class="ml-1">Status</label>
                            <select class="custom-select" id="status" name="status" aria-label="Default select example">
                                <option disabled selected>Select for Status</option> 
                                <option value="PKWT">PKWT</option>
                                <option value="DW">DW</option>
                                <option value="TRAINEE">TRAINEE</option>
                                <option value="FREELANCE">FREELANCE</option>
                                <option value="other">Other</option>
                            </select>
                            @error('posisi')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="shift_in" class="ml-1">Shift In</label>
                                <input type="time" name="shift_in" class="form-control @error('shift_in') is-invalid @enderror">
                                @error('shift_in')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="shift_out" class="ml-1">Shift Out</label>
                                <input type="time" name="shift_out" class="form-control @error('shift_out') is-invalid @enderror">
                                @error('shift_out')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="tgl_lahir" class="ml-1">Birth Date</label>
                                <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                                @error('tgl_lahir')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="kewarganegaraan" class="ml-1">Nasionality</label>
                                <input type="text" name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                                @error('kewarganegaraan')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <Label for="domicile">Domicile Address</Label>
                                <textarea name="domicile" class="form-control" id="domicile"></textarea>
                                {{-- <input type="text" name="domicile" class="form-control @error('domicile') is-invalid @enderror" placeholder="domicile"> --}}
                                @error('domicile')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <Label for="current_adrs">Current Address</Label>
                                <textarea name="current_adrs" class="form-control" id="current_adrs"></textarea>
                                {{-- <input type="text" name="current_adrs" class="form-control @error('current_adrs') is-invalid @enderror" placeholder="current_adrs"> --}}
                                @error('current_adrs')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="ktp" class="ml-1">Identity ID</label>
                                <input type="text" name="ktp" class="form-control @error('ktp') is-invalid @enderror">
                                @error('ktp')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="npwp" class="ml-1">NPWP</label>
                                <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror">
                                @error('npwp')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-12">
                            <div class="form-group">
                                <label for="akun_bank" class="ml-1">Bank Account</label>
                                <input type="text" name="akun_bank" class="form-control @error('akun_bank') is-invalid @enderror">
                                @error('akun_bank')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="email" class="ml-1">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-6">
                            <div class="form-group">
                                <label for="phone" class="ml-1">phone</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-4">
                            <div class="form-group">
                                <label for="emergency_name" class="ml-1">Emergency Contact Person</label>
                                <input type="text" name="emergency_name" class="form-control @error('emergency_name') is-invalid @enderror">
                                @error('emergency_name')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-4">
                            <div class="form-group">
                                <label for="emergency_relasi" class="ml-1">Relationship</label>
                                <input type="text" name="emergency_relasi" list="relationlist" class="form-control @error('emergency_relasi') is-invalid @enderror">
                                <datalist id="relationlist" name="emergency_relasi">
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother/Sister">Brother/Sister</option>
                                    <option value="Wife/Husband">Wife/Husband</option>
                                    <option value="Children">Children</option>
                                    <option value="Friend">Friend</option>
                                </datalist>
                                @error('emergency_relasi')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-4">
                            <div class="form-group">
                                <label for="emergency_phone" class="ml-1">Emergency Phone Number</label>
                                <input type="number" name="emergency_phone" class="form-control @error('emergency_phone') is-invalid @enderror">
                                @error('emergency_phone')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto col-sm-12">
                            <div class="form-group">
                                <label for="remark" class="ml-1">Remark</label>
                                <textarea name="remark" id="remark" class="form-control"></textarea>
                                {{-- <input type="number" name="remark" class="form-control @error('remark') is-invalid @enderror"> --}}
                                @error('remark')
                                    <div class="m-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection