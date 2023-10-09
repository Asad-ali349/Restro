<?php
include_once('session.php');

$hotelId=$_SESSION['User_id'];
$status=1;
$cat_query="SELECT * FROM category WHERE status='$status' AND hotel_id='$hotelId'";
$result_cat_query = mysqli_query($conn,$cat_query);

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
     
        <!-- end leftbar-tab-menu-->

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
                               
                                <h4 class="page-title">Categories</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                         <?php 
                             while ($data= mysqli_fetch_array($result_cat_query)) {
                            ?>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">                                 
                                            <a href="catWiseProducts.php?id=<?php echo $data['id'] ?>"><img src="<?php echo "../../db_images/".$data['cat_img']?>" alt="" class="d-block mx-auto my-4" height="170" width="100%"></a>
                                            <div class="d-flex justify-content-between align-items-center my-4">
                                                <div>
                                                    <a href="#" class="header-title"><?php echo $data['name']?></a>
                                                </div>      
                                            </div> 
                                            <a href="EditCategories.php?id=<?php echo $data['id'] ?>" class="btn btn-soft-primary btn-block">Update</a>
                                             <a href="delete.php?id=<?php echo $data['id'];?>&table=category&page=Categories.php" onclick="return confirm('Are you sure?')" class="btn btn-soft-danger btn-block">Delete</a>                                                            
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col--> <?php
                            }
                        ?>  

                    </div>  <!--end row-->
                   
                   

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
        
    </body>

</html>