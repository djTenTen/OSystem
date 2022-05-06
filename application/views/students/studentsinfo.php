<div class="container-fluid">
<div class="Title">
<h1>Student Information</h1>
</div>

            <div class="container" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 50px; margin-bottom: 50px; padding-top: 30px;padding-bottom: 30px;">
                <div class="container-fluid marg">
                </div>
                                    
                <div class="marg">                                                
                    <div class="form-row marg">
                        <div class="form-group col-lg-3">
                            <label for="text">Last Name:</label>
                            <input value="<?= $LastName;?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="text">First Name:</label>
                            <input value="<?= $FirstName;?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="text">Middle Name:</label>
                            <input value="<?= $MiddleName;?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name"  style="text-transform:uppercase" id="mname" readonly>
                        </div>
                        <div class="form-group col-lg-2">
                            <label >Suffix: (Jr., Sr., III)</label>
                            <select name="suffix" class="form-control form-control-sm" readonly>
                                <option value="<?= $Suffix;?>" selected><?= $Suffix;?></option>
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
                            <input value="<?= $Barangay;?>" name="barangay" type="text" class="form-control form-control-sm" placeholder="Barangay" id="address" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label >Municipality:</label>
                            <input value="<?= $Municipality;?>" name="municipality" type="text" class="form-control form-control-sm" placeholder="Home Municipality" id="address" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label >Province:</label>
                            <input value="<?= $Province;?>" name="province" type="text" class="form-control form-control-sm" placeholder="Home Province" id="address" style="text-transform:uppercase" readonly>
                        </div>
                    </div>
                    <div class="form-row marg">
                        <div class="form-group col-lg-3">
                            <label >Email:</label>
                            <input value="<?= $Email;?>" name="email" type="email" class="form-control form-control-sm" placeholder="sample@hccp.com" id="nationality" readonly>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="number">Contact Number:</label>
                            <input value="<?= $Contact;?>" name="contact" type="text" class="form-control form-control-sm" placeholder="CONTACT NUMBER" id="Contact" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" readonly>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="email">Date of Birth:</label>
                            <input value="<?= $Birthdate;?>" name="bdate" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="bdate" onchange="submitBday()" readonly>
                        </div>
                        <div class="form-group col-lg-1">
                            <label for="email">Age:</label>
                            <input value="<?= $Age;?>" id="age" class="form-control form-control-sm" name="age" id="age" readonly>
                        </div>
                        <div class="form-group marg">
                            <label for="email">Gender:</label>
                            <div class="form-check">
                                <label class="form-check-label col-5">
                                    <input type="radio" class="form-check-input" id="gender" name="gender" value="MALE" <?php if($Gender == 'MALE'){echo 'checked';}?>>MALE
                                </label>
                                <label class="form-check-label col-5">
                                    <input type="radio" class="form-check-input" id="gender" name="gender" Value="FEMALE" <?php if($Gender == 'FEMALE'){echo 'checked';}?>>FEMALE
                                </label>
                            </div>
                        </div>
                    </div>
            <!-- -->

                <!-- PARENT 1 -->
                <div class="marg">
                    <h6>Parent & Guardian Information</h6>
                    <div class="form-row marg">
                        <div class="form-group col-lg-4">
                            <label>Parent Name:</label>
                            <input <input value="<?= $Guardian1;?>" name="parent1name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Relation:</label>
                            <select name="parent1Relation" class="form-control form-control-sm" readonly>
                                <option value="<?= $RelationG1;?>" selected><?= $RelationG1;?></option>
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
                            <input value="<?= $ContactG1;?>" name="parent1Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" readonly>
                        </div>
                    </div>

                    <!-- PARENT 2 -->
                    <div class="form-row marg">
                        <div class="form-group col-lg-4">
                            <label>Parent Name:</label>
                            <input <input value="<?= $Guardian2;?>" name="parent2name" type="text" class="form-control form-control-sm" placeholder="Last Name" id="parent1Lname" style="text-transform:uppercase" readonly>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Relation:</label>
                            <select name="parent2Relation" class="form-control form-control-sm" readonly>
                                <option value="<?= $RelationG2;?>" selected><?= $RelationG2;?></option>
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
                            <input value="<?= $ContactG2;?>" name="parent2Contact"type="text" class="form-control form-control-sm" placeholder="Contact Number" id="parent1Contact" style="text-transform:uppercase" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" readonly>
                        </div>
                    </div>             
                </div>
            <!-- -->

                <script>

                    function submitBday() {

                        var Q4A = "";
                        var Bdate = document.getElementById("bdate").value;
                        var Bday = +new Date(Bdate);
                        Q4A += ~~ ((Date.now() - Bday) / (31557600000));
                        document.getElementById("age").value = Q4A;

                    }
                </script>
        
<!--             
                <button type="submit" name="updateStudentinfo" class="nav-link btn btn-success">Update</button> -->
                
            







</div>