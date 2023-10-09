<?php
include_once('../../db/conn.php');
session_start();

if (isset($_POST['submit'])) {
    $email=$_POST['email'];

    $sql="SELECT * FROM hotel WHERE email='$email'";
    $result_sql=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result_sql)>0) {
         $data = $result_sql->fetch_array();
       
        $_SESSION['f_id'] = $data['id'];
        $msg="http://restro.cert-pro.net/admin/ChangePassword.php?id=".$data['id'];
        $msg = wordwrap($msg, 70, "\r\n");
        $success=mail($email,"reset password",$msg);
        if (!$success) {
            $response = error_get_last()['message'];
            echo $response;
        }else{
           
            echo "sent";
        }
    }
    else
    {
        $msg = "Enter valid email...!"; 
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("Location: forget-password.php? error=".$msg); 
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Halol Alsada - Admin Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Halol Alsada admin portal to manage the system" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
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
                                         <h4 class="mt-0 mb-3 mt-5">Forgot Password</h4>
                                        <p class="text-muted mb-0">Enter your email to recover your password..</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    
                                    <form class="form-horizontal auth-form my-4"  method="post"  action="ForgetPasswordData.php">
            
                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i> 
                                                </span>                                                                                                              
                                                <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter Email" required>
                                            </div>                                    
                                        </div><!--end form-group-->        
            
                                        
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit" name="submit">Reset <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->
                                
                                <div class="m-3 text-center text-muted">
                                    <p class="">Remember It ?  <a href="index.php" class="text-primary ml-2">Sign in here</a></p>
                                </div>
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
        
    </body>

</html>