<?php 
include_once("session.php");

$order_number=$_SESSION['order_number'];

$show_order=0;
if (isset($_SESSION['order_number'])&&$order_number!="") {
    
    $order_sum=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM orders WHERE id='$order_number'"));
    $order_id=$order_sum['id'];

    $order_details=mysqli_query($conn,"SELECT order_detail.*,food.name AS foodName,food.price AS unitPrice,food_images.food_image FROM `order_detail` INNER JOIN food ON order_detail.food_id=food.id INNER join food_images ON food_images.food_id=order_detail.food_id WHERE order_id='$order_id'");
    $show_order=1;
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
        <!-- end leftbar-tab-menu-->

        <!-- Top Bar Start -->
        <?php require_once("includes/topbar.php");?>
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                
                                <h4 class="page-title">Checkout</h4>
                                <span>NOTE: You only cancel your order in 10 min</span>
                            </div><!--end page-title-box-->

                        </div><!--end col-->
                         <?php 
                            if ($show_order==1) {
                            ?>
                        <div class="col-6 ">
                            <div class="page-title-box text-right">
                                <a onclick="cancelOrder()" class="btn btn-danger" style="color:white;">Cancel Order <i class="fas fa-times"></i></a>
                            </div>
                        </div>
                        <?php } ?>    
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-3">Order Summary</h4>
                                    <div class="table-responsive shopping-cart">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>                                                        
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($show_order==1) {
                                                      
                                                    
                                                        while($data=mysqli_fetch_array($order_details)){
                                                    ?>

                                                     <tr>
                                                        <td>
                                                            <img src="<?php echo "../../foodImages/".$data['food_image']?>" alt="" height="45">
                                                            <p class="d-inline-block align-middle mb-0 ml-1">
                                                                <a href="" class="d-inline-block align-middle mb-0 product-name"><?php echo $data['foodName'];?></a> 
                                                            </p>
                                                        </td>
                                                        <td><?php echo $data['unitPrice'];?></td>
                                                        <td class="w-25">
                                                            <?php echo $data['quantity'];?>
                                                        </td>
                                                        <td id="unit"><?php echo $data['total_amount'];?></td>
                                                        
                                                    </tr>

                                                    <?php        
                                                        }
                                                    }
                                                ?>                                                    
                                            </tbody>
                                        </table>
                                    </div><!--end re-table-->
                                    <div class="total-payment">
                                        <table class="table mb-0">
                                            <tbody>
                                            <?php 
                                                    if ($show_order==1) {
                                                    
                                            ?>
                                                <tr>
                                                    <td class="payment-title">Subtotal</td>
                                                    <td><?php echo $order_sum['total_amount'];?></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Discount</td>
                                                    <td>
                                                        <?php echo "-".$order_sum['discounted_amount'];?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title">Total</td>
                                                    <td class="text-dark"><strong><?php echo $order_sum['total_amount']-$order_sum['discounted_amount'];?></strong></td>
                                                </tr>
                                            <?php        
                                                }
                                                    
                                            ?> 
                                            </tbody>
                                        </table><!--end table-->
                                    </div><!--end total-payment-->

                                 
                                </div><!--end card-body-->
                            </div><!--end card-->

                        </div><!--end col-->

                        
                    </div><!--end row-->

                </div><!-- container -->

             

                <?php include_once("includes/footer.php") ?>
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
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/app.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            function cancelOrder(){
                  $.post('delete_order_api.php',{}).then((result)=> {
                 
                    if (result.error==false) {
                        console.log("delete")
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: result.msg,
                          showConfirmButton: false,
                          timer: 1500

                        })
                        setTimeout(()=> {
                            location.replace("Categories.php");
                        }, 1500)
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