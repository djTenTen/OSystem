<div class="container-fluid">

    <?php
        if($this->session->flashdata('userDenied') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Password not acceptable or secured enough
        </div>';
        }
    ?>
    
    <div class="container">

    
    
        <div class="col-md-6">

            <?= form_open("accountsettingsupdate/".$_SESSION['userid']);?>

            <div class="form-group row justify-content-center">
                <div class="col-md-4">
                    <label for="lname">Last Name:</label>
                    <input value="<?= $ln?>" name="lname" type="text" class="form-control form-control-sm" placeholder="Last Name" id="lname" readonly>
                </div>
                <div class="col-md-4">
                    <label for="fname">First Name:</label>
                    <input value="<?= $fn?>" name="fname" type="text" class="form-control form-control-sm" placeholder="First Name" id="fname" readonly>
                </div>
                <div class="col-md-4">
                    <label for="mname">Middle Name:</label>
                    <input value="<?= $mn?>" name="mname" type="text" class="form-control form-control-sm" placeholder="Middle Name" id="mname" readonly>
                </div>
            </div>
        
            <div class="form-group">
                <label for="username">Username:</label>
                <input value="<?= $un?>" name="username" type="email" class="form-control form-control-sm" placeholder="Username" id="username" readonly>
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <div class="inline">
                    <input value="<?= $pss?>" type="password" name="password" id="epwd" type="text" size="15" maxlength="100" class="form-control" onkeyup="return passwordChanged();" />
                    <p>Password Strenght: <span id="strength"></span></p>
                </div>
                
                <input type="checkbox" onclick="vieweditpassword()"> Show Password
            </div>

            <button name="shiftstudent" data-toggle="modal" data-target="#myModalupdate<?= $_SESSION['userid'];?>" class="btn btn-success" type="button">Update</button>
                <!-- The Modal -->
                <div class="modal fade" id="myModalupdate<?= $_SESSION['userid'];?>">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5>CONFIRMATION</h5>
                                
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                            
                                Are you sure to change your password?
                        
                            <div class="modal-footer">
                                <button name="update" class="btn btn-primary" type="submit">Ok</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?= form_close();?>
        </div>
    
    </div>

</div>

<script language="javascript">
    function vieweditpassword() {
        var x = document.getElementById("epwd");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }

    function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
        var pwd = document.getElementById("epwd");
        if (pwd.value.length == 0) {
            strength.innerHTML = '<div class="alert alert-danger"><strong>Error!</strong> Password must be 8 character and more.</div>';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = '<div class="alert alert-danger"><strong>Error!</strong> Password must be 8 character and more.</div>';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<div class="alert alert-success"><strong>Strong!</strong> Your password is strong</div>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<div class="alert alert-warning"><strong>Medium!</strong> Your password is average, try combination of upper,lower case, number and characters.</div>';
        } else {
            strength.innerHTML = '<div class="alert alert-danger"><strong>Weak!</strong> Your password is weak, try different and easy to remember.</div>';
        }
    }
</script>