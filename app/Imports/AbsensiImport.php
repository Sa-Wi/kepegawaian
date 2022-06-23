<?php

namespace App\Imports;

use App\Models\ImportAbsensi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new ImportAbsensi([
            'nip' => $row['nip'],
            'tgl_scan' => Carbon::parse($row['tanggal_scan'])->toDateTimeString(),
        ]);
    }
}
