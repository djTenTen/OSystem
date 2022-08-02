<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <h1 class="m-2">Select Department</h1>
            <div class="card-body p-0 row justify-content-center align-items-center">
                <!-- Nested Row within Card Body -->
                <div class="col-xl-3 col-md-6 mb-4 m-4" style="height: 250px;">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body" style="background-image: url(img/college.png); 
                        background-size: 150px; 
                        background-position: right; 
                        background-repeat: no-repeat; 
                        width:250px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">College Department</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        1st Year <br>
                                        2nd Year <br>
                                        3rd Year <br>
                                        4th Year
                                    </div>
                                </div>
                            </div>
                            <a href="signupcollege" class="btn btn-success mt-5">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4 m-4" style="height: 250px;" >
                    <div class="card border-left-danger h-100 py-2">
                        <div class="card-body" style="background-image: url(img/shs.png); 
                        background-size: 150px; 
                        background-position: right; 
                        background-repeat: no-repeat; 
                        width:250px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Senior High Department</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Grade 11 <br>
                                        Grade 12</div>
                                </div>
                            </div>
                            <a href="signupshs" class="btn btn-success mt-5">Register</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body p-0 row justify-content-center align-items-center">
                <div class="col-xl-3 col-md-6 mb-4 m-4" style="height: 250px;">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body" style="background-image: url(img/jhs.png); 
                        background-size: 150px; 
                        background-position: right; 
                        background-repeat: no-repeat; 
                        width:250px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Junior High Department</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Grade 7 <br>
                                        Grade 8 <br>
                                        Grade 9 <br>
                                        Grade 10
                                    </div>
                                </div>
                            </div>
                            <a href="signupjs" class="btn btn-success mt-3">Register</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 m-4" style="height: 250px;">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body"  style="background-image: url(img/gs1.png); 
                        background-size: 150px; 
                        background-position: right; 
                        background-repeat: no-repeat; 
                        width:250px;">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Grade School Department</div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Kinder I, Kinder II <br>
                                        Grade 1, Grade 2 <br>
                                        Grade 3, Grade 4 <br>
                                        Grade 5, Grade 6
                                    </div>
                                </div>
                            </div>
                            <a href="signupgs" class="btn btn-success mt-3">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>js/sb-admin-2.min.js"></script>

</body>

</html>