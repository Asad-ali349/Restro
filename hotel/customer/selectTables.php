<?php 
include_once('session.php');
$hotelid=$_SESSION['User_id'];
$table_query="SELECT * FROM table_number WHERE hotel_id='$hotelid' AND status=1";
$result_table_query = mysqli_query($conn,$table_query);
if (isset($_POST['submit'])) {
    $tableid=$_POST['table'];
    $_SESSION['tableid']=$tableid;
    header("Location: Categories.php");
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
                                        <p class="text-muted mb-0">Select Table</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    
                                    <form class="form-horizontal auth-form my-4" method="post" action="">
            
                                        <div class="form-group">
                                            <label for="username">Table</label>
                                            <div class="input-group mb-3">
                                                <select name="table" class="form-control" required>
                                                    <option value="">Please select</option>
                                                    <?php
                                                      while ($data = mysqli_fetch_array($result_table_query)) {
                                                        ?>
                                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option><?php  
                                                      }
                                                    ?>
                                                  </select>                                                        
                                                
                                            </div>                                    
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                               <button class="btn btn-gradient-success btn-round btn-block waves-effect waves-light" type="submit" name="submit">Proceed</button>
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