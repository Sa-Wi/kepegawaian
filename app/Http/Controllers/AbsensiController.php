<?php

namespace App\Http\Controllers;

use App\Imports\AbsensiImport;
use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();
        return view('dashboard.absen_manage', [
            'absensis' => $absensi,
            'title' => 'Attendance',
        ]);
    }

    public function import(Request $request) // mengimport ke table ImportAbsensi dan mengambil datanya untuk dimasukan lagi ke dalama table Absensi
    {

        // dd($request);
        $imports = Excel::toCollection(new AbsensiImport, $request->file('import_absen'));

        $tanggal = '';
        foreach ($imports[0] as $import => $data) {
            //menentukan waktu in dan out
            // dd($data['nip']);
            if (Carbon::parse($data['tanggal_scan'])->toDateString() != $tanggal) {
                global $absensi;
                $absensi = new Absensi;
                $absensi->pegawai_id = $data['pin'];
                $absensi->tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                $absensi->in = Carbon::parse($data['tanggal_scan'])->toTimeString();
                $tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                $absensi->save();
            } elseif (Carbon::parse($data['tanggal_scan'])->toDateString() == $tanggal && $absensi->pegawai_id == $data['pin']) {
                $absensi->tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                $absensi->out = Carbon::parse($data['tanggal_scan'])->toTimeString();
                $absensi->save();
            }


            //menentukan status
            $status = '';
            // dd(Carbon::parse('17:23')->lessThan('17:30'));
            if (Carbon::parse($absensi->in)->greaterThan('9:00')) {
                $status = "Late";
                if (isset($absensi->out) && Carbon::parse($absensi->out)->lessThan('17:30'))
                    $status = $status . ' Early';
                elseif (!isset($absensi->out))
                    $status = $status . ' Only In';
            } elseif (isset($absensi->out) && Carbon::parse($absensi->out)->lessThan('17:30')) {
                $status = "Early";
                if (!isset($absensi->in))
                    $status = $status . ' Only Out';
            } elseif (!isset($absensi->in) && Carbon::parse($absensi->out)->greaterThanOrEqualTo('17:30')) {
                $status = 'Only Out';
            } elseif (!isset($absensi->out) && Carbon::parse($absensi->in)->lessThanOrEqualTo('9:00')) {
                $status = 'Only In';
            } elseif (Carbon::parse($absensi->in)->lessThanOrEqualTo('9:00') && Carbon::parse($absensi->out)->greaterThanOrEqualTo('17:30')) {
                $status = "OK";
            }

            $absensi->status = $status;
            $absensi->save();
        }
        // dd($imports);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        // dd($absensi);
        return view('absen.show', ['data' => $absensi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        return view('absen.edit', ['data' => $absensi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        // dd($request);
        $validatedData = $request->validate([
            'date' => 'required',
            'status' => 'required',
        ]);

        $absensi->update([
            'tanggal' => $validatedData['date'],
            'in' => $request->in,
            'out' => $request->out,
            'status' => $validatedData['status'],
            'keterangan' => $request->remark,
        ]);

        return redirect()->intended('attendance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->where('id', $absensi->id)->delete();
        return redirect()->intended('attendance')->with('success', 'Data deleted successfully');
    }

    //tampilan view trash
    public function trash()
    {
        $trashed = Absensi::onlyTrashed()->get();
        // dd($trashed);
        return view('trash.absensi', [
            'absensis' => $trashed,
            'title' => 'Deleted Attendance',
        ]);
    }

    // merestore data
    public function restore(Absensi $absensi)
    {
        $absensi->restore();
        return redirect('/trash/attendance');
    }
}
