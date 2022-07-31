<?php

namespace App\Imports;

use App\Models\Pegawai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dd($row);
        return new Pegawai([
            'id' => $row['id'],
            'nama' => $row['name'],
            'kantor' => $row['company'],
            'status' => $row['status'],
            'kewarganegaraan' => 'Indonesia',
            'join_date' => Carbon::parse($row['join_date']),
            'tanggal_lahir' => Carbon::parse($row['dob']),
            'phone' => $row['telephone'],
        ]);
    }
}
