<table class="mb-3 table-responsive">
    <tr>
        <th>
            NIP
        </th>
        <td>
            : {{ $data['nip'] }}
        </td>
    </tr>
    <tr>
        <th>
            Name
        </th>
        <td>
            : {{ $data['nama'] }}
        </td>
    </tr>
    <tr>
        <th>
            Date
        </th>
        <td>
            : {{ Carbon\Carbon::parse($date['from'])->format('d-m-Y') }} to
            {{ Carbon\Carbon::parse($date['to'])->format('d-m-Y') }}
        </td>
    </tr>
</table>
<table class="table table-bordered">
    @foreach ($data as $status => $jumlah)
        @if ($status == 'nama' || $status == 'nip')
            @continue
        @endif
        <tr>
            <th>{{ $status }}</th>
            <td>{{ $jumlah }}</td>
        </tr>
    @endforeach

    {{-- <tr>
        <th>Late</th>
        <td>{{ $data['Late'] }}</td>
    </tr>
    <tr>
        <th>Early</th>
        <td>{{ $data['Early'] }}</td>
    </tr>
    <tr>
        <th>Late Early</th>
        <td>{{ $data['Late Early'] }}</td>
    </tr>
    <tr>
        <th>Late Early</th>
        <td>{{ $data['Late Early'] }}</td>
    </tr> --}}
</table>
