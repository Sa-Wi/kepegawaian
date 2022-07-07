
<form action="{{ route('attendance.store', $data->id) }}">
    @csrf
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>
                <input type="text" name="name" class="form-control" disabled value="{{ old('name' , $data->nama ?? '!not registered') }}">
            </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>
                <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
            </td>
        </tr>
        <tr>
            <th>In</th>
            <td>
                <input type="time" name="in" class="form-control" value="{{ old('in') }}">
            </td>
        </tr>
        <tr>
            <th>Out</th>
            <td>
                <input type="time" name="out" class="form-control" value="{{ old('out') }}">
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <select name="status" id="status" class="custom-select">
                    <option value="" selected>Automatically create status</option>
                    <option value="OK">OK</option>
                    <option value="Late">Late</option>
                    <option value="Early">Early</option>
                    <option value="Late Early">Late Early</option>
                    <option value="Late Only In">Late Only In</option>
                    <option value="Early Only Out">Early Only out</option>
                    <option value="Only In">Only Iut</option>
                    <option value="Only Out">Only Out</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Remark</th>
            <td>
                {{-- <input type="text" name="remark" class="form-control" value="{{ old('remark' , $data->keterangan) }}"> --}}
                <textarea name="remark" class="form-control">{{ old('remark' , $data->keterangan) }}</textarea>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-outline-primary float-right">Create</button>
</form>