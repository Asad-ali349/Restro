<?php
include_once('session.php');
$fId=$_GET['id'];


$food_query="SELECT * FROM food WHERE id='$fId'";
$result_food_query=mysqli_query($conn,$food_query);
$food=mysqli_fetch_array($result_food_query);

$food_image_query="SELECT food_image FROM food_images WHERE food_id='$fId' limit 1";
$result_food_image_query=mysqli_query($conn,$food_image_query);
$images=mysqli_fetch_array($result_food_image_query);

$food_video_query="SELECT food_video FROM food_videos WHERE food_id='$fId' limit 1";
$result_food_video_query=mysqli_query($conn,$food_video_query);
$video=mysqli_fetch_array($result_food_video_query);

$catid=$food['category_id'];
$hid=$food['hotel_id'];
$cat_query="SELECT * FROM food WHERE category_id='$catid' AND hotel_id='$hid' AND id!='$fId'";
$result_cat_query=mysqli_query($conn,$cat_query);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Product Detail</title>
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

        <!-- Top Bar Start -->
        

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                
                                <h4 class="page-title">Procuct-Detail</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="<?php echo "../../foodImages/".$images['food_image']?>" style="height: 300px;width:100%">
                                        </div><!--end col-->
                                        <div class="col-lg-6 align-self-center">
                                            <div class="single-pro-detail">
                                                
                                                <div class="custom-border mb-3"></div>
                                                <h3 class="pro-title"><?php echo $food['name'] ?></h3> 
                                                <ul class="list-inline mb-2 product-review">
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                                    <li class="list-inline-item"><?php $rating=rand(35,50)/10; echo $rating;?></li>
                                                </ul>
                                                <h4 class="text-dark mt-0">
                                                     <?php
                                                            $total=$food['price'];
                                                            $dic=$food['discount_price'];
                                                            $amountToPay=$total-$dic;
                                                            if($food['discount_price']!="0.00") 
                                                                echo $amountToPay; 
                                                            else echo $food['price']; 
                                                        ?>
                                                    <small class="text-muted font-14">
                                                        <del> 
                                                            <?php
                                                                if($food['discount_price']!="0.00")
                                                                echo $food['price'];
                                                            ?>
                                                        </del>
                                                        </small><span class="text-danger font-weight-bold ml-2"><?php if($food['discount_price']!="0.00") {$dis = ($food['discount_price'] / $food['price']) * 100 ; $dis=round($dis);  echo $dis."% off";}    
                                             ?></span></h4>                                                 
                                                <h6 class="text-muted font-13">Description :</h6> 
                                                <h4 class="text-muted font-13"><?php echo $food['descprition'] ?></h4>
                                                <button class="btn btn-soft-primary btn-block cart" onclick="addtocart('<?php echo $food['id']?>')" id="addtocart">Add to Cart</button>                                             
                                                                                            
                                            </div>
                                        </div><!--end col-->                                            
                                    </div><!--end row-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

                    
                    
                    <div class="row">                                        
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mt-0">Ingridients:</h5>
                                    <ul>
                                    <?php include_once('../../db/conn.php'); 
                                        $ingridient_query=mysqli_query($conn," SELECT *FROM ingredients WHERE food_id='$fId'");
                                        while($in=mysqli_fetch_array($ingridient_query)){
                                        
                                        ?>
                                              <li> <?php echo $in['name']?> &nbsp; &nbsp;&nbsp; &nbsp;<?php echo $in['quantity']?></li>

                                        <?php    
                                        }
                                    
                                    ?>
                                    </ul>
                                </div><!--end card-body-->
                            </div><!--end card-->
                            <div class="card" style="margin: auto;">
                                
                                <video width="100%" height="auto" controls="controls" autoplay muted loop>
                                <source src="<?php echo "../../foodVideos/".$video['food_video']?>" type="video/mp4">
                            </div>
                            <div class="row"><h3>Similar Foods:</h3></div>
                            <div class="row">                        
                               
                                   
                                    <?php
                                        
                                        while ($data=mysqli_fetch_array($result_cat_query))
                                        {
                                            $food=$data['id'];
                                            $image_query="SELECT food_image FROM food_images Where food_id='$food'";
                                            $result_image_query=mysqli_query($conn,$image_query);
                                            $images=mysqli_fetch_array($result_image_query);
                                    
                                    ?>
                                            <div class="col-lg-4">
                                                <div class="card e-co-product">
                                                    <?php 
                                                    if($data['discount_price']!="0.00")
                                                    {
                                                    $dis = ($data['discount_price'] /$data['price'] ) *100 ;   
                                                    $dis=round($dis);
                                                   
                                                 ?>
                                                <div class="ribbon1 rib1-warning">
                                                    <span class="text-white text-center rib1-warning"><?php echo $dis."% off";?></span>                                        
                                                </div><!--end ribbon--> <?php
                                                    }
                                                ?>     
                                                    <a href="ecommerce-product-detail.php?id=<?php echo $data['id']?>">  
                                                        <img src="<?php echo "../../foodImages/".$images['food_image'] ?>"  width="80%" alt="" class="img-fluid">
                                                    </a>                                    
                                                    <div class="card-body product-info">
                                                        <a href="" class="product-title"><?php echo $data['name'] ?></a>
                                                        <div class="d-flex justify-content-between my-2">
                                                            <p class="product-price"><?php  $total=$data['price'];  $dic=$data['discount_price']; $amountToPay=$total-$dic;if($data['discount_price']!="0.00") echo $amountToPay; else echo $data['price']; ?><br><span class="ml-2"><del><?php if($data['discount_price']!="0.00") echo $data['price']; else echo "."?></del></span></p>
                                                            <ul class="list-inline mb-0 product-review align-self-center">
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                                            </ul>
                                                        </div>
                                                        
                                                        </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->
                                            <?php
                                        }
                                    ?>
                                
                                                              
                            </div><!--end row-->
                        </div><!--end col-->
                        <div class="col-md-3"> 
                            <div class="card">
                                <div class="card-body">
                                    <div class="review-box text-center align-item-center">                                                                    
                                        <h1><?php  echo $rating;?></h1> 
                                        <h4 class="header-title">Overall Rating</h4>  
                                        <ul class="list-inline mb-0 product-review">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                            <li class="list-inline-item"><small class="text-muted">Total Review (700)</small></li>
                                        </ul>                                     
                                    </div> 
                                    <ul class="list-unstyled mt-3">
                                        <li class="mb-2">
                                            <span class="text-info">5 Star</span>
                                            <small class="float-right text-muted ml-3 font-14">593</small>
                                            <div class="progress mt-2" style="height:5px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%; border-radius:5px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-info">4 Star</span>
                                            <small class="float-right text-muted ml-3 font-14">99</small>
                                            <div class="progress mt-2" style="height:5px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 18%; border-radius:5px;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-info">3 Star</span>
                                            <small class="float-right text-muted ml-3 font-14">6</small>
                                            <div class="progress mt-2" style="height:5px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 10%; border-radius:5px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                        <li class="mb-2">
                                            <span class="text-info">2 Star</span>
                                            <small class="float-right text-muted ml-3 font-14">2</small>
                                            <div class="progress mt-2" style="height:5px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 1%; border-radius:5px;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="text-info">1 Star</span>
                                            <small class="float-right text-muted ml-3 font-14">0</small>
                                            <div class="progress mt-2" style="height:5px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%; border-radius:5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="review-box text-center align-item-center">                                                                    
                                        <h3>100%</h3> 
                                        <h4 class="header-title">Satisfied Customer</h4> 
                                        <p class="text-muted mb-0">All Customers give this product 4 and 5 Star Rating.</p>                                                                                                       
                                    </div>  
                                </div><!--end card-body-->
                            </div><!--end card-->                                                                     
                        </div><!--end col-->
                    </div><!--end row-->

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
                    console.log(result.msg);
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