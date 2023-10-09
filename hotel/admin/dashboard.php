<?php 
include_once('session.php');
$user_id=$_SESSION['User_id'];
$sql="SELECT orders.*,table_number.name as table_name,table_number.hotel_id FROM orders INNER JOIN table_number ON orders.table_id=table_number.id WHERE table_number.hotel_id='$user_id'";
$result_sql=mysqli_query($conn,$sql);

$trending_food_query="SELECT food.id, food.name,food.price,food.discount_price,food.discount,food.descprition,food.category_id ,COUNT(order_detail.food_id) as count_of_food,table_number.hotel_id,orders.table_id,food_images.food_image FROM order_detail INNER JOIN food ON food.id = order_detail.food_id INNER JOIN orders ON order_detail.order_id=orders.id INNER JOIN table_number ON table_number.id=orders.table_id INNER JOIN food_images ON food.id=food_images.food_id GROUP BY order_detail.food_id HAVING table_number.hotel_id='$user_id' ORDER BY COUNT(order_detail.food_id) DESC LIMIT 5";
    $result_food_query=mysqli_query($conn,$trending_food_query);
 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Halol Alsada | Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Halol Alsada Dashboard " name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
        <link href="../plugins/lightpick/lightpick.css" rel="stylesheet" />

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

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                        
                                <h4 class="page-title">Dashboard</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                         <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 align-self-center text-center">
                                                    <i class="fab fa-product-hunt align-self-center icon-lg icon-dual-pink" style="font-size:40px"></i>
                                                    <!-- <i data-feather="users" class="align-self-center icon-lg icon-dual-pink"></i> -->
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">20</h3>
                                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt"> Products-Item</p>   
                                                </div><!--end col-->
                                            </div> <!--end row--> 
                                        </div><!--end card-body-->
                                    </div><!--end  card-->
                                </div> <!--end col--> 
                                                                          
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body justify-content-center">
                                            <div class="row">
                                                <div class="col-4 align-self-center text-center">
                                                    <i data-feather="shopping-cart" class="align-self-center icon-lg icon-dual-secondary"></i>
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">10k</h3>
                                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt">Today's Orders</p>
                                                </div><!--end col-->
                                            </div> <!--end row--> 
                                        </div><!--end card-body-->
                                    </div><!--end  card-->
                                </div> <!--end col--> 
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body justify-content-center">
                                            <div class="row">
                                                <div class="col-4 align-self-center text-center">
                                                    <i data-feather="layers" class="align-self-center icon-lg icon-dual-warning"></i>
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">+22.98%</h3>
                                                    <p class="mb-0 font-12 text-uppercase font-weight-semibold-alt text-muted">Growth</p>
                                                </div><!--end col-->
                                            </div> <!--end row--> 
                                        </div><!--end card-body-->
                                    </div><!--end  card-->
                                </div> <!--end col-->                                           
                            </div><!--end row--> 
                                             
                        </div><!--end col--> 
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Monthly Trends</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="eco_categories" class="apex-charts mb-n3"></div>
                                        </div><!--end col-->
                                        <div class="col-6 align-self-center">
                                            <ul class="list-unstyled">
                                                <li class="list-item mb-2 font-weight-semibold-alt">
                                                    <i class="fas fa-play text-primary mr-2"></i>Accepted
                                                </li>
                                                <li class="list-item mb-2 font-weight-semibold-alt">
                                                    <i class="fas fa-play text-success mr-2"></i>Delivered
                                                </li>
                                                <li class="list-item font-weight-semibold-alt">
                                                    <i class="fas fa-play text-pink mr-2"></i>Pendings
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-round dual-btn-icon">View Details <i class="mdi mdi-arrow-right"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end row--> 
                                </div><!--end card-body-->
                            </div><!--end  card-->                
                        </div><!--end col--> 
                        
                                             
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">                                    
                                    <h4 class="header-title mt-0">Revenue</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="media my-3">
                                                <img src="../assets/images/widgets/dollar.png" alt="" class="thumb-md rounded-circle">                                      
                                                <div class="media-body align-self-center text-truncate ml-3">                                                    
                                                    <h4 class="mt-0 mb-1 font-weight-semibold text-dark font-24">$36154.00</h4>   
                                                    <p class="text-muted text-uppercase mb-0 font-12">Total Revenue Of This Month</p>                                         
                                                </div><!--end media-body-->
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-8">
                                            <ul class="nav-border nav nav-pills" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-semibold" data-toggle="tab" href="#Today" role="tab">Today</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-semibold" data-toggle="tab" href="#This_Week" role="tab">This Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#This_Month" role="tab">This Month</a>
                                                </li>
                                            </ul>
                                        </div><!--end col-->                                                                            
                                    </div> <!--end row-->
                                    <div class="tab-content">
                                        <div class="tab-pane pt-3" id="Today" role="tabpanel">
                                            <div id="eco_dash" class="apex-charts"></div>
                                        </div><!-- Tab panes -->   
                                        <div class="tab-pane pt-3" id="This_Week" role="tabpanel">
                                            <div id="Top_Week" class="apex-charts"></div>
                                        </div><!-- Tab panes -->   
                                        <div class="tab-pane active pt-3" id="This_Month" role="tabpanel">
                                            <canvas id="bar" class="drop-shadow w-100"  height="350"></canvas>
                                        </div><!-- Tab panes -->   
                                    </div><!-- Tab content -->   
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!-- end col --> 
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-3">Populer Product</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <tbody>
                                                <?php

                                                    while ($trend=mysqli_fetch_array($result_food_query)) {
                                                ?>
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <div class="media">
                                                                <img src="<?php echo "../../foodImages/".$trend['food_image']?>" height="80" class="mr-4" alt="...">
                                                                <div class="media-body align-self-center"> 
                                                                    <span class="badge badge-soft-warning p-2 font-12 mb-2"><?php echo $trend['count_of_food']?> sold</span>                                                           
                                                                    <h4 class="mt-0 title-text mb-0"><?php echo $trend['name']?></h4>                                                                
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right border-top-0">
                                                            <h5 class=""><?php echo "Rs ".$trend['price']."\-"?></h5>
                                                        </td>
                                                    </tr><!--/tr-->


                                                <?php         
                                                     } 
                                                 ?>
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Orders List</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            


                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Order Date/Time</th>
                                            <th>discount Amount</th>
                                            <th>total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                            <?php 
                                            $count=1;
                                                while ($data=mysqli_fetch_array($result_sql)) {
                                                    # code...
                                                
                                            ?>  <tr>
                                                    <td>
                                                        <?php echo $count;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['table_name'];?>
                                                    </td>
                                                    <td><?php echo $data['created_at'];?>
                                                    </td>
                                                    <td> 
                                                        <?php echo $data['discounted_amount'];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['total_amount'];?> 
                                                    </td>
                                                    <td>     <?php  if ($data['order_status']==1) {
                                                        ?>
                                                            <span class="badge badge-md badge-boxed  badge-soft-success">delivered</span>
                                                        <?php

                                                    }else{
                                                        ?>
                                                            <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                                        <?php
                                                    }?>                               
                                                        
                                                    </td>
                                                    <td>
                                                    <a href="order_detail.php?id=<?php echo $data['id']?>" class="btn btn-outline-success  waves-effect waves-light btn-round"><li class="far fa-eye"></li></a>
                                                  </td>
                                                   
                                                    <!--<button type="button" class="btn btn-gradient-primary waves-effect waves-light" id="ajax-alert"><i class="far fa-clock"></i></button></td>-->
                                                    <!-- Button trigger modal -->
                                                        

                                                </tr><!--end tr-->
                                                <?php
                                                $count++;
                                                }
                                                ?>
                                               
                                              
                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->     
                    </div> <!--end row-->
                </div><!-- container -->

                <!--  Modal content for the above example -->
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

        <script src="../plugins/chartjs/chart.min.js"></script>
        <script src="../plugins/chartjs/roundedBar.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="../assets/pages/jquery.ecommerce_dashboard.init.js"></script> 
        
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        
    </body>

</html>