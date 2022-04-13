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
            <form class="row g-3">
                <div class="col-md-12">
                    <label for="applyfor" class="form-label">Application for position of</label>
                    <input type="text" class="form-control" id="applyfor">
                </div>
                <div class="col-md-12">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="col-6">
                    <label for="dateofbirth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateofbirth">
                </div>
                <div class="col-6">
                    <label for="placeofbirth" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="placeofbirth">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sex</label><br>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="inputCity" class="form-label">Male</label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="inputCity" class="form-label">Female</label>
                </div>
                <div class="col-md-4">
                    <label for="marital" class="form-label">Marital Status</label>
                    <input type="text" class="form-control" id="marital">
                </div>
                <!-- <div class="col-md-4">
                    <label for="inputState" class="form-label"></label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div> -->
                <div class="col-md-2">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="nationality">
                </div>
                <div class="col-md-12">
                    <label for="religion" class="form-label">Religion</label>
                    <input type="text" class="form-control" id="religion">
                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Present Address</label>
                    <input type="text" class="form-control" id="address">
                </div>
                <div class="col-md-12">
                    <label for="ktp" class="form-label">Identify Card No (KTP)</label>
                    <input type="text" class="form-control" id="ktp">
                </div>
                <div class="col-md-2">
                    <label for="tinggi_badan" class="form-label">Height (cm)</label>
                    <input type="text" class="form-control" id="tinggi_badan">
                </div>
                <div class="col-md-2">
                    <label for="berat_badan" class="form-label">Weight (kg)</label>
                    <input type="text" class="form-control" id="berat_badan">
                </div>
                <div class="col-md-12">
                    <label for="healt" class="form-label">Present Healt Condition</label>
                    <input type="text" class="form-control" id="healt">
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="col-md-12">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="email" class="form-control" id="Facebook">
                </div>
                <div class="col-md-12">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram">
                </div>
                <div class="col-md-12">
                    <label for="linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin">
                </div>
                <div class="col-md-12">
                    <label for="formal_education" class="form-label">Formal Education</label>

                </div>
                <div class="col-md-12">
                    <label for="other_education" class="form-label">Other Education</label>

                </div>
                <div class="col-md-12">
                    <label for="language" class="form-label">Language Proficiency</label>

                </div>
                <div class="col-md-12">
                    <label for="experience" class="form-label">Working Experience</label>

                </div>
                <div class="col-md-6">
                    <label for="salary" class="form-label">Requested Salary</label>
                    <input type="text" class="form-control" id="salary">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="inputCity" class="form-label">Negotiable</label>
                    <input class="form-check-input ms-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="inputCity" class="form-label">Not Negotiable</label>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="career">Give a brief description of the career you hope to follow</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="family" class="form-label">Family Data</label>

                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="career">Give a brief description about your strength and weakness</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="activity" class="form-label">Activities outside the job</label>
                    <input type="text" class="form-control" id="activity">
                </div>
                <div class="col-md-12">
                    <label for="hobby" class="form-label">Hobby</label>
                    <input type="text" class="form-control" id="hobby">
                </div>
                <div class="col-md-12">
                    <label for="organisation" class="form-label">Organisation</label>

                </div>
                <div class="col-md-12">
                    <label for="scholarship" class="form-label">Scholarship</label>

                </div>
                <div class="col-md-12">
                    <label for="other_recruitment" class="form-label">In process of recruitment & selection in other company?</label>

                </div>
                <div class="col-md-12">
                    <label for="other_recruitment" class="form-label">Please mention you apply via</label>

                </div>
                <div class="col-md-12">
                    <label for="other_remark" class="form-label">Other Remark</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>

                <!-- button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>


    <!-- content -->
    <div class="container">

    </div>









    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>