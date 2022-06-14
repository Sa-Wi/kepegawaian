<?php

namespace App\Imports;

use App\Models\Absensi;
use App\Models\ImportAbsensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ImportAbsensi([
            //
        ]);
    }
}
