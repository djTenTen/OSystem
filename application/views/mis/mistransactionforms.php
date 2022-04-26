<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>js/script.js"></script>


    <link rel="stylesheet" href="<?= base_url();?>css/styles.css">
    <title><?= $title;?></title>
   

</head>


<body style="background-image: url(image/hccnewlypainted2.jpg); 
            height: auto;
            width: auto;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            overflow-x: hidden; 
            ">

                <div class="row justify-content-center align-items-center bgcol" style="margin-bottom: 0px;">
                    <div class="justify-content-center">
                        <img class="logo" src="image/logo4.png" alt="logo" srcset="">
                    </div>

                    <div>
                        <h1 style="color:white;">Holy Cross College - MIS Transaction Form</h1>      
                        <p style="color:white;">Sta. Lucia, Sta. Ana Pampanga</p>
                    </div>
                </div>

        <div class="container" style="background-color: rgba(255,255,255,0.9); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 50px; margin-bottom: 50px; padding-top: 30px;padding-bottom: 30px;">
        <?php
            if($this->session->flashdata('added') != null){
                echo '<div class="alert alert-success">
                <strong>Success! </strong> Request has been sent 
            </div>';
            }
        
        ?>

            <?= form_open('insertrequest');?>
                <div class="marg">
                    <h4>Information</h4>
                    <div class="form-row marg">
                        <div class="form-group col-lg-4">
                            <label for="text">Name:</label>
                            <input name="name" type="text" class="form-control form-control-sm" placeholder="Full Name" id="name" required>
                        </div>
                    </div>
                    <div class="form-row marg">
                        <div class="form-group marg col-lg-4">
                            <label for="purpose">Purpose:</label>
                            <select name="purpose" class="form-control form-control-sm" required>
                                <option value="" selected>Select Purpose</option>
                                <option value="Request">Request</option>
                                <option value="Deployment">Deployment</option>
                                <option value="Repair">Repair</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Troubleshoot">Troubleshoot</option>
                            </select>
                        </div>  

                        <div class="form-group col-lg-4">
                            <label for="text">Of What?</label>
                            <input name="what" type="text" class="form-control form-control-sm" placeholder="Please Specify" id="what" required>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="text">Where?</label>
                            <input name="where" type="text" class="form-control form-control-sm" placeholder="Office Name or Location" id="where" required>
                        </div>        
                    </div>

                    <div class="form-row marg">
                        <div class="form-group marg col-lg-3">
                            <label for="action">Action:</label>
                            <select name="action" class="form-control form-control-sm" required>
                                <option value="" selected>Select Action</option>
                                <option value="Immediate">Immediate</option>
                                <option value="Today">Today</option>
                                <option value="This Week">This Week</option>
                                <option value="This Month">This Month</option>
                                <option value="When Able">When Able</option>
                            </select>
                        </div>     
                    </div>

                <div class="form-row marg">
                    <button type="submit" class="btn btn-primary" id="save" value="save" name="save">Submit</button>
                </div>
            <?= form_close();?>
        </div>


        





<script>

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