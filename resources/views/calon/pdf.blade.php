<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>PDF</title>
</head>

<body>
    <header>
        <div class="container">
            <table border="0" class="mx-auto">
                <tr>
                    <td rowspan="4">
                        <img src="{{ asset('img/logo_BVR_vertical.webp') }}" style="height: 100px;" class="mx-3"
                            alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>BVR Group Asia</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        Jl. Sunset Road, Gang Meduri No 5, Seminyak, Kuta - Bali
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 12px">+62 361 934-8918 info@bvrgroupasia.com www.bvrgroupasia.com</p>
                    </td>
                </tr>

            </table>
        </div>
    </header>
    <hr>
    <!-- form -->
    <div class="card">
        <div class="card-header bg-primary text-white"></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <th>KTP</th>
                    <td>{{ $data->ktp }}</td>
                </tr>
                <tr>
                    <th>Place, Date of Birth</th>
                    <td>{{ $data->tmp_lahir }}, {{ $data->tgl_lahir }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        @if ($data->jenis__kelamin == true)
                            Male <i class="fa fa-mars" aria-hidden="true"></i>
                        @else
                            Female <i class="fa fa-venus" aria-hidden="true"></i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Marital Status </th>
                    <td>{{ $data->status_menikah }}</td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>{{ $data->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <th>Religion</th>
                    <td>{{ $data->agama }}</td>
                </tr>
                <tr>
                    <th>Dimicile Address</th>
                    <td>{{ $data->alamat_domisili }}</td>
                </tr>
                <tr>
                    <th>Present Address</th>
                    <td>{{ $data->alamat_sekarang }}</td>
                </tr>
                <tr>
                    <th>Height</th>
                    <td>{{ $data->tinggi_badan }} cm</td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td>{{ $data->berat_badan }} kg</td>
                </tr>
                <tr>
                    <th>Present Health Condition</th>
                    <td>{{ $data->kondisi_kesehatan }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $data->telepon }}</td>
                </tr>
                <tr>
                    <th>Facebook</th>
                    <td>{{ $data->fb }}</td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>{{ $data->ig }}</td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td>{{ $data->linkedin }}</td>
                </tr>

                <tr>
                    <th class="mb-3">Formal Education</th>
                    <td>
                        <div class="accordion" id="accordionExample">
                            @forelse($data->pendidikans->where('jenis_pendidikan','formal') as $formal)
                                <div class="card my-1">
                                    <div class="card-header">
                                        {{ $formal->nama_instansi }}
                                    </div>
                                    <div class="card-body">
                                        {{ $formal->dari }} - {{ $formal->hingga }} <br>
                                        {{ $formal->jurusan }} <br>
                                        <hr>
                                        {{ $formal->keterangan }}
                                    </div>
                                </div>
                            @empty
                                -
                            @endforelse
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Other Education</th>
                    <td>
                        @forelse($data->pendidikans->where('jenis_pendidikan','course') as $course)
                            <div class="card my-1">
                                <div class="card-header">
                                    {{ $course->nama_instansi }}
                                </div>
                                <div class="card-body">
                                    {{ $course->dari }} - {{ $course->hingga }} <br>
                                    subject: {{ $course->jurusan }} <br>
                                    <hr>
                                    remark: {{ $course->keterangan ?? '-' }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>Language Proficiency</th>
                    <td>

                        @forelse($data->bahasas as $bahasa)
                            <div class="card my-1">
                                <div class="card-header">
                                    {{ $bahasa->bahasa }}
                                </div>
                                <div class="card-body">
                                    Oral : {{ $bahasa->lisan }}<br>
                                    Written : {{ $bahasa->tulis }} <br>
                                    <hr>
                                    remark: {{ $bahasa->keterangan ?? '-' }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse

                    </td>
                </tr>
                <tr>
                    <th>Working Experience</th>
                    <td>

                        @forelse($data->pengalaman__kerjas as $pengalaman)
                            <div class="card my-1">
                                <div class="card-header">
                                    {{ $pengalaman->nama_perusahaan }}
                                </div>

                                <div class="card-body">
                                    {{ $pengalaman->dari }} - {{ $pengalaman->hingga }}<br>
                                    Responsibility : {{ $pengalaman->tanggung_jawab }} <br>
                                    Salary : {{ $pengalaman->gaji }} <br>
                                    <hr>
                                    Reason of Resignation : <br>
                                    {{ $pengalaman->alasan_resign }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse

                    </td>
                </tr>
                <tr>
                    <th>Requested Salary</th>
                    <td>
                        Rp.{{ number_format($data->request_gaji) }}
                        @if ($data->status_nego_gaji == true)
                            (negotiable)
                        @else
                            (not negotiable)
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Expected Career to Follow</th>
                    <td>
                        {{ $data->jenjang_karir ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Family Data</th>
                    <td>
                        @forelse ($data->keluargas as $keluarga)
                            <div class="card my-1">
                                <div class="card-header">
                                    {{ $keluarga->hubungan }}
                                </div>

                                <div class="card-body">
                                    Name: {{ $keluarga->nama }} <br>
                                    Place/Date of Birth: {{ $keluarga->lahir }} <br>
                                    Occupation: {{ $keluarga->pekerjaan }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>Strength & Weakness</th>
                    <td>
                        {{-- <strong>Strength</strong>
                        <hr class="m-0">
                        {{ $data->strength ?? '-' }} <br><br>
                                <strong>Weakness</strong>
                                <hr class="m-0">
                                {{ $data->weakness ?? '-' }} --}}

                        <div class="card my-1">
                            <div class="card-header">
                                Strength
                            </div>

                            <div class="card-body">
                                {{ $data->strength ?? '-' }}
                            </div>
                        </div>
                        <div class="card my-1">
                            <div class="card-header">
                                Weakness
                            </div>

                            <div class="card-body">
                                {{ $data->weakness ?? '-' }}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Activities outside the job</th>
                    <td>{{ $data->aktivitas ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Hobby</th>
                    <td>{{ $data->hobi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Organization</th>
                    <td>
                        @forelse($data->organisasis as $organisasi)
                            <div class="card my-1">
                                <div class="card-header">
                                    {{ $organisasi->nama }}
                                </div>
                                <div class="card-body">
                                    Position: {{ $organisasi->posisi }}
                                    <hr>
                                    Remark: {{ $organisasi->keterangan ?? '-' }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>

                <tr>
                    <th>Scholarship</th>
                    <td>

                        @forelse($data->beasiswas as $scholar)
                            <div class="card">
                                <div class="card-header">
                                    {{ $scholar->nama_institusi }}
                                </div>

                                <div class="card-body">
                                    {{ $scholar->tempat }}
                                    <hr>
                                    {{ $scholar->keterangan }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse

                    </td>
                </tr>

                <tr>
                    <th>In process of recruitment in other company</th>
                    <td>
                        @forelse($data->rekrutment__lains as $recruitment)
                            <div class="card">
                                <div class="card-header">
                                    {{ $recruitment->perusahaan }}
                                </div>

                                <div class="card-body">
                                    {{ $recruitment->posisi }}
                                    <hr>
                                    {{ $recruitment->keterangan }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>

                <tr>
                    <th>Apply via</th>
                    <td>
                        {{ $data->apply_via ?? '-' }}
                        @if ($data->apply_via == 'Friend' || $data->apply_via == 'Family')
                            ( {{ $data->nama_teman }} )
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Relatives in BVR Group Asia</th>
                    <td>
                        @forelse($data->relatives as $relative)
                            <div class="card">
                                <div class="card-header">
                                    {{ $relative->nama }}
                                </div>

                                <div class="card-body">
                                    {{ $relative->hubungan }} <br>
                                    {{ $relative->departemen }}
                                    <hr>
                                    {{ $relative->keterangan }}
                                </div>
                            </div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th>Other Remark</th>
                    <td>
                        {{ $data->keterangan_lain ? $data->keterangan_lain : '-' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>









    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script> --}}

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
