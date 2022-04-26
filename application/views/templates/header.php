<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url();?>css/styles.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="<?= base_url();?>js/script.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>

</head>
<style>
/*@media only screen and (min-device-width : 360px) and (max-device-width : 575px){
  .sidenav {
    width: 100%;
    height: auto;
    margin-left: 0px;
  }
  .sidenav a {
      font-size: 18px;
    }
    .sidenav ul {
      margin-top: 20px;
    }

    .main{
     margin-left: 0px;
     margin-top: 80px;
     padding: 10px;
    }
    .navbar a{
    font-size: auto;
    position: center;
    }
    .navbar-dark{
        height: auto;
    }
    .navbar{
        height: auto;
    }
    .nav-item a{
    font-size: 14px;
    }
  
}
*/
</style>


<body>
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


    <nav class="navbar navbar-dark navbar-expand-sm <?php if($secured == 'No'){ echo 'bg-danger';}else{echo 'bg-dark';}?> sticky-top">
        <a class="navbar-brand" href="<?= base_url();?>dashboard"><img src="<?= base_url();?>image/logo4.png" alt="" srcset="" style="height: 30px;"> Holy Cross College Sta. Ana Pampanga</a>

        <ul class="navbar-nav ml-auto">
            <!-- Dropdown -->
            <li class="nav-item">
                <?php if($secured  == 'No'){ $userID = $_SESSION['userid'];?>
                    <?= form_open(base_url()."accountsetting/$userID");?>
                        <button type="submit" class="btn btn-dark"><strong>You are using Unsecured Account, Click here change your password</strong></button>
                    <?= form_close();?>
                <?php }?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?= $_SESSION['Position'].'-'.$_SESSION['FullName'];?>
                <span class="fas fa-user-circle" style="font-size:20px;"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url();?>accountsetting/<?= $_SESSION['userid']?>">Account Settings</a>
                    <a class="dropdown-item" href="<?= base_url();?>logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- style="padding-left:200px; -->
    <nav class="navbar-dark <?php if($secured  == 'No'){ echo 'bg-danger';}else{echo 'bg-dark';}?> sidenav pt-5">
        <ul class="navbar-nav pl-3 pt-4">
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
                
                if($_SESSION['Cashier'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#cashier" data-toggle="collapse" href="#"><span class="fas fa-cash-register"></span> Cashier</a>
                    <div class="collapse" id="cashier">
                        ';?>
                        <a class="dropdown-item whitetxt" href="registrardashboard">Dashboard</a>
                        <a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_college">College</a>
                        <a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_seniorhigh">Senior High</a>
                        <a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_juniorhigh">Junior High</a>
                        <a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>cashier_gradeschool">Grade School</a>
            <?php   echo '                
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php    
                if($_SESSION['Clinic'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#clinic" data-toggle="collapse" href="#"><span class="fas fa-medkit"></span> Clinic</a>
                    <div class="collapse" id="clinic">
                        <a class="dropdown-item whitetxt" href="'.base_url().'tracevisitors">Visitors</a>                                                         
                    </div>
                </li>';
                }else{
                    
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
                if($_SESSION['Guidance'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#guidance" data-toggle="collapse" href="#"><span class="fas fa-hands"></span> Guidance</a>
                    <div class="collapse" id="guidance">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="https://hcconlineregistration.holycrosscollegepampanga.edu.ph/index.php" target="_blank">Register Student</a></li>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" href="#" id="navbardrop" data-target="#admission" data-toggle="collapse">Admission</a>
                                <div class="collapse" id="admission">
                                    <ul class="navbar-nav pl-3">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>admission_gradeschool">Grade School</a></li>
                                        
                                        
                            <?php  echo  '</ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php
                
                if($_SESSION['Dean'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#dean" data-toggle="collapse" href="#"><span class="fas fa-book-reader"></span> Deans</a>
                    <div class="collapse" id="dean">
                        <ul class="navbar-nav">
                            <a class="dropdown-item whitetxt" href="'.base_url().'evaluate_college">Evaluate Student</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'collegeStudentinfo">Students</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'collegeEnrolled">Enrolled College</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'schedule_college">Schedule</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'classlist">Class List</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'subject_college">College Subject</a>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#egrade" data-toggle="collapse">E-Grade</a>
                                <div class="collapse" id="egrade">
                                    <ul class="navbar-nav pl-3">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradecollege">College</a></li>
                                <?php  echo  '</ul>
                                </div>
                            </li>
                        </ul> 
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php
                if($_SESSION['Progchair'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#programchair" data-toggle="collapse" href="#"><span class="fas fa-user-cog"></span> Program Chairs</a>
                    <div class="collapse" id="programchair">
                        <ul class="navbar-nav">
                            <a class="dropdown-item whitetxt" href="'.base_url().'evaluate_college">Evaluate Student</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'collegeStudentinfo">Students</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'collegeEnrolled">Enrolled College</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'schedule_college">Schedule</a>
                            <a class="dropdown-item whitetxt" href="'.base_url().'classlist">Class List</a>
                            <li class="nav-item dropdown dropright">
                                        <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#egrade" data-toggle="collapse">E-Grade</a>
                                        <div class="collapse" id="egrade">
                                            <ul class="navbar-nav pl-3">'; ?>
                                                <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pegradecollege">College</a></li>
                                    <?php  echo  '</ul>
                                        </div>
                                    </li>
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Multimedia'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#multimedia" data-toggle="collapse" href="#"><span class="fas fa-play"></span> Multimedia</a>
                    <div class="collapse" id="multimedia">
                        <a class="dropdown-item whitetxt" href="'.base_url().'request">Requests</a>
                    </div>
                </li>';
                }else{

                }
            ?>


            <?php    
                if($_SESSION['Humanresource'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#hr" data-toggle="collapse" href="#"><span class="fas fa-users"></span> Human Resource</a>
                    <div class="collapse" id="hr">
                        <a class="dropdown-item whitetxt" href="'.base_url().'employees">Employees</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'empattendance">Attendance</a>
                    </div>
                </li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Registrar'] == 'Yes'){	
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" type="button" id="navbardrop" data-target="#registrar" data-toggle="collapse"><span class="fas fa-chalkboard-teacher"></span> Registrar</a>
                    <div class="collapse" id="registrar">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="registrardashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="https://hcconlineregistration.holycrosscollegepampanga.edu.ph/" target="_blank">Register Student</a></li>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#studentregistrar" data-toggle="collapse">Students</a>
                                <div class="collapse" id="studentregistrar">
                                    <ul class="navbar-nav pl-3">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschool">Grade School</a></li>                                         
                            <?php  echo  '</ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#egrade" data-toggle="collapse">E-Grade</a>
                                <div class="collapse" id="egrade">
                                    <ul class="navbar-nav pl-3">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradecollege">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradeseniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradejuniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>egradegradeschool">Grade School</a></li>
                            <?php  echo  '</ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" type="button" id="navbardrop" data-target="#gwa" data-toggle="collapse">GWA</a>
                                <div class="collapse" id="gwa">
                                    <ul class="navbar-nav pl-3">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>collegeranking">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhighranking">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhighranking">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschoolranking">Grade School</a></li>
                            <?php  echo  '</ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item whitetxt" href="'.base_url().'alumni">Alumni</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>
                
            <?php
                if($_SESSION['Teacher'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#teacher" data-toggle="collapse" href="#"><span class="fas fa-user-graduate"></span> Teacher</a>
                    <div class="collapse" id="teacher">
                        <ul class="navbar-nav">'; ?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclasscollege">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassseniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassjuniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>myclassgradeschool">Grade School</a></li>
                            <?php  echo  '
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Principal'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a type="button" class="nav-link dropdown-toggle" id="navbardrop" data-target="#principal" data-toggle="collapse"><span class="fa fa-street-view"></span> Principal</a>
                    <div class="collapse" id="principal">
                        <ul class="navbar-nav">
        
                            <li class="nav-item dropdown dropright">
                                <a href="#" class="dropdown-item whitetxt dropdown-toggle" data-target="#estudents" data-toggle="collapse">Evaluate Student</a>
                                <div class="collapse" id="estudents">
                                    <ul class="navbar-nav pl-3">';?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>evaluate_gradeschool">Grade School</a></li>
                                    <?php echo '
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropright">
                                <a href="#" class="dropdown-item whitetxt dropdown-toggle" data-target="#students" data-toggle="collapse">Students</a>
                                <div class="collapse" id="students">
                                    <ul class="navbar-nav pl-3">';?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>seniorhighStudentinfo">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>juniorhighStudentinfo">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>gradeschoolStudentinfo">Grade School</a></li>
                                    <?php echo '
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropright">
                                <a href="#" class="dropdown-item whitetxt dropdown-toggle" data-target="#schedule" data-toggle="collapse">Schedule</a>
                                <div class="collapse" id="schedule">
                                    <ul class="navbar-nav pl-3">';?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>schedule_gradeschool">Grade School</a></li>
                                    <?php echo '
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropright">
                                <a href="#" class="dropdown-item whitetxt dropdown-toggle" data-target="#classlist" data-toggle="collapse">Classlist</a>
                                <div class="collapse" id="classlist">
                                    <ul class="navbar-nav pl-3">';?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistseniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistjuniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>classlistgradeschool">Grade School</a></li>
                                    <?php echo '
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>


            <?php
                if($_SESSION['POD'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a type="button" class="nav-link dropdown-toggle" id="navbardrop" data-target="#pod" data-toggle="collapse"><span class="fa fa-street-view"></span> POD</a>
                    <div class="collapse" id="pod">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown dropright">
                                <a href="#" class="dropdown-item whitetxt dropdown-toggle" data-target="#estudents" data-toggle="collapse">Students</a>
                                <div class="collapse" id="estudents">
                                    <ul class="navbar-nav pl-3">';?>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['Collegedpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['SeniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['JuniorHighdpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt <?php if($_SESSION['GradeSchooldpt'] == 'No'){echo "disabled";}?>" href="<?= base_url();?>pod_gradeschool">Grade School</a></li>
                                    <?php echo '
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php
                if($_SESSION['Employee'] == 'Yes'){
                    echo '<li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-male"></span><span class="fa fa-female"></span> Employee</a></li>';
                }else{

                }
            ?>
            <?php
                if($_SESSION['Student'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#student" data-toggle="collapse" href="#"><span class="fas fa-graduation-cap"></span> Student</a>
                    <div class="collapse" id="student">
                        <a class="dropdown-item whitetxt" href="'.base_url().'studentinfo">Information</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'schedsubjects">Subjects & Sched</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'studentsgrades">Grade</a>
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php
                if($_SESSION['President'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#president" data-toggle="collapse" href="#"><span class="fas fa-user-tie"></span> President</a>
                    <div class="collapse" id="president">
                        
                    </div>
                </li>';
                }else{

                }
            ?>

            <?php
                if($_SESSION['MIS'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#president" data-toggle="collapse" href="#"><span class="fas fa-user-shield"></span> M.I.S</a>
                    <div class="collapse" id="president">
                        <a class="dropdown-item whitetxt" href="'.base_url().'mistransactionlogs">Transaction Logs</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'collegereset">Reset College</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'shsreset">Reset Seniorhigh</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'jhsreset">Reset Juniorhigh</a>
                        <a class="dropdown-item whitetxt" href="'.base_url().'gsreset">Reset Gradeschool</a>
                    </div>
                </li>';
                }else{

                }
            ?>
            
            <?php
                if($_SESSION['Administrator'] == 'Yes'){
                    echo '<li class="nav-item dropdown dropright">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-target="#admin" data-toggle="collapse" href="#"><span class="fas fa-user-secret"></span> Administrator</a>
                    <div class="collapse" id="admin">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="#">Dashboard</a></li>
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'systemconfiguration">Config</a></li>
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'users">Users</a></li>
                            <li class="nav-item"><a class="dropdown-item whitetxt" href="#">Positions</a></li>
                            
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" href="#" id="navbardrop" data-target="#subjects" data-toggle="collapse">Subjects</a>
                                <div class="collapse" id="subjects">
                                    <ul class="navbar-nav pl-3">
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'subject_college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'subject_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'subject_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'subject_gradeschool">Grade School</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" href="#" id="navbardrop" data-target="#curriculum" data-toggle="collapse">Curriculum</a>
                                <div class="collapse" id="curriculum">
                                    <ul class="navbar-nav pl-3">
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'curriculum_college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'curriculum_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'curriculum_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'curriculum_gradeschool">Grade School</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item dropdown"><a class="dropdown-item whitetxt" href="'.base_url().'courses">Courses</a></li>
                            <li class="nav-item dropdown"><a class="dropdown-item whitetxt" href="discount">Discounts</a></li>
                            <li class="nav-item dropdown dropright">
                                <a class="dropdown-item whitetxt dropdown-toggle" href="#" id="navbardrop" data-target="#misc" data-toggle="collapse">Miscellaneous</a>
                                <div class="collapse" id="misc">
                                    <ul class="navbar-nav pl-3">
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'miscellaneous_college">College</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'miscellaneous_seniorhigh">Senior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'miscellaneous_juniorhigh">Junior High</a></li>
                                        <li class="nav-item"><a class="dropdown-item whitetxt" href="'.base_url().'miscellaneous_gradeschool">Grade School</a></li>
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </li>';
                }else{

                }
            ?>
           
        </ul>
    </nav>
   

    


