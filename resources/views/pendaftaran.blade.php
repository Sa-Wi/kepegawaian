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
                <div class="navbar-brand" style="width: 200px;">
                    <a href="https://bvrgroupasia.com/" target="_blank"><img
                            src="https://bvrgroupasia.com/wp-content/uploads/2022/03/BVR-Group-Asia-Vert-1.png"
                            alt="BVR" class="img-fluid"></a>
                </div>
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
            <h1 class="mb-5">Application Form</h1>
            <div class="card">
                <div class="card-body">
                    <form class="row g-3" action="{{ route('recruitment.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="applyfor" class="form-label">Application for position of *</label>
                            <select class="form-select" id="applyfor" name="applyfor"
                                aria-label="Default select example">
                                <option disabled selected>Select for Position</option>
                                @foreach ($positions as $posisi)
                                    <option @if (old('applyfor') == $posisi->id) selected @endif
                                        value="{{ $posisi->id }}">{{ $posisi->nama }}</option>
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
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" id="name" name="name" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="dateofbirth" class="form-label">Date of Birth *</label>
                            <input type="date" class="form-control @error('dateofbirth') is-invalid @enderror"
                                value="{{ old('dateofbirth') }}" id="dateofbirth" name="dateofbirth" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="placeofbirth" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control @error('placeofbirth') is-invalid @enderror"
                                value="{{ old('placeofbirth') }}" id="placeofbirth" required name="placeofbirth">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Sex *</label><br>
                            <input class="form-check-input @error('sex') is-invalid @enderror" type="radio"
                                @if (old('sex') == 1) cheked @endif name="sex" id="sex1"
                                value="1" required>
                            <label for="sex1" class="form-label">Male</label>
                            <input class="form-check-input @error('sex') is-invalid @enderror" type="radio"
                                @if (old('sex') == 0) cheked @endif name="sex" id="sex0"
                                value="0" required>
                            <label for="sex0" class="form-label">Female</label>
                        </div>
                        <div class="col-md-12">
                            <label for="marital" class="form-label">Marital Status</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('marital') }}" id="marital" name="marital" required>
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="inputState" class="form-label"></label>
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div> -->
                        <div class="col-md-12">
                            <label for="nationality" class="form-label">Nationality *</label>
                            <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                                value="{{ old('nationality') }}" id="nationality" required name="nationality">
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
                            <label for="religion" class="form-label">Religion *</label>
                            <!-- <input type="text" class="form-control" id="religion" name="religion"> -->
                            <select class="form-select @error('religion') is-invalid @enderror" id="religion"
                                name="religion" aria-label="Default select example" required
                                onchange='CheckReligion(this.value);'>
                                <option disabled selected>Select your religion</option>
                                <option @if (old('religion') == 'Islam') selected @endif value="Islam">Islam
                                </option>
                                <option @if (old('religion') == 'Protestantism') selected @endif value="Protestantism">
                                    Protestantism</option>
                                <option @if (old('religion') == 'Catholicism') selected @endif value="Catholicism">
                                    Catholicism</option>
                                <option @if (old('religion') == 'Hinduism') selected @endif value="Hinduism">Hinduism
                                </option>
                                <option @if (old('religion') == 'Buddhism') selected @endif value="Buddhism">Buddhism
                                </option>
                                <option @if (old('religion') == 'Confucianism') selected @endif value="Confucianism">
                                    Confucianism</option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" id="religion_other" class="d-none form-control mt-2">
                        </div>
                        <div class="col-md-12">
                            <label for="domicile" class="form-label">Domicile Address</label>
                            {{-- <input type="text" class="form-control" id="address" name="address"> --}}
                            <textarea name="domicile" id="domicile" required class="form-control @error('domicile') is-invalid @enderror">{{ old('domicile') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="present_adrs" class="form-label">Present Address</label>
                            {{-- <input type="text" class="form-control" id="address" name="address"> --}}
                            <textarea name="present_adrs" id="present_adrs" required
                                class="form-control @error('present_adrs') is-invalid @enderror">{{ old('present_adrs') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="ktp" class="form-label">ID Card Number *</label>
                            <input type="text" class="form-control @error('ktp') is-invalid @enderror"
                                value="{{ old('ktp') }}" id="ktp" name="ktp" required>
                        </div>
                        <div class="col-md-2">
                            <label for="tinggi_badan" class="form-label">Height (cm)</label>
                            <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror"
                                value="{{ old('tinggi_badan') }}" id="tinggi_badan" name="tinggi_badan">
                        </div>
                        <div class="col-md-2">
                            <label for="berat_badan" class="form-label">Weight (kg)</label>
                            <input type="number" class="form-control @error('berat_badan') is-invalid @enderror"
                                value="{{ old('berat_badan') }}" id="berat_badan" name="berat_badan">
                        </div>
                        <div class="col-md-12">
                            <label for="health" class="form-label">Present Health Condition</label>
                            <input type="text" class="form-control @error('health') is-invalid @enderror"
                                value="{{ old('health') }}" id="health" name="health">
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">Phone *</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" id="phone" name="phone" required>
                        </div>
                        <div class="col-md-12">
                            <label for="facebook" class="form-label">Facebook (link / email)</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                value="{{ old('facebook') }}" id="Facebook" name="facebook">
                        </div>
                        <div class="col-md-12">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                                value="{{ old('instagram') }}" id="instagram" name="instagram">
                        </div>
                        <div class="col-md-12">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                                value="{{ old('linkedin') }}" id="linkedin" name="linkedin">
                        </div>
                        <div class="col-md-12">
                            <label for="formal_education" class="form-label">Formal Education</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <input type="text" hidden name="education[1][jenis]" value="formal">
                                <div class="col-lg-3 mb-1">
                                    <label for="school_name" class="form-label">Name of School</label>
                                    <input type="text" class="form-control" id="school_name"
                                        value="{{ old('education[1][school_name]') }}"
                                        name="education[1][school_name]">
                                    @error('education.1.school_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="from" class="form-label">From</label>
                                    <input type="number" class="form-control" id="from"
                                        value="{{ old('education[1][from]') }}" name="education[1][from]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="to" class="form-label">To</label>
                                    <input type="number" class="form-control" id="to"
                                        value="{{ old('education[1][to]') }}" name="education[1][to]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject"
                                        value="{{ old('education[1][subject]') }}" name="education[1][subject]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="remark_education" class="form-label">Remark</label>
                                    <textarea name="education[1][remark]" class="form-control" style="height: 40px ;" id="remark-education">{{ old('education[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="formal_education">

                            </div>

                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_education" title="Add Education">+ Add more</a>
                        </div>
                        <div class="col-md-12">
                            <label for="other_education" class="form-label">Other Education (Course etc.)</label>
                            <input type="text" hidden name="course[1][jenis]" value="course">
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-3 mb-1">
                                    <label for="course_name" class="form-label">Name of Course</label>
                                    <input type="text" class="form-control" id="course_name"
                                        value="{{ old('course[1][school_name]') }}" name="course[1][course_name]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="course_from" class="form-label">From</label>
                                    <input type="number" class="form-control" id="course_from"
                                        value="{{ old('course[1][from]') }}" name="course[1][from]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="course_to" class="form-label">To</label>
                                    <input type="number" class="form-control" id="course_to" name="course[1][to]"
                                        value="{{ old('course[1][to]') }}">

                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="course_subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="course_subject"
                                        value="{{ old('course[1][subject]') }}" name="course[1][subject]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="course_remark" class="form-label">Remark</label>
                                    <textarea name="course[1][remark]" class="form-control" style="height: 40px ;" id="course_remark">{{ old('course[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="other_education">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_course" title="Add Course">+ Add more</a>
                        </div>
                        <div class="col-md-12">
                            <label for="language" class="form-label">Language Proficiency</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-3 mb-1">
                                    <label for="language" class="form-label">language</label>
                                    <input type="text" class="form-control" id="language"
                                        value="{{ old('language[1][language]') }}" name="language[1][language]">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="oral" class="form-label">Oral</label>
                                    <input type="text" class="form-control" list="listOral" id="oral"
                                        value="{{ old('language[1][oral]') }}" name="language[1][oral]">
                                    <datalist id="listOral" name="language[1][oral]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="written" class="form-label">Written</label>
                                    <input type="text" class="form-control" list="listWritten" id="written"
                                        value="{{ old('language[1][written]') }}" name="language[1][written]">
                                    <datalist id="listWritten" name="language[1][written]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Advance">Advance</option>
                                        <option value="Competent">Competent</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                    </datalist>
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <label for="language_remark" class="form-label">Remark</label>
                                    <textarea name="language[1][remark]" class="form-control" style="height: 40px ;" id="language_remark">{{ old('language[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="language_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_language" title="Add Language">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="experience" class="form-label">Working Experience</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-2 mb-1">
                                    <label for="company_name" class="form-label">Name of Company</label>
                                    <input type="text" class="form-control" id="company_name"
                                        value="{{ old('experience[1][company]') }}" name="experience[1][company]">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="company_name" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="company_position"
                                        value="{{ old('experience[1][position]') }}" name="experience[1][position]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="experience_from" class="form-label">From</label>
                                    <input type="number" class="form-control" id="experience_from"
                                        value="{{ old('experience[1][from]') }}" name="experience[1][from]">
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="experience_to" class="form-label">To</label>
                                    <input type="number" class="form-control" id="experience_to"
                                        value="{{ old('experience[1][to]') }}" name="experience[1][to]">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="experience_responsibly" class="form-label">Main Responsibility</label>
                                    <textarea type="text" style="height: 40px ;" class="form-control" id="experience_responsibly"
                                        name="experience[1][responsibly]">{{ old('experience[1][responsibly]') }}</textarea>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <label for="company_salary" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="company_salary"
                                        value="{{ old('experience[1][salary]') }}" name="experience[1][salary]">
                                </div>
                                <div class="col-lg-2 mb-1">
                                    <label for="company_resign" class="form-label">Reason of Resignation</label>
                                    <textarea type="text" class="form-control" style="height: 40px ;" id="company_resign"
                                        name="experience[1][reason]">{{ old('experience[1][reason]') }}</textarea>
                                </div>
                                {{-- <div class="col-lg-2 mb-1">
                                    <label for="language_remark" class="form-label">Remark</label>
                                    <textarea name="experience[1][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                                </div> --}}
                            </div>
                            <div id="experience_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_experience" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Requested Salary</label>
                            <input type="number" class="form-control form-floating" id="salary" name="salary"
                                value="{{ old('salary') }}">
                            <input class="form-check-input" type="radio" name="negotiable" id="negotiable"
                                @if (old('negotiable') == 1) checked @endif value="1">
                            <label for="negotiable" class="form-label">Negotiable</label>
                            <input class="form-check-input ms-2" type="radio" name="negotiable" id="notnegotiable"
                                @if (old('negotiable') == 0) checked @endif value="0">
                            <label for="notnegotiable" class="form-label">Not Negotiable</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px"
                                    placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="career">{{ old('career') }}</textarea>
                                <label for="floatingTextarea">Give a brief description of the career you hope to
                                    follow</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Family Data</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-2 mb-1">
                                    <label for="relation" class="form-label">Relation</label>
                                    <input name="family[1][relation]" class="form-control" list="relationlist"
                                        value="{{ old('family[1][relation]') }}" id="relation">
                                    <datalist id="relationlist" name="family[1][relation]">
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Brother/Sister">Brother/Sister</option>
                                        <option value="Wife/Husband">Wife/Husband</option>
                                        <option value="Children">Children</option>

                                    </datalist>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="family_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="family_name"
                                        value="{{ old('family[1][name]') }}" name="family[1][name]">
                                </div>
                                <div class=" col-lg-3 mb-1">
                                    <label for="birth" class="form-label">Place, Date of Birth/Age</label>
                                    <input type="text" class="form-control" id="birth"
                                        value="{{ old('family[1][birth]') }}" name="family[1][birth]">
                                </div>
                                <div class=" col-lg-3 mb-1">
                                    <label for="occupation" class="form-label">Occupation/School</label>
                                    <input type="text" class="form-control" id="occupation"
                                        value="{{ old('family[1][occupation]') }}" name="family[1][occupation]">
                                </div>
                            </div>
                            <div id="family_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_family" title="Add More">+ Add more</a>
                        </div>
                        <div class="col-md-12">
                            <label for="emergency_contact">Emergency Contact</label>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" name="emergency_name" class="form-control"
                                            value="{{ old('emergency_name') }}" id="emergency_name"
                                            placeholder="Name">
                                        <label for="emergency_name">Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating">
                                        <input type="text" name="emergency_relation" list="relationlist"
                                            value="{{ old('emergency_relation') }}" class="form-control"
                                            id="emergency_name" placeholder="Relationship">
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
                                        <input type="number" name="emergency_phone" class="form-control"
                                            value="{{ old('emergency_phone') }}" id="emergency_phone"
                                            placeholder="Phone Number">
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
                                        <textarea class="form-control" style="height: 100px"
                                            placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="strength">{{ old('strength') }}</textarea>
                                        <label for="floatingTextarea">Strength</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" style="height: 100px"
                                            placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="weakness">{{ old('weakness') }}</textarea>
                                        <label for="floatingTextarea">Weakness</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label for="activity" class="form-label">Activities outside the job</label>
                            <input type="text" class="form-control" id="activity" name="activity"
                                value="{{ old('activity') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="hobby" class="form-label">Hobby</label>
                            <input type="text" class="form-control" id="hobby" name="hobby"
                                value="{{ old('hobby') }}">
                        </div>
                        <div class="col-md-12">
                            <label for="organization" class="form-label">Organization</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-3 mb-1">
                                    <label for="organization_name" class="form-label">Name of Organization</label>
                                    <input type="text" class="form-control" id="organization_name"
                                        value="{{ old('organization[1][name]') }}" name="organization[1][name]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="experience_from" class="form-label">position Held</label>
                                    <input type="text" class="form-control" id="experience_from"
                                        value="{{ old('organization[1][position]') }}"
                                        name="organization[1][position]">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="oraganization_remark" class="form-label">Remark</label>
                                    <textarea name="organization[1][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark">{{ old('organization[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="organization_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_organization" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="scholarship" class="form-label">Scholarship</label>
                            <p><i> Please give the institution name and place if you are in process of apply for
                                    scholarship</i></p>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-3 mb-1">
                                    <label for="institution_name" class="form-label">Institution</label>
                                    <input type="text" class="form-control" id="institution_name"
                                        value="{{ old('scholarship[1][institution]') }}"
                                        name="scholarship[1][institution]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="institution_place" class="form-label">Place</label>
                                    <input type="text" class="form-control" id="institution_place"
                                        value="{{ old('scholarship[1][place]') }}" name="scholarship[1][place]">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="institution_remark" class="form-label">Remark</label>
                                    <textarea name="scholarship[1][remark]" class="form-control" style="height: 40px ;" id="institution_remark">{{ old('scholarship[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="scholarship_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_scholarship" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="other_recruitment" class="form-label">In process of recruitment & selection in
                                other company?</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-3 mb-1">
                                    <label for="recruitment_name" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="recruitment_name"
                                        value="{{ old('recruitment[1][institution]') }}"
                                        name="recruitment[1][institution]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_recruitment" class="form-label">Job Position</label>
                                    <input type="text" class="form-control" id="job_recruitment"
                                        value="{{ old('recruitment[1][job_position]') }}"
                                        name="recruitment[1][job_position]">
                                </div>
                                <div class="col-lg-5 mb-1">
                                    <label for="recruitment_remark" class="form-label">Remark</label>
                                    <textarea name="recruitment[1][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark">{{ old('recruitment[1][remark]') }}</textarea>
                                </div>
                            </div>
                            <div id="recruitment_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_recruitment" title="Add More">+ Add more</a>

                        </div>
                        <!-- fungsi other apply via  -->
                        <script type="text/javascript">
                            function CheckApply(val) {
                                var element = document.getElementById('apply_via_other');
                                if (val == 'Other') {
                                    element.classList.remove("d-none");
                                    element.setAttribute("name", "apply_via");
                                    element.setAttribute("placeholder", "Type your answer here");
                                } else if (val == 'Friend' || val == 'Family') {
                                    element.classList.remove("d-none");
                                    element.setAttribute("name", "mention_name");
                                    element.setAttribute("placeholder", "Please mention the name");
                                } else {
                                    element.classList.add("d-none");
                                    element.removeAttribute("name");
                                }
                            }
                        </script>
                        <div class="col-md-12">
                            <label for="apply_via" class="form-label">Please mention you apply via</label>
                            <select class="form-select" id="apply_via" name="apply_via"
                                aria-label="Default select example" required onchange='CheckApply(this.value);'>
                                <option disabled selected>Select your answer</option>
                                <option @if (old('apply_via') == 'Advertisement') selected @endif value="Advertisement">
                                    Advertisement</option>
                                <option @if (old('apply_via') == 'Friend') selected @endif value="Friend">Friend
                                </option>
                                <option @if (old('apply_via') == 'Family') selected @endif value="Family">Family
                                </option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" id="apply_via_other" name="apply_via"
                                class="d-none form-control mt-2">
                        </div>

                        <div class="col-md-12">
                            <label for="relatives" class="form-label">Have relative of friends working in BVR Group
                                Asia?</label>
                            <div class="row text-center rounded py-1 bg-secondary bg-opacity-10">
                                <div class="col-lg-4 mb-1">
                                    <label for="relative_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="relative_name"
                                        value="{{ old('relatives[1][name]') }}" name="relatives[1][name]">
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <label for="job_relatives" class="form-label">Relationship</label>
                                    <input type="text" class="form-control" id="job_relatives"
                                        value="{{ old('relatives[1][relation]') }}" name="relatives[1][relation]">
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <label for="relative_department" class="form-label">Name of Department</label>
                                    <input type="text" class="form-control" id="relative_department"
                                        value="{{ old('relatives[1][department]') }}"
                                        name="relatives[1][department]">
                                </div>
                            </div>
                            <div id="relative_form">

                            </div>
                            <a class="btn btn-outline-secondary mt-1" href="javascript:void(0)"
                                id="add_button_relative" title="Add More">+ Add more</a>

                        </div>
                        <div class="col-md-12">
                            <label for="file" class="form-label">Evidence File</label>
                            <input type="file" name="file" id="file"
                                class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">please input the file in the form of an archive (.rar)</div>
                        </div>

                        <div class="col-md-12">
                            <label for="other_remark" class="form-label">Other Remark</label>
                            <textarea class="form-control" placeholder="Leave a comment here" name="other_remark" style="height: 100px">{{ old('other_remark') }}</textarea>
                        </div>



                        <!-- button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-end">Submit Aplication</button>
                        </div>
                    </form>
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
