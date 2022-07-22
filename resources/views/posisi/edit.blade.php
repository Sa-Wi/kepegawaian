<form action="{{ route('position.update', $data->id) }}" method="POST">
    @method('PATCH')
    @csrf
    <input type="text" name="position" class="form-control" value="{{ $data->nama }}">
    <button type="submit" class="btn btn-primary m-2 float-right">Update</button>
</form>
