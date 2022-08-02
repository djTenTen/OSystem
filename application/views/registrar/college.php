<div class="container-fluid">
    <?php

        if($this->session->flashdata('CollegeShifted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student successfully Shifted. 
        </div>';
        }

        if($this->session->flashdata('CollegeMarked') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student successfully Mark as TES Grantee. 
        </div>';
        }
        
        if($this->session->flashdata('Student_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student Record Updated. 
        </div>';
        }

        if($this->session->flashdata('CollegeAssessed') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student successfully assessed. 
        </div>';
        }
    
    ?>

    <h1>College Students</h1>
    
    <div class="container container-fluid"style="margin-top: 2%">
    
        <?= form_open("college");?>
            <div class="input-group mb-3">
                <input name="searchCollege" type="text" class="form-control" placeholder="Search Admission Number/Student Number/Lastname/Firstname" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchStudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <!-- LSIT OF VALIDATED STUDENTS -->
              
            <table class="table table-bordered table-hover table-sm" id="datatable">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Sem</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach($collegestudents as $row){?>
                    <?php
                        $TES = $row['isTES'];
                        $GEN = $row['Gender'];

                        if($TES == "Yes"){$chT ="checked";}else{$chT ="";}
                        if($TES == "No"){$chF ="checked";}else{$chF ="";}
                        if($GEN == 'MALE'){$gdT = "checked";}else{$gdT = "";}
                        if($GEN == 'FEMALE'){$gdF="checked";}else{$gdF="";}    
                                
                    ?>
                    <tr>
                        <td><?= $row['extension'].$row['StudentNo'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['CourseCode'];?></td>
                        <td><?= $row['Level'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td>
                            <a class="btn btn-outline-<?php if($row['isAssess'] == 'Yes'){echo 'success';}else{echo 'primary';}?>" data-toggle="tooltip" title="Assess" href="<?= base_url().'assescollege/'.$row['admissionID']?>"><span class="fas fa-tasks"></a>
                            <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['admissionID'];?>"  class="btn btn-outline-info" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                            <?php if($row['isValidated'] == 'No' or $row['isEvaluated'] == 'No'){?>
                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#printgrade<?= $row['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Print Grade"><span class="fas fa-scroll"></span></a>
                                </div>
                            <?php }else{?>
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-outline-<?php if($row['isAssess'] == 'Yes'){echo 'success';}else{echo 'primary';}?>" data-toggle="tooltip" title="Assess" href="<?= base_url().'assescollege/'.$row['admissionID']?>"><span class="fas fa-tasks"></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalShift<?= $row['admissionID'];?>"  class="btn btn-outline-secondary" data-toggle="tooltip" title="Shift"><span class="fas fa-history"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#mymarkTES<?= $row['admissionID'];?>"  class="btn btn-outline-<?php if($row['isTES'] == 'Yes'){echo 'success';}else{echo 'danger';}?>" data-toggle="tooltip" title="Mark as TES Grantee"><span class="fas fa-stamp"></span></a>
                                    <?= form_open('studentSubjectsCollege/'.$row['admissionID']);?>
                                        <button type="submit"  class="btn btn-sm btn-outline-success" data-toggle="tooltip" title="Print Subjects"><span class="fas fa-print"></span></button>
                                    <?= form_close();?>
                                    <a type="button" data-toggle="modal" data-target="#printgrade<?= $row['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Print Grade"><span class="fas fa-scroll"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['admissionID'];?>"  class="btn btn-outline-info" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <?= form_open('college_dropsubject/'.$row['admissionID']);?>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title="Drop Subject"><span class="fas fa-level-down-alt"></span></button>
                                    <?= form_close();?>
                                </div>
                            <?php }?>
                            <!-- The Modal -->
                            <div class="modal fade" id="printgrade<?= $row['admissionID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>Select school Year and Sem</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <?= form_open('printgradeCollege/'.$row['admissionID']);?>
                                        <div class="modal-body">
                                            <div class="container">
                                                <h5><?= $row['FullName'];?></h5>
                                                <div class="row form-inline">

                                                    <div class="form-group m-2">
                                                        <label for="sy">School Year: </label>
                                                        <select name="sy" class="form-control form-control-sm" required>
                                                            <option value="">School Year</option>
                                                            <?php foreach($viewSY as $sy){?>
                                                                <option value="<?= $sy['sy'];?>"><?= $sy['sy'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group m-2">
                                                        <label for="sy">Semester: </label>
                                                        <select name="sem" class="form-control form-control-sm" required>
                                                            <option value="">Semester</option>
                                                            <?php foreach($viewSem as $sem){?>
                                                                <option value="<?= $sem['semester'];?>"><?= $sem['semester'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>

                                                </div>   
                                            </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                            <button name="shiftstudent" class="btn btn-primary" type="submit">Print Grade</button>
                                            <?= form_close();?>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END OF MODAL -->

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalShift<?= $row['admissionID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>Student Information</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <h6><strong class="modalstyle">Name: </strong><?= $row['FullName'];?></h5><br>
                                            <strong>Department: </strong> <?= $row['CollegeDPT'];?><br>
                                            <strong>Course: </strong> <?= $row['CourseDesc'];?><br>
                                            <strong>Level: </strong> <?= $row['Level'];?><br>
                                            <strong>Semester: </strong> <?= $row['Semester'];?><br>
                                            <?= form_open("shiftstudent/".$row['admissionID']);?>
                                                <div class="form-group"style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                                                    <label>New Course:</label>
                                                    <select name="shiftCto" class="form-control form-control-sm" required>
                                                        <option value="" selected>Select Course: </option>                                                        
                                                        <?php foreach($course as $courses){?>
                                                            <option value="<?= $courses['CourseID'];?>"><?= $courses['CourseDesc'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                        </div>
                                    
                                        <div class="modal-footer">
                                            <button name="shiftstudent" class="btn btn-success" type="submit">Send to Evaluator</button>
                                            <?= form_close();?>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END OF MODAL -->



                            <!-- The Modal -->
                            <div class="modal fade" id="mymarkTES<?= $row['admissionID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            You are marking <strong> <?= $row['FullName'];?></strong> as Tertiary Education Subsidy scholar
                                        </div> 
                                        <div class="modal-footer">
                                            <?= form_open("marktes/".$row['admissionID']);?>
                                                <button name="markTES" class="btn btn-success" type="submit">Mark as TES Grantee</button>
                                            <?= form_close();?>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END OF MODAL -->

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalEdit<?= $row['admissionID'];?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Student Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <?= form_open('updateCollegeinfo/'.$row['admissionID']);?>
                                                    <div class="modal-body">

                                                    <div class="container" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 50px; margin-bottom: 50px; padding-top: 30px;padding-bottom: 30px;">
                                                    <div class="container-fluid marg">
                                                    </div>
                                                                          
                                                        <div class="marg">                                                
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Last Name:</label>
                                                                    <input value="<?= $row['LastName'];?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">First Name:</label>
                                                                    <input value="<?= $row['FirstName'];?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Middle Name:</label>
                                                                    <input value="<?= $row['MiddleName'];?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name"  style="text-transform:uppercase" id="mname">
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label >Suffix: (Jr., Sr., III)</label>
                                                                    <select name="suffix" class="form-control form-control-sm">
                                                                        <option value="<?= $row['Suffix'];?>" selected><?= $row['Suffix'];?></option>
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
                                                            <div class="form-group col-lg-3">
                                                                    <label >Barangay:</label>
                                                                    <input value="<?= $row['Barangay'];?>" name="barangay" type="text" class="form-control form-control-sm" placeholder="Barangay" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label >Municipality:</label>
                                                                    <input value="<?= $row['Municipality'];?>" name="municipality" type="text" class="form-control form-control-sm" placeholder="Home Municipality" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label >Province:</label>
                                                                    <input value="<?= $row['Province'];?>" name="province" type="text" class="form-control form-control-sm" placeholder="Home Province" id="address" style="text-transform:uppercase" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-3">
                                                                    <label >Email:</label>
                                                                    <input value="<?= $row['Email'];?>" name="email" type="email" class="form-control form-control-sm" placeholder="sample@hccp.com" id="nationality">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="number">Contact Number:</label>
                                                                    <input value="<?= $row['Contact'];?>" name="contact" type="text" class="form-control form-control-sm" placeholder="CONTACT NUMBER" id="Contact" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label for="email">Date of Birth:</label>
                                                                    <input value="<?= $row['Birthdate'];?>" name="bdate" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="bdate" onchange="submitBday()" required>
                                                                </div>
                                                                <div class="form-group col-lg-1">
                                                                    <label for="email">Age:</label>
                                                                    <input value="<?= $row['Age'];?>" id="age" class="form-control form-control-sm" name="age" id="age" readonly>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="email">Gender:</label>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label col-5">
                                                                            <input type="radio" class="form-check-input" id="gender" name="gender" value="MALE" <?= $gdT;?>>MALE
                                                                        </label>
                                                                        <label class="form-check-label col-5">
                                                                            <input type="radio" class="form-check-input" id="gender" name="gender" Value="FEMALE" <?= $gdF;?>>FEMALE
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="gender">Marital Status:</label>
                                                                    <select name="status" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row['Status'];?>" selected>Select Status</option>
                                                                        <option value="SINGLE">SINGLE</option>
                                                                        <option value="MARRIED">MARRIED</option>
                                                                        <option value="DIVORCED">DIVORCED</option>
                                                                        <option value="WIDOWED">WIDOWED</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="text">Nationality:</label>
                                                                    <input value="<?= $row['Nationality'];?>" name="nationality" type="text" class="form-control form-control-sm" placeholder="Nationality" id="Nationality" style="text-transform:uppercase">
                                                                </div>
                                                                <div class="form-group marg">
                                                                    <label for="text">Religion:</label>
                                                                    <input value="<?= $row['Religion'];?>" name="religion" type="text" class="form-control form-control-sm" placeholder="Religion" id="Religion" style="text-transform:uppercase">
                                                                </div>
                                                            </div>
                                                    <!-- -->
                                        
                                                        <!-- PARENT 1 -->
                                                        <div class="marg">
                                                            <h6>Parent & Guardian Information</h6>
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Parent Name:</label>
                                                                    <input <input value="<?= $row['Guardian1'];?>" name="parent1name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" required>
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label>Relation:</label>
                                                                    <select name="parent1Relation" class="form-control form-control-sm" required>
                                                                        <option value="<?= $row['RelationG1'];?>" selected><?= $row['RelationG1'];?></option>
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
                                                                    <input value="<?= $row['ContactG1'];?>" name="parent1Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                            </div>
                                        
                                                            <!-- PARENT 2 -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-4">
                                                                    <label>Parent Name:</label>
                                                                    <input <input value="<?= $row['Guardian2'];?>" name="parent2name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" >
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label>Relation:</label>
                                                                    <select name="parent2Relation" class="form-control form-control-sm" >
                                                                        <option value="<?= $row['RelationG2'];?>" selected><?= $row['RelationG2'];?></option>
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
                                                                    <input value="<?= $row['ContactG2'];?>" name="parent2Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" >
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
                                                                    <input value="<?= $row['Elementary'];?>" onkeypress="avoidSplChars(event)" name="elementary" type="text" class="form-control form-control-sm" placeholder="Last Elementary School Attended"  style="text-transform:uppercase" id="elementary" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row['ESY'];?>" name="esy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="esy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                                </div>
                                                            </div>
                                                            <!-- JUNIOR HIGH -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="text">High School:</label>
                                                                    <input value="<?= $row['Highschool'];?>" onkeypress="avoidSplChars(event)" name="highschool" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last High School Attended" id="highschool" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row['HSY'];?>" name="hsy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required> 
                                                                </div>
                                                            </div>
                                                            <!-- SENIOR HIGH -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-5">
                                                                    <label for="text">Senior High School:</label>
                                                                    <input value="<?= $row['Seniorhighschool'];?>" onkeypress="avoidSplChars(event)" name="seniorhigh" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last Senior High School" id="Lname">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Strand:</label>
                                                                    <select name="Sstrand" class="form-control form-control-sm">
                                                                    <option value="<?= $row['Sstrand'];?>" selected><?= $row['Sstrand'];?></option>
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
                                                                    <input value="<?= $row['SSY'];?>" name="ssy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="hsy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                                                </div>
                                                            </div>
                                                            <!-- COLLEGE -->
                                                            <div class="form-row marg">
                                                                <div class="form-group col-lg-5">
                                                                    <label for="text">College:</label>
                                                                    <input value="<?= $row['Collegeschool'];?>" onkeypress="avoidSplChars(event)" name="Collegeschool" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Last College Attended" id="college">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Course:</label>
                                                                    <input value="<?= $row['Ccourse'];?>" name="Ccourse" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Course Taken" id="Ccourse">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="text">Year Graduated:</label>
                                                                    <input value="<?= $row['CSY'];?>" name="csy" type="text" class="form-control form-control-sm" placeholder="Year Graduated" id="csy" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
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
                                                        
                                                    </div>
                                                <?= form_close();?>
                                                
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
