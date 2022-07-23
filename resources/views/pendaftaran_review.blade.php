<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Application Form</title>
</head>

<body>
    <div class="container mb-3">
        <ul class="navbar-nav ">

        </ul>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="https://bvrgroupasia.com/">BVR Group Asia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fixed">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="https://bvrgroupasia.com/"
                                target="_blank">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="https://bvrgroupasia.com/our-projects/"
                                target="_blank">Our Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="https://bvrgroupasia.com/about-us/"
                                target="_blank">About Us</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>



        <!-- form -->
        <div class="container px-5 mb-5" style="position: relative; margin-top: 100px;">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-primary text-white">Your Data</div>
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
                            <th>Formal Education</th>
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
                            <th>File</th>
                            <td>
                                <a href="{{ asset('storage/berkas/' . $data->berkas) }}"><i class="fa fa-file"
                                        aria-hidden="true"></i> {{ $data->berkas }}</a>
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


        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a class="text-decoration-none text-warning"
                            href="https://www.facebook.com/satria.wiguna.1660/" target="_blank">SaWi</a> 2022</span>
                </div>
            </div>
        </footer>

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
    <script type="text/javascript">
        //tambah form education
        var countEducation = 2;
        $("#add_button_education").click(function() {
            $("#formal_education").append(
                `<div class="row education_remove text-center rounded py-1 bg-secondary bg-opacity-10"><input type="text" hidden name="education[${countEducation}][jenis]" value="formal"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="school_name" name="education[${countEducation}][school_name]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="from" name="education[${countEducation}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="to" name="education[${countEducation}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="subject" name="education[${countEducation}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="education[${countEducation}][remark]" class="form-control" style="height: 40px ;" id="remark-education"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger remove-input-field">Delete</button></div></div>`
            );
            ++countEducation;
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.education_remove').remove();
            --countEducation;
        });

        //tambah form other education
        var countCourse = 2;
        $("#add_button_course").click(function() {
            $("#other_education").append(
                `<div class="row course_remove text-center rounded py-1 bg-secondary bg-opacity-10"><input type="text" hidden name="course[${countCourse}][jenis]" value="course"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_name" name="course[${countCourse}][course_name]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_from" name="course[${countCourse}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_to" name="course[${countCourse}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_subject" name="course[${countCourse}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="course[${countCourse}][remark]" class="form-control" style="height: 40px ;" id="course_remark"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger remove-input-field-course">Delete</button></div></div></div>`
            );
            ++countCourse;
        });
        $(document).on('click', '.remove-input-field-course', function() {
            $(this).parents('.course_remove').remove();
            --countCourse;
        });

        //tambah form Work experience
        var countExp = 2;
        $("#add_button_experience").click(function() {
            var form = `<div class="row text-center experience_remove rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-2 mb-1">
                                
                                <input type="text" class="form-control" id="company_name" name="experience[${countExp}][company]" required>
                            </div>
                            <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" id="company_position" name="experience[${countExp}][company]">
                                </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input type="number" class="form-control" id="experience_from" name="experience[${countExp}][from]">
                            </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input type="number" class="form-control" id="experiemce_to" name="experience[${countExp}][to]">
                            </div>
                            <div class="col-lg-2 mb-1">
                            
                                <textarea type="text" style="height: 40px ;" class="form-control" id="experience_responsibly" name="experience[${countExp}][responsibly]"></textarea>
                            </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input type="text" class="form-control" id="company_salary" name="experience[${countExp}][salary]">
                            </div>
                    
                            <div class="col-lg-2 mb-1">
                               
                                <textarea name="experience[${countExp}][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-experience">Delete</button></div>
                        </div>`
            $("#experience_form").append(form);
            ++countExp;
        });
        $(document).on('click', '.remove-input-field-experience', function() {
            $(this).parents('.experience_remove').remove();
            --countExp;
        });

        //tambah form languages
        var countLanguage = 2;
        $("#add_button_language").click(function() {
            var form = `<div class="row text-center language_remove rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="course_name" required name="language[${countLanguage}][language]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" list="listOral" id="oral" name="language[${countLanguage}][oral]">
                                    <datalist id="listOral" name="language[${countLanguage}][oral]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" list="listWritten" id="written" name="language[${countLanguage}][written]">
                                    <datalist id="listWritten" name="language[${countLanguage}][written]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                            <div class="col-lg-4 mb-1">
                                
                                <textarea name="language[${countLanguage}][remark]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-language">Delete</button></div>
                        </div>`
            $("#language_form").append(form);
            ++countLanguage;
        });
        $(document).on('click', '.remove-input-field-language', function() {
            $(this).parents('.language_remove').remove();
            --countLanguage;
        });

        //tambah form family
        var countFamily = 2;
        $("#add_button_family").click(function() {
            var form = `<div class="row family_remove text-center rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-2 mb-1">
                                
                                <input name="family[${countFamily}][relation]" required class="form-control" list="relationlist" id="relation">
                                <datalist id="relationlist" name="family[${countFamily}][relation]">
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother/Sister">Brother/Sister</option>
                                    <option value="Wife/Husband">Wife/Husband</option>
                                    <option value="Children">Children</option>

                                </datalist>
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="family_name" name="family[${countFamily}][name]">
                            </div>
                            <div class=" col-lg-3 mb-1">
                               
                                <input type="text" class="form-control" id="birth" name="family[${countFamily}][birth]">
                            </div>
                            <div class=" col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="occupation" name="family[${countFamily}][occupation]">
                            </div>
                             <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-family">Delete</button></div>
                        </div>`
            $("#family_form").append(form);
            ++countFamily;
        });
        $(document).on('click', '.remove-input-field-family', function() {
            $(this).parents('.family_remove').remove();
            --countFamily;
        });

        //tambah form oraganization
        var countOrganization = 2;
        $("#add_button_organization").click(function() {
            var form = `<div class="row organization_remove text-center rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" required id="organization_name" name="organization[${countOrganization}][name]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="experience_from" name="organization[${countOrganization}][position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea name="organization[${countOrganization}][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-organization">Delete</button></div>
                        
                        </div>`
            $("#organization_form").append(form);
            ++countOrganization;
        });
        $(document).on('click', '.remove-input-field-organization', function() {
            $(this).parents('.organization_remove').remove();
            --countOrganization;
        });

        //tambah form Scholar
        var countScholar = 2;
        $("#add_button_scholarship").click(function() {
            var form = `<div class="row scholarship_remove text-center rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" required id="institution_name" name="scholarship[${countScholar}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="institution_place" name="scholarship[${countScholar}][place]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea name="scholarship[${countScholar}][remark]" class="form-control" style="height: 40px ;" id="institution_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-scholarship">Delete</button></div>
                        </div>`
            $("#scholarship_form").append(form);
            ++countScholar;
        });
        $(document).on('click', '.remove-input-field-scholarship', function() {
            $(this).parents('.scholarship_remove').remove();
            --countScholar;
        });

        //tambah form Recruitment
        var countRecruitment = 2;
        $("#add_button_recruitment").click(function() {
            var form = `<div class="row recruitment_remove text-center rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-3 mb-1">
                               
                                <input type="text" class="form-control" required id="recruitment_name" name="recruitment[${countRecruitment}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                               
                                <input type="text" class="form-control" id="job_recruitment" name="recruitment[${countRecruitment}][job_position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                                
                                <textarea name="recruitment[${countRecruitment}][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-recruitment">Delete</button></div>
                        </div>`
            $("#recruitment_form").append(form);
            ++countRecruitment;
        });
        $(document).on('click', '.remove-input-field-recruitment', function() {
            $(this).parents('.recruitment_remove').remove();
            --countRecruitment;
        });

        //tambah form Recruitment
        var countRelative = 2;
        $("#add_button_relative").click(function() {
            var form = `<div class="row relative_remove text-center rounded py-1 bg-secondary bg-opacity-10">
                            <div class="col-lg-4 mb-1">
                                
                                <input type="text" class="form-control" required id="relative_name" name="relatives[${countRelative}][name]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="job_relatives" name="relatives[${countRelative}][relation]">
                            </div>
                            <div class="col-lg-4 mb-1">
                                
                                <input type="text" class="form-control" id="job_relatives" name="relatives[${countRelative}][department]">
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger remove-input-field-relative">Delete</button></div>
                        </div>`
            $("#relative_form").append(form);
            ++countRelative;
        });
        $(document).on('click', '.remove-input-field-relative', function() {
            $(this).parents('.relative_remove').remove();
            --countRelative;
        });
    </script>

</body>

</html>
