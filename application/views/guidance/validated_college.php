<div class="container-fluid">


    <?php
        if($this->session->flashdata('Student_Validated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Student has been successfully validated. 
        </div>';
        }

        if($this->session->flashdata('Student_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Student has been updated successfully. 
        </div>';
        }

        if($this->session->flashdata('Student_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Student info has been removed. 
        </div>';
        }

        if($this->session->flashdata('Student_Dismiss') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Student has been Dismissed. 
        </div>';
        }
    


        
    ?>

   

    <div class="container">
        <div class="row">
            <div class="card m-2 alert alert-info" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <!-- <img class="card-img-top" src="<?//= base_url();?>/image/logo.jpg" alt="Card image"> -->
                <div class="card-body">
                    <h4 class="card-title">New</h4>
                    <h2 class="card-text"> <span class="fas fa-user-graduate"></span> <?= $NewStudentCountCollege;?></h2>
                </div>
            </div>
            <div class="card m-2 alert alert-light" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <!-- <img class="card-img-top" src="<?//= base_url();?>/image/logo.jpg" alt="Card image"> -->
                <div class="card-body">
                    <h4 class="card-title">Old</h4>
                    <h2 class="card-text"> <span class="fas fa-user-graduate"></span> <?= $OldStudentCountCollege;?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= form_open('validated_college');?>
                    <div class="input-group mb-3">
                        <input name="searchvalidated" type="text" class="form-control" placeholder="Search Admission ID/Lastname/Firstname" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="search" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>
                <h5>Validated : <?= $validatedcount;?></h5> 
                <div style="overflow-y:scroll;width:100%;height:300px">       
                    <table class="table table-bordered table-sm">
                        <thead class="sticky-top bg-white">
                            <tr>
                                <th>Admission ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($validated as $row3){?>
                            <tr class="<?php if($row3['isEvaluated'] == 'Yes'){echo 'alert alert-primary';}?>">
                                <td><?= $row3['admissionID']?></td>
                                <td><?= $row3['FullName']?></td>
                                <td><?= $row3['CourseCode']?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row3['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    </div>

                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalEdit<?= $row3['admissionID'];?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Student Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <?= form_open('updateCollege/'.$row3['admissionID']);?>
                                                    <div class="modal-body">

                                                    <div class="container" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 50px; margin-bottom: 50px; padding-top: 30px;padding-bottom: 30px;">
                                                    <div class="container-fluid marg">
                                                        <h6>Please Fill all the Necessary Fields</h6>
                                                    </div>

                                                        <div class="">
                                                            <div class="form-row container">

                                                                    <div class="form-group col-lg-2">
                                                                        <label class="form-check-label">
                                                                            Application Type:
                                                                        </label>
                                                                        <select name="toApplication" class="form-control form-control-sm" required>
                                                                            <option value="<?= $row3['TypeofApplication'];?>" selected><?= $row3['TypeofApplication'];?></option>
                                                                            <option value="NEW">NEW</option>
                                                                            <option value="OLD">OLD</option>
                                                                            <option value="TRANSFEREE">TRANSFEREE</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-lg-3">
                                                                        <label class="form-check-label">
                                                                        Student number if OLD STUDENT:
                                                                        </label>
                                                                        <input value="<?= $row3['StudentNo'];?>" type="text" name="studentno" class="form-control form-control-sm" <?php if($row3['TypeofApplication']=='NEW'){echo 'readonly';}?>>
                                                                    </div>

                                                                <div class="form-check col-md-6">
                                                                    <label class="form-check-label">
                                                                        Are you T.E.S (Tertiary Education Subsidy) Grantee?
                                                                    </label>
                                                                    <div class="form-inline">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label col-4">
                                                                                <input type="radio" class="form-check-input" id="isTES" name="isTES" value="Yes" <?php if($row3['isTES'] == 'Yes' ){echo 'checked';}?>>Yes
                                                                            </label>
                                                                            <label class="form-check-label col-3">
                                                                                
                                                                            </label>
                                                                            <label class="form-check-label col-4">
                                                                                <input type="radio" class="form-check-input" id="isTES" name="isTES" Value="No" <?php if($row3['isTES'] == 'No' ){echo 'checked';}?>>No
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                        
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="marg">
                                        
                                                            <h6>Student Information</h6>
                                                            
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Last Name:</label>
                                                                    <input value="<?= $row3['LastName'];?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">First Name:</label>
                                                                    <input value="<?= $row3['FirstName'];?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Middle Name:</label>
                                                                    <input value="<?= $row3['MiddleName'];?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name"  style="text-transform:uppercase" id="mname">
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label >Suffix: (Jr., Sr., III)</label>
                                                                    <select name="suffix" class="form-control form-control-sm">
                                                                        <option value="<?= $row3['Suffix'];?>" selected><?= $row3['Suffix'];?></option>
                                                                        <option value="">None</option>
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
                                                                    <select name="level" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row3['Level'];?>" selected><?= $row3['Level'];?></option>
                                                                        <option value="1st Year">1st Year</option>
                                                                        <option value="2nd Year">2nd Year</option>
                                                                        <option value="3rd Year">3rd Year</option>
                                                                        <option value="4th Year">4th Year</option>
                                                                        <option value="5th Year">5th Year</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label>Semester:</label>
                                                                    <select name="sem" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row3['Semester'];?>" selected><?= $row3['Semester'];?></option>
                                                                        <option value="1st Sem">1st Sem</option>
                                                                        <option value="2nd Sem">2nd Sem</option>
                                                                        <option value="Summer">Summer</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label for="email">Course:</label>
                                                                    <select name="course" class="form-control form-control-sm"required>
                                                                    <option value="<?= $row3['Course'];?>" selected><?= $row3['CourseDesc'];?></option>
                                                                    <?php foreach($courses as $row2){?>
                                                                        <option value="<?= $row2['CourseID'];?>"><?= $row2['CourseDesc'];?></option>
                                                                    <?php }?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">LRN:</label>
                                                                    <input value="<?= $row3['LRN'];?>" name="lrn" type="text" maxlength="12" class="form-control form-control-sm" placeholder="Learner Reference Number" id="lrn" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                                                </div>
                                                            </div>
                                                            <div class="form-row marg">
                                                            <div class="form-group col-lg-3">
                                                                    <label >Barangay:</label>
                                                                    <input value="<?= $row3['Barangay'];?>" name="barangay" type="text" class="form-control form-control-sm" placeholder="Barangay" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label >Municipality:</label>
                                                                    <input value="<?= $row3['Municipality'];?>" name="municipality" type="text" class="form-control form-control-sm" placeholder="Home Municipality" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label >Province:</label>
                                                                    <input value="<?= $row3['Province'];?>" name="province" type="text" class="form-control form-control-sm" placeholder="Home Province" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-3">
                                                                    <label >Email:</label>
                                                                    <input value="<?= $row3['Email'];?>" name="email" type="email" class="form-control form-control-sm" placeholder="sample@hccp.com" id="nationality">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="number">Contact Number:</label>
                                                                    <input value="<?= $row3['Contact'];?>" name="contact" type="text" class="form-control form-control-sm" placeholder="CONTACT NUMBER" id="Contact" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label for="email">Date of Birth:</label>
                                                                    <input value="<?= $row3['Birthdate'];?>" name="bdate" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="bdate" onchange="submitBday()" required>
                                                                </div>
                                                                <div class="form-group col-lg-1">
                                                                    <label for="email">Age:</label>
                                                                    <input value="<?= $row3['Age'];?>" id="age" class="form-control form-control-sm" name="age" id="age" readonly>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="email">Gender:</label>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label col-5">
                                                                            <input type="radio" class="form-check-input" id="gender" name="gender" value="MALE" <?php if($row3['Gender'] == 'MALE' ){echo 'checked';}?>>MALE
                                                                        </label>
                                                                        <label class="form-check-label col-5">
                                                                            <input type="radio" class="form-check-input" id="gender" name="gender" Value="FEMALE" <?php if($row3['Gender'] == 'FEMALE' ){echo 'checked';}?>>FEMALE
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="gender">Marital Status:</label>
                                                                    <select name="status" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row3['Status'];?>" selected>Select Status</option>
                                                                        <option value="SINGLE">SINGLE</option>
                                                                        <option value="MARRIED">MARRIED</option>
                                                                        <option value="DIVORCED">DIVORCED</option>
                                                                        <option value="WIDOWED">WIDOWED</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="text">Nationality:</label>
                                                                    <input value="<?= $row3['Nationality'];?>" name="nationality" type="text" class="form-control form-control-sm" placeholder="Nationality" id="Nationality" style="text-transform:uppercase">
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="text">Religion:</label>
                                                                    <input value="<?= $row3['Religion'];?>" name="religion" type="text" class="form-control form-control-sm" placeholder="Religion" id="Religion" style="text-transform:uppercase">
                                                                </div>
                                                            </div>
                                                    <!-- -->
                                        
                                                        <!-- PARENT 1 -->
                                                        <div class="marg">
                                                            <h6>Parent & Guardian Information</h6>
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Parent Name:</label>
                                                                    <input <input value="<?= $row3['Guardian1'];?>" name="parent1name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label>Relation:</label>
                                                                    <select name="parent1Relation" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row3['RelationG1'];?>" selected><?= $row3['RelationG1'];?></option>
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
                                                                    <input value="<?= $row3['ContactG1'];?>" name="parent1Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                            </div>
                                        
                                                            <!-- PARENT 2 -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Parent Name:</label>
                                                                    <input <input value="<?= $row3['Guardian2'];?>" name="parent2name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" >
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label>Relation:</label>
                                                                    <select name="parent2Relation" class="form-control form-control-sm" >
                                                                        <option value="<?= $row3['RelationG2'];?>" selected><?= $row3['RelationG2'];?></option>
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
                                                                    <input value="<?= $row3['ContactG2'];?>" name="parent2Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" >
                                                                </div>
                                                            </div>             
                                                        </div>
                                                    <!-- -->
                                                        <div class="marg">
                                                            <h6>Educational Background</h6>
                                                            <!-- ELEMENTARY -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="text">Elementary:</label>
                                                                    <input value="<?= $row3['Elementary'];?>" onkeypress="avoidSplChars(event)" name="elementary" type="text" class="form-control form-control-sm" placeholder="Last Elementary School Attended"  style="text-transform:uppercase" id="elementary" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row3['ESY'];?>" name="esy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="esy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                            </div>
                                                            <!-- JUNIOR HIGH -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="text">High School:</label>
                                                                    <input value="<?= $row3['Highschool'];?>" onkeypress="avoidSplChars(event)" name="highschool" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last High School Attended" id="highschool" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row3['HSY'];?>" name="hsy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required> 
                                                                </div>
                                                            </div>
                                                            <!-- SENIOR HIGH -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-5">
                                                                    <label for="text">Senior High School:</label>
                                                                    <input value="<?= $row3['Seniorhighschool'];?>" onkeypress="avoidSplChars(event)" name="seniorhigh" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last Senior High School" id="Lname">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Strand:</label>
                                                                    <select name="Sstrand" class="form-control form-control-sm">
                                                                    <option value="<?= $row3['Sstrand'];?>" selected><?= $row3['Sstrand'];?></option>
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
                                                                    <input value="<?= $row3['SSY'];?>" name="ssy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                                                </div>
                                                            </div>
                                                            <!-- COLLEGE -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-5">
                                                                    <label for="text">College:</label>
                                                                    <input value="<?= $row3['Collegeschool'];?>" onkeypress="avoidSplChars(event)" name="Collegeschool" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last College Attended" id="college">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Course:</label>
                                                                    <input value="<?= $row3['Ccourse'];?>" name="Ccourse" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Course Taken" id="Ccourse">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row3['CSY'];?>" name="csy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="csy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>

                                                            function submitBday() {

                                                                var Q4A = "";
                                                                var Bdate = document.getElementById("bdate").value;
                                                                var Bday = +new Date(Bdate);
                                                                Q4A += ~~ ((Date.now() - Bday) / (31557600000));
                                                                document.getElementById("age").value = Q4A;

                                                            }
                                                        </script>
                                                
                                                    <div class="modal-footer">
                                                        
                                                        <button type="submit" name="updateStudentinfo" class="nav-link btn btn-success">Update</button>
                                                        <?= form_close();?>
                                                        
                                                        <?= form_open('printcollegeinfo/'.$row3['admissionID']);?>
                                                            <button type="submit" name="updateStudentinfo" class="nav-link btn btn-primary"><span class="fas fa-file-pdf"></span>Print</button>
                                                        <?= form_close();?>
                                                    </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL -->
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    
</div>