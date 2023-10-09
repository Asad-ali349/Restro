<?php

include_once('session.php');
$hotelId=$_SESSION['User_id'];
$tableId=$_SESSION['tableid'];


$get_cart=mysqli_query($conn,"SELECT cart.*,food.name AS foodName,food.price AS unitPrice,food_images.food_image FROM `cart` INNER JOIN food ON cart.food_id=food.id INNER join food_images ON food_images.food_id=cart.food_id WHERE table_id='$tableId'");
$get_bill=mysqli_query($conn,"SELECT SUM(total_price) AS total,SUM(discount_price) As dis, SUM(total_price)-SUM(discount_price) AS grand from cart WHERE table_id='$tableId'");
$result=mysqli_fetch_array($get_bill);
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
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                
                                <h4 class="page-title">Cart</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0">Shopping Cart</h4>
                                    <div class="table-responsive shopping-cart">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>                                                        
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    while($data=mysqli_fetch_array($get_cart)){
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
                                                        <input class="form-control w-25 " type="number" value="<?php echo $data['quantity'];?>" id="q<?php echo $data['id']?>"  >
                                                    </td>
                                                    <td id="unit"><?php echo $data['total_price'];?></td>
                                                    <td>
                                                        <a class="text-dark" onclick="updatecart(q<?php echo $data['id']?>,<?php echo $tableId?>,<?php echo $data['food_id']?>)" ><i class="fa fa-edit font-18"></i></a>
                                                        <a onclick="deleteCart(<?php echo $data['id']?>);" class="text-dark"><i class="mdi mdi-close-circle-outline font-18"></i></a>
                                                    </td>
                                                </tr>

                                                <?php        
                                                    }

                                                ?>
                                               
                                                                                                   
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row justify-content-center">
                                        
                                        <div class="col-md-12">
                                            <div class="total-payment p-3">
                                                <h4 class="header-title">Total Payment</h4>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="payment-title">Subtotal</td>
                                                            <td id="total"><?php echo $result['total']?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="payment-title">Discount</td>
                                                            <td id="dis">-<?php echo $result['dis']?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="payment-title">Total</td>
                                                            <td class="text-dark" id="grand"><strong><?php echo $result['grand']?></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="ecommerce-products.php" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left mr-1"></i> Continue Shopping</a>
                                                    </div>                                                        
                                                    <div class="col-6 text-right">
                                                        <a onclick="placeorder(<?php echo $tableId;?>);" class="btn btn-success">Checkout <i class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div><!--end col--> 

                                    </div><!--end row--> 
                                </div><!--end card-->
                            </div><!--end card-body-->
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
        <script src="../assets/js/app.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            function updatecart(quantity,tableid,foodid){
              
                var qua=$(quantity).val();
                
                $.post('updateCart.php',{tableid: tableid,foodid: foodid,quantity: qua}).then((result)=> {
                 
                    if (result.error==false) {
                            // console.log("quantity"+$(quantity).val())
                            // console.log("foodid = "+foodid)
                            // console.log("tableid"+tableid)
                            $('#unit').html(result.total_price)
                            $('#total').html(result.total)
                            $('#dis').html("-"+result.dis)
                            $('#grand').html(result.grand)
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

            function deleteCart(cid){

                $.post('delete.php',{id:cid}).then((result)=>{
                    if (result.error==false) {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: result.msg,
                          showConfirmButton: false,
                          timer: 1500

                        })
                        location.reload();
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
               function placeorder(tid){

                $.post('place_order.php',{tableid:tid}).then((result)=>{
                    if (result.error==false) {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: result.msg,
                          showConfirmButton: false,
                          timer: 1500

                        });
                        var ordernumber=result.order_number;
                        window.location.href = "checkout.php?order_number="+ordernumber;
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