<table class="table table-bordered">
  <tr>
    <th>Status</th>
    <td>{{ $data->status ?? 'Not Inputed yet' }}</td>
  </tr>
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
    <th>Formal Education</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->pendidikans->where('jenis_pendidikan','formal') as $formal)
        <div class="card">
          <div class="card-header" id="heading{{ $formal->id }}formal">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $formal->id }}formal" aria-expanded="true" aria-controls="collapse{{ $formal->id }}formal">
                {{ $formal->nama_instansi }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $formal->id }}formal" class="collapse" aria-labelledby="heading{{ $formal->id }}formal" data-parent="#accordionExample">
            <div class="card-body">
              {{ $formal->dari }} - {{ $formal->hingga }} <br>
              {{ $formal->jurusan }} <br>
              <hr>
              {{ $formal->keterangan }}
            </div>
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
      <div class="accordion" id="accordionExample">
        @forelse($data->pendidikans->where('jenis_pendidikan','course') as $course)
        <div class="card">
          <div class="card-header" id="heading{{ $course->id }}course">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $course->id }}course" aria-expanded="true" aria-controls="collapse{{ $course->id }}">
                {{ $course->nama_instansi }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $course->id }}course" class="collapse" aria-labelledby="heading{{ $course->id }}course" data-parent="#accordionExample">
            <div class="card-body">
              {{ $course->dari }} - {{ $course->hingga }} <br>
              {{ $course->jurusan }} <br>
              <hr>
              {{ $course->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>
  <tr>
    <th>Language Proficiency</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->bahasas as $bahasa)
        <div class="card">
          <div class="card-header" id="heading{{ $bahasa->id }}bahasa">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $bahasa->id }}bahasa" aria-expanded="true" aria-controls="collapse{{ $bahasa->id }}bahasa">
                {{ $bahasa->bahasa }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $bahasa->id }}bahasa" class="collapse" aria-labelledby="heading{{ $bahasa->id }}bahasa" data-parent="#accordionExample">
            <div class="card-body">
              Oral : {{ $bahasa->lisan }}<br>
              Written : {{ $bahasa->tulis }} <br>
              <hr>
              {{ $bahasa->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>
  <tr>
    <th>Working Experience</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->pengalaman__kerjas as $pengalaman)
        <div class="card">
          <div class="card-header" id="heading{{ $pengalaman->id }}pengalaman">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $pengalaman->id }}pengalaman" aria-expanded="true" aria-controls="collapse{{ $pengalaman->id }}pengalaman">
                {{ $pengalaman->nama_perusahaan }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $pengalaman->id }}pengalaman" class="collapse" aria-labelledby="heading{{ $pengalaman->id }}pengalaman" data-parent="#accordionExample">
            <div class="card-body">
              {{ $pengalaman->dari }} - {{ $pengalaman->hingga }}<br>
              Responsibility : {{ $pengalaman->tanggung_jawab }} <br>
              Gaji : {{ $pengalaman->gaji }} <br>
              <hr>
              Reason of Resignation : <br>
              {{ $pengalaman->alasan_resign }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
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
      <strong>{{ $keluarga->hubungan }} </strong>
      <hr class="m-0">
      {{ $keluarga->nama }} <br>
      {{ $keluarga->lahir }} <br>
      {{ $keluarga->pekerjaan }} <br><br>
      @empty
      -
      @endforelse
    </td>
  </tr>
  <tr>
    <th>Strength & Weakness</th>
    <td>
      <strong>Strength</strong>
      <hr class="m-0">
      {{ $data->strength ?? '-'}} <br><br>
      <strong>Weakness</strong>
      <hr class="m-0">
      {{ $data->weakness ?? '-' }}
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
      <div class="accordion" id="accordionExample">
        @forelse($data->organisasis as $organisasi)
        <div class="card">
          <div class="card-header" id="heading{{ $organisasi->id }}organisasi">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $organisasi->id }}organisasi" aria-expanded="true" aria-controls="collapse{{ $organisasi->id }}organisasi">
                {{ $organisasi->nama }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $organisasi->id }}organisasi" class="collapse" aria-labelledby="heading{{ $organisasi->id }}organisasi" data-parent="#accordionExample">
            <div class="card-body">
              {{ $organisasi->posisi }}
              <hr>
              {{ $organisasi->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>

  <tr>
    <th>Scholarship</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->beasiswas as $scholar)
        <div class="card">
          <div class="card-header" id="heading{{ $scholar->id }}scholar">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $scholar->id }}scholar" aria-expanded="true" aria-controls="collapse{{ $scholar->id }}scholar">
                {{ $scholar->nama_institusi }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $scholar->id }}scholar" class="collapse" aria-labelledby="heading{{ $scholar->id }}scholar" data-parent="#accordionExample">
            <div class="card-body">
              {{ $scholar->tempat }}
              <hr>
              {{ $scholar->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>

  <tr>
    <th>In process of recruitment in other company</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->rekrutment__lains as $recruitment)
        <div class="card">
          <div class="card-header" id="heading{{ $recruitment->id }}recruitment">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $recruitment->id }}recruitment" aria-expanded="true" aria-controls="collapse{{ $recruitment->id }}recruitment">
                {{ $recruitment->perusahaan }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $recruitment->id }}recruitment" class="collapse" aria-labelledby="heading{{ $recruitment->id }}recruitment" data-parent="#accordionExample">
            <div class="card-body">
              {{ $recruitment->posisi }}
              <hr>
              {{ $recruitment->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>

  <tr>
    <th>Apply via</th>
    <td>
      {{ $data->apply_via ?? '-' }}
      @if ($data->apply_via == 'Friend' ||$data->apply_via == 'Family')
      ( {{ $data->nama_teman }} )
      @endif
    </td>
  </tr>

  <tr>
    <th>Relatives in BVR Group Asia</th>
    <td>
      <div class="accordion" id="accordionExample">
        @forelse($data->relatives as $relative)
        <div class="card">
          <div class="card-header" id="heading{{ $relative->id }}relative">
            <h2 class="mb-0">
              <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $relative->id }}relative" aria-expanded="true" aria-controls="collapse{{ $relative->id }}relative">
                {{ $relative->nama }}
              </button>
            </h2>
          </div>

          <div id="collapse{{ $relative->id }}relative" class="collapse" aria-labelledby="heading{{ $relative->id }}relative" data-parent="#accordionExample">
            <div class="card-body">
              {{ $relative->hubungan }} <br>
              {{ $relative->departemen }}
              <hr>
              {{ $relative->keterangan }}
            </div>
          </div>
        </div>
        @empty
        -
        @endforelse
      </div>
    </td>
  </tr>
  <tr>
    <th>Other Remark</th>
    <td>
      {{ $data->keterangan_lain ? $data->keterangan_lain : '-' }}
    </td>
  </tr>
</table>