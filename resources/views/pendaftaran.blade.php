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
                        <div class="col-lg-4 mb-1">
                            <label for="school_name" class="form-label">Name of School</label>
                            <input type="text" class="form-control" id="school_name" name="nama_sekolah[]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="from" class="form-label">From</label>
                            <input type="number" class="form-control" id="from" name="from[]">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="to" class="form-label">To</label>
                            <input type="number" class="form-control" id="to" name="to[]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject[]">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="remark_education" class="form-label">Remark</label>
                            <textarea name="remark_education[]" class="form-control" style="height: 40px ;" id="remark-education"></textarea>
                        </div>
                    </div>
                    <div id="formal_education">

                    </div>

                    <a class="btn btn-secondary mt-1" href="javascript:void(0)" id="add_button_education" title="Add field">+ Add more</a>
                </div>
                <div class="col-md-12">
                    <label for="other_education" class="form-label">Other Education (Course etc.)</label>
                    <div class="row text-center bg-secondary rounded">
                        <div class="col-lg-4 mb-1">
                            <label for="formal_education" class="form-label">Name of Course</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="formal_education" class="form-label">From</label>
                            <input type="number" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="col-lg-1 mb-1">
                            <label for="formal_education" class="form-label">To</label>
                            <input type="number" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="formal_education" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin">
                        </div>
                        <div class="col-lg-3 mb-1">
                            <label for="formal_education" class="form-label">Remark</label>
                            <textarea name="formal_education" class="form-control" style="height: 40px ;" id=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="language" class="form-label">Language Proficiency</label>
                    <input type="text" class="form-control" id="language" name="language">
                </div>
                <div class="col-md-12">
                    <label for="experience" class="form-label">Working Experience</label>
                    <input type="text" class="form-control" id="experience" name="experience">
                </div>
                <div class="col-md-6">
                    <label for="salary" class="form-label">Requested Salary</label>
                    <input type="number" class="form-control form-floating" id="salary" name="salary">
                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable" value="1">
                    <label for="negotiable" class="form-label">Negotiable</label>
                    <input class="form-check-input ms-2" type="radio" name="negotiable" id="negotiable" value="0">
                    <label for="negotiable" class="form-label">Not Negotiable</label>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="str_weak"></textarea>
                        <label for="floatingTextarea">Give a brief description of the career you hope to follow</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="family" class="form-label">Family Data</label>
                    <input type="text" class="form-control" id="family" name="family">
                </div>
                <div class="col-md-12">

                    <div class="form-floating">
                        <textarea class="form-control" style="height: 100px" placeholder="Give a brief description about your strength and weakness" id="floatingTextarea" name="str_weak"></textarea>
                        <label for="floatingTextarea">Strength and Weakness</label>
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
                    <input type="text" class="form-control" id="organization">
                </div>
                <div class="col-md-12">
                    <label for="scholarship" class="form-label">Scholarship</label>
                    <input type="text" class="form-control" id="scholarship" name="scholarship">
                </div>
                <div class="col-md-12">
                    <label for="other_recruitment" class="form-label">In process of recruitment & selection in other company?</label>
                    <input type="text" class="form-control" id="other_recruitment" name="other_recruitement">
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
        var i = 0;
        $("#add_button_education").click(function() {
            ++i;
            $("#formal_education").append('<div class="row education_remove text-center text-white bg-secondary rounded py-1"><div class="col-lg-4 mb-1"><input type="text" class="form-control" id="school_name" name="nama_sekolah[]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="from" name="from[]"></div><div class="col-lg-1 mb-1"><input type="number" class="form-control" id="to" name="to[]"></div><div class="col-lg-3 mb-1"><input type="text" class="form-control" id="subject" name="subject[]"></div><div class="col-lg-3 mb-1"><textarea name="remark_education[]" class="form-control" style="height: 40px ;" id="remark-education"></textarea></div><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div>');
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('.education_remove').remove();
        });
    </script>

</body>

</html>