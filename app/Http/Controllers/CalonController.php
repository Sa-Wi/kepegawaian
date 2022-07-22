<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Calon;
use App\Models\Bahasa;
use App\Models\Keluarga;
use App\Models\Beasiswa;
use App\Models\Pengalaman_Kerja;
use App\Models\Pendidikan;
use App\Models\Organisasi;
use App\Models\Posisi;
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
        $calons = Calon::with('bahasas', 'beasiswas', 'keluargas', 'organisasis', 'pendidikans', 'pengalaman__kerjas', 'rekrutment__lains', 'relatives')->get();

        return view('dashboard.calon', compact('calons'), ['title' => 'Recruitment']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $posisi = Posisi::all();
        return view('pendaftaran', ['positions' => $posisi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posisi = Posisi::all();
        // return dd($request->all());
        $dataCalon = $request->validate([
            'applyfor' => 'required|max:255',
            'name' => 'required|max:255',
            'dateofbirth' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'ktp' => 'required|numeric', //ini inget isi max digit !!!
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric',
            'file' => 'file|mimes:rar'
        ]);

        if ($request->file) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $dataCalon['file'] = $request->file('file')->storeAs('berkas', $filenameSimpan);
        }

        $calon = new Calon();
        $calon->ktp = $dataCalon['ktp'];
        $calon->nama = $dataCalon['name'];
        $calon->posisi_id = $dataCalon['applyfor'];
        $calon->tgl_lahir = $dataCalon['dateofbirth'];
        $calon->tmp_lahir = $request->placeofbirth;
        $calon->jenis__kelamin = $dataCalon['sex'];
        $calon->status_menikah = $request->marital;
        $calon->kewarganegaraan = $request->nationality;
        $calon->agama = $dataCalon['religion'];
        $calon->alamat_domisili = $request->domicile;
        $calon->alamat_sekarang = $request->present_adrs;
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
        $calon->berkas = $filenameSimpan;
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
                $pengalaman->posisi = $data['position'];
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
        return view('pendaftaran', ['positions' => $posisi])->with('success',);
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
        $posisi = Posisi::all();
        // $recruitment = $recruitment->with('bahasas', 'beasiswas', 'keluargas', 'organisasis', 'pendidikans', 'pengalaman__kerjas', 'rekrutment__lains', 'relatives')->get();
        // "with" ada di model
        return view('calon.edit', [
            'positions' => $posisi,
            'data' => $recruitment
        ]);
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
        // dd($request);
        $dataValidate = $request->validate([
            'applyfor' => 'required|max:255',
            'name' => 'required|max:255',
            'dateofbirth' => 'required',
            'sex' => 'required',
            'religion' => 'required',
            'ktp' => 'required|numeric', //ini inget isi max digit !!!
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric'
        ]);


        $recruitment->ktp = $dataValidate['ktp'];
        $recruitment->nama = $dataValidate['name'];
        $recruitment->status = $request->status;
        $recruitment->posisi_id = $dataValidate['applyfor'];
        $recruitment->tgl_lahir = $dataValidate['dateofbirth'];
        $recruitment->tmp_lahir = $request->placeofbirth;
        $recruitment->jenis__kelamin = $dataValidate['sex'];
        $recruitment->status_menikah = $request->marital;
        $recruitment->kewarganegaraan = $request->nationality;
        $recruitment->agama = $dataValidate['religion'];
        $recruitment->alamat_domisili = $request->domicile;
        $recruitment->alamat_sekarang = $request->present_adrs;
        $recruitment->tinggi_badan = $request->tinggi_badan;
        $recruitment->berat_badan = $request->berat_badan;
        $recruitment->kondisi_kesehatan = $request->health;
        $recruitment->email = $dataValidate['email'];
        $recruitment->telepon = $dataValidate['phone'];
        $recruitment->fb = $request->facebook;
        $recruitment->ig = $request->instagram;
        $recruitment->linkedin = $request->linkedin;
        $recruitment->request_gaji = $request->salary;
        $recruitment->status_nego_gaji = $request->negotiable;
        $recruitment->jenjang_karir = $request->career;
        $recruitment->nama_kontak_darurat = $request->emergency_name;
        $recruitment->relasi_kontak_darurat = $request->emergency_relation;
        $recruitment->Phone_kontak_darurat = $request->emergency_phone;
        $recruitment->strength = $request->strength;
        $recruitment->weakness = $request->weakness;
        $recruitment->aktivitas = $request->activity;
        $recruitment->hobi = $request->hobby;
        $recruitment->apply_via = $request->apply_via;
        if ($request->mention_name) {
            $recruitment->nama_teman = $request->mention_name;
        }
        $recruitment->keterangan_lain = $request->other_remark;
        // $recruitment->status_data = 1;
        $recruitment->save();

        if ($request->education[1]['school_name']) {
            foreach ($request->education as $data) {
                $id = $data['id'] ?? '';
                // cek apakah data kosong
                if (!$data['school_name'] && !$data['from'] && !$data['to'] && !$data['subject'] && !$data['remark']) {
                    break;
                }

                Pendidikan::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'jenis_pendidikan' => $data['jenis'],
                    'nama_instansi' => $data['school_name'],
                    'dari' => $data['from'],
                    'hingga' => $data['to'],
                    'jurusan' => $data['subject'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->course[1]['course_name']) {
            foreach ($request->course as $data) {
                $id = $data['id'] ?? '';
                // cek apakah data kosong
                if (!$data['course_name'] && !$data['from'] && !$data['to'] && !$data['subject'] && !$data['remark']) {
                    break;
                }

                Pendidikan::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'jenis_pendidikan' => $data['jenis'],
                    'nama_instansi' => $data['course_name'],
                    'dari' => $data['from'],
                    'hingga' => $data['to'],
                    'jurusan' => $data['subject'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->language[1]['language']) {
            foreach ($request->language as $data) {
                $id = $data['id'] ?? '';
                Bahasa::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'bahasa' => $data['language'],
                    'lisan' => $data['oral'],
                    'tulis' => $data['written'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->experience[1]['company']) {
            foreach ($request->experience as $data) {

                $id = $data['id'] ?? '';
                Pengalaman_Kerja::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'nama_perusahaan' => $data['company'],
                    'posisi' => $data['position'],
                    'dari' => $data['from'],
                    'hingga' => $data['to'],
                    'tanggung_jawab' => $data['responsibly'],
                    'gaji' => $data['salary'],
                    'alasan_resign' => $data['reason'],
                ]);
            }
        }

        if ($request->family[1]['relation']) {
            foreach ($request->family as $data) {

                $id = $data['id'] ?? '';
                Keluarga::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'hubungan' => $data['relation'],
                    'nama' => $data['name'],
                    'lahir' => $data['birth'],
                    'pekerjaan' => $data['occupation'],
                ]);
            }
        }

        if ($request->organization[1]['name']) {
            foreach ($request->organization as $data) {

                $id = $data['id'] ?? '';
                Organisasi::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'nama' => $data['name'],
                    'posisi' => $data['position'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->scholarship[1]['institution']) {
            foreach ($request->scholarship as $data) {

                $id = $data['id'] ?? '';
                Beasiswa::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'nama_institusi' => $data['institution'],
                    'tempat' => $data['place'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->recruitment[1]['institution']) {
            foreach ($request->recruitment as $data) {
                $id = $data['id'] ?? '';
                Rekrutment_Lain::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'perusahaan' => $data['institution'],
                    'posisi' => $data['job_position'],
                    'keterangan' => $data['remark'],
                ]);
            }
        }

        if ($request->relatives[1]['name']) {
            foreach ($request->relatives as $data) {
                // $relative = new Relative();
                // $relative->calon_id = $calon->id;
                // $relative->nama = $data['name'];
                // $relative->hubungan = $data['relation'];
                // $relative->departemen = $data['department'];
                // $relative->save();

                $id = $data['id'] ?? '';
                Relative::updateOrCreate([
                    'id' => $id
                ], [
                    'calon_id' => $recruitment->id,
                    'nama' => $data['name'],
                    'hubungan' => $data['relation'],
                    'departemen' => $data['department'],
                ]);
            }
        }
        return redirect()->intended('recruitment')->with('success', 'Data ' . $recruitment->nama . ' Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calon  $calon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $recruitment)
    {
        // dd($pegawai);
        $recruitment->where('id', $recruitment->id)->delete();
        return redirect()->intended('recruitment')->with('success', 'Data ' . $recruitment->nama . ' Deleted Successfully');
    }

    //tampilan view trash
    public function trash()
    {
        $trashed = Calon::onlyTrashed()->get();
        // dd($trashed);
        return view('trash.calon', [
            'calons' => $trashed,
            'title' => 'Deleted Recruitment',
        ]);
    }

    // merestore data
    public function restore(Calon $calon)
    {
        $calon->restore();
        return redirect('/trash/recruitment')->with('success', $calon->nama . ' have been restored');
    }


    //menghapus data pada table tertentu pada view edit
    public function deleteEducation(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return back()->with('success', 'Data Education has been deleted');
    }
    public function deleteLanguage(Bahasa $bahasa)
    {
        $bahasa->delete();
        return back()->with('success', 'Data Language has been deleted');
    }
    public function deleteExperience(Pengalaman_Kerja $pengalaman)
    {
        $pengalaman->delete();
        return back()->with('success', 'Data Work Experience has been deleted');
    }
    public function deleteFamily(Keluarga $keluarga)
    {
        $keluarga->delete();
        return back()->with('success', 'Data Family has been deleted');
    }
    public function deleteOrganization(Organisasi $organisasi)
    {
        $organisasi->delete();
        return back()->with('success', 'Data Organization has been deleted');
    }
    public function deleteScholarship(Beasiswa $beasiswa)
    {
        $beasiswa->delete();
        return back()->with('success', 'Data Scholarship has been deleted');
    }
    public function deleteRecruitment(Rekrutment_Lain $rekrut)
    {
        $rekrut->delete();
        return back()->with('success', 'Data Other Recruitment has been deleted');
    }
    public function deleteRelative(Relative $relative)
    {
        $relative->delete();
        return back()->with('success', 'Data Relative has been deleted');
    }
}
