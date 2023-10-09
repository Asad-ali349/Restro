<?php 
include_once('session.php');

 $success="";
 $error="";
if (isset($_POST['submit'])){


$categoryName=$_POST['Category'];
$hotelId=$_SESSION['User_id'];

// for image[
$filename = $_FILES["uploadfile"]["name"]; 
$tempname = $_FILES["uploadfile"]["tmp_name"];     
$folder = "../../db_images/".$filename;
// ]

$sql = "INSERT INTO category (name, hotel_id, cat_img) VALUES ('$categoryName', '$hotelId', '$filename')";

move_uploaded_file($tempname, $folder);

if ($conn->query($sql) === TRUE) {  
  $success="Category Added Successfully";
} else {
  $error= "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
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
                                
                                <h4 class="page-title">Add Category</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <?php
                        if ($success!="") {
                    ?>
                        <div class="alert alert-success border-0" role="alert">
                            <strong>Success! </strong><?php echo $success;?> 
                        </div>
                    <?php        
                        }elseif ($error!="") {
                    ?>
                        <div class="alert alert-danger border-0" role="alert">
                            <strong>Error! </strong><?php echo $error;?>
                        </div>
                    <?php        
                        }

                    ?>
                    <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Category Form</h4>
                                     
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name:</label>
                                            <input type="text" class="form-control" id="CategoryName" name="Category" placeholder="Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Image</label>
                                             <input type="file" class="form-control" name="uploadfile">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-gradient-primary" name="submit">Add</button>
                                       
                                    </form>                                           
                                </div><!--end card-body-->
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
            }, 2000)
        </script>
    </body>

</html>