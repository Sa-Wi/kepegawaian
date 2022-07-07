
<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>
            {{ $data->pegawai->nama ?? '!not registered' }}
        </td>
    </tr>
    <tr>
        <th>Date</th>
        <td>
            {{ $data->tanggal }}
        </td>
    </tr>
    <tr>
        <th>In</th>
        <td>
            {{ $data->in }}
        </td>
    </tr>
    <tr>
        <th>Out</th>
        <td>
            {{ $data->out }}
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            {{ $data->status }}
        </td>
    </tr>
    <tr>
        <th>Remark</th>
        <td>
            {{ $data->keterangan ?? '-' }}
        </td>
    </tr>
</table>