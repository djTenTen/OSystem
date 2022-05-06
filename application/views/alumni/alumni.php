<div class="container-fluid">
    <?php
        if($this->session->flashdata('updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Alumni successfully Updated 
        </div>';
        }

        if($this->session->flashdata('validated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Alumni successfully Validated 
        </div>';
        }
        
        if($this->session->flashdata('deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Alumni successfully Deleted  
        </div>';
        }
    
    ?>
<h1>Alumni Management</h1>

        <?= form_open('collegeStudentinfo');?>
            <div class="input-group mb-3">
                <input name="searchEvaluated" type="text" class="form-control" placeholder="Search Admission ID/Lastname" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchstudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <div style="overflow-y:scroll;width:100%;height:550px">        
            <table class="table table-bordered table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Alumni ID</th>
                    <th>Name</th>
                    <th>Alumni</th>
                    <th>Batch</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
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

                        function CheckColors(val){
                            var element=document.getElementById('indus');
                            if(val=='Select Industry'||val=='Other')
                            element.style.display='block';
                            else  
                            element.style.display='none';
                        }

                        function CheckPosition(val){
                            var element=document.getElementById('position');
                            if(val=='Select Status'||val=='Other')
                            element.style.display='block';
                            else  
                            element.style.display='none';
                        }
                    </script>

            <tbody>
            <?php foreach($alumni as $row){
                $GEN = $row['Gender'];

                if ($GEN == 'MALE'){$gdT = "checked";}else{$gdT = "";}

                if($GEN == 'FEMALE'){$gdF="checked";}else{$gdF="";}  
                
                ?>
                <tr>
                    <td><?= $row['alumniID']?></td>
                    <td><?= $row['FullName']?></td>
                    <td><?= $row['Alumni']?></td>
                    <td><?= $row['Batch']?></td>
                    <td><?php if($row['isValidated'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Validated</p>';}else{echo '<p class="btn btn-sm btn-danger">Pending</p>';}?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            
                            <?php if($row['isValidated'] == 'No'){?>
                                <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['alumniID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                            <?php }?>
                            <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['alumniID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                            <a type="button" data-toggle="modal" data-target="#myModalView<?= $row['alumniID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="far fa-eye"></span></a>
                        </div>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalView<?= $row['alumniID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Alumni Information</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open('validatealumni/'.$row['alumniID']);?>
                                        <h6><strong class="modalstyle">Name: </strong> <?= $row['FullName'];?></h5><br>
                                        <strong>Address: </strong><?= $row['FullAddress'];?><br>                                        
                                        <strong>Contact: </strong><?= $row['Contact'];?><br>
                                        <strong>Email: </strong><?= $row['Email'];?><br>
                                        <strong>Birthdate: </strong><?= $row['Birthdate'];?><br>
                                        <strong>Alumni: </strong><?= $row['Alumni'];?><br>
                                        <strong>Batch: </strong><?= $row['Batch'];?><br>                                 
                                        
                                        <div class="form-inline">
                                            <label for="text"><strong>Student Number: </strong></label>
                                            <input value="<?= $row['Studentno'];?>" name="studentnumber" type="text" class="form-control form-control-sm" placeholder="Student Number" id="lname" required>
                                        </div>
                                    </div>
                                
                                    <div class="modal-footer">
                                    
                                            <button type="submit" name="admitcollege" class="nav-link btn btn-success">Validate</button>
                                    <?= form_close();?>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->

                        <!-- The Modal -->
                        <div class="modal fade" id="myModalDelete<?= $row['alumniID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        
                                    Are you sure to delete <strong><?= $row['FullName'];?></strong>                              
       
                                    </div>
                                
                                    <div class="modal-footer">
                                    <?= form_open('deletealumni/'.$row['alumniID']);?>
                                        <button type="submit" name="admitcollege" class="btn btn-danger">Delete</button>
                                    <?= form_close();?>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->

                        <!-- The Modal -->
                        <div class="modal fade" id="myModalEdit<?= $row['alumniID'];?>">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Edit <?= $row['FullName'];?></h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                   
                                    <?= form_open('updatealumni/'.$row['alumniID']);?>

                                        <h4>Personal Information</h4>
                                        <div class="marg">
                                            
                                            <div class="form-row marg">
                                                <div class="form-group col-lg-3">
                                                    <label for="text">Last Name:</label>
                                                    <input value="<?= $row['LastName'];?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" required>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="text">First Name:</label>
                                                    <input value="<?= $row['FirstName'];?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" required>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="text">Middle Name:</label>
                                                    <input value="<?= $row['MiddleName'];?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name"  id="mname">
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label >Suffix: (Jr., Sr., III)</label>
                                                    <select name="suffix" class="form-control form-control-sm">
                                                        <option value="<?= $row['Suffix']?>" selected><?= $row['Suffix']?></option>
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
                                                <div class="form-group marg">
                                                    <label for="email">Gender:</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label col-5">
                                                            <input type="radio" class="form-check-input" id="gender" name="gender" value="MALE"<?= $gdT;?>>MALE
                                                        </label>
                                                        <label class="form-check-label col-5">
                                                            <input type="radio" class="form-check-input" id="gender" name="gender" Value="FEMALE" required  <?= $gdF;?>>FEMALE
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group marg col-lg-2">
                                                    <label for="email">Date of Birth:</label>
                                                    <input value="<?= $row['Birthdate'];?>" name="bdate" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="bdate" onchange="submitBday()" required>
                                                </div>
                                                <div class="form-group marg col-lg-1">
                                                    <label for="email">Age:</label>
                                                    <input value="<?= $row['Age'];?>" class="form-control form-control-sm" name="age" id="age" readonly>
                                                </div>
                                                <div class="form-group marg ">
                                                    <label for="gender">Marital Status:</label>
                                                    <select name="status" class="form-control form-control-sm" required>
                                                        <option value="<?= $row['MaritalStatus'];?>" selected><?= $row['MaritalStatus'];?></option>
                                                        <option value="SINGLE">SINGLE</option>
                                                        <option value="MARRIED">MARRIED</option>
                                                        <option value="DIVORCED">DIVORCED</option>
                                                        <option value="WIDOWED">WIDOWED</option>
                                                    </select>
                                                </div>     

                                                <div class="form-group marg col-lg-3">
                                                    <label >Email:</label>
                                                    <input value="<?= $row['Email'];?>" name="email" type="email" class="form-control form-control-sm" placeholder="sample@hccp.com" id="nationality">
                                                </div>
                                                <div class="form-group marg">
                                                    <label for="number">Contact Number:</label>
                                                    <input value="<?= $row['Contact'];?>" name="contact" type="text" class="form-control form-control-sm" placeholder="CONTACT NUMBER" id="Contact" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                </div>                   
                                            </div>


                                            <div class="form-row marg">
                                                <div class="form-group col-lg-3">
                                                    <label >Country:</label>
                                                    <input value="<?= $row['Country'];?>" name="country" type="text" class="form-control form-control-sm" placeholder="Home Province" id="address" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label >Province/State:</label>
                                                    <input value="<?= $row['Province'];?>" name="province" type="text" class="form-control form-control-sm" placeholder="Home Province" id="address" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label >Municipality/City</label>
                                                    <input value="<?= $row['Municipality'];?>" name="municipality" type="text" class="form-control form-control-sm" placeholder="Home Municipality" id="address" style="text-transform:uppercase" required>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label >Barangay/Street:</label>
                                                    <input value="<?= $row['Barangay'];?>" name="barangay" type="text" class="form-control form-control-sm" placeholder="Barangay" id="address" style="text-transform:uppercase" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row marg">
                                                
                                            
                                            </div>
                                    <!-- -->

                                        <!-- PARENT 1 -->
                                        <div class="marg">
                                            <h4>Occupation Status</h4>
                                            <div class="form-row marg">
                                                <div class="form-group col-lg-2">
                                                    <label >Status:</label>
                                                    <select name="employeestatus" class="form-control form-control-sm">
                                                        <option value="<?= $row['EmploymentStatus'];?>" selected><?= $row['EmploymentStatus'];?></option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="Business Owner">Business Owner</option>
                                                        <option value="Deceased">Deceased</option>
                                                        
                                                    </select>
                                                </div>

                                

                                                <div class="form-group col-lg-3">
                                                    <label >Industry:</label>
                                                    <select name="industry" class="form-control form-control-sm" onchange='CheckColors(this.value);'>
                                                        <option value="<?= $row['Industry'];?>" selected><?= $row['Industry'];?></option>
                                                        <option value="Healthcare">Healthcare</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Production">Production</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Arts/Media/Communication">Arts/Media/Communication</option>
                                                        <option value="Building/Construction/Engineering">Building/Construction</option>
                                                        <option value="Computer/Information Technology">Computer/Information Technology</option>
                                                        <option value="Hotel/Restaurant">Hotel/Restaurant</option>
                                                        <option value="Sales/Marketing/Accounting">Sales/Marketing/Accounting</option>
                                                        <option value="Engineering/Science">Engineering/Science</option>
                                                        <option value="Law">Law</option>
                                                        <option value="Public Service">Public Service</option>
                                                        <option value="Other">Other</option>        
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label>Other:</label>
                                                    <input value="<?= $row['OtherIndustry'];?>" name="otherindustry" type="text" class="form-control form-control-sm" placeholder="Other Industry">
                                                </div>
                                            </div>

                                            <!-- PARENT 2 -->
                                            <div class="form-row marg">
                                                <div class="form-group col-lg-3">
                                                    <label >Company Name:</label>
                                                    <input value="<?= $row['CompanyName'];?>" name="companyname" type="text" class="form-control form-control-sm" placeholder="Company" id="companyname">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="text">Position:</label>
                                                    <select name="position" class="form-control form-control-sm" onchange='CheckPosition(this.value);'>
                                                    <option value="<?= $row['Position'];?>" selected><?= $row['Position'];?></option>
                                                        <option value="Owner">Owner</option>
                                                        <option value="Managerial">Managerial</option>
                                                        <option value="Middle Management">Middle Management</option>
                                                        <option value="Clerical Support Staff">Clerical Support Staff</option>
                                                        <option value="Technical Support">Technical Support</option>
                                                        <option value="General Sevices">General Sevices</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label>Other:</label>
                                                    <input value="<?= $row['OtherPosition'];?>" name="otherposition" type="text" class="form-control form-control-sm" placeholder="Other Positions">
                                                </div>
                                            </div>

                                            <div class="form-row marg">
                                                <div class="form-group col-lg-3">
                                                    <label >Address:</label>
                                                    <input value="<?= $row['CompanyAddress'];?>" name="companyaddress" type="text" class="form-control form-control-sm" placeholder="First Name" id="parent1Fname" style="text-transform:uppercase">
                                                </div> 
                                                <div class="form-group col-lg-3">
                                                    <label for="text">Employment Status:</label>
                                                    <select name="empstatus" class="form-control form-control-sm">
                                                    <option value="<?= $row['EmployeeStatus'];?>" selected><?= $row['EmployeeStatus'];?></option>
                                                        <option value="Probationary">Probationary</option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Contractual">Contractual</option>
                                                        <option value="Consultancy">Consultancy</option>
                                                    </select>
                                                </div>                     
                                                
                                            </div>              
                                        </div>
                                    <!-- -->
                                        <div class="marg">
                                            <h4>Businesses</h4>
                                            <!-- ELEMENTARY -->
                                            <div class="form-row marg">
                                                <div class="form-group col-lg-6">
                                                    <label for="text">Business Name:</label>
                                                    <input value="<?= $row['BusinessName1'];?>" onkeypress="avoidSplChars(event)" name="businessname1" type="text" class="form-control form-control-sm" placeholder="Last Elementary School Attended"  style="text-transform:uppercase" id="elementary" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="text">Address:</label>
                                                    <input value="<?= $row['BusinessAddress1'];?>" name="businessaddress1" type="text" class="form-control form-control-sm" required>
                                                </div>
                                            </div>

                                            <div class="form-row marg">
                                                <div class="form-group col-lg-6">
                                                    <label for="text">Business Name:</label>
                                                    <input value="<?= $row['BusinessName2'];?>" onkeypress="avoidSplChars(event)" name="businessname2" type="text" class="form-control form-control-sm" placeholder="Last Elementary School Attended"  style="text-transform:uppercase" id="elementary" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="text">Address:</label>
                                                    <input value="<?= $row['BusinessAddress2'];?>" name="businessaddress2" type="text" class="form-control form-control-sm" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="marg">
                                            <h4>What Alumni :</h4>
                                            <div class="row">

                                                <div class="form-group col-lg-3">
                                                    <label for="text">Highest Educational Attainment:</label>
                                                    <select name="hea" class="form-control form-control-sm" required>
                                                    <option value="<?= $row['EducationalAttainment'];?>" selected><?= $row['EducationalAttainment'];?></option>
                                                        <option value="Elementary Graduate">Elementary Graduate</option>
                                                        <option value="High School Graduate">High School Graduate</option>                                
                                                        <option value="College Degree">College Degree</option>
                                                        <option value="Master's Graduate">Master's Degree</option>
                                                        <option value="Master's Graduate">Doctorate</option>
                                                    </select>
                                                </div> 

                                                <div class="form-group col-lg-4">
                                                    <label for="text">Achievements/Awards:</label>
                                                    <textarea name="achievements" class="form-control" rows="5" id="comment"><?= $row['Achievements'];?></textarea>
                                                </div> 
                                        
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-3">
                                                    <label for="text">Alumni:</label>
                                                    <select name="alumni" class="form-control form-control-sm">
                                                    <option value="<?= $row['Alumni'];?>" selected><?= $row['Alumni'];?></option>
                                                        <option value="Grade School">Grade School</option>
                                                        <option value="High School">High School</option>
                                                        <option value="Senior High School">Senior High School</option>
                                                        <option value="College">College</option>
                                                    </select>
                                                </div> 

                                                <div class="form-group col-lg-3">
                                                    <label >Batch Year:</label>
                                                    <input value="<?= $row['Batch'];?>" name="batch" type="text" class="form-control form-control-sm" placeholder="First Name" id="parent1Fname" style="text-transform:uppercase">
                                                </div> 
                                        
                                            </div>                                        
                
                                    <div class="modal-footer">
                                        <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                    <?= form_close(); ?>
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