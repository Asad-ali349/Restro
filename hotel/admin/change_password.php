<?php 
include_once('session.php');
$error="";
$success="";
$hotelId=$_SESSION['User_id'];
if(isset($_POST['submit'])){
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];

    $get_old_password=mysqli_query($conn,"SELECT * FROM hotel WHERE id='$hotelId'");
    if($get_old_password->num_rows > 0){
        $data=mysqli_fetch_array($get_old_password);
        if ($data['password']===$old_password) {
            $sql=mysqli_query($conn,"UPDATE hotel SET password='$new_password' WHERE id='$hotelId'");
            if ($sql==true) {
                $success="Password Changed Successfully.";
            }else{
                $error="An Error Occured!";
            }
        }else{
            $error="Incorrect Old Password!";
        }
    }

}
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset="utf-8" />
        <title>Halol Alsada | Customers list </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Halol Alsada Dashboard " name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 


        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

   <body >
         <?php require_once("includes/navbar.php");?>
     
        <!-- end leftbar-tab-menu-->

      <?php require_once("includes/topbar.php");?>
        
        <!-- Top Bar End -->
        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">
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
                <div class="container-fluid">
             
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Update Password</h4>
                                    
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input type="password" class="form-control" name="old_password" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="****">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="new_password"  placeholder="****">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Re-Enter Password</label>
                                            <input type="password" class="form-control" id="confirm_password" aria-describedby="emailHelp" onkeyup="confirm()" placeholder="****">
                                            <span id='message'></span>
                                        </div>
                                        
                                        
                                       
                                        <button type="submit" name="submit" class="btn btn-gradient-primary">Submit</button>
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div> <!-- end row -->

                    
                </div><!-- container -->

             
                <?php
                 //require_once("includes/sidebar.php");
                 require_once("includes/footer.php");
                ?>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metismenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/feather.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../plugins/apexcharts/apexcharts.min.js"></script> 

       
        
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        <script >
            function confirm() {
                var x=document.getElementById('password').value;
                var y=document.getElementById('confirm_password').value;
                if (x==y) {
                    document.getElementById('message').innerHTML="Matched"
                    document.getElementById('message').style.color='green';
                }else{
                    document.getElementById('message').innerHTML="Not Matched";
                    document.getElementById('message').style.color='red';
                }                
            }
        </script>
        <script >
            setTimeout(()=> {
                $('.alert').hide('slow')
            }, 2000)
        </script>
    </body>

</html>