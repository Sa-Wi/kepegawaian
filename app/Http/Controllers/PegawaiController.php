<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
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
        return view('dashboard.pegawai', ['pegawais' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|numeric',
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);
        // dd($validatedData);

        // Pegawai::created([
        //     'nip' => $validatedData['nip'],
        //     'nama' => $validatedData['name'],
        //     'posisi' => $validatedData['position'],
        //     'phone' => $validatedData['phone'],
        //     'alamat' => $validatedData['address'],
        //     'status_data' => 1
        // ]);

        $pegawai = new Pegawai;
        $pegawai->id = $validatedData['nip'];
        $pegawai->nama = $validatedData['name'];
        $pegawai->posisi = $validatedData['position'];
        $pegawai->phone = $validatedData['phone'];
        $pegawai->alamat = $validatedData['address'];
        $pegawai->save();
        // dd($pegawai);
        return redirect()->intended('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', ['data' => $pegawai]);
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
            // 'nip' => 'required',
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // dd($validatedData);

        $pegawai->update([
            'nama' => $validatedData['name'],
            'posisi' => $validatedData['position'],
            'phone' => $validatedData['phone'],
            'alamat' => $validatedData['address'],
        ]);

        // dd($pegawai->where('nip', $request->nip));

        return redirect()->intended('employee');
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
        return redirect()->intended('employee');
    }
}
