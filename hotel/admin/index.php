<?php 
include_once('../../db/conn.php');
    session_start();
    $error="";
    $success="";
  
    if(isset($_POST['submit'])){
      
      $email = $_POST['email'];
      $password = $_POST['password'];

      $check = "SELECT email ,id, password FROM hotel WHERE email = '$email'";

      $result = mysqli_query($conn,$check);
      
      if($result->num_rows > 0 ){

        $data = $result->fetch_array();

        if($password == $data['password']){
          $success = "You have logged In";
          $_SESSION['login_user'] = $email;
          $_SESSION['User_id'] = $data['id'];
          
          header("Location: dashboard.php");
        }
        else{
          $error = "Wrong Password...!"; 
        }

      } else {
        $error = "No username found...!"; 
      }
 
    }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body ">
        <!-- Log In page -->
        <div class="container">
            <?php
                if ($success!="") {
            ?>
                <div class="alert alert-success border-0" role="alert" style="margin-top:5px">
                    <strong>Success! </strong><?php echo $success;?> 
                </div>
            <?php        
                }elseif ($error!="") {
            ?>
                <div class="alert alert-danger border-0" role="alert" style="margin-top:5px">
                    <strong>Error! </strong><?php echo $error;?>
                </div>
            <?php        
                }

            ?>
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                    </div><!--end auth-logo-box-->
                                    
                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mb-3 mt-5">Restro</h4>
                                        <p class="text-muted mb-0">Sign in to continue..</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    
                                    <form class="form-horizontal auth-form my-4" method="post" action="">
            
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Adress:" >
                                            </div>                                    
                                        </div><!--end form-group--> 
            
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>                                                       
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-4">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                    <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                                </div>
                                            </div><!--end col--> 
                                            <div class="col-sm-6 text-right">
                                                <a href="forget-password.php" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                            </div><!--end col--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                               <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit" name="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->
                                
                                
                            </div><!--end card-body-->
                        </div><!--end card-->
                        
                    </div><!--end auth-page-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

        


        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metismenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/feather.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>        

        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        <script >
            setTimeout(()=> {
                $('.alert').hide('slow')
            }, 2000)
        </script>
    </body>

</html>