<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Application Form</title>
</head>

<body>
    <div class="container">
        <ul class="navbar-nav ">

        </ul>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">BVR Group Asia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fixed">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- form -->
        <div class="container px-5 mb-5" style="position: relative; margin-top: 100px;">
            <h1 class="mb-5">Application Form</h1>
            <form class="row g-3" action="/recruitment" method="post">
                @csrf
                <div class="col-md-12">
                    <label for="applyfor" class="form-label">Application for position of</label>
                    <input type="text" class="form-control" id="applyfor" name="applyfor">
                </div>
                <div class="col-md-12">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-sm-4">
                    <label for="dateofbirth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
                </div>
                <div class="col-sm-8">
                    <label for="placeofbirth" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Sex</label><br>
                    <input class="form-check-input" type="radio" name="sex" id="sex" value="1">
                    <label for="sex" class="form-label">Male</label>
                    <input class="form-check-input" type="radio" name="sex" id="sex" value="0">
                    <label for="sex" class="form-label">Female</label>
                </div>
                <div class="col-md-12">
                    <label for="marital" class="form-label">Marital Status</label>
                    <input type="text" class="form-control" id="marital" name="marital">
                </div>
                <!-- <div class="col-md-4">
                    <label for="inputState" class="form-label"></label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div> -->
                <div class="col-md-12">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality">
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
                    <select class="form-select" id="religion" name="religion" aria-label="Default select example" onchange='CheckReligion(this.value);'>
                        <option disabled selected>Select your religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestantism">Protestantism</option>
                        <option value="Catholicism">Catholicism</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Confucianism">Confucianism</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="text" id="religion_other" name="religion" class="d-none form-control mt-2">
                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Present Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="col-md-12">
                    <label for="ktp" class="form-label">Identify Card No (KTP)</label>
                    <input type="text" class="form-control" id="ktp" name="ktp">
                </div>
                <div class="col-md-2">
                    <label for="tinggi_badan" class="form-label">Height (cm)</label>
                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan">
                </div>
                <div class="col-md-2">
                    <label for="berat_badan" class="form-label">Weight (kg)</label>
                    <input type="text" class="form-control" id="berat_badan" name="berat_badan">
                </div>
                <div class="col-md-12">
                    <label for="health" class="form-label">Present Health Condition</label>
                    <input type="text" class="form-control" id="health" name="health">
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-12">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-12">
                    <label for="facebook" class="form-label">Facebook (link / email)</label>
                    <input type="text" class="form-control" id="Facebook" name="facebook">
                </div>
                <div class="col-md-12">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram">
                </div>
                <div class="col-md-12">
                    <label for="linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin">
                </div>
                <div class="col-md-12">
                    <label for="formal_education" class="form-label">Formal Education</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <input type="text" hidden name="education[1][jenis]" value="formal">
                        <div class="col-lg-3 mb-1">
                            <label for="school_name" class="form-label">Name of School</label>
                            <input type="text" class="form-control" id="school_name" name="education[1][school_name]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="from" class="form-label">From</label>
                            <input type="number" class="form-control" id="from" name="education[1][from]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="to" class="form-label">To</label>
                            <input type="number" class="form-control" id="to" name="education[1][to]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="education[1][subject]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="remark_education" class="form-label">Remark</label>
                            <textarea name="education[1][remark]" class="form-control" style="height: 40px ;" id="remark-education"></textarea>
                        </div>
                    </div>
                    <div id="formal_education">

                    </div>

                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_education" title="Add Education">+ Add more</a>
                </div>
                <div class="col-md-12">
                    <label for="other_education" class="form-label">Other Education (Course etc.)</label>
                    <input type="text" hidden name="course[1][jenis]" value="course">
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-3 mb-1">
                            <label for="course_name" class="form-label">Name of Course</label>
                            <input type="text" class="form-control" id="course_name" name="course[1][course_name]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="course_from" class="form-label">From</label>
                            <input type="number" class="form-control" id="course_from" name="course[1][from]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="course_to" class="form-label">To</label>
                            <input type="number" class="form-control" id="course_to" name="course[1][to]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="course_subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="course_subject" name="course[1][subject]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="course_remark" class="form-label">Remark</label>
                            <textarea name="course[1][remark]" class="form-control" style="height: 40px ;" id="course_remark"></textarea>
                        </div>
                    </div>
                    <div id="other_education">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_course" title="Add Course">+ Add more</a>
                </div>
                <div class="col-md-12">
                    <label for="language" class="form-label">Language Proficiency</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-3 mb-1">
                            <label for="language" class="form-label">language</label>
                            <input type="text" class="form-control" id="course_name" name="language[1][language]">
                        </div>
                        <div class="col-lg-2 mb-1">
                            <label for="oral" class="form-label">Oral</label>
                            <input type="text" class="form-control" id="oral" name="language[1][oral]">
                        </div>
                        <div class="col-lg-2 mb-1">
                            <label for="written" class="form-label">Written</label>
                            <input type="text" class="form-control" id="written" name="language[1][written]">
                        </div>
                        <div class="col-lg-4 mb-1">
                            <label for="language_remark" class="form-label">Remark</label>
                            <textarea name="language[1][remark]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                        </div>
                    </div>
                    <div id="language_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_language" title="Add Language">+ Add more</a>

                </div>
                <div class="col-md-12">
                    <label for="experience" class="form-label">Working Experience</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-2 mb-1">
                            <label for="company_name" class="form-label">Name of Company</label>
                            <input type="text" class="form-control" id="company_name" name="experience[1][company]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="experience_from" class="form-label">From</label>
                            <input type="number" class="form-control" id="experience_from" name="experience[1][from]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="experience_to" class="form-label">To</label>
                            <input type="number" class="form-control" id="experience_to" name="experience[1][to]">
                        </div>
                        <div class="col-lg-2 mb-1">
                            <label for="experience_responsibly" class="form-label">Main Responsibility</label>
                            <textarea type="text" style="height: 40px ;" class="form-control" id="experience_responsibly" name="experience[1][responsibly]"></textarea>
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="company_salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="company_salary" name="experience[1][salary]">
                        </div>
                        <div class="col-lg-2 mb-1">
                            <label for="company_resign" class="form-label">Reason of Resignation</label>
                            <textarea type="text" class="form-control" style="height: 40px ;" id="company_resign" name="experience[1][reason]"></textarea>
                        </div>
                        <div class="col-lg-2 mb-1">
                            <label for="language_remark" class="form-label">Remark</label>
                            <textarea name="experience[1][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                        </div>
                    </div>
                    <div id="experience_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_experience" title="Add More">+ Add more</a>

                </div>
                <div class="col-md-6">
                    <label for="salary" class="form-label">Requested Salary</label>
                    <input type="number" class="form-control form-floating" id="salary" name="salary">
                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable" value="1">
                    <label for="negotiable" class="form-label">Negotiable</label>
                    <input class="form-check-input ms-2" type="radio" name="negotiable" id="notnegotiable" value="0">
                    <label for="notnegotiable" class="form-label">Not Negotiable</label>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="career"></textarea>
                        <label for="floatingTextarea">Give a brief description of the career you hope to follow</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Family Data</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-2 mb-1">
                            <label for="relation" class="form-label">Relation</label>
                            <input name="family[1][relation]" class="form-control" list="relationlist" id="relation">
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
                            <input type="text" class="form-control" id="family_name" name="family[1][name]">
                        </div>
                        <div class=" col-lg-3 mb-1">
                            <label for="birth" class="form-label">Place, Date of Birth/Age</label>
                            <input type="text" class="form-control" id="birth" name="family[1][birth]">
                        </div>
                        <div class=" col-lg-3 mb-1">
                            <label for="occupation" class="form-label">Occupation/School</label>
                            <input type="text" class="form-control" id="occupation" name="family[1][occupation]">
                        </div>
                    </div>
                    <div id="family_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_family" title="Add More">+ Add more</a>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Strength & Weakness</label>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="strength"></textarea>
                                <label for="floatingTextarea">Strength</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="weakness"></textarea>
                                <label for="floatingTextarea">Weakness</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <label for="activity" class="form-label">Activities outside the job</label>
                    <input type="text" class="form-control" id="activity" name="activity">
                </div>
                <div class="col-md-12">
                    <label for="hobby" class="form-label">Hobby</label>
                    <input type="text" class="form-control" id="hobby" name="hobby">
                </div>
                <div class="col-md-12">
                    <label for="organization" class="form-label">Organization</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-3 mb-1">
                            <label for="organization_name" class="form-label">Name of Company</label>
                            <input type="text" class="form-control" id="organization_name" name="organization[1][name]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="experience_from" class="form-label">position Held</label>
                            <input type="number" class="form-control" id="experience_from" name="organization[1][position]">
                        </div>
                        <div class="col-lg-5 mb-1">
                            <label for="oraganization_remark" class="form-label">Remark</label>
                            <textarea name="Organization[1][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark"></textarea>
                        </div>
                    </div>
                    <div id="organization_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_organization" title="Add More">+ Add more</a>

                </div>
                <div class="col-md-12">
                    <label for="scholarship" class="form-label">Scholarship</label>
                    <p><i> Please give the institution name and place if you are in process of apply for scholarship</i></p>
                    <div class="row text-center text-white bg-secondary rounded py-1">
                        <div class="col-lg-3 mb-1">
                            <label for="institution_name" class="form-label">Institution</label>
                            <input type="text" class="form-control" id="institution_name" name="scholarship[1][institution]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="institution_place" class="form-label">Place</label>
                            <input type="number" class="form-control" id="institution_place" name="scholarship[1][place]">
                        </div>
                        <div class="col-lg-5 mb-1">
                            <label for="institution_remark" class="form-label">Remark</label>
                            <textarea name="scholarship[1][remark]" class="form-control" style="height: 40px ;" id="institution_remark"></textarea>
                        </div>
                    </div>
                    <div id="scholarship_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_scholarship" title="Add More">+ Add more</a>

                </div>
                <div class="col-md-12">
                    <label for="other_recruitment" class="form-label">In process of recruitment & selection in other company?</label>
                    <div class="row text-center text-white bg-secondary rounded py-1">
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
                    <div id="recruitment_form">

                    </div>
                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_recruitment" title="Add More">+ Add more</a>

                </div>
                <div class="col-md-12">
                    <label for="apply_via" class="form-label">Please mention you apply via</label>
                    <input type="text" class="form-control" id="apply_via" name="apply_via">
                </div>
                <div class="col-md-12">
                    <label for="other_remark" class="form-label">Other Remark</label>
                    <textarea class="form-control" placeholder="Leave a comment here" name="other_remark" style="height: 100px"></textarea>
                </div>

                <!-- button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit Aplication</button>
                </div>
            </form>
        </div>
    </div>









    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        //tambah form education
        var countEducation = 2;
        $("#add_button_education").click(function() {
            $("#formal_education").append(`<div class="row education_remove text-center text-white bg-secondary rounded py-1"><input type="text" hidden name="education[${countEducation}][jenis]" value="formal"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="school_name" name="education[${countEducation}][nama_sekolah]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="from" name="education[${countEducation}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="to" name="education[${countEducation}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="subject" name="education[${countEducation}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="education[${countEducation}][remark]" class="form-control" style="height: 40px ;" id="remark-education"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field">Delete</button></div></div>`);
            ++countEducation;
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.education_remove').remove();
            --countEducation;
        });

        //tambah form other education
        var countCourse = 2;
        $("#add_button_course").click(function() {
            $("#other_education").append(`<div class="row course_remove text-center text-white bg-secondary rounded py-1"><input type="text" hidden name="course[${countCourse}][jenis]" value="course"><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_name" name="course[${countCourse}][course_name]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_from" name="course[${countCourse}][from]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="course_to" name="course[${countCourse}][to]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="course_subject" name="course[${countCourse}][subject]"></div><div class="col-lg-3 mb-1"><textarea name="course[${countCourse}][remark]" class="form-control" style="height: 40px ;" id="course_remark"></textarea></div><div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-course">Delete</button></div></div></div>`);
            ++countCourse;
        });
        $(document).on('click', '.remove-input-field-course', function() {
            $(this).parents('.course_remove').remove();
            --countCourse;
        });

        //tambah form Work experience
        var countExp = 2;
        $("#add_button_experience").click(function() {
            var form = `<div class="row text-center experience_remove text-white bg-secondary rounded py-1">
                                <div class="col-lg-2 mb-1">
                                
                                <input type="text" class="form-control" id="company_name" name="experience[${countExp}][company]">
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
                               
                                <textarea type="text" class="form-control" style="height: 40px ;" id="company_resign" name="experience[${countExp}][reason]"></textarea>
                            </div>
                            <div class="col-lg-2 mb-1">
                               
                                <textarea name="experience[${countExp}][company]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-experience">Delete</button></div>
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
            var form = `<div class="row text-center language_remove text-white bg-secondary rounded py-1">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="course_name" name="language[${countLanguage}][language]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                <input type="text" class="form-control" id="oral" name="language[${countLanguage}][oral]">
                            </div>
                            <div class="col-lg-2 mb-1">
                                
                                <input type="text" class="form-control" id="written" name="language[${countLanguage}][written]">
                            </div>
                            <div class="col-lg-4 mb-1">
                                
                                <textarea name="language[${countLanguage}][remark]" class="form-control" style="height: 40px ;" id="language_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-language">Delete</button></div>
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
            var form = `<div class="row family_remove text-center text-white bg-secondary rounded py-1">
                            <div class="col-lg-2 mb-1">
                                
                                <input name="family[${countFamily}][relation]" class="form-control" list="relationlist" id="relation">
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
                             <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-family">Delete</button></div>
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
            var form = `<div class="row organization_remove text-center text-white bg-secondary rounded py-1">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="organization_name" name="Organization[${countOrganization}][name]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="number" class="form-control" id="experience_from" name="Organization[${countOrganization}][position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea name="Organization[${countOrganization}][remark]" class="form-control" style="height: 40px ;" id="oraganization_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-organization">Delete</button></div>
                        
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
            var form = `<div class="row scholarship_remove text-center text-white bg-secondary rounded py-1">
                            <div class="col-lg-3 mb-1">
                                
                                <input type="text" class="form-control" id="institution_name" name="scholarship[${countScholar}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                                
                                <input type="number" class="form-control" id="institution_place" name="scholarship[${countScholar}][place]">
                            </div>
                            <div class="col-lg-5 mb-1">
                               
                                <textarea name="scholarship[${countScholar}][remark]" class="form-control" style="height: 40px ;" id="institution_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-scholarship">Delete</button></div>
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
            var form = `<div class="row recruitment_remove text-center text-white bg-secondary rounded py-1">
                            <div class="col-lg-3 mb-1">
                               
                                <input type="text" class="form-control" id="recruitment_name" name="recruitment[${countRecruitment}][institution]">
                            </div>
                            <div class="col-lg-3 mb-1">
                               
                                <input type="text" class="form-control" id="job_recruitment" name="recruitment[${countRecruitment}][job_position]">
                            </div>
                            <div class="col-lg-5 mb-1">
                                
                                <textarea name="recruitment[${countRecruitment}][remark]" class="form-control" style="height: 40px ;" id="recruitment_remark"></textarea>
                            </div>
                            <div class="col-1"><button type="button" class="btn btn-danger text-white remove-input-field-recruitment">Delete</button></div>
                        </div>`
            $("#recruitment_form").append(form);
            ++countRecruitment;
        });
        $(document).on('click', '.remove-input-field-recruitment', function() {
            $(this).parents('.recruitment_remove').remove();
            --countRecruitment;
        });
    </script>

</body>

</html>