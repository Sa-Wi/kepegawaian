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
        $absensi = Absensi::latest()->get();
        return view('dashboard.absen_manage', [
            'absensis' => $absensi,
            'title' => 'Attendance',
        ]);
    }

    public function import(Request $request) // mengimport ke table ImportAbsensi dan mengambil datanya untuk dimasukan lagi ke dalama table Absensi
    {
        $validatedData = $request->validate([
            'import_absen' => 'file|mimes:xlsx'
        ]);

        // dd($request);
        $imports = Excel::toCollection(new AbsensiImport, $request->file('import_absen'));
        // dd($imports);

        // dd($imports[0][0]['pin']);
        if (!isset($imports[0][0]['pin']) || !isset($imports[0][0]['tanggal_scan'])) {
            return redirect()->intended('attendance')->with('error', 'Import Failed, please make sure the file you input is an excel file and there are fields "pin" and "tanggal scan"');
        }

        $tanggal = '';
        foreach ($imports[0] as $import => $data) {
            //menentukan waktu in dan out
            // dd($data['pin']);
            if (Carbon::parse($data['tanggal_scan'])->toDateString() != $tanggal) {
                global $absensi;
                $absensi = new Absensi;
                $absensi->pegawai_id = $data['pin'];
                $absensi->tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                if (Carbon::parse($data['tanggal_scan'])->toTimeString() < '12:00') {
                    $absensi->in = Carbon::parse($data['tanggal_scan'])->toTimeString();
                } else {
                    $absensi->out = Carbon::parse($data['tanggal_scan'])->toTimeString();
                }
                $tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                $absensi->save();
            } elseif (Carbon::parse($data['tanggal_scan'])->toDateString() == $tanggal && $absensi->pegawai_id == $data['pin']) {
                $absensi->tanggal = Carbon::parse($data['tanggal_scan'])->toDateString();
                $absensi->out = Carbon::parse($data['tanggal_scan'])->toTimeString();
                $absensi->save();
            }


            //menentukan status
            $status = '';

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
            // dd($pegawai);
            // if ($pegawai) {
            //     if (Carbon::parse($absensi->in)->greaterThan('10:00:00')) {
            //         $status = "Late";
            //         if (isset($absensi->out) && Carbon::parse($absensi->out)->lessThan('17:30'))
            //             $status = $status . ' Early';
            //         elseif (!isset($absensi->out))
            //             $status = $status . ' Only In';
            //     } elseif (isset($absensi->out) && Carbon::parse($absensi->out)->lessThan('17:30')) {
            //         $status = "Early";
            //         if (!isset($absensi->in))
            //             $status = $status . ' Only Out';
            //     } elseif (!isset($absensi->in) && Carbon::parse($absensi->out)->greaterThanOrEqualTo('17:30')) {
            //         $status = 'Only Out';
            //     } elseif (!isset($absensi->out) && Carbon::parse($absensi->in)->lessThanOrEqualTo('10:00:00')) {
            //         $status = 'Only In';
            //     } elseif (Carbon::parse($absensi->in)->lessThanOrEqualTo('10:00:00') && Carbon::parse($absensi->out)->greaterThanOrEqualTo('17:30')) {
            //         $status = "OK";
            //     }
            // }


            $absensi->status = $status;
            $absensi->save();
        }
        // dd($imports);
        return redirect()->intended('attendance')->with('success', 'All Data Imported Successfully');
    }

    public function add(Pegawai $pegawai)
    {
        return view('absen.index', ['data' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('dashboard.add_absen', compact('pegawais'), ['title' => 'Add Attendance']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pegawai $pegawai)
    {
        // dd($request->all())
        $validatedData = $request->validate([
            'date' => 'required|date',
        ]);

        $status = $request->status ?? '';

        if (!$status) {
            if (Carbon::parse($request->in)->greaterThan('9:00')) {
                $status = "Late";
                if (isset($request->out) && Carbon::parse($request->out)->lessThan('17:30'))
                    $status = $status . ' Early';
                elseif (!isset($request->out))
                    $status = $status . ' Only In';
            } elseif (isset($request->out) && Carbon::parse($request->out)->lessThan('17:30')) {
                $status = "Early";
                if (!isset($request->in))
                    $status = $status . ' Only Out';
            } elseif (!isset($request->in) && Carbon::parse($request->out)->greaterThanOrEqualTo('17:30')) {
                $status = 'Only Out';
            } elseif (!isset($request->out) && Carbon::parse($request->in)->lessThanOrEqualTo('9:00')) {
                $status = 'Only In';
            } elseif (Carbon::parse($request->in)->lessThanOrEqualTo('9:00') && Carbon::parse($request->out)->greaterThanOrEqualTo('17:30')) {
                $status = "OK";
            }
        }


        $absensi = Absensi::create([
            'pegawai_id' => $pegawai->id,
            'tanggal' => $validatedData['date'],
            'in' => $request->in,
            'out' => $request->out,
            'status' => $status,
            'keterangan' => $request->remark,
        ]);

        return redirect()->intended('attendance')->with('success', 'Attendance for ' . $pegawai->id . ' added successfully');
    }

    public function dateFilter(Request $request)
    {
        // dd($request->all());
        $from = $request->from;
        $to = $request->to;
        $absensis = Absensi::whereBetween('tanggal', [$from, $to])->latest()->get();
        return view('dashboard.absen_manage', compact('absensis'), [
            'from' => $from,
            'to' => $to,
            'title' => 'Attendance'
        ]);
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

        return redirect()->intended('attendance')->with('success', 'Data Edited Successfully');
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
        return redirect('/trash/attendance')->with('success', 'Data ID ' . $absensi->pegawai->id . ' has been restored');
    }
}
