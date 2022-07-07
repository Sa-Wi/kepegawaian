
<table class="table table-bordered">
    <tr>
        <th>NIP</th>
        <td>
            {{ $data->id }}
        </td>
    </tr>
    <tr>
        <th>Nama</th>
        <td>
            {{ $data->nama }}
        </td>
    </tr>
    <tr>
        <th>Join Date</th>
        <td>
            {{ $data->join_date }}
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            {{ $data->status }}
        </td>
    </tr>
    <tr>
        <th>Position</th>
        <td>
            {{ $data->posisi->nama }}
        </td>
    </tr>
    {{-- <tr>
        <th>Shift In</th>
        <td>
            {{ $data->shift_in }}
        </td>
    </tr>
    <tr>
        <th>Shift Out</th>
        <td>
            {{ $data->shift_out }}
        </td>
    </tr> --}}
    <tr>
        <th>Email</th>
        <td>
            {{ $data->email }}
        </td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>
            {{ $data->phone }}
        </td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>
            {{ $data->tanggal_lahir }}
        </td>
    </tr>
    <tr>
        <th>Domicile Address</th>
        <td>
            {{ $data->alamat_domisili }}
        </td>
    </tr>
    <tr>
        <th>Current Address</th>
        <td>
            {{ $data->alamat_sekarang }}
        </td>
    </tr>
    <tr>
        <th>Nasionality</th>
        <td>
            {{ $data->kewarganegaraan }}
        </td>
    </tr>
    <tr>
        <th>Indetity ID</th>
        <td>
            {{ $data->ktp }}
        </td>
    </tr>
    <tr>
        <th>NPWP</th>
        <td>
            {{ $data->npwp }}
        </td>
    </tr>
    <tr>
        <th>Bank Account</th>
        <td>
            {{ $data->akun_bank }}
        </td>
    </tr>
    <tr>
        <th>Emergency Contact</th>
        <td>
            {{ $data->nama_kontak_darurat }}
        </td>
    </tr>
    <tr>
        <th>Relationship</th>
        <td>
            {{ $data->relasi_kontak_darurat }}
        </td>
    </tr>
    <tr>
        <th>Emergency Contact Number</th>
        <td>
            {{ $data->phone_kontak_darurat }}
        </td>
    </tr>
    <tr>
        <th>Remark</th>
        <td>
            {{ $data->remark ?? '-' }}
        </td>
    </tr>
</table>