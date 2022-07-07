<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Posisi;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('dashboard.pegawai', [
            'pegawais' => $pegawai,
            'title' => 'Employee'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posisi = Posisi::all();
        return view('pegawai.index', [
            'positions' => $posisi,
            'title' => 'Add Employee'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nip' => 'required|numeric',
            'name' => 'required',

            'phone' => 'required|numeric',
            'office' => 'required',
            'join' => 'required',
            // 'shift_in' => 'required',
            // 'shift_out' => 'required',
            'tgl_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'domicile' => 'required',
            'current_adrs' => 'required',
            'ktp' => 'required',
            'npwp' => 'required',
            'akun_bank' => 'required',
            'email' => 'required|email:dns',
        ]);

        // dd($validatedData);

        $pegawai = new Pegawai;
        $pegawai->id = $validatedData['nip'];
        $pegawai->nama = $validatedData['name'];
        $pegawai->posisi_id = $request->posisi;
        $pegawai->phone = $validatedData['phone'];
        $pegawai->kantor = $validatedData['office'];
        $pegawai->status = $request->status;
        $pegawai->join_date = $validatedData['join'];
        // $pegawai->shift_in = $validatedData['shift_in'];
        // $pegawai->shift_out = $validatedData['shift_out'];
        $pegawai->tanggal_lahir = $validatedData['tgl_lahir'];
        $pegawai->kewarganegaraan = $validatedData['kewarganegaraan'];
        $pegawai->alamat_domisili = $validatedData['domicile'];
        $pegawai->alamat_sekarang = $validatedData['current_adrs'];
        $pegawai->ktp = $validatedData['ktp'];
        $pegawai->npwp = $validatedData['npwp'];
        $pegawai->akun_bank = $validatedData['akun_bank'];
        $pegawai->email = $validatedData['email'];
        $pegawai->nama_kontak_darurat = $request->emergency_name;
        $pegawai->relasi_kontak_darurat = $request->emergency_relasi;
        $pegawai->phone_kontak_darurat = $request->emergency_phone;
        $pegawai->remark = $request->remark;
        $pegawai->save();



        // Pegawai::created([
        //     'nip' => $validatedData['nip'],
        //     'nama' => $validatedData['name'],
        //     'posisi' => $validatedData['position'],
        //     'phone' => $validatedData['phone'],
        //     'alamat' => $validatedData['address'],
        //     'status_data' => 1
        // ]);
        // dd($pegawai);
        return redirect()->intended('employee')->with('success', $pegawai->nama . ' Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show', ['data' => $pegawai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $posisi = Posisi::all();
        return view('pegawai.edit', [
            'positions' => $posisi,
            'data' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'office' => 'required',
            'join' => 'required',
            // 'shift_in' => 'required',
            // 'shift_out' => 'required',
            'tgl_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'domicile' => 'required',
            'current_adrs' => 'required',
            'ktp' => 'required',
            'npwp' => 'required',
            'akun_bank' => 'required',
            'email' => 'required|email:dns',
        ]);

        // dd($validatedData);

        $pegawai->update([
            'nama' => $validatedData['name'],
            'join_date' => $validatedData['join'],
            'kantor' => $validatedData['office'],
            'status' => $request->status,
            'posisi_id' => $request->posisi,
            // 'shift_in' => $validatedData['shift_in'],
            // 'shift_out' => $validatedData['shift_out'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'tanggal_lahir' => $validatedData['tgl_lahir'],
            'alamat_domisili' => $validatedData['domicile'],
            'alamat_sekarang' => $validatedData['current_adrs'],
            'kewarganegaraan' => $validatedData['kewarganegaraan'],
            'ktp' => $validatedData['ktp'],
            'npwp' => $validatedData['npwp'],
            'akun_bank' => $validatedData['akun_bank'],
            'nama_kontak_darurat' => $request->emergency_name,
            'relasi_kontak_darurat' => $request->emergency_relasi,
            'phone_kontak_darurat' => $request->emergency_phone,
            'remark' => $request->remark,
        ]);

        // dd($pegawai->where('nip', $request->nip));
        return redirect()->intended('employee')->with('success', $pegawai->nama . ' Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        // dd($pegawai);
        $pegawai->where('id', $pegawai->id)->delete();
        return redirect()->intended('employee')->with('success', $pegawai->nama . ' have been Deleted');
    }
    //tampilan view trash
    public function trash()
    {
        $trashed = Pegawai::onlyTrashed()->get();
        // dd($trashed);
        return view('trash.pegawai', [
            'pegawais' => $trashed,
            'title' => 'Deleted Employee',
        ]);
    }

    // merestore data
    public function restore(Pegawai $pegawai)
    {
        $pegawai->restore();
        return redirect('/trash/attendance')->with('success', $pegawai->nama . ' have been restored');
    }
}
