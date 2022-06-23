<form action="{{ route('employee.update', $data->nip) }}" method="post">
@method('PATCH')
@csrf
    <table class="table table-bordered">
        <tr>
            <th>NIP</th>
            <td>
                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" disabled value="{{ old('nip' , $data->nip) }}">
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
            <th>Position</th>
            <td>
                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position' , $data->posisi) }}">
                @error('position')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
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
            <th>Address</th>
            <td>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address' , $data->alamat) }}">
                @error('address')
                    <div class="m-1">
                        {{ $message }}
                    </div>
                @enderror
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-outline-primary float-right">Update</button>
</form>
