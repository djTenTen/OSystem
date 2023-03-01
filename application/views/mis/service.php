<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url();?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>css/styles.css">
    <script src="<?= base_url();?>js/script.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url();?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url();?>js/demo/chart-pie-demo.js"></script>


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
    <title><?= $title;?></title>
    
    
</head>
<body class="bg-primary">


    <div class="container bg-white mt-3 mb-3 p-5">


        <?php
            if($this->session->flashdata('requestsent') != null){
                echo '<div class="alert alert-success">
                <strong>Success! </strong> Request has been sent to the MIS office. 
            </div>';
            }
        ?>


        <div class="row align-items-center justify-content-center">
            <img src="<?= base_url();?>img/logo4.png" alt="Logo" style="width: 10%">
            <h1>Holy Cross College Service Request Form</h1>
        </div>

        
        <form action="sendrequestform" method="post">

            <div class="row m-5">

                <div class="col-4">
                    <label for="sel1" class="form-label">Service Request</label>
                    <select class="form form-control form-select" id="sel1" name="service" required>
                        <option value="" selected>Select Service</option>
                        <option value="Hardware Support, Troubleshooting and Repair">Hardware Support, Troubleshooting and Repair</option>
                        <option value="Network and Internet Technical Support">Network and Internet Technical Support</option>
                        <option value="Infromation System Technical Support">Infromation System Technical Support</option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="sel1" class="form-label">Location/Office of the service request</label>
                    <input name="location" type="text" class="form form-control form-input" placeholder="Location/Office" required>
                </div>


                <div class="col-4">
                    <label for="sel1" class="form-label">Department</label>
                    <select class="form form-control form-select" id="sel1" name="dpt" required>
                        <option value="" selected>Select Department</option>
                        <option value="College">College</option>
                        <option value="Seniorhigh">Seniorhigh</option>
                        <option value="Juniorhigh">Juniorhigh</option>
                        <option value="Gradeschool">Gradeschool</option>
                        <option value="SECLS">SECLS</option>
                        <option value="SASED">SASED</option>
                        <option value="SCJ">SCJ</option>
                        <option value="SBAH">SBAH</option>
                        <option value="FINANCE & ADMIN">FINANCE & ADMIN</option>
                        <option value="SASD">SASD</option>
                    </select>
                </div>
                

            </div>


            <div class="row m-5">

                <div class="col-4">
                    <label for="sel1" class="form-label">Problem / Request Description</label>
                    <textarea class="form-control" rows="5" id="comment" name="problem" required></textarea>
                    
                </div>


                <div class="col-4">
                    <label for="sel1" class="form-label">Requested by:</label>
                    <input name="rname" type="text" class="form form-control form-input" placeholder="Name" required>
                </div>
                
            </div>


            <div class="row m-5">

                <button type="submit" class="btn btn-primary btn-lg">Send Request</button>

            </div>

        </form>

    </div>


</body>
</html>