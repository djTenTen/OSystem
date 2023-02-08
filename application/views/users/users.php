<div class="main">
    <?php 
        if($this->session->flashdata('User_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> User successfully added. 
        </div>';
        }

        if($this->session->flashdata('User_Update') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> User successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('User_Delete') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> User successfully deleted. 
        </div>';
        }

        if($this->session->flashdata('Enabled') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> User has been Enabled. 
        </div>';
        }

        if($this->session->flashdata('Disabled') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> User has been Disabled. 
        </div>';
        }

        

        
    ?>
    <div class="container container-fluid" style="margin-top:1%;">
        <div class="row">
            <div class="col-lg-6">
            <?= form_open('addUser');?>
                <h1>User Management</h1>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="lname">Last Name:</label>
                        <input name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname">
                    </div>
                    <div class="col-md-4">
                        <label for="fname">First Name:</label>
                        <input name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname">
                    </div>
                    <div class="col-md-4">
                        <label for="mname">Middle Name:</label>
                        <input name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name" id="mname">
                    </div>
                
                </div>

                <div class="form-group">
                    <label for="email">Position:</label>
                    <select name="position" class="form-control form-control-sm" required>
                        <option value="" selected>Select Position</option>
                            <?php foreach($positions as $posrow){?>
                            <option value="<?= $posrow['positionID']?>"><?= $posrow['pos']?></option>
                            <?php }?>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input name="username" type="email" class="form-control form-control-sm" placeholder="Username" id="username">
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" id="pwd">
                    <input type="checkbox" onclick="viewpassword()"> Show Password
                </div>
            
            <!-- <div class="form-check-inline"> -->
                <div class="container">
                    <h4>Allowed Department</h4>
                    <div class="col-lg-12 row">
                        <table class="table table-borderless table-hover table-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="registrar" name="registrar" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="registrar" name="registrar" value="Yes">
                                                Registrar
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="guidance" name="guidance" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="guidance" name="guidance" value="Yes">
                                                Guidance
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="cashier" name="cashier" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cashier" name="cashier" value="Yes">
                                                Cashier
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="bookstore" name="bookstore" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="bookstore" name="bookstore" value="Yes">
                                                Bookstore
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="accounting" name="accounting" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="accounting" name="accounting" value="Yes">
                                                Accounting
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="humanresource" name="humanresource" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="humanresource" name="humanresource" value="Yes">
                                                HR
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="library" name="library" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="library" name="library" value="Yes">
                                                Library
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="dean" name="dean" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="dean" name="dean" value="Yes">
                                                Dean
                                                </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="progchair" name="progchair" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="progchair" name="progchair" value="Yes">
                                                Program Chair
                                                </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="canteen" name="canteen" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="canteen" name="canteen" value="Yes">
                                                Canteen
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="custodian" name="custodian" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="custodian" name="custodian" value="Yes">
                                                Custodian
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="teacher" name="teacher" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="teacher" name="teacher" value="Yes">
                                                Teacher
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="principal" name="principal" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="principal" name="principal" value="Yes">
                                                Principal
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="employee" name="employee" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="employee" name="employee" value="Yes">
                                                Employee
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="student" name="student" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="student" name="student" value="Yes">
                                                Student
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="clinic" name="clinic" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="clinic" name="clinic" value="Yes">
                                                Clinic
                                            </label>
                                        </div>    
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="pod" name="pod" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="pod" name="pod" value="Yes">
                                                POD
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="multimedia" name="multimedia" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="multimedia" name="multimedia" value="Yes">
                                                Multimedia
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="mis" name="mis" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="mis" name="mis" value="Yes">
                                                M.I.S
                                            </label>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="administrator" name="administrator" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="administrator" name="administrator" value="Yes">
                                                Administrator
                                            </label>
                                        </div>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4>Sub Deparment</h4>
                    <div class="col-lg-12 row">
                        <table class="table table-borderless table-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="college" name="college" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="college" name="college" value="Yes">
                                                College
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="gsdpt" name="gsdpt" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="gsdpt" name="gsdpt" value="Yes">
                                                Grade School
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="jhsdpt" name="jhsdpt" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="jhsdpt" name="jhsdpt" value="Yes">
                                                Junior High
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="shsdpt" name="shsdpt" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="shsdpt" name="shsdpt" value="Yes">
                                                Senior High
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4>College Deparment</h4>
                    <div class="col-lg-12 row">
                        <table class="table table-borderless table-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="cased" name="cased" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cased" name="cased" value="Yes">
                                                CASED
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="cbah" name="cbah" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cbah" name="cbah" value="Yes">
                                                CBAH
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="scls" name="scls" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="scls" name="scls" value="Yes">
                                                SCLS
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="scj" name="scj" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="scj" name="scj" value="Yes">
                                                SCJ
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4>Senior High Deparment</h4>
                    <div class="col-lg-12 row">
                        <table class="table table-borderless table-sm">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="ABM" name="ABM" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="ABM" name="ABM" value="Yes">
                                                ABM
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="HUMMS" name="HUMMS" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="HUMMS" name="HUMMS" value="Yes">
                                                HUMMS
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="STEM" name="STEM" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="STEM" name="STEM" value="Yes">
                                                STEM
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="TVLHE" name="TVLHE" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="TVLHE" name="TVLHE" value="Yes">
                                                TVL-HE
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="TVLICT" name="TVLICT" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="TVLICT" name="TVLICT" value="Yes">
                                                TVL-ICT
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input mr-sm-2" type="hidden" id="GAS" name="GAS" value="No" />
                                                <input class="form-check-input mr-sm-2" type="checkbox" id="GAS" name="GAS" value="Yes">
                                                GAS
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>           


                </div>

                
                
                
                <button name="adduser" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Add User</button>
                <?= form_close(); ?>
            </div>
            
            <div class="col-lg-6">
                <h2>UserList</h2>  
                <form action="users" method="post" style="margin-top: 6%;">
                    <div class="input-group mb-3">
                        <input name="searchUser" type="text" class="form-control" placeholder="Search userID/Username/Last Name/First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="SearchEnrolled" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </form>  
                <div style="overflow-y:scroll;width:100%;height:700px">    
                    <table class="table table-hover table-sm">
                        <thead class="sticky-top bg-white">
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $row){?>
                            <tr>
                                <td><?= $row['userID'];?></td>
                                <td><?= $row['FullName'];?></td>
                                <td><?= $row['pos'];?></td>
                                <td><?= $row['Username'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['userID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['userID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalLogin<?= $row['userID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="Login"><span class="far fa-user-circle"></span></a>
                                    </div>
                                    <!-- The Modal -->

                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalLogin<?= $row['userID'];?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5>CONFIRMATION</h5>
                                                        
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    
                                                        You are going to login as  <?= $row['pos'];?> - <strong><?= $row['FullName'];?></strong><br>
                                                        All your current session will be lost.  
                                                
                                                    <div class="modal-footer">
                                                    <?= form_open('loginUser'); ?>
                                                        <input value="<?= $row['Username'];?>" name="un" type="text" hidden>
                                                        <input value="<?= $row['Password'];?>" name="pss" type="text" hidden>
                                                        <button name="delete" class="btn btn-success" type="submit">Login</button>
                                                    <?= form_close(); ?>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF MODAL -->


                                    <div class="modal fade" id="myModalEdit<?= $row['userID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>User Information</h5>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">

                                                <?php if($row['Status'] == 'Disabled'){?>
                                                    <div class="alert alert-danger row">
                                                        <strong>Disabled!</strong>
                                                    </div>
                                                <?php }else{?>
                                                    <div class="alert alert-success">
                                                        <strong>Enabled!</strong> 
                                                    </div>
                                                <?php }?>

                                                <?= form_open('updateUser/'.$row['userID']);?>

                                                    
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                                                    <div class="form-group row">

                                                    
                                                        <div class="col-md-4">
                                                            <label for="lname">Last Name:</label>
                                                            <input value="<?= $row['LastName'];?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fname">First Name:</label>
                                                            <input value="<?= $row['FirstName'];?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mname">Middle Name:</label>
                                                            <input value="<?= $row['MiddleName'];?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name" id="mname">
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Position:</label>
                                                        <select name="position" class="form-control form-control-sm" required>
                                                            <option value="<?= $row['Position'];?>" selected><?= $row['pos'];?></option>
                                                                <?php foreach($positions as $posrow){?>
                                                                <option value="<?= $posrow['positionID']?>"><?= $posrow['pos']?></option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input value="<?= $row['Username'];?>" name="username" type="email" class="form-control form-control-sm" placeholder="Username" id="username">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pwd">Password:</label>
                                                        <input value="<?= $row['Password'];?>" name="password" type="password" class="form-control" placeholder="Password" id="epwd">
                                                    </div>
                                                    
                                                    <script>
                                                        function vieweditpassword() {
                                                            var x = document.getElementById("epwd");
                                                            if (x.type === "password") {
                                                            x.type = "text";
                                                            } else {
                                                            x.type = "password";
                                                            }
                                                        }
                                                    </script>
                                                    
                                                </div>

                                                <div class="container">
                                                    <h4>Allowed Department</h4>
                                                    <div class="col-lg-12 row">
                                                        <table class="table table-borderless table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="registrar" name="registrar" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="registrar" name="registrar" value="Yes" <?php if ($row['Registrar']=='Yes'){echo 'checked';}?>>
                                                                                Registrar
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="guidance" name="guidance" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="guidance" name="guidance" value="Yes" <?php if ($row['Guidance']=='Yes'){echo 'checked';}?>>
                                                                                Guidance
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="cashier" name="cashier" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cashier" name="cashier" value="Yes" <?php if ($row['Cashier']=='Yes'){echo 'checked';}?>>
                                                                                Cashier
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="bookstore" name="bookstore" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="bookstore" name="bookstore" value="Yes" <?php if ($row['Bookstore']=='Yes'){echo 'checked';}?>>
                                                                                Bookstore
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>    
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="accounting" name="accounting" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="accounting" name="accounting" value="Yes" <?php if ($row['Accounting']=='Yes'){echo 'checked';}?>>
                                                                                Accounting
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="humanresource" name="humanresource" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="humanresource" name="humanresource" value="Yes" <?php if ($row['Humanresource']=='Yes'){echo 'checked';}?>>
                                                                                HR
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="library" name="library" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="library" name="library" value="Yes" <?php if ($row['Library']=='Yes'){echo 'checked';}?>>
                                                                                Library
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="dean" name="dean" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="dean" name="dean" value="Yes" <?php if ($row['Dean']=='Yes'){echo 'checked';}?>>
                                                                                Dean
                                                                                </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>    
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="progchair" name="progchair" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="progchair" name="progchair" value="Yes" <?php if ($row['Progchair']=='Yes'){echo 'checked';}?>>
                                                                                Program Chair
                                                                                </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="canteen" name="canteen" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="canteen" name="canteen" value="Yes" <?php if ($row['Canteen']=='Yes'){echo 'checked';}?>>
                                                                                Canteen
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="custodian" name="custodian" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="custodian" name="custodian" value="Yes" <?php if ($row['Custodian']=='Yes'){echo 'checked';}?>>
                                                                                Custodian
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="teacher" name="teacher" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="teacher" name="teacher" value="Yes" <?php if ($row['Teacher']=='Yes'){echo 'checked';}?>>
                                                                                Teacher
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>    
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="principal" name="principal" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="principal" name="principal" value="Yes" <?php if ($row['Principal']=='Yes'){echo 'checked';}?>>
                                                                                Principal
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="employee" name="employee" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="employee" name="employee" value="Yes" <?php if ($row['Employee']=='Yes'){echo 'checked';}?>>
                                                                                Employee
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="student" name="student" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="student" name="student" value="Yes" <?php if ($row['Student']=='Yes'){echo 'checked';}?>>
                                                                                Student
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="clinic" name="clinic" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="clinic" name="clinic" value="Yes" <?php if ($row['Clinic']=='Yes'){echo 'checked';}?>>
                                                                                Clinic
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                            
                                                                </tr>
                                                                <tr>    
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="pod" name="pod" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="pod" name="pod" value="Yes" <?php if ($row['POD']=='Yes'){echo 'checked';}?>>
                                                                                POD
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="multimedia" name="multimedia" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="multimedia" name="multimedia" value="Yes" <?php if ($row['Multimedia']=='Yes'){echo 'checked';}?>>
                                                                                Multimedia
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="mis" name="mis" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="mis" name="mis" value="Yes" <?php if ($row['MIS']=='Yes'){echo 'checked';}?>>
                                                                                M.I.S
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="administrator" name="administrator" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="administrator" name="administrator" value="Yes" <?php if ($row['Administrator']=='Yes'){echo 'checked';}?>>
                                                                                Administrator
                                                                            </label>
                                                                        </div>    
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <h4>Sub Deparment</h4>
                                                    <div class="col-lg-12 row">
                                                        <table class="table table-borderless table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="college" name="college" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="college" name="college" value="Yes" <?php if ($row['Collegedpt']=='Yes'){echo 'checked';}?>>
                                                                                College
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="gsdpt" name="gsdpt" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="gsdpt" name="gsdpt" value="Yes" <?php if ($row['GradeSchooldpt']=='Yes'){echo 'checked';}?>>
                                                                                Grade School
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="jhsdpt" name="jhsdpt" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="jhsdpt" name="jhsdpt" value="Yes" <?php if ($row['JuniorHighdpt']=='Yes'){echo 'checked';}?>>
                                                                                Junior High
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="shsdpt" name="shsdpt" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="shsdpt" name="shsdpt" value="Yes" <?php if ($row['SeniorHighdpt']=='Yes'){echo 'checked';}?>>
                                                                                Senior High
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <h4>College Deparment</h4>
                                                    <div class="col-lg-12 row">
                                                        <table class="table table-borderless table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="cased" name="cased" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cased" name="cased" value="Yes" <?php if ($row['CASED']=='Yes'){echo 'checked';}?>>
                                                                                CASED
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="cbah" name="cbah" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="cbah" name="cbah" value="Yes" <?php if ($row['CBAH']=='Yes'){echo 'checked';}?>>
                                                                                CBAH
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="scls" name="scls" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="scls" name="scls" value="Yes" <?php if ($row['SCLS']=='Yes'){echo 'checked';}?>>
                                                                                SCLS
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="scj" name="scj" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="scj" name="scj" value="Yes" <?php if ($row['SCJ']=='Yes'){echo 'checked';}?>>
                                                                                SCJ
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    <h4>Senior High Deparment</h4>
                                                    <div class="col-lg-12 row">
                                                        <table class="table table-borderless table-sm">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="ABM" name="ABM" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="ABM" name="ABM" value="Yes" <?php if ($row['ABM']=='Yes'){echo 'checked';}?>>
                                                                                ABM
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="HUMMS" name="HUMMS" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="HUMMS" name="HUMMS" value="Yes" <?php if ($row['HUMMS']=='Yes'){echo 'checked';}?>>
                                                                                HUMMS
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="STEM" name="STEM" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="STEM" name="STEM" value="Yes" <?php if ($row['STEM']=='Yes'){echo 'checked';}?>>
                                                                                STEM
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="TVLHE" name="TVLHE" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="TVLHE" name="TVLHE" value="Yes" <?php if ($row['TVLHE']=='Yes'){echo 'checked';}?>>
                                                                                TVL-HE
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="TVLICT" name="TVLICT" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="TVLICT" name="TVLICT" value="Yes" <?php if ($row['TVLICT']=='Yes'){echo 'checked';}?>>
                                                                                TVL-ICT
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input mr-sm-2" type="hidden" id="GAS" name="GAS" value="No" />
                                                                                <input class="form-check-input mr-sm-2" type="checkbox" id="GAS" name="GAS" value="Yes" <?php if ($row['GAS']=='Yes'){echo 'checked';}?>>
                                                                                GAS
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                                <?= form_close(); ?>

                                                <?php if($row['Status'] == 'Disabled' ){?>
                                                    <?= form_open("enableuser/".$row['userID']); ?>
                                                    <button name="enableuser" class="btn btn-primary" type="submit">Enable</button>
                                                    <?= form_close(); ?>
                                                <?php }else{?>
                                                    <?= form_open("disableuser/".$row['userID']); ?>
                                                    <button name="disableuser" class="btn btn-danger" type="submit">Disable</button>
                                                    <?= form_close(); ?>
                                                <?php }?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <!-- END OF MODAL -->
                                
                                <!-- The Modal -->
                                <div class="modal fade" id="myModalDelete<?= $row['userID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <?= $row['pos'];?> - <strong><?= $row['FullName'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deleteUser/'.$row['userID']); ?>
                                                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                                <?= form_close(); ?>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
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