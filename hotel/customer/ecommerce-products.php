<?php
include_once('session.php');
$hotelId=$_SESSION['User_id'];

$food_query="SELECT * FROM food WHERE hotel_id='$hotelId'";
$result_food_query=mysqli_query($conn,$food_query);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Products</title>
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
                                
                                <h4 class="page-title">Products</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        
                        <?php
                            
                            while ($data=mysqli_fetch_array($result_food_query))
                            {
                                $food=$data['id'];
                                $food_image_query="SELECT food_image FROM food_images Where food_id='$food' ";
                                $result_food_image_query=mysqli_query($conn,$food_image_query);
                                $image=mysqli_fetch_array($result_food_image_query);
                                $count=1;
                                
                        ?>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php 
                                                if($data['discount_price']!="0.00")
                                                {
                                                $dis = ($data['discount_price'] / $data['price']) * 100;    
                                             ?>
                                            <div class="ribbon1 rib1-warning">
                                                <span class="text-white text-center rib1-warning"><?php echo round($dis)."% off";?></span>                                        
                                            </div><!--end ribbon--> <?php
                                                }
                                            ?>                                   
                                            <a href="ecommerce-product-detail.php?id=<?php echo $data['id']?>"><img src="<?php echo "../../foodImages/".$image['food_image']?>" alt="" class="d-block mx-auto my-4" height="175" width="100%" ></a>
                                            <div class="d-flex justify-content-between align-items-center my-4">
                                                <div>
                                                    <a href="#" class="header-title mt-0 "><?php echo $data['name']?></a>
                                                    
                                                </div>
                                                <div>
                                                    <h4 class="text-dark mt-0">
                                                        <?php
                                                            $total=$data['price'];
                                                            $dic=$data['discount_price'];
                                                            $amountToPay=$total-$dic;
                                                            if($data['discount_price']!="0.00") 
                                                                echo $amountToPay; 
                                                            else echo $data['price']; 
                                                        ?>
                                                        <br>
                                                        <small class="text-muted font-14">
                                                            <del>
                                                                <?php
                                                                    if($data['discount_price']!="0.00")
                                                                        echo $data['price'];
                                                                    else
                                                                        echo ".";
                                                                ?>
                                                            </del>
                                                        </small>
                                                    </h4>
                                                    
                                                </div>      
                                            </div> 
                                            <!-- <input type="text" class="foodId"  value="" style=""> -->
                                            <button class="btn btn-soft-primary btn-block cart" onclick="addtocart('<?php echo $data['id']?>')" id="addtocart">Add to Cart</button>
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col--><?php
                                $count++;
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- App js -->
        <script src="../assets/js/app.js"></script>

        <script type="text/javascript">
            function addtocart(value){
                
                $.post('addToCart.php', {id: value}).then((result)=> {
                    if (result.error==false) {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: result.msg,
                          showConfirmButton: false,
                          timer: 1500

                        })
                    }else{
                        Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: result.msg,
                          showConfirmButton: false,
                          timer: 1500

                        })
                    }
                    
                })
              
               
            }
        </script>
    </body>

</html>
