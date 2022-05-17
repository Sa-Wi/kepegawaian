<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return  view('pendaftaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request);
        $dataCalon = $request->validate([
            'applyfor' => 'required',
            'name' => 'required',
            'dateofbirth' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'ktp' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $dataEducation = $request->validate([
            'education.*.jenis' => 'required',
            'education.*.school_name' => 'required'
        ]);

        $calon = new Calon();
        $calon->ktp = $dataCalon['ktp'];
        $calon->nama = $dataCalon['name'];
        $calon->posisi = $dataCalon['applyfor'];
        $calon->tgl_lahir = $dataCalon['dateofbirth'];
        $calon->tmp_lahir = $request->placeofbirth;
        $calon->jenis__kelamin = $dataCalon['sex'];
        $calon->status_menikah = $request->marital;
        $calon->kewarganegaraan = $request->nationality;
        $calon->agama = $dataCalon['religion'];
        $calon->alamat = $request->address;
        $calon->tinggi_badan = $request->tinggi_badan;
        $calon->berat_badan = $request->berat_badan;
        $calon->kondisi_kesehatan = $request->health;
        $calon->email = $dataCalon['email'];
        $calon->telepon = $dataCalon['phone'];
        $calon->fb = $request->facebook;
        $calon->ig = $request->instagram;
        $calon->linkedin = $request->linkedin;
        $calon->request_gaji = $request->salary;
        $calon->status_nego_gaji = $request->negotiable;
        $calon->jenjang_karir = $request->career;
        $calon->aktivitas = $request->activity;
        $calon->hobi = $request->hobby;
        $calon->apply_via = $request->apply_via;
        $calon->nama_teman = $request->activity;
        $calon->keterangan_lain = $request->other_remark;
        $calon->status_data = 1;
        $calon->save();

        dd($calon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $calon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        //
    }
}
