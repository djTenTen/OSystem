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
    
    ?>
    <h1>Grade School Students</h1>
    <div class="container container-fluid"style="margin-top: 2%">
    
        <?= form_open("gradeschool");?>
            <div class="input-group mb-3">
                <input name="searchgradeschool" type="text" class="form-control" placeholder="Search Admission Number/Student Number/Lastname/Firstname" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchStudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <!-- LSIT OF VALIDATED STUDENTS -->
        
        <div style="overflow-y:scroll;width:100%;height:450px">        
            <table class="table table-bordered table-hover table-sm">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach($seniorhighstudents as $row){?>
                    <?php

                        $GEN = $row['Gender'];
                        if($GEN == 'MALE'){$gdT = "checked";}else{$gdT = "";}
                        if($GEN == 'FEMALE'){$gdF="checked";}else{$gdF="";}    
                                
                    ?>
                    <tr>
                        <td><?= $row['extension'].$row['StudentNo'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['Level'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <?= form_open('assesGradeschool/'.$row['admissionID']);?>
                                    <button type="submit" class="btn btn-sm btn-outline-<?php if($row['isAssess'] == 'Yes'){echo 'success';}else{echo 'primary';}?>" data-toggle="tooltip" title="Assess"><span class="fas fa-tasks"></span></button>
                                <?= form_close();?>
                                <a type="button" data-toggle="modal" data-target="#myModalShift<?= $row['admissionID'];?>"  class="btn btn-outline-secondary" data-toggle="tooltip" title="Shift"><span class="fas fa-history"></span></a>
                                <?= form_open('studentSubjectGradeschool/'.$row['admissionID']);?>
                                    <button type="submit"  class="btn btn-sm btn-outline-success" data-toggle="tooltip" title="Print"><span class="fas fa-print"></span></button>
                                <?= form_close();?>
                                <a type="button" data-toggle="modal" data-target="#printgrade<?= $row['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Print Grade"><span class="fas fa-scroll"></span></a>
                                <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['admissionID'];?>"  class="btn btn-outline-info" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                            </div>

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
                                        <?= form_open('printgradeGradeschool/'.$row['admissionID']);?>
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
                                            <strong>Section: </strong> <?= $row['Section'];?><br>
                                            <strong>Level: </strong> <?= $row['Level'];?><br><br>
                                            <strong>Note:</strong> This will be sent to Evaluators to re-evaluate the student
                                        </div>
                                    
                                        <div class="modal-footer">
                                            <?= form_open("shiftstudentGradeschool/".$row['admissionID']);?>
                                                <button name="shiftstudent" class="btn btn-success" type="submit">Send to Principal</button>
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
                                                <?= form_open('updateGradeschoolinfo/'.$row['admissionID']);?>
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
                                                                        <option value="<?= $row['Status'];?>" selected><?= $row['Status'];?></option>
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


</div>