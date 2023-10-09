<?php 
include_once('db/conn.php');
$hotel='SELECT id,name FROM hotel';
$result_hotel_query = mysqli_query($conn,$hotel);
$aerror="";
$derror="";
if(isset($_POST['submit'])){
    $hotelId=$_POST['hotel'];
    $amount=$_POST['amount'];
    $duration=$_POST['duration'];
     

    if (!is_numeric($amount)) {
        $aerror="Only number are Allowed";
    }
    // else if (!is_numeric($duration)) {
    //     $derror="Only number are Allowed";
    // }
    else if (is_numeric($amount)) {
        if ((int)$amount<0) {
            $aerror="Amount must be greater than zero";
        }
        // else if ((int)$duration<0) {
        //     $derror="Amount must be greater than zero";
        // }
        else{
            $sql=mysqli_query($conn,"INSERT INTO transaction(hotel_id,amount,duration) VALUES('$hotelId','$amount','$duration')");
            if ($sql==true) {
                echo "<script type='text/javascript'>alert('ADDED');</script>";

            }else{
                echo "<script type='text/javascript'> Swal.fire({icon: 'error',title: 'Oops...',type: 'error',text: 'Something went wrong'})</script>";
            }

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Add Transection</title>
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

    <body class= "dark-sidenav">
        <!-- leftbar-tab-menu -->
       <?php require_once("includes/navbar.php");?>

      <?php require_once("includes/topbar.php");?>
        <!-- end leftbar-tab-menu-->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Transaction</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Transaction Form</h4>
                                     
                                    <form method="post" action="" enctype="multipart/form-data">
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Hotel Name:</label>
                                            <select name="hotel" class="form-control" required>
                                            <option value="">Please select</option>
                                            <?php
                                              while ($data = mysqli_fetch_array($result_hotel_query)) {
                                                ?>
                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option><?php  
                                              }
                                            ?>
                                          </select>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Amount:</label>
                                             <input type="number" class="form-control" name="amount" placeholder="Enter Amount">
                                             <br><span class="error"><?php echo $aerror;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Duration:</label>
                                             <input type="month" class="form-control" name="duration">
                                             <br><span class="error"><?php echo $derror;?></span>
                                        </div>
                                                                              
                                        <button type="submit" class="btn btn-gradient-primary" name="submit">Add</button>
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->

                    <!-- end page title end breadcrumb -->
   
                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2019 - 2020 Metrica <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer><!--end footer-->
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
    </body>

</html>