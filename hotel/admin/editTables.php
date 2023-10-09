<?php 
include_once('session.php');
$hotelid=$_SESSION['User_id'];
$tid=$_GET['id'];
$success="";
$error="";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    

    $update_table=mysqli_query($conn,"UPDATE table_number SET name='$name' WHERE id='$tid'");
    if ($update_table==true) {
        $success=" table information Updated Successfully";
    }else{
        $error= "Error: " . $update_table . "<br>" . $conn->error;
    }
    
}
$table_query="SELECT * FROM table_number WHERE id='$tid'";
$result_table_query = mysqli_query($conn,$table_query);
$result=mysqli_fetch_array($result_table_query);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Metrica - Admin & Dashboard Template</title>
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
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    </head>

    <body>
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
                                
                                <h4 class="page-title">Update Tables</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <?php
                        if ($success!="") {
                    ?>
                        <div class="alert alert-success border-0" role="alert">
                            <strong>Success!</strong><?php echo $success;?> 
                        </div>
                    <?php        
                        }elseif ($error!="") {
                    ?>
                        <div class="alert alert-danger border-0" role="alert">
                            <strong>Error!</strong><?php echo $error;?>
                        </div>
                    <?php        
                        }

                    ?>
                    
                    <div class="card">
                        <div class="card-body">        
                            
                            <form action="" method="post" >
                             
                                <div class="row " >
                                  <div class="col-sm-8">
                                    <label>Table Name:</label>
                                    <input type="text" class="form-control" name="name"  value="<?php echo $result['name']?>" required>
                                  </div>
                                  <div class="col-sm-4">
                                    <button type="submit" name="submit" class="btn btn-success " style="margin-top: 26px;">Update Table!</button> 
                                  </div>
                                        
                                </div> 
                                  
                                
                            </form>
                            </div>
                                
                        </div><!--end card-->
                    </div><!--end card-->

                    <!-- end page title end breadcrumb -->
   

                </div><!-- container -->

                <?php include_once('includes/footer.php'); ?>
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
            setTimeout(()=> {
                $('.alert').hide('slow')
            }, 1000)
        </script>
    </body>

</html>