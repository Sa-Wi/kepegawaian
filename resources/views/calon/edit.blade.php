<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- css --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- font awesome --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <title>Application Form</title>
</head>

<body>
    <div class="container mb-3">
        <ul class="navbar-nav ">

        </ul>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('recruitment.index') }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>



        <!-- form -->
        <div class="container px-5 mb-5" style="position: relative; margin-top: 100px;">
            <h1 class="mb-5">Application Form Data : {{ $data->nama }}</h1>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" id="mainForm" action="{{ route('recruitment.update', $data->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="applyfor" class="form-label">Application for position of</label>
                            <select class="form-select" id="applyfor" name="applyfor" aria-label="Default select example">
                                
                                @foreach ($positions as $posisi)
                                    <option {{ $data->posisi->id == $posisi->id ? 'selected' : ' ' }} value="{{ $posisi->id }}">{{ $posisi->nama }}</option>
                                @endforeach
                                <option value="">Other</option>
                            </select>
                            @error('posisi')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name' , $data->nama) }}" required>
                            @error('name')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="" {{ $data->status ? '' : 'selected' }} disabled>Select Status</option>
                                <option value="Contacting" {{ $data->status == 'Contacting' }}>Contacting</option>
                                <option value="Interview" {{ $data->status == 'Interview' }}>Interview</option>
                                <option value="LOI" {{ $data->status == 'LOI' }}>LOI</option>
                                <option value="Hired" {{ $data->status == 'Hired' }}>Hired</option>
                                <option value="Rejected" {{ $data->status == 'Rejected' }}>Rejected</option>
                            </select>
                            @error('name')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label for="dateofbirth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth' , $data->tgl_lahir) }}" required >
                            @error('dateofbirth')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-8">
                            <label for="placeofbirth" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="placeofbirth" required name="placeofbirth" value="{{ old('placeofbirth' , $data->tmp_lahir) }}">
                            @error('placeofbirth')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Sex</label><br>
                            <input class="form-check-input" type="radio" name="sex" id="sex1" value="1" {{ $data->jenis__kelamin == 1 ? 'checked' : '' }} required>
                            <label for="sex1" class="form-label">Male</label>
                            <input class="form-check-input" type="radio" name="sex" id="sex0" value="0" {{ $data->jenis__kelamin == 0 ? 'checked' : '' }} required>
                            <label for="sex0" class="form-label">Female</label>
                        </div>
                        <div class="col-md-12">
                            <label for="marital" class="form-label">Marital Status</label>
                            <input type="text" class="form-control" id="marital" name="marital" value="{{ old('marital' , $data->status_menikah) }}" required>
                            @error('marital')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                
                        <div class="col-md-12">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" required name="nationality" value="{{ old('nastionality' , $data->kewarganegaraan) }}">
                            @error('nastionality')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- fungsi other  -->
                        <script type="text/javascript">
                            function CheckReligion(val) {
                                var element = document.getElementById('religion_other');
                                if (val == 'Other') {
                                    element.classList.remove("d-none");
                                    element.setAttribute("name", "religion");
                                } else {
                                    element.classList.add("d-none");
                                    element.removeAttribute("name");
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <label for="religion" class="form-label">Religion</label>
                            <!-- <input type="text" class="form-control" id="religion" name="religion"> -->
                            <select class="form-select" id="religion" name="religion" aria-label="Default select example" required onchange='CheckReligion(this.value);'>
                                
                                <option {{ $data->agama == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                                <option {{ $data->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                <option {{ $data->agama == 'Protestantism' ? 'selected' : '' }} value="Protestantism">Protestantism</option>
                                <option {{ $data->agama == 'Catholicism' ? 'selected' : '' }} value="Catholicism">Catholicism</option>
                                <option {{ $data->agama == 'Hinduism' ? 'selected' : '' }} value="Hinduism">Hinduism</option>
                                <option {{ $data->agama == 'Buddhism' ? 'selected' : '' }} value="Buddhism">Buddhism</option>
                                <option {{ $data->agama == 'Confucianism' ? 'selected' : '' }} value="Confucianism">Confucianism</option>

                            </select>
                            <input type="text" id="religion_other" class="d-none form-control mt-2" value="{{ old('religion' , $data->agama) }}">
                            @error('religion')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="domicile" class="form-label">Domicile Address</label>
                            {{-- <input type="text" class="form-control" id="address" name="address"> --}}
                            <textarea name="domicile" id="domicile" required class="form-control">{{ old('domicile' , $data->alamat_domisili) }}</textarea>
                            @error('domicile')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="present_adrs" class="form-label">Present Address</label>
                            {{-- <input type="text" class="form-control" id="address" name="address"> --}}
                            <textarea name="present_adrs" id="present_adrs" required class="form-control">{{ old('present_adrs' , $data->alamat_sekarang) }}</textarea>
                            @error('present_adrs')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="ktp" class="form-label">Identify Card No (KTP)</label>
                            <input type="text" class="form-control" id="ktp" name="ktp" required value="{{ old('ktp' , $data->ktp) }}" >
                            @error('ktp')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="tinggi_badan" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan' , $data->tinggi_badan) }}">
                        </div>
                        <div class="col-md-2">
                            <label for="berat_badan" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{ old('berat_badan' , $data->berat_badan) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="health" class="form-label">Present Health Condition</label>
                            <input type="text" class="form-control" id="health" name="health" value="{{ old('health' , $data->kondisi_kesehatan) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email' , $data->email) }}">
                            @error('email')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" required value="{{ old('phone' , $data->telepon) }}">
                            @error('phone')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="facebook" class="form-label">Facebook (link / email)</label>
                            <input type="text" class="form-control" id="Facebook" name="facebook" value="{{ old('facebook' , $data->fb) }}">
                            @error('facebook')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram' , $data->ig) }}">
                            @error('instagram')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin' , $data->linkedin) }}">
                            @error('linkedin')
                                <div class="m-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-5">
                            <label for="formal_education" class="form-label">Formal Education</label>
                            <div class="row text-center rounded py-1 bg-light">
                                
                                <div class="col-lg-3">
                                    <label for="school_name" class="form-label">Name of School</label>
                                    
                                </div>
                                <div class="col-lg-1">
                                    <label for="from" class="form-label">From</label>
                                    
                                </div>
                                <div class="col-lg-1">
                                    <label for="to" class="form-label">To</label>
                                    
                                </div>
                                <div class="col-lg-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    
                                </div>
                                <div class="col-lg-3">
                                    <label for="remark_education" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->pendidikans->where('jenis_pendidikan', 'formal') as $education)
                                
                            <input type="text" hidden name="education[{{ $loop->iteration }}][id]" value="{{ $education->id }}">
                            <input type="text" hidden name="education[{{ $loop->iteration }}][jenis]" value="formal">
                            <div class="row text-center rounded py-1 bg-light">
                                <input type="text" hidden name="education[1][jenis]" value="formal">
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="school_name" name="education[{{ $loop->iteration }}][school_name]" value="{{ ($education->nama_instansi) }}">
                                    @error('education.1.school_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-1 mb-1">
                                    
                                    <input type="number" class="form-control" id="from" name="education[{{ $loop->iteration }}][from] " value="{{ $education->dari }}">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    
                                    <input type="number" class="form-control" id="to" name="education[{{ $loop->iteration }}][to]" value="{{ $education->hingga }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="subject" name="education[{{ $loop->iteration }}][subject]" value="{{ $education->jurusan }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    
                                    <textarea name="education[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="remark-education">{{ $education->keterangan }}</textarea>
                                </div>

                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/education/{{ $education->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                                
                                {{-- <div class="col-lg-1 mb-1">
                                    <form class="d-inline" action="/recruitment/education/{{ $education->id }}/delete" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>   
                                </div> --}}
                            </div>
                            @empty
                            <div class="row text-center rounded py-1 bg-light" hidden>
                                <input type="text" hidden name="education[1][jenis]" value="formal">
                                <div class="col-lg-3 mb-1">
                                    <input type="text" class="form-control" id="school_name" name="education[1][school_name]">
                                    @error('education.1.school_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <input type="number" class="form-control" id="from" name="education[1][from]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <input type="number" class="form-control" id="to" name="education[1][to]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <input type="text" class="form-control" id="subject" name="education[1][subject]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <textarea name="education[1][remark]" class="form-control" style="height: 40px ;" id="remark-education"></textarea>
                                </div>
                            </div>
                            @endforelse
                            <div id="formal_education">

                            </div>

                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_education" title="Add Education">+ Add more</a>
                        </div>
                        <div class="col-md-12">
                            <label for="other_education" class="form-label">Other Education (Course etc.)</label>
                            
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    <label for="course_name" class="form-label">Name of Course</label>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="course_from" class="form-label">From</label>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="course_to" class="form-label">To</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="course_subject" class="form-label">Subject</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="course_remark" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->pendidikans->where('jenis_pendidikan', 'course') as $course)
                                <input type="text" hidden name="course[{{ $loop->iteration }}][id]" value="{{ $course->id }}">
                                <input type="text" hidden name="course[{{ $loop->iteration }}][jenis]" value="course">
                                <div class="row text-center rounded py-1 bg-light">
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="course_name" name="course[{{ $loop->iteration }}][course_name]" value="{{ $course->nama_instansi }}">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="course_from" name="course[{{ $loop->iteration }}][from]" value="{{ $course->dari }}">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="course_to" name="course[{{ $loop->iteration }}][to]" value="{{ $course->hingga }}">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="course_subject" name="course[{{ $loop->iteration }}][subject]" value="{{ $course->jurusan }}">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <textarea name="course[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="course_remark">{{ $course->keterangan }}</textarea>
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        <a href="/recruitment/education/{{ $course->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                    </div>
                                </div>
                            @empty
                                <input type="text" hidden name="course[1][jenis]" value="course">
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="course_name" name="course[1][course_name]">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="course_from" name="course[1][from]">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="course_to" name="course[1][to]">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="course_subject" name="course[1][subject]">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <textarea name="course[1][remark]" class="form-control" style="height: 40px ;" id="course_remark"></textarea>
                                    </div>
                                </div>
                            @endforelse
                            
                            <div id="other_education">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_course" title="Add Course">+ Add more</a>
                        </div>

                        <div class="col-md-12">
                            <label for="language" class="form-label">Language Proficiency</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    <label for="language" class="form-label">language</label>
                                
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="oral" class="form-label">Oral</label>
                                    
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="written" class="form-label">Written</label>
                                    
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <label for="language_remark" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->bahasas as $bahasa)
                                <div class="row text-center rounded py-1 bg-light">
                                    <input type="text" hidden name="language[{{ $loop->iteration }}][id]" value="{{ $bahasa->id }}">
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="language" name="language[{{ $loop->iteration }}][language]" value="{{ $bahasa->bahasa }}">
                                    </div>
                                    <div class="col-lg-2 mb-1">
                                    
                                        <input type="text" class="form-control" list="listOral" id="oral" name="language[{{ $loop->iteration }}][oral]" value="{{ $bahasa->lisan }}">
                                        <datalist id="listOral" name="language[1][oral]">
                                            <option value="Beginner">Beginner</option>
                                            <option value="Advance">Advance</option>
                                            <option value="Competent">Competent</option>
                                            <option value="Proficient">Proficient</option>
                                            <option value="Expert">Expert</option>
                                        </datalist>
                                    </div>
                                    <div class="col-lg-2 mb-1">
                                        
                                        <input type="text" class="form-control" list="listWritten" id="written" name="language[{{ $loop->iteration }}][written]" value="{{ $bahasa->tulis }}">
                                        <datalist id="listWritten" name="language[1][written]">
                                            <option value="Beginner">Beginner</option>
                                            <option value="Advance">Advance</option>
                                            <option value="Competent">Competent</option>
                                            <option value="Proficient">Proficient</option>
                                            <option value="Expert">Expert</option>
                                        </datalist>
                                    </div>
                                    <div class="col-lg-4 mb-1">
                                        
                                        <textarea name="language[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="language_remark">{{ $bahasa->keterangan }}</textarea>
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        <a href="/recruitment/language/{{ $bahasa->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                    </div>

                                </div>
                            @empty
                            <div class="row text-center rounded py-1 bg-light" hidden>
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="course_name" name="language[1][language]">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" list="listOral" id="oral" name="language[1][oral]">
                                    <datalist id="listOral" name="language[1][oral]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" list="listWritten" id="written" name="language[1][written]">
                                    <datalist id="listWritten" name="language[1][written]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-4 mb-1">
                                    
                                    <textarea name="language[1][remark]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                                </div>
                            </div>
                            @endforelse
                            
                            <div id="language_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_language" title="Add Language">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="experience" class="form-label">Working Experience</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-2 mb-1">
                                    <label for="company_name" class="form-label">Name of Company</label>
                                   
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="company_name" class="form-label">Position</label>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="experience_from" class="form-label">From</label>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="experience_to" class="form-label">To</label>
                                    
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="experience_responsibly" class="form-label">Main Responsibility</label>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="company_salary" class="form-label">Salary</label>
                                    
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="company_resign" class="form-label">Reason of Resignation</label>
                                    
                                </div>
                                {{-- <div class="col-lg-2 mb-1">
                                    <label for="language_remark" class="form-label">Remark</label>
                                    <textarea name="experience[1][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                                </div> --}}
                            </div>
                            @forelse ($data->pengalaman__kerjas as $exp)
                                <div class="row text-center rounded py-1 bg-light">
                                    <input type="text" hidden name="experience[{{ $loop->iteration }}][id]" value="{{ $exp->id }}">
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" id="company_name" name="experience[{{ $loop->iteration }}][company]" value="{{ $exp->nama_perusahaan }}">
                                </div>
                                <div class="col-lg-2 mb-1">
                                   
                                    <input type="text" class="form-control" id="company_position" name="experience[{{ $loop->iteration }}][position]" value="{{ $exp->posisi }}">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    
                                    <input type="number" class="form-control" id="experience_from" name="experience[{{ $loop->iteration }}][from]" value="{{ $exp->dari }}">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    
                                    <input type="number" class="form-control" id="experience_to" name="experience[{{ $loop->iteration }}][to]" value="{{ $exp->hingga }}">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <textarea type="text" style="height: 40px ;" class="form-control" id="experience_responsibly" name="experience[{{ $loop->iteration }}][responsibly]">{{ $exp->tanggung_jawab }}</textarea>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    
                                    <input type="text" class="form-control" id="company_salary" name="experience[{{ $loop->iteration }}][salary]" value="{{ $exp->gaji }}">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <textarea type="text" class="form-control" style="height: 40px ;" id="company_resign" name="experience[{{ $loop->iteration }}][reason]" >{{ $exp->alasan_resign }}</textarea>
                                </div>
                                {{-- <div class="col-lg-2 mb-1">
                                    <label for="language_remark" class="form-label">Remark</label>
                                    <textarea name="experience[1][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                                </div> --}}
                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/exp/{{ $exp->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                            </div>
                            @empty 
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                    <div class="col-lg-2 mb-1">
                                        
                                        <input type="text" class="form-control" id="company_name" name="experience[1][company]">
                                    </div>
                                    <div class="col-lg-2 mb-1">
                                        
                                        <input type="text" class="form-control" id="company_position" name="experience[1][position]">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="experience_from" name="experience[1][from]">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="number" class="form-control" id="experience_to" name="experience[1][to]">
                                    </div>
                                    <div class="col-lg-2 mb-1">
                                        
                                        <textarea type="text" style="height: 40px ;" class="form-control" id="experience_responsibly" name="experience[1][responsibly]"></textarea>
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        
                                        <input type="text" class="form-control" id="company_salary" name="experience[1][salary]">
                                    </div>
                                    <div class="col-lg-2 mb-1">
                                        
                                        <textarea type="text" class="form-control" style="height: 40px ;" id="company_resign" name="experience[1][reason]"></textarea>
                                    </div>
                                    {{-- <div class="col-lg-2 mb-1">
                                        <label for="language_remark" class="form-label">Remark</label>
                                        <textarea name="experience[1][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                                    </div> --}}
                                </div>
                            @endforelse
                            
                            <div id="experience_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_experience" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Requested Salary</label>
                            <input type="number" class="form-control form-floating" id="salary" name="salary" value="{{ old('salary', $data->request_gaji) }}">
                            <input class="form-check-input" type="radio" name="negotiable" id="negotiable" value="1" {{ $data->status_nego_gaji = 1 ? 'checked' : '' }}>
                            <label for="negotiable" class="form-label">Negotiable</label>
                            <input class="form-check-input ms-2" type="radio" name="negotiable" id="notnegotiable" value="0" {{ $data->status_nego_gaji = 0 ? 'checked' : '' }}>
                            <label for="notnegotiable" class="form-label">Not Negotiable</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="career">{{ old('career', $data->jenjang_karir) }}</textarea>
                                <label for="floatingTextarea">Give a brief description of the career you hope to follow</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Family Data</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-2 mb-1">
                                    <label for="relation" class="form-label">Relation</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="family_name" class="form-label">Name</label>
                                    
                                </div>
                                <div class=" col-lg-3 mb-1">
                                    <label for="birth" class="form-label">Place, Date of Birth/Age</label>
                                    
                                </div>
                                <div class=" col-lg-3 mb-1">
                                    <label for="occupation" class="form-label">Occupation/School</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->keluargas as $keluarga)
                            
                                <div class="row text-center rounded py-1 bg-light">
                                    <input type="text" hidden name="family[{{ $loop->iteration }}][id]" value="{{ $keluarga->id }}">
                                    <div class="col-lg-2 mb-1">
                                        
                                        <input name="family[{{ $loop->iteration }}][relation]" class="form-control" list="relationlist" id="relation" value="{{ $keluarga->hubungan }}">
                                        <datalist id="relationlist" name="family[1][relation]">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Brother/Sister">Brother/Sister</option>
                                            <option value="Wife/Husband">Wife/Husband</option>
                                            <option value="Children">Children</option>

                                        </datalist>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                    
                                        <input type="text" class="form-control" id="family_name" name="family[{{ $loop->iteration }}][name]" value="{{ $keluarga->nama }}">
                                    </div>
                                    <div class=" col-lg-3 mb-1">
                                    
                                        <input type="text" class="form-control" id="birth" name="family[{{ $loop->iteration }}][birth]" value="{{  $keluarga->lahir }}">
                                    </div>
                                    <div class=" col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="occupation" name="family[{{ $loop->iteration }}][occupation]" value="{{  $keluarga->pekerjaan }}">
                                    </div>
                                    <div class="col-lg-1 mb-1">
                                        <a href="/recruitment/family/{{ $keluarga->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                    </div>
                                </div>
                            @empty
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                    <div class="col-lg-2 mb-1">
                                        <input name="family[1][relation]" class="form-control" list="relationlist" id="relation">
                                        {{-- <datalist id="relationlist" name="family[1][relation]">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Brother/Sister">Brother/Sister</option>
                                            <option value="Wife/Husband">Wife/Husband</option>
                                            <option value="Children">Children</option>

                                        </datalist> --}}
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="family_name" name="family[1][name]">
                                    </div>
                                    <div class=" col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="birth" name="family[1][birth]">
                                    </div>
                                    <div class=" col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="occupation" name="family[1][occupation]">
                                    </div>
                                </div>
                            @endforelse
                            <div id="family_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_family" title="Add More">+ Add more</a>
                        </div>
                        <div class="col-md-12">
                            <label for="emergency_contact">Emergency Contact</label>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" name="emergency_name" class="form-control" id="emergency_name" placeholder="Name" value="{{ old('emergency_name', $data->nama_kontak_darurat) }}">
                                        <label for="emergency_name">Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" name="emergency_relation" list="relationlist" class="form-control" id="emergency_relation" placeholder="Relationship" value="{{ old('emergency_relation', $data->relasi_kontak_darurat) }}">
                                        <datalist id="relationlist" name="emergency_relation">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Brother/Sister">Brother/Sister</option>
                                            <option value="Wife/Husband">Wife/Husband</option>
                                            <option value="Children">Children</option>
                                            <option value="Friend">Friend</option>
                                        </datalist>
                                        <label for="emergency_relation">Relationship</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="number" name="emergency_phone" class="form-control" id="emergency_phone" placeholder="Phone Number" value="{{ old('emergency_phone', $data->Phone_kontak_darurat) }}">
                                        <label for="emergency_phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Strength & Weakness</label>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="strength">{{ old('strength', $data->strength) }}</textarea>
                                        <label for="floatingTextarea">Strength</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="weakness">{{ old('strength', $data->weakness) }}</textarea>
                                        <label for="floatingTextarea">Weakness</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label for="activity" class="form-label">Activities outside the job</label>
                            <input type="text" class="form-control" id="activity" name="activity" value="{{ old('activity', $data->aktivitas) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="hobby" class="form-label">Hobby</label>
                            <input type="text" class="form-control" id="hobby" name="hobby" value="{{ old('hobby', $data->hobi) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="organization" class="form-label">Organization</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    <label for="organization_name" class="form-label">Name of Organization</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="experience_from" class="form-label">position Held</label>
                                    
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="oraganization_remark" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->organisasis as $organisasi)
                            <input type="text" hidden name="organization[{{ $loop->iteration }}][id]" value="{{ $organisasi->id }}">
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="organization_name" name="organization[{{ $loop->iteration }}][name]" value="{{ $organisasi->nama }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="experience_from" name="organization[{{ $loop->iteration }}][position]" value="{{ $organisasi->posisi }}">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    
                                    <textarea name="organization[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark">{{ $organisasi->keterangan }}</textarea>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/organization/{{ $organisasi->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                            </div>
                            @empty
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="organization_name" name="organization[1][name]">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        
                                        <input type="text" class="form-control" id="experience_from" name="organization[1][position]">
                                    </div>
                                    <div class="col-lg-5 mb-1">
                                        
                                        <textarea name="organization[1][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark"></textarea>
                                    </div>
                                </div>
                            @endforelse
                            <div id="organization_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_organization" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="scholarship" class="form-label">Scholarship</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    <label for="institution_name" class="form-label">Institution</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="institution_place" class="form-label">Place</label>
                                    
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="institution_remark" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->beasiswas as $beasiswa)
                              <input type="text" hidden name="scholarship[{{ $loop->iteration }}][id]" value="{{ $beasiswa->id }}">
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="institution_name" name="scholarship[{{ $loop->iteration }}][institution]" value="{{ $beasiswa->nama_institusi }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="institution_place" name="scholarship[{{ $loop->iteration }}][place]" value="{{ $beasiswa->tempat }}">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    
                                    <textarea name="scholarship[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="institution_remark">{{ $beasiswa->keterangan }}</textarea>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/scholarship/{{ $beasiswa->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                            </div>
                            @empty
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                    <div class="col-lg-3 mb-1">
                                        <label for="institution_name" class="form-label">Institution</label>
                                        <input type="text" class="form-control" id="institution_name" name="scholarship[1][institution]">
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <label for="institution_place" class="form-label">Place</label>
                                        <input type="text" class="form-control" id="institution_place" name="scholarship[1][place]">
                                    </div>
                                    <div class="col-lg-5 mb-1">
                                        <label for="institution_remark" class="form-label">Remark</label>
                                        <textarea name="scholarship[1][remark]" class="form-control" style="height: 40px ;" id="institution_remark"></textarea>
                                    </div>
                                </div>
                            @endforelse
                            <div id="scholarship_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_scholarship" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="other_recruitment" class="form-label">In process of recruitment & selection in other company</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    <label for="recruitment_name" class="form-label">Company</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_recruitment" class="form-label">Job Position</label>
                                    
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="recruitment_remark" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->rekrutment__lains as $rekrut)
                            <input type="text" hidden name="recruitment[{{ $loop->iteration }}][id]" value="{{ $rekrut->id }}">
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="recruitment_name" name="recruitment[{{ $loop->iteration }}][institution]" value="{{ $rekrut->perusahaan }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    
                                    <input type="text" class="form-control" id="job_recruitment" name="recruitment[{{ $loop->iteration }}][job_position]" value="{{ $rekrut->posisi }}">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    
                                    <textarea name="recruitment[{{ $loop->iteration }}][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark">{{ $rekrut->keterangan }}</textarea>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/recruitment/{{ $rekrut->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                            </div>
                            @empty
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                <div class="col-lg-3 mb-1">
                                    <label for="recruitment_name" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="recruitment_name" name="recruitment[1][institution]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_recruitment" class="form-label">Job Position</label>
                                    <input type="text" class="form-control" id="job_recruitment" name="recruitment[1][job_position]">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="recruitment_remark" class="form-label">Remark</label>
                                    <textarea name="recruitment[1][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark"></textarea>
                                </div>
                            </div>
                            @endforelse
                            <div id="recruitment_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_recruitment" title="Add More">+ Add more</a>

                        </div>
                        <!-- fungsi other apply via  -->
                        <script type="text/javascript">
                            function CheckApply(val) {
                                var element = document.getElementById('apply_via_other');
                                if (val == 'Other') {
                                    element.classList.remove("d-none");
                                    element.setAttribute("name", "apply_via");
                                    element.setAttribute("placeholder", "Type your answer here");
                                    element.setAttribute("value", "{{ old('apply_via', $data->apply_via) }}");
                                } else if (val == 'Friend' || val == 'Family') {
                                    element.classList.remove("d-none");
                                    element.setAttribute("name", "mention_name");
                                    element.setAttribute("placeholder", "Please mention the name");
                                    element.setAttribute("value", "{{ old('mention_name', $data->nama_teman) }}");
                                } else {
                                    element.classList.add("d-none");
                                    element.removeAttribute("name");
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <label for="apply_via" class="form-label">Please mention you apply via</label>
                            <select class="form-select" id="apply_via" name="apply_via" aria-label="Default select example" required onchange='CheckApply(this.value);'>
                                
                                <option {{ $data->apply_via == 'Advertisement' ? 'selected' : '' }} value="Advertisement">Advertisement</option>
                                <option {{ $data->apply_via == 'Friend' ? 'selected' : '' }} value="Friend">Friend</option>
                                <option {{ $data->apply_via == 'Family' ? 'selected' : '' }} value="Family">Family</option>
                                <option {{ $data->apply_via == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <input type="text" id="apply_via_other" class="d-none form-control mt-2" value="{{ old('apply_via', $data->apply_via) }}">
                        </div>

                        <div class="col-md-12">
                            <label for="relatives" class="form-label">Have relative of friends working in BVR Group Asia</label>
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-4 mb-1">
                                    <label for="relative_name" class="form-label">Name</label>
                                    
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="job_relatives" class="form-label">Relationship</label>
                                    
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="job_relatives" class="form-label">Name of Department</label>
                                    
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_relatives" class="form-label">Remark</label>
                                    
                                </div>
                            </div>
                            @forelse ($data->relatives as $relative)
                                
                            <div class="row text-center rounded py-1 bg-light">
                                <div class="col-lg-4 mb-1">
                                    <input type="text" hidden name="relatives[{{ $loop->iteration }}][id]" value="{{ $relative->id }}">
                                    <input type="text" class="form-control" id="relative_name" name="relatives[{{ $loop->iteration }}][name]" value="{{ $relative->nama }}">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" id="relation_relatives" name="relatives[{{ $loop->iteration }}][relation]" value="{{ $relative->hubungan }}">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input type="text" class="form-control" id="job_relatives" name="relatives[{{ $loop->iteration }}][department]" value="{{ $relative->departemen }}">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <textarea name="relatives[{{ $loop->iteration }}][remark]" id="remark_relatives" style="height: 40px ;" class="form-control" >{{ $relative->keterangan }}</textarea>
                                    
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <a href="/recruitment/relative/{{ $relative->id }}/delete" class="btn btn-outline-danger swalDelete">Delete</a>
                                </div>
                            </div>
                            @empty
                                <div class="row text-center rounded py-1 bg-light" hidden>
                                <div class="col-lg-4 mb-1">
                                    <label for="relative_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="relative_name" name="relatives[1][name]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_relatives" class="form-label">Relationship</label>
                                    <input type="text" class="form-control" id="job_relatives" name="relatives[1][relation]">
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <label for="job_relatives" class="form-label">Name of Department</label>
                                    <input type="text" class="form-control" id="job_relatives" name="relatives[1][department]">
                                </div>
                            </div>
                            @endforelse
                            <div id="relative_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)" id="add_button_relative" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="other_remark" class="form-label">Other Remark</label>
                            <textarea class="form-control" placeholder="Leave a comment here" name="other_remark" style="height: 100px">{{ old('other_remark', $data->keterangan_lain) }}</textarea>
                        </div>



                        <!-- button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-end" form="mainForm">Submit Aplication</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <a class="text-decoration-none text-warning" href="https://www.facebook.com/satria.wiguna.1660/" target="_blank">SaWi</a> 2022</span>
                </div>
            </div>
        </footer>

    </div>

    







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- sweet alert --}}
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        //tambah form education
        var countEducation = {{ count($data->pendidikans->where('jenis_pendidikan', 'formal')) + 1 }};
        $("#add_button_education").click(function() {
            $("#formal_education").append(`<div class="row education_remove text-center rounded py-1 bg-light"><input type="text" hidden name="education[${countEducation}][jenis]" value="formal"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="school_name" name="education[${countEducation}][school_name]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="from" name="education[${countEducation}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="to" name="education[${countEducation}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="subject" name="education[${countEducation}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="education[${countEducation}][remark]" class="form-control" style="height: 40px ;" id="remark-education"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger remove-input-field">Delete</button></div></div>`);
            ++countEducation;
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.education_remove').remove();
            --countEducation;
        });

        //tambah form other education
        var countCourse = {{ count($data->pendidikans->where('jenis_pendidikan', 'course')) + 1 }};
        $("#add_button_course").click(function() {
            $("#other_education").append(`<div class="row course_remove text-center rounded py-1 bg-light"><input type="text" hidden name="course[${countCourse}][jenis]" value="course"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_name" name="course[${countCourse}][course_name]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_from" name="course[${countCourse}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_to" name="course[${countCourse}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_subject" name="course[${countCourse}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="course[${countCourse}][remark]" class="form-control" style="height: 40px ;" id="course_remark"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger remove-input-field-course">Delete</button></div></div></div>`);
            ++countCourse;
        });
        $(document).on('click', '.remove-input-field-course', function() {
            $(this).parents('.course_remove').remove();
            --countCourse;
        });

        //tambah form Work experience
        var countExp = {{ count($data->pengalaman__kerjas) + 1 }};
        $("#add_button_experience").click(function() {
            var form = `<div class="row text-center experience_remove rounded py-1 bg-light">
                                <div class="col-lg-2 mb-1">
                                
                                <input required type="text" class="form-control" id="company_name" name="experience[${countExp}][company]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                    
                                    <input required type="text" class="form-control" id="company_position" name="experience[${countExp}][position]">
                                </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input required type="number" class="form-control" id="experience_from" name="experience[${countExp}][from]">
                            </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input required type="number" class="form-control" id="experiemce_to" name="experience[${countExp}][to]">
                            </div>
                            <div class="col-lg-2 mb-1">
                            
                                <textarea  required type="text" style="height: 40px ;" class="form-control" id="experience_responsibly" name="experience[${countExp}][responsibly]"></textarea>
                            </div>
                            <div class="col-lg-1 mb-1">
                                
                                <input  required type="text" class="form-control" id="company_salary" name="experience[${countExp}][salary]">
                            </div>
                    
                            <div class="col-lg-2 mb-1">
                               
                                <textarea  required name="experience[${countExp}][reason]" class="form-control" style="height: 40px ;"></textarea>
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
        var countLanguage = {{ count($data->bahasas) + 1 }};
        $("#add_button_language").click(function() {
            var form = `<div class="row text-center language_remove rounded py-1 bg-light">
                            <div class="col-lg-3 mb-1">
                                
                                <input  required type="text" class="form-control" id="course_name" name="language[${countLanguage}][language]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                    
                                    <input  required type="text" class="form-control" list="listOral" id="oral" name="language[${countLanguage}][oral]">
                                    <datalist id="listOral" name="language[${countLanguage}][oral]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-2 mb-1">
                                    
                                    <input required type="text" class="form-control" list="listWritten" id="written" name="language[${countLanguage}][written]">
                                    <datalist id="listWritten" name="language[${countLanguage}][written]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                            <div class="col-lg-4 mb-1">
                                
                                <textarea required name="language[${countLanguage}][remark]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
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
        var countFamily = {{ count($data->keluargas) + 1 }};
        $("#add_button_family").click(function() {
            var form = `<div class="row family_remove text-center rounded py-1 bg-light">
                            <div class="col-lg-2 mb-1">
                                
                                <input required name="family[${countFamily}][relation]" class="form-control" list="relationlist" id="relation">
                                <datalist id="relationlist" name="family[${countFamily}][relation]">
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother/Sister">Brother/Sister</option>
                                    <option value="Wife/Husband">Wife/Husband</option>
                                    <option value="Children">Children</option>

                                </datalist>
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="family_name" name="family[${countFamily}][name]">
                            </div>
                            <div class=" col-lg-3 mb-1">
                               
                                <input required type="text" class="form-control" id="birth" name="family[${countFamily}][birth]">
                            </div>
                            <div class=" col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="occupation" name="family[${countFamily}][occupation]">
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
        var countOrganization = {{ count($data->organisasis) + 1 }};
        $("#add_button_organization").click(function() {
            var form = `<div class="row organization_remove text-center rounded py-1 bg-light">
                            <div class="col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="organization_name" name="organization[${countOrganization}][name]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="experience_from" name="organization[${countOrganization}][position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea required name="organization[${countOrganization}][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark"></textarea>
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
        var countScholar = {{ count($data->beasiswas) + 1 }};
        $("#add_button_scholarship").click(function() {
            var form = `<div class="row scholarship_remove text-center rounded py-1 bg-light">
                            <div class="col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="institution_name" name="scholarship[${countScholar}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input required type="text" class="form-control" id="institution_place" name="scholarship[${countScholar}][place]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea required name="scholarship[${countScholar}][remark]" class="form-control" style="height: 40px ;" id="institution_remark"></textarea>
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
        var countRecruitment = {{ count($data->rekrutment__lains) + 1 }};
        $("#add_button_recruitment").click(function() {
            var form = `<div class="row recruitment_remove text-center rounded py-1 bg-light">
                            <div class="col-lg-3 mb-1">
                               
                                <input required type="text" class="form-control" id="recruitment_name" name="recruitment[${countRecruitment}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                               
                                <input required type="text" class="form-control" id="job_recruitment" name="recruitment[${countRecruitment}][job_position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                                
                                <textarea required name="recruitment[${countRecruitment}][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark"></textarea>
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
        var countRelative = {{ count($data->relatives) + 1 }};
        $("#add_button_relative").click(function() {
            var form = `<div class="row relative_remove text-center rounded py-1 bg-light">
                            <div class="col-lg-4 mb-1">
                                
                                <input required type="text" class="form-control" id="relative_name" name="relatives[${countRelative}][name]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                
                                <input required type="text" class="form-control" id="job_relatives" name="relatives[${countRelative}][relation]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                
                                <input required type="text" class="form-control" id="job_relatives" name="relatives[${countRelative}][department]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                    <textarea required name="relatives[${countRelative}][remark]" id="remark_relatives" style="height: 40px ;" class="form-control" ></textarea>
                                    
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


        //sweet alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-start',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
        //flash success laravel
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif

        //sweet alert tombol delete data yang sudah ada
        $('.swalDelete').on('click', function(e){
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
                title: 'Are you sure?',
                text: "This data will be deleted from database",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it from database!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                    // Swal.fire(
                    // 'Deleted!',
                    // 'Your file has been deleted.',
                    // 'success'
                    // )
                }
            })
        })
    </script>

</body>

</html>