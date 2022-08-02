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
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="container m-3">
                    <form class="user" action="">
                        <div class="col-3 m-3">
                            <select name="" id="" class="form-control rounded-pill">
                                <option value="" selected>Select type of Application</option>
                                <option value="NEW">NEW</option>
                                <option value="OLD">OLD</option>
                                <option value="TRANSFEREE">TRANSFEREE</option>
                            </select>
                        </div>
                    </form>
                    <hr>

                    <div class="container">
                        <form class="registerstudent" action="">
                            <h6><strong>Personal Information</strong></h6>
                            <div class="form-row marg">
                                <div class="form-group col-lg-3">
                                    <label for="text">Last Name:</label>
                                    <input name="lname" type="text" class="form-control form-control-sm rounded-pill rounded-pill" placeholder="Last Name" id="lname" style="text-transform:uppercase" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="text">First Name:</label>
                                    <input name="fname" type="text" class="form-control form-control-sm rounded-pill rounded-pill" placeholder="First Name" id="fname" style="text-transform:uppercase" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="text">Middle Name:</label>
                                    <input name="mname" type="text" class="form-control form-control-sm rounded-pill rounded-pill" placeholder="Middle Name"  style="text-transform:uppercase" id="mname">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label >Extension Name:</label>
                                    <select name="suffix" class="form-control form-control-sm rounded-pill rounded-pill" >
                                        <option value="" selected>Select Suffix</option>
                                        <option value="JR.">JR.</option>
                                        <option value="SR.">SR.</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V">V</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-row marg">
                                <div class="form-group col-lg-2">
                                    <label  for="email">Year:</label>
                                    <select name="grade" class="form-control form-control-sm rounded-pill" required>
                                        <option value="" selected>Select Year Level</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                        <option value="5th Year">5th Year</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label>Semester:</label>
                                    <select name="sem" class="form-control form-control-sm rounded-pill" required>
                                        <option value="" selected>Select Semester</option>
                                        <option value="1st Sem" selected>1st Sem</option>
                                        <!-- <option value="2nd Sem">2nd Sem</option> -->
                                        <!-- <option value="Summer">Summer</option> -->
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email">Course:</label>
                                    <select name="course" class="form-control form-control-sm rounded-pill"required>
                                        <option value="" selected>Select Course</option>
                                        <?php foreach($course as $row){?>
                                            <option value="<?= $row['CourseID'];?>" ><?= $row['CourseCode'].' - '.$row['CourseDesc'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="text">LRN:</label>
                                    <input name="lrn" type="text" maxlength="12" class="form-control form-control-sm rounded-pill" placeholder="Learner Reference Number" id="lrn" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                </div>
                            </div>
                            <div class="form-row marg">
                                <div class="form-group col-lg-3">
                                    <label >Barangay:</label>
                                    <input name="barangay" type="text" class="form-control form-control-sm rounded-pill" placeholder="Barangay" id="address" style="text-transform:uppercase" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label >Municipality:</label>
                                    <input name="municipality" type="text" class="form-control form-control-sm rounded-pill" placeholder="Home Municipality" id="address" style="text-transform:uppercase" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label >Province:</label>
                                    <input name="province" type="text" class="form-control form-control-sm rounded-pill" placeholder="Home Province" id="address" style="text-transform:uppercase" required>
                                </div>
                            </div>
                            <div class="form-row marg">
                                <div class="form-group col-lg-3">
                                    <label >Email:</label>
                                    <input name="email" type="email" class="form-control form-control-sm rounded-pill" placeholder="sample@hccp.com" id="nationality" required>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="number">Contact Number:</label>
                                    <input name="contact" type="text" class="form-control form-control-sm rounded-pill" placeholder="CONTACT NUMBER" id="Contact" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                </div>
                                <div class="form-group col-lg-2">
                                    <label for="email">Date of Birth:</label>
                                    <input name="bdate" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm rounded-pill" id="bdate" onchange="submitBday()" required>
                                </div>
                                <div class="form-group col-lg-1">
                                    <label for="email">Age:</label>
                                    <input class="form-control form-control-sm rounded-pill" name="age" id="age" readonly>
                                </div>
                                <div class="form-group marg col-lg-3">
                                    <label for="email">Gender:</label>
                                    <div class="form-check">
                                        <label class="form-check-label col-5">
                                            <input type="radio" class="form-check-input" id="gender" name="gender" value="MALE">MALE
                                        </label>
                                        <label class="form-check-label col-5">
                                            <input type="radio" class="form-check-input" id="gender" name="gender" Value="FEMALE" required>FEMALE
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group marg col-lg-2">
                                    <label for="gender">Marital Status:</label>
                                    <select name="status" class="form-control form-control-sm rounded-pill" required>
                                        <option value="" selected>Select Status</option>
                                        <option value="SINGLE">SINGLE</option>
                                        <option value="MARRIED">MARRIED</option>
                                        <option value="DIVORCED">DIVORCED</option>
                                        <option value="WIDOWED">WIDOWED</option>
                                    </select>
                                </div>
                                <div class="form-group marg col-lg-2">
                                    <label for="text">Nationality:</label>
                                    <input name="nationality" type="text" class="form-control form-control-sm rounded-pill" placeholder="Nationality" id="Nationality" style="text-transform:uppercase">
                                </div>
                                <div class="form-group marg col-lg-2">
                                    <label for="text">Religion:</label>
                                    <input name="religion" type="text" class="form-control form-control-sm rounded-pill" placeholder="Religion" id="Religion" style="text-transform:uppercase">
                                </div>
                            </div>
                <!-- -->    <hr>

                            <!-- PARENT 1 -->
                            <div class="marg">
                                <h6><strong>Parent & Guardian Information</strong></h6>
                                <div class="form-row marg">
                                    <div class="form-group col-lg-2">
                                        <label >Last Name:</label>
                                        <input name="parent1Lname" type="text" class="form-control form-control-sm rounded-pill" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" required>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >First Name:</label>
                                        <input name="parent1Fname" type="text" class="form-control form-control-sm rounded-pill" placeholder="First Name" id="parent1Fname" style="text-transform:uppercase" required>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >Middle Name:</label>
                                        <input name="parent1Mname" type="text" class="form-control form-control-sm rounded-pill" placeholder="Middle Name" id="parent1Mname" style="text-transform:uppercase">
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label >Extension Name:</label>
                                        <select name="parent1Suffix" class="form-control form-control-sm rounded-pill">
                                            <option value="" selected>Select Suffix</option>
                                            <option value="JR.">JR.</option>
                                            <option value="SR.">SR.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>Relation:</label>
                                        <select name="parent1Relation" class="form-control form-control-sm rounded-pill" required>
                                            <option value="" selected>Select Relation</option>
                                            <option value="FATHER">FATHER</option>
                                            <option value="MOTHER">MOTHER</option>
                                            <option value="BROTHER">BROTHER</option>
                                            <option value="SISTER">SISTER</option>
                                            <option value="UNCLE">UNCLE</option>
                                            <option value="AUNTIE">AUNTIE</option>
                                            <option value="GRANDFATHER">GRANDFATHER</option>
                                            <option value="GRANDMOTHER">GRANDMOTHER</option>
                                            <option value="STEPFATHER">STEPFATHER</option>
                                            <option value="STEPMOTHER">STEPMOTHER</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >Contact Number:</label>
                                        <input name="parent1Contact"type="text" class="form-control form-control-sm rounded-pill" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                    </div>
                                </div>

                                <!-- PARENT 2 -->
                                <div class="form-row marg">
                                    <div class="form-group col-lg-2">
                                        <label >Last Name:</label>
                                        <input name="parent2Lname" type="text" class="form-control form-control-sm rounded-pill" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >First Name:</label>
                                        <input name="parent2Fname" type="text" class="form-control form-control-sm rounded-pill" placeholder="First Name" id="parent1Fname" style="text-transform:uppercase">
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >Middle Name:</label>
                                        <input name="parent2Mname" type="text" class="form-control form-control-sm rounded-pill" placeholder="Middle Name" id="parent1Mname" style="text-transform:uppercase">
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <label >Extension Name:</label>
                                        <select name="parent2Suffix" class="form-control form-control-sm rounded-pill">
                                            <option value="" selected>Select Suffix</option>
                                            <option value="JR.">JR.</option>
                                            <option value="SR.">SR.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>Relation:</label>
                                        <select name="parent2Relation" class="form-control form-control-sm rounded-pill">
                                            <option value="" selected>Select Relation</option>
                                            <option value="FATHER">FATHER</option>
                                            <option value="MOTHER">MOTHER</option>
                                            <option value="BROTHER">BROTHER</option>
                                            <option value="SISTER">SISTER</option>
                                            <option value="UNCLE">UNCLE</option>
                                            <option value="AUNTIE">AUNTIE</option>
                                            <option value="GRANDFATHER">GRANDFATHER</option>
                                            <option value="GRANDMOTHER">GRANDMOTHER</option>
                                            <option value="STEPFATHER">STEPFATHER</option>
                                            <option value="STEPMOTHER">STEPMOTHER</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label >Contact Number:</label>
                                        <input name="parent2Contact"type="text" class="form-control form-control-sm rounded-pill" placeholder="Contact Number" id="parent2Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>              
                            </div>
                <!-- -->    <hr>
                            <div class="marg">
                                <h6><strong>Educational Background</strong></h6>
                                <!-- ELEMENTARY -->
                                <div class="form-row marg">
                                    <div class="form-group col-lg-8">
                                        <label for="text">Elementary:</label>
                                        <input onkeypress="avoidSplChars(event)" name="elementary" type="text" class="form-control form-control-sm rounded-pill" placeholder="Last Elementary School Attended"  style="text-transform:uppercase" id="elementary" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Year Graduated:</label>
                                        <input name="esy" type="text" class="form-control form-control-sm rounded-pill" placeholder="Year Graduated" id="esy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                    </div>
                                </div>
                                <!-- JUNIOR HIGH -->
                                <div class="form-row marg">
                                    <div class="form-group col-lg-8">
                                        <label for="text">High School:</label>
                                        <input onkeypress="avoidSplChars(event)" name="highschool" type="text" class="form-control form-control-sm rounded-pill" style="text-transform:uppercase" placeholder="Last High School Attended" id="highschool" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Year Graduated:</label>
                                        <input name="hsy" type="text" class="form-control form-control-sm rounded-pill" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required> 
                                    </div>
                                </div>
                                <!-- SENIOR HIGH -->
                                <div class="form-row marg">
                                    <div class="form-group col-lg-5">
                                        <label for="text">Senior High School:</label>
                                        <input onkeypress="avoidSplChars(event)" name="seniorhigh" type="text" class="form-control form-control-sm rounded-pill" style="text-transform:uppercase" placeholder="Last Senior High School" id="Lname">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Strand:</label>
                                        <select name="Sstrand" class="form-control form-control-sm rounded-pill">
                                        <option value="" selected>Select Strand </option>
                                            <option value="STEM">STEM</option>
                                            <option value="HUMSS">HUMSS</option>
                                            <option value="ABM">ABM</option>
                                            <option value="TVL-HE">TVL-HE</option>
                                            <option value="TVL-ICT">TVL-ICT</option>
                                            <option value="G12">GAS</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Year Graduated:</label>
                                        <input  name="ssy" type="text" class="form-control form-control-sm rounded-pill" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>
                                <!-- COLLEGE -->
                                <div class="form-row marg">
                                    <div class="form-group col-lg-5">
                                        <label for="text">College:</label>
                                        <input onkeypress="avoidSplChars(event)" name="Collegeschool" type="text" class="form-control form-control-sm rounded-pill" style="text-transform:uppercase" placeholder="Last College Attended" id="college">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Course:</label>
                                        <input name="Ccourse" type="text" class="form-control form-control-sm rounded-pill" style="text-transform:uppercase" placeholder="Course Taken" id="Ccourse">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="text">Year Graduated:</label>
                                        <input  name="csy" type="text" class="form-control form-control-sm rounded-pill" placeholder="Year Graduated" id="csy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="marg">
                                <h6><strong>Vaccination Information</strong></h6>

                                <div class="form-row marg">
                                    <label >Are you Vaccinated?</label>
                                    <div class="form-inline">
                                        <div class="form-check">
                                            <label class="form-check-label col-4">
                                                <input type="radio" data-toggle="collapse" data-target="#vacc" class="form-check-input" id="yesCheck" name="isvaccinated" value="Yes">Yes
                                            </label>
                                            <label class="form-check-label col-3">
                                                
                                            </label>
                                            <label class="form-check-label col-4">
                                                <input type="radio" class="form-check-input" id="noCheck" name="isvaccinated" Value="No" required>No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="vacc" class="collapse" >

                                    <div class="form-row marg">
                                        <div class="form-group col-lg-3">
                                            <label >Name of Vaccine:</label>
                                            <select name="vaccine" class="form-control form-control-sm rounded-pill" >
                                                <option value="" selected>Select Vaccine</option>
                                                <option value="Pfizer BioNTech">Pfizer-BioNTech</option>
                                                <option value="Oxford AstraZeneca">Oxford-AstraZeneca</option>
                                                <option value="CoronaVac Sinovac">CoronaVac (Sinovac)</option>
                                                <option value="Gamaleya Sputnik V">Gamaleya Sputnik V</option>
                                                <option value="Johnson and Johnsons Janssen">Johnson and Johnson's Janssen (J & J)</option>
                                                <option value="Bharat BioTech">Bharat BioTech</option>
                                                <option value="Moderna">Moderna</option>
                                                <option value="Sinopharm">Sinopharm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row marg">
                                        <div class="form-group col-lg-5">
                                            <label>Date of 1st Dose:</label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <select name="mm" class="form-control form-control-sm rounded-pill" >
                                                        <option value="" selected>MM</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="Augus">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>/
                                                <div class="col-3">
                                                    <select name="dd" class="form-control form-control-sm rounded-pill" >
                                                        <option value="" selected>DD</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>/
                                                <div class="col-3">
                                                    <select name="yy" class="form-control form-control-sm rounded-pill" >
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021" selected>2021</option>
                                                        <option value="2022">2022</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Date of 2nd Dose:</label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <select name="mm2" class="form-control form-control-sm rounded-pill" >
                                                        <option value="" selected>MM</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="Augus">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                    </select>
                                                </div>/

                                                <div class="col-3">
                                                    <select name="dd2" class="form-control form-control-sm rounded-pill" >
                                                        <option value="" selected>DD</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>/
                                                <div class="col-3">
                                                    <select name="yy2" class="form-control form-control-sm rounded-pill" >
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021" selected>2021</option>
                                                        <option value="2022">2022</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label for="text">Vaccination Center:</label>
                                            <input onkeypress="avoidSplChars(event)" name="vaccenter" type="text" class="form-control form-control-sm rounded-pill" style="text-transform:uppercase" placeholder="Municipality Vaccination Center" id="vaccenter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        
                            <div class="form-row marg">
                                <div class="form-check marg">
                                    <div class="dropdown-divider"></div>
                                    <input class="form-check-input mr-sm-2" type="checkbox" id="" name="" value="" required>
                                    <label class="mr-sm-2" style="font-size: 13px;">
                                    <strong>I Agree that Holy Cross College</strong> respects the privacy of our users and has developed this Privacy Policy
                                    to demonstrate its commitment to protecting your privacy, this information are stored only in the Holy Cross College
                                    Database and acknowledging the <strong>Republic Act 10173 – Data Privacy Act of 2012</strong>.</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                        </form>
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


    <script>
        function avoidSplChars(e) {  
            e = e || window.event;  
            var bad = /[^\sa-z\d]/i,  
                key = String.fromCharCode(e.keyCode || e.which);  
            if (e.which !== 0 && e.charCode !== 0 && bad.test(key)) {  
                e.returnValue = false;  
                if (e.preventDefault) {  
                    e.preventDefault();  
                }  
            }  
        }
    </script>

    <script>

        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('ifYes').style.visibility = 'visible';
            } else {
                document.getElementById('ifYes').style.visibility = 'hidden';
            }
        }

        $(document).ready(function() {
                $("input[name$='category']").click(function() {
                    var test = $(this).val();

                    $("div.desc").hide();
                    $("#Cate" + test).show();
                });
            });

        function submitBday() {

            var Q4A = "";
            var Bdate = document.getElementById('bdate').value;
            var Bday = +new Date(Bdate);
            Q4A += ~~ ((Date.now() - Bday) / (31557600000));
            document.getElementById('age').value = Q4A;

        }
    </script>

</body>

</html>