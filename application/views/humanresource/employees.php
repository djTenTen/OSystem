<div class="container-fluid">
    <?php 
        if($this->session->flashdata('Employee_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Employee successfully added. 
        </div>';
        }

        if($this->session->flashdata('Employee_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Employee successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Employee_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Employee successfully deleted. 
        </div>';
        }
    ?>

    <div class="container container-fluid" style="margin-top:1%;">
        <div class="row">
            <div class="col-lg-5">
            <?= form_open('addemployee');?>
                <h1>Employee Management</h1>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="lname">Last Name:</label>
                        <input name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="fname">First Name:</label>
                        <input name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="mname">Middle Name:</label>
                        <input name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name" id="mname" required>
                    </div>
                
                </div>

                <div class="form-group">
                    <label for="address">Address: </label>
                    <input name="address" type="text" class="form-control form-control-sm" placeholder="Address" id="address" required>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="empid">EmployeeID: </label>
                        <input name="empid" type="text" maxlength="11" class="form-control form-control-sm" placeholder="Employee ID" id="empid" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="contact">Contact Number: </label>
                        <input name="contact" type="text" maxlength="11" class="form-control form-control-sm" placeholder="Contact Number" id="contact" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="department">Department:</label>
                        <select name="department" class="form-control form-control-sm" required>
                            <option value="" selected>Select Department</option>
                            <option value="Office of the President" >Office of the President</option>
                            <option value="Academic Affairs" >Academic Affairs</option>
                            <option value="Student Affairs and Services" >Student Affairs and Services</option>
                            <option value="Finance & Admin" >Finance & Admin</option>
                            <option value="Management Information System" >Management Information System</option>
                            <option value="Multimedia" >Multimedia</option>
                            <option value="Internal Security" >Internal Security</option>
                            <option value="Office of the VPAA" >Office of the VPAA</option>
                            <option value="Accademic Affairs - College" >Accademic Affairs - College</option>
                            <option value="Accademic Affairs - Senior High" >Accademic Affairs - Senior High</option>
                            <option value="Accademic Affairs - IBED" >Accademic Affairs - IBED</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control form-control-sm" required>
                            <option value="" selected>Select Status</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Regular">Regular</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Part Time">Part Time</option>
                            <option value="AWOL">AWOL</option>
                            <option value="Resigned">Resigned</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="position">Position:</label>
                        <input name="position" type="text" class="form-control form-control-sm" placeholder="Position" id="position" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rfid">RFID:</label>
                        <input name="rfid" type="text" class="form-control form-control-sm" placeholder="RFID" id="rfid">
                    </div>
                    
                    
                </div>
            
                

                <div class="form-group row col-md-12 form-inline">
                    
                    <div class="form-group col-md-6 row">
                        <label for="username">Set Time IN:</label>                    
                        <input name="shour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="shour" required>:                        
                        <input name="sminute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="sminute" required>  
                    </div>

                    <div class="form-group col-md-6 row">
                        <label for="username">Set Time OUT:</label>                    
                        <input name="ehour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="ehour" required>:                        
                        <input name="eminute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="eminute" required>
                    </div>
                    
                </div>
            
                
                <button name="adduser" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Add Employee</button>
                <?= form_close(); ?>
            </div>
            
            <div class="col-lg-7">
                <h2>UserList</h2>  
                <?= form_open('employees');?>
                    <div class="input-group mb-3">
                        <input name="searchUser" type="text" class="form-control" placeholder="Search userID/Username/Last Name/First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="SearchEnrolled" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close(); ?>  
                <div style="overflow-y:scroll;width:100%;height:450px">    
                       
                    <table class="table table-hover table-sm">
                        <thead class="sticky-top bg-white">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($employees as $row){?>
                            <tr>
                                <td><?= $row['Name'];?></td>
                                <td><?= $row['Position'];?></td>
                                <td><?= $row['Status'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['empID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalEdit<?= $row['empID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>User Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updateemployee/'.$row['empID']);?>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="lname">Last Name:</label>
                                                            <input value="<?= $row['Lname'];?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fname">First Name:</label>
                                                            <input value="<?= $row['Fname'];?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mname">Middle Name:</label>
                                                            <input value="<?= $row['Mname'];?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name" id="mname" required>
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Address: </label>
                                                        <input value="<?= $row['Address'];?>" name="address" type="text" class="form-control form-control-sm" placeholder="Address" id="address" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="empid">EmployeeID: </label>
                                                            <input value="<?= $row['EmployeeID'];?>" name="empid" type="text" maxlength="11" class="form-control form-control-sm" placeholder="Employee ID" id="empid" required>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="contact">Contact Number: </label>
                                                            <input value="<?= $row['Contact'];?>" name="contact" type="text" maxlength="11" class="form-control form-control-sm" placeholder="Contact Number" id="contact" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="department">Department:</label>
                                                            <select name="department" class="form-control form-control-sm" required>
                                                                <option value="<?= $row['Department'];?>" selected><?= $row['Department'];?></option>
                                                                <option value="Office of the President" >Office of the President</option>
                                                                <option value="Academic Affairs" >Academic Affairs</option>
                                                                <option value="Student Affairs and Services" >Student Affairs and Services</option>
                                                                <option value="Finance & Admin" >Finance & Admin</option>
                                                                <option value="Management Information System" >Management Information System</option>
                                                                <option value="Multimedia" >Multimedia</option>
                                                                <option value="Internal Security" >Internal Security</option>
                                                                <option value="Office of the VPAA" >Office of the VPAA</option>
                                                                <option value="Accademic Affairs - College" >Accademic Affairs - College</option>
                                                                <option value="Accademic Affairs - Senior High" >Accademic Affairs - Senior High</option>
                                                                <option value="Accademic Affairs - IBED" >Accademic Affairs - IBED</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="status">Status:</label>
                                                            <select name="status" class="form-control form-control-sm" required>
                                                                <option value="<?= $row['Status'];?>" selected><?= $row['Status'];?></option>
                                                                <option value="" selected>Select Status</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Regular">Regular</option>
                                                                <option value="Contractual">Contractual</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="AWOL">AWOL</option>
                                                                <option value="Resigned">Resigned</option>
                                                                <option value="Terminated">Terminated</option>
                                                                <option value="Deceased">Deceased</option>
                                                            </select>
                                                        </div>
                                                        

                                                        <div class="form-group col-md-6">
                                                            <label for="position">Position:</label>
                                                            <input value="<?= $row['Position'];?>" name="position" type="text" class="form-control form-control-sm" placeholder="Position" id="position" required>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="rfid">RFID:</label>
                                                            <input value="<?= $row['rfid'];?>" name="rfid" type="text" class="form-control form-control-sm" placeholder="RFID" id="rfid" >
                                                        </div>


                                                        <div class="form-group row col-md-12 form-inline">
                    
                                                            <div class="form-group col-md-6 row">
                                                                <label for="username">Set Time IN:</label>                    
                                                                <input value="<?= substr($row['setTimeIN'], 0, 2);?>" name="shour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="shour" required>:                        
                                                                <input value="<?= substr($row['setTimeIN'], 3, 2);?>" name="sminute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="sminute" required>  
                                                            </div>

                                                            <div class="form-group col-md-6 row">
                                                                <label for="username">Set Time OUT:</label>                    
                                                                <input value="<?= substr($row['setTimeOUT'], 0, 2);?>" name="ehour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="ehour" required>:                        
                                                                <input value="<?= substr($row['setTimeOUT'], 3, 2);?>" name="eminute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="eminute" required>
                                                            </div>
                                                            
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
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>