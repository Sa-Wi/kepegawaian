<form action="{{ route('attendance.update', $data->id) }}" method="post">
    @csrf
    @method('PATCH')
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>
                <input type="text" name="name" class="form-control" disabled
                    value="{{ old('name', $data->pegawai->nama ?? '!not registered') }}">
            </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>
                <input type="date" disabled name="date" class="form-control"
                    value="{{ old('date', $data->tanggal) }}">
            </td>
        </tr>
        <tr>
            <th>In</th>
            <td>
                <input type="time" disabled name="in" class="form-control" value="{{ old('in', $data->in) }}">
            </td>
        </tr>
        <tr>
            <th>Out</th>
            <td>
                <input type="time" disabled name="out" class="form-control"
                    value="{{ old('out', $data->out) }}">
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <input type="text" disabled name="status" class="form-control"
                    value="{{ old('status', $data->status) }}">
            </td>
        </tr>
        <tr>
            <th>Remark</th>
            <td>
                {{-- <input type="text" name="remark" class="form-control" value="{{ old('remark' , $data->keterangan) }}"> --}}
                <textarea name="remark" autofocus class="form-control">{{ old('remark', $data->keterangan) }}</textarea>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-outline-primary float-right">Update</button>
</form>
