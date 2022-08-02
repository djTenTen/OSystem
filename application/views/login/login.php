
<!DOCTYPE html>
<html lang="en">
<head>

   
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>HCC DES - <?= $title?></title>
    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url();?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>css/styles.css">
    <script src="<?= base_url();?>js/script.js"></script>
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
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


</head>
<body style="background-image: url(<?= base_url();?>img/hccnewlypainted2.jpg); height: auto;
                width: auto;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
                overflow-x: hidden; ">

	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9" >
				<div class="card o-hidden border-0 shadow-lg my-5 bg-gradient-primary opacity-50">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block">
                                <img src="<?= base_url();?>img/logo4.png" alt="Logo" class="" style="height:450px;">
							</div>
							
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h3 class="text-white mb-4">Holy Cross College School Management System!</h3>
									</div>
									<form class="user" action="authenticate" method="post">
										<div class="form-group">
											<input type="email" class="form-control form-control-user"
												id="exampleInputEmail" aria-describedby="emailHelp"
												placeholder="Username"  name="un" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user"
												id="exampleInputPassword" placeholder="Password" name="pss" required>
										</div>
										
										<button type="submit" class="btn btn-primary btn-user btn-block" >Login</button>
								
										<hr>
										<!-- <a href="index.html" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Login with Google
										</a>
										<a href="index.html" class="btn btn-facebook btn-user btn-block">
											<i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
										</a> -->
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="forgot-password.html">Forgot Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="selectdpt">Create an Account!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



    <!-- <div class="container-fluid">
        <div class="d-flex justify-content-center" style="margin-top: 10%;">
            <div class="user_card">
                    
                
                <div class="d-flex justify-content-center form_container">
                    <div class="brand_logo_container">
                            <img src="image/logohcc.png" class="logo" alt="Logo">
                    </div>
                    <div class="mb-5">
                        <h4>Digital Enrollment System</h4>
                        <?php
                        $_SESSION['Authentication'] = 0;
                        session_destroy();
                        if($this->session->flashdata('Login_Failed') != null){
                            echo '<div class="alert alert-danger">
                            <strong>Error! </strong> Login failed. 
                        </div>';
                        }
                    ?>
                    </div>
                    
                </div>
                        
                    <div class="d-flex justify-content-center">
                        
                        <?= form_open('authenticate');?>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" name="un" class="form-control" value="" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="pss" class="form-control" value="" placeholder="Password" required>
                            </div>
                            <div class="d-flex justify-content-center mt-3 ">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </div>
                        <?= form_close();?>
                    </div>	          
            </div>
            
        </div>
       
    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();?>js/sb-admin-2.min.js"></script>
    
</body>
</html>