<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url();?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>css/styles.css">
    <script src="<?= base_url();?>js/script.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url();?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url();?>js/demo/chart-pie-demo.js"></script>


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>



    <title><?= $title;?></title>

</head>

<body id="page-top">
    <?php
    // checking of password
        $secured = 'Yes';
        if($_SESSION['pss'] == 'pass1234'){
            $secured = 'No';
        }
        if($_SESSION['pss'] == 'pass12345'){
            $secured = 'No';
        }
        if(strlen($_SESSION['pss']) < 8){
            $secured = 'No';
        }
        if($_SESSION['pss'] == $_SESSION['LastName']){
            $secured = 'No';
        }
        

    ?>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="sidebar-brand align-items-center justify-content-center" href="<?= base_url();?>dashboard">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url();?>img/logo4.png" alt="Logo" class="logo">
                    <p>Holy Cross College</p>
                </div>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Offices
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div>
        </li> -->


        <?php
                if($_SESSION['Accounting'] == 'Yes'){	
                    echo '<li class="nav-item"><a class="nav-link" href="#"><span class="fas fa-balance-scale"></span> Accounting</a></li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Bookstore'] == 'Yes'){
                    echo '<li class="nav-item"><a class="nav-link" href="#"><span class="fas fa-book"></span> Bookstore</a></li>';
                }else{

                }
            ?>

            <?php    
                if($_SESSION['Canteen'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#canteeen" data-toggle="collapse" href="#"><span class="fas fa-pizza-slice"></span> Canteen</a>
                    <div class="collapse" id="canteeen">
                        <a class="dropdown-item whitetxt" href="'.base_url().'menu">Menu</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'product">Product</a>  
                                          
                    </div>
                </li>';
                }else{

                }
            ?>
            <?php           
                if($_SESSION['Cashier'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cashier"
                            aria-expanded="true" aria-controls="cashier">
                            <i class="fas fa-cash-register"></i>
                            <span>Cashier</span>
                        </a>
                        <div id="cashier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="dropdown-item whitetxt" href="registrardashboard">Dashboard</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_college">College</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_seniorhigh">Senior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_juniorhigh">Junior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_gradeschool">Grade School</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>

            <?php    
                if($_SESSION['Custodian'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#custodian" data-toggle="collapse" href="#"><span class="fas fa-swatchbook"></span> Custodian</a>
                    <div class="collapse" id="custodian">
                        <a class="dropdown-item whitetxt" href="'.base_url().'deployment">Deployment</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'inventory">Inventory</a>                                                           
                    </div>
                </li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Library'] == 'Yes'){
                    echo '<li class="nav-item"><a class="nav-link" href="#"><span class="fas fa-book-open"></span> Library</a></li>';
                }else{

                }
            ?>





            <?php           
                if($_SESSION['Guidance'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admission"
                            aria-expanded="true" aria-controls="admission">
                            <i class="fas fa-cash-register"></i>
                            <span>Admission</span>
                        </a>
                        <div id="admission" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Departments:</h6>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_college">College</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_seniorhigh">Senior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_juniorhigh">Junior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_gradeschool">Grade School</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>


                    <!-- <a class="dropdown-item whitetxt" href="<?= base_url()?>evaluate_college">Evaluate Student</a>
                    <a class="dropdown-item whitetxt" href="<?= base_url()?>collegeStudentinfo">Students</a>
                    <a class="dropdown-item whitetxt" href="<?= base_url()?>collegeEnrolled">Enrolled College</a>
                    <a class="dropdown-item whitetxt" href="<?= base_url()?>schedule_college">Schedule</a>
                    <a class="dropdown-item whitetxt" href="<?= base_url()?>classlist">Class List</a>
                    <a class="dropdown-item whitetxt" href="<?= base_url();?>pegradecollege">E-Grade</a>   -->

            <?php           
                if($_SESSION['Dean'] == 'Yes' || $_SESSION['Progchair'] == 'Yes' || $_SESSION['Principal'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#advising"
                            aria-expanded="true" aria-controls="advising">
                            <i class="fas fa-book-reader"></i>
                            <span>Advising</span>
                        </a>
                        <div id="advising" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav">

                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#status" data-toggle="collapse">Evaluation</a>
                                        <div class="collapse" id="status">
                                            <ul class="navbar-nav pl-3">
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url()?>evaluate_college">College</a> 
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_seniorhigh">Senior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_juniorhigh">Junior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_gradeschool">Grade School</a>                   
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" aria-expanded="true" aria-controls="registrar" data-target="#evaluation" data-toggle="collapse">Status</a>
                                        <div class="collapse" id="evaluation">
                                            <ul class="navbar-nav pl-3">
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url()?>collegeStudentinfo">College</a> 
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhighStudentinfo">Senior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhighStudentinfo">Junior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschoolStudentinfo">Grade School</a>                   
                                            </ul>
                                        </div>
                                    </li>
                                   
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#sched" data-toggle="collapse">Schedule</a>
                                        <div class="collapse" id="sched">
                                            <ul class="navbar-nav pl-3">
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url()?>schedule_college">College</a> 
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_seniorhigh">Senior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_juniorhigh">Junior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_gradeschool">Grade School</a>                   
                                            </ul>
                                        </div>
                                    </li>


                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#classlist" data-toggle="collapse">Classlist</a>
                                        <div class="collapse" id="classlist">
                                            <ul class="navbar-nav pl-3">
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url()?>classlist">College</a> 
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistseniorhigh">Senior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistjuniorhigh">Junior High</a>
                                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistgradeschool">Grade School</a>                   
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#egrade" data-toggle="collapse">E-grade</a>
                                        <div class="collapse" id="egrade">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradecollege">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradeseniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradejuniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradegradeschool">Grade School</a></li>
                                            </ul>
                                        </div>
                                    </li>
                            
                                </ul>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>
            
            <?php    
                // if($_SESSION['Humanresource'] == 'Yes'){
                //     echo '<li class="nav-item dropdown dropright">
                //     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#hr" data-toggle="collapse" href="#"><span class="fas fa-users"></span> Human Resource</a>
                //     <div class="collapse" id="hr">
                //         <a class="dropdown-item whitetxt" href="'.base_url().'employees">Employees</a>
                //         <a class="dropdown-item whitetxt" href="'.base_url().'empattendance">Attendance</a>
                //     </div>
                // </li>';
                // }else{

                // }
            ?>


            <?php           
                if($_SESSION['Registrar'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#registrar"
                            aria-expanded="true" aria-controls="registrar">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Registrar</span>
                        </a>
                        <div id="registrar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="dropdown-item whitetxt" href="registrardashboard">Dashboard</a></li>
                                    <li class="nav-item"><a class="dropdown-item whitetxt" href="https://hcconlineregistration.holycrosscollegepampanga.edu.ph/" target="_blank">Register Student</a></li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" aria-expanded="true" aria-controls="registrar" data-target="#studentregistrar" data-toggle="collapse">Students</a>
                                        <div class="collapse" id="studentregistrar">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>college">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschool">Grade School</a></li>                                         
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#egrade" data-toggle="collapse">E-Grade</a>
                                        <div class="collapse" id="egrade">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradecollege">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradeseniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradejuniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradegradeschool">Grade School</a></li>
                                    </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#gwa" data-toggle="collapse">GWA</a>
                                        <div class="collapse" id="gwa">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>collegeranking">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhighranking">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhighranking">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschoolranking">Grade School</a></li>
                                    </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item whitetxt" href="<?= base_url()?>alumni">Alumni</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>
                


            <?php           
                if($_SESSION['Teacher'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacher"
                            aria-expanded="true" aria-controls="teacher">
                            <i class="fas fa-user-graduate"></i>
                            <span>Teacher</span>
                        </a>
                        <div id="teacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Departments:</h6>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclasscollege">College</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassseniorhigh">Senior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassjuniorhigh">Junior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassgradeschool">Grade School</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>


            <?php           
                if($_SESSION['POD'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pod"
                            aria-expanded="true" aria-controls="pod">
                            <i class="fas fa-user-graduate"></i>
                            <span>Prefect of Discipline</span>
                        </a>
                        <div id="pod" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Departments:</h6>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_college">College</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_seniorhigh">Senior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_juniorhigh">Junior High</a>
                                <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_gradeschool">Grade School</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>


            <?php
                // if($_SESSION['Employee'] == 'Yes'){
                //     echo '<li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-male"></span><span class="fa fa-female"></span> Employee</a></li>';
                // }else{

                // }
            ?>



            <?php           
                if($_SESSION['Student'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student"
                            aria-expanded="true" aria-controls="student">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Student</span>
                        </a>
                        <div id="student" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Departments:</h6>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>studentinfo">Information</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>schedsubjects">Subjects & Sched</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>studentsgrades">Grade</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>

            <?php
                // if($_SESSION['President'] == 'Yes'){
                //     echo '<li class="nav-item dropdown dropright">
                //     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#president" data-toggle="collapse" href="#"><span class="fas fa-user-tie"></span> President</a>
                //     <div class="collapse" id="president">
                        
                //     </div>
                // </li>';
                // }else{

                // }
            ?>




            <?php           
                if($_SESSION['MIS'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mis"
                            aria-expanded="true" aria-controls="mis">
                            <i class="fas fa-user-shield"></i>
                            <span>MIS</span>
                        </a>
                        <div id="mis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Departments:</h6>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>mistransactionlogs">Transaction Logs</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>collegereset">Reset College</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>shsreset">Reset Seniorhigh</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>jhsreset">Reset Juniorhigh</a>
                                <a class="dropdown-item whitetxt" href="<?= base_url();?>gsreset">Reset Gradeschool</a>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>




            <?php           
                if($_SESSION['Administrator'] == 'Yes'){?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
                            aria-expanded="true" aria-controls="admin">
                            <i class="fas fa-user-secret"></i>
                            <span>Administrator</span>
                        </a>
                        <div id="admin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>systemconfiguration">Config</a></li>
                                    <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>users">Users</a></li>
                                    <li class="nav-item"><a class="dropdown-item whitetxt" href="#">Positions</a></li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" aria-expanded="true" aria-controls="registrar" data-target="#subjects" data-toggle="collapse">Subjects</a>
                                        <div class="collapse" id="subjects">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>subject_college">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>subject_seniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>subject_juniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>subject_gradeschool">Grade School</a></li>                                         
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#curri" data-toggle="collapse">Curriculum</a>
                                        <div class="collapse" id="curri">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_college">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_seniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_juniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_gradeschool">Grade School</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#class" data-toggle="collapse">Class</a>
                                        <div class="collapse" id="class">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_college">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_seniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_juniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>curriculum_gradeschool">Grade School</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#gwa" data-toggle="collapse">GWA</a>
                                        <div class="collapse" id="gwa">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>collegeranking">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhighranking">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhighranking">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschoolranking">Grade School</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown"><a class="dropdown-item whitetxt" href="<?= base_url();?>courses">Courses</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-item whitetxt" href="<?= base_url();?>discount">Discounts</a></li>

                                    <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#misc" data-toggle="collapse">Miscellaneous</a>
                                        <div class="collapse" id="misc">
                                            <ul class="navbar-nav pl-3">
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>miscellaneous_college">College</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>miscellaneous_seniorhigh">Senior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>miscellaneous_juniorhigh">Junior High</a></li>
                                                <li class="nav-item"><a class="dropdown-item whitetxt" href="<?= base_url();?>miscellaneous_gradeschool">Grade School</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
            <?php }else{

                }
            ?>

        </ul>
        <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <div class="row align-items-center">
                    <div class="container">
                        <h1><?= $title;?></h1>
                    </div>
                </div>
                
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['FullName'];?></span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <!-- <div class="container-fluid"> -->

                <!-- MAIN CONTENT -->

            <!-- </div> -->


            <!-- /.container-fluid -->


            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        


    


