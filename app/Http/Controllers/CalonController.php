<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Bahasa;
use App\Models\Keluarga;
use App\Models\Beasiswa;
use App\Models\Pengalaman_Kerja;
use App\Models\Pendidikan;
use App\Models\Organisasi;
use App\Models\Rekrutment_Lain;
use App\Models\Relative;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calons = Calon::all();

        return view('dashboard.calon', compact('calons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pendaftaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $dataCalon = $request->validate([
            'applyfor' => 'required|max:255',
            'name' => 'required|max:255',
            'dateofbirth' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'ktp' => 'required|numeric', //ini inget isi max digit !!!
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric'
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
        $calon->nama_kontak_darurat = $request->emergency_name;
        $calon->relasi_kontak_darurat = $request->emergency_relation;
        $calon->Phone_kontak_darurat = $request->emergency_phone;
        $calon->strength = $request->strength;
        $calon->weakness = $request->weakness;
        $calon->aktivitas = $request->activity;
        $calon->hobi = $request->hobby;
        $calon->apply_via = $request->apply_via;
        if ($request->mention_name) {
            $calon->nama_teman = $request->mention_name;
        }
        $calon->keterangan_lain = $request->other_remark;
        // $calon->status_data = 1;
        $calon->save();

        if ($request->education[1]['school_name']) {
            foreach ($request->education as $data) {
                // if ($data == 2) {
                // dd($data);
                //     # code...
                // }
                $pendidikan = new Pendidikan();
                $pendidikan->calon_id = $calon->id;
                $pendidikan->jenis_pendidikan = $data['jenis'];
                $pendidikan->nama_instansi = $data['school_name'];
                $pendidikan->dari = $data['from'];
                $pendidikan->hingga = $data['to'];
                $pendidikan->jurusan = $data['subject'];
                $pendidikan->keterangan = $data['remark'];
                $pendidikan->save();
            }
        }

        if ($request->course[1]['course_name']) {
            foreach ($request->course as $data) {
                // if ($data == 2) {
                // dd($data);
                //     # code...
                // }
                $pendidikan = new Pendidikan();
                $pendidikan->calon_id = $calon->id;
                $pendidikan->jenis_pendidikan = $data['jenis'];
                $pendidikan->nama_instansi = $data['course_name'];
                $pendidikan->dari = $data['from'];
                $pendidikan->hingga = $data['to'];
                $pendidikan->jurusan = $data['subject'];
                $pendidikan->keterangan = $data['remark'];
                $pendidikan->save();
            }
        }

        if ($request->language[1]['language']) {
            foreach ($request->language as $data) {
                $bahasa = new Bahasa();
                $bahasa->calon_id = $calon->id;
                $bahasa->bahasa = $data['language'];
                $bahasa->lisan = $data['oral'];
                $bahasa->tulis = $data['written'];
                $bahasa->keterangan = $data['remark'];
                $bahasa->save();
            }
        }

        if ($request->experience[1]['company']) {
            foreach ($request->experience as $data) {
                $pengalaman = new Pengalaman_Kerja();
                $pengalaman->calon_id = $calon->id;
                $pengalaman->nama_perusahaan = $data['company'];
                $pengalaman->dari = $data['from'];
                $pengalaman->hingga = $data['to'];
                $pengalaman->tanggung_jawab = $data['responsibly'];
                $pengalaman->gaji = $data['salary'];
                $pengalaman->alasan_resign = $data['reason'];
                $pengalaman->save();
            }
        }

        if ($request->family[1]['relation']) {
            foreach ($request->family as $data) {
                $keluarga = new Keluarga();
                $keluarga->calon_id = $calon->id;
                $keluarga->hubungan = $data['relation'];
                $keluarga->nama = $data['name'];
                $keluarga->lahir = $data['birth'];
                $keluarga->pekerjaan = $data['occupation'];
                $keluarga->save();
            }
        }

        if ($request->organization[1]['name']) {
            foreach ($request->organization as $data) {
                $organisasi = new Organisasi();
                $organisasi->calon_id = $calon->id;
                $organisasi->nama = $data['name'];
                $organisasi->posisi = $data['position'];
                $organisasi->keterangan = $data['remark'];
                $organisasi->save();
            }
        }

        if ($request->scholarship[1]['institution']) {
            foreach ($request->scholarship as $data) {
                $beasiswa = new Beasiswa();
                $beasiswa->calon_id = $calon->id;
                $beasiswa->nama_institusi = $data['institution'];
                $beasiswa->tempat = $data['place'];
                $beasiswa->keterangan = $data['remark'];
                $beasiswa->save();
            }
        }

        if ($request->recruitment[1]['institution']) {
            foreach ($request->recruitment as $data) {
                $rekrutmen = new Rekrutment_Lain();
                $rekrutmen->calon_id = $calon->id;
                $rekrutmen->perusahaan = $data['institution'];
                $rekrutmen->posisi = $data['job_position'];
                $rekrutmen->keterangan = $data['remark'];
                $rekrutmen->save();
            }
        }

        if ($request->relatives[1]['name']) {
            foreach ($request->relatives as $data) {
                $relative = new Relative();
                $relative->calon_id = $calon->id;
                $relative->nama = $data['name'];
                $relative->hubungan = $data['relation'];
                $relative->departemen = $data['department'];
                $relative->save();
            }
        }
        return view('pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $recruitment)
    {
        return view('calon.show', ['data' => $recruitment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $recruitment)
    {
        return view('calon.edit', ['data' => $recruitment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $recruitment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $recruitment)
    {
    }
}
