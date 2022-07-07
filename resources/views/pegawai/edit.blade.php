
<form action="{{ route('employee.update', $data->id) }}" method="post">
@method('PATCH')
@csrf
    <table class="table table-bordered">
        <tr>
            <th>NIP</th>
            <td>
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" disabled value="{{ old('nip' , $data->id) }}">
                @error('nip')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name' , $data->nama) }}">
                @error('name')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Join Date</th>
            <td>
                <input type="date" name="join" class="form-control @error('join') is-invalid @enderror" value="{{ old('join' , $data->join_date) }}">
                @error('join')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Office</th>
            <td>
                <input type="text" name="office" class="form-control @error('office') is-invalid @enderror" value="{{ old('office' , $data->kantor) }}">
                @error('office')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                {{-- <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status' , $data->status) }}"> --}}
                <select class="custom-select" id="status" name="status" aria-label="Default select example">
                                <option disabled {{ $data->status == '' ? 'selected' : '' }}>Select for Status</option> 
                                <option {{ $data->status == 'PKWT' ? 'selected' : '' }} value="PKWT">PKWT</option>
                                <option {{ $data->status == 'DW' ? 'selected' : '' }} value="DW">DW</option>
                                <option {{ $data->status == 'TRAINEE' ? 'selected' : '' }} value="TRAINEE">TRAINEE</option>
                                <option {{ $data->status == 'FREELANCE' ? 'selected' : '' }} value="FREELANCE">FREELANCE</option>
                            </select>
                @error('status')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Position</th>
            <td>
                {{-- <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position' , $data->posisi->nama) }}"> --}}
                <select class="custom-select" id="position" name="posisi" aria-label="Default select example">
                                <option disabled {{ $data->posisi->id == '' ? 'selected' : '' }}>Select for Position</option>
                                @foreach ($positions as $posisi)
                                    <option {{ $data->posisi->id == $posisi->id ? 'selected' : '' }} value="{{ $posisi->id }}">{{ $posisi->nama }}</option>
                                @endforeach
                                <option value="">Other</option>
                            </select>
                @error('position')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        {{-- <tr>
            <th>Shift In</th>
            <td>
                <input type="time" name="shift_in" class="form-control @error('shift_in') is-invalid @enderror" value="{{ old('shift_in' , $data->shift_in) }}">
                @error('shift_in')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Shift Out</th>
            <td>
                <input type="time" name="shift_out" class="form-control @error('shift_out') is-invalid @enderror" value="{{ old('shift_out' , $data->shift_out) }}">
                @error('shift_out')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr> --}}
        <tr>
            <th>Phone</th>
            <td>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone' , $data->phone) }}">
                @error('phone')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email' , $data->email) }}">
                @error('email')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>
                <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir' , $data->tanggal_lahir) }}">
                @error('tgl_lahir')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Domicile Address</th>
            <td>
                <textarea name="domicile" class="form-control @error('domicile') is-invalid @enderror" id="domicile">{{ old('domicile' , $data->alamat_domisili) }}</textarea>
                {{-- <input type="text" name="domicile" class="form-control @error('domicile') is-invalid @enderror" value="{{ old('domicile' , $data->alamat_domisili) }}"> --}}
                @error('domicile')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Current Address</th>
            <td>
                <textarea name="current_adrs" class="form-control @error('domicile') is-invalid @enderror" id="current_adrs">{{ old('domicile' , $data->alamat_domisili) }}</textarea>
                {{-- <input type="text" name="current_adrs" class="form-control @error('current_adrs') is-invalid @enderror" value="{{ old('current_adrs' , $data->alamat_sekarang) }}"> --}}
                @error('current_adrs')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td>
                <input type="text" name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror" value="{{ old('kewarganegaraan' , $data->kewarganegaraan) }}">
                @error('kewarganegaraan')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Identity ID</th>
            <td>
                <input type="text" name="ktp" class="form-control @error('ktp') is-invalid @enderror" value="{{ old('ktp' , $data->ktp) }}">
                @error('ktp')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>NPWP</th>
            <td>
                <input type="text" name="npwp" class="form-control @error('npwp') is-invalid @enderror" value="{{ old('npwp' , $data->npwp) }}">
                @error('npwp')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Bank Account</th>
            <td>
                <input type="text" name="akun_bank" class="form-control @error('akun_bank') is-invalid @enderror" value="{{ old('akun_bank' , $data->akun_bank) }}">
                @error('akun_bank')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Emergency Contact Person</th>
            <td>
                <input type="text" name="emergency_name" class="form-control @error('emergency_name') is-invalid @enderror" value="{{ old('emergency_name' , $data->nama_kontak_darurat) }}">
                @error('emergency_name')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Relationship</th>
            <td>
                <input type="text" name="emergency_relasi" class="form-control @error('emergency_relasi') is-invalid @enderror" value="{{ old('emergency_relasi' , $data->relasi_kontak_darurat) }}">
                @error('emergency_relasi')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Emergency Contact Number</th>
            <td>
                <input type="text" name="emergency_phone" class="form-control @error('emergency_phone') is-invalid @enderror" value="{{ old('emergency_phone' , $data->phone_kontak_darurat) }}">
                @error('emergency_phone')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>Remark</th>
            <td>
                <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror"" >{{ old('remark' , $data->remark) }}</textarea>
                {{-- <input type="text" name="remark" class="form-control @error('remark') is-invalid @enderror" value="{{ old('remark' , $data->remark) }}"> --}}
                @error('remark')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-outline-primary float-right">Update</button>
</form>
