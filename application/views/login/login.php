
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HCC DES - <?= $title?></title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>




    <style>
        .logo{
            width: 150px;
          }
          
          .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
          }
          
          @media only screen and (min-device-width : 280px) and (max-device-width : 375px) {
            .user_card {
            margin-top: 120px;
          }
          }
          @media only screen and (min-device-width : 376px) and (max-device-width : 768px) {
            .user_card {
            margin-top: 150px;
          }
          }

          @media only screen and (min-device-width : 769px) and (max-device-width : 1024px) {
            .user_card {
            margin-top: 180px;
          }

          }
          
          .whitetxt{
            color: white;
          }
          
          
          /* LOGIN */
          .user_card {
            height: 400px;
            width: 350px;
            margin-bottom: auto;
            background-color: rgba(225,225,225, 0.8);
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
          
          }
          .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #ffffff;
            padding: 10px;
            text-align: center;
          }
          .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
          }
          .form_container {
            margin-top: 100px;
          }
          .login_btn {
            width: 100%;
            background: #115ae0 !important;
            color: white !important;
          }
          .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
          }
          .login_container {
            padding: 0 2rem;
          }
          .input-group-text {
            background: #115ae0 !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
          }
          .input_user,
          .input_pass:focus {
            box-shadow: none !important;
          }
    </style>

</head>
<body style="background-image: url(image/bghcc.jpg); height: auto;
width: auto;
background-attachment: fixed;
background-position: center;
background-size: cover;
overflow-x: hidden; 
">
    <div class="container-fluid">
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
       
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    
</body>
</html>