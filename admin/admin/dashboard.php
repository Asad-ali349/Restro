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

    <body class= "dark-sidenav">
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
                        <div class="col-lg-8">
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
                        </div><!--end col--> 

                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 align-self-center text-center">
                                                    <i data-feather="users" class="align-self-center icon-lg icon-dual-pink"></i>
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">20</h3>
                                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt"> Customer</p>   
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
                                                    <i data-feather="shopping-cart" class="align-self-center icon-lg icon-dual-secondary"></i>
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">10k</h3>
                                                    <p class="mb-0 font-12 text-muted text-uppercase font-weight-semibold-alt">Orders</p>
                                                </div><!--end col-->
                                            </div> <!--end row--> 
                                        </div><!--end card-body-->
                                    </div><!--end  card-->
                                </div> <!--end col-->                                           
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 align-self-center text-center">
                                                    <i data-feather="repeat" class="align-self-center icon-lg icon-dual-purple"></i>
                                                </div><!--end col-->
                                                <div class="col-8">
                                                    <h3 class="mt-0 mb-1 font-weight-semibold">1.5k</h3>
                                                    <p class="mb-0 font-12 text-uppercase font-weight-semibold-alt text-muted">Return Orders</p>   
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
                    </div><!--end row-->
                    
                 
                    <div class="row">  
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body order-list">
                                    <h4 class="header-title mt-0 mb-3">Order List</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Customer Name</th>
                                                    <th class="border-top-0">Contact</th>
                                                    <th class="border-top-0">Order Date/Time</th>
                                                    <th class="border-top-0">Amount ($)</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1 </td>
                                                    <td>
                                                        Shoe
                                                    </td>
                                                    <td>  12346578920                                                              
                                                        
                                                    </td>
                                                    <td>3/03/2019 4:29 PM</td>
                                                    <td> $750</td>
                                                    <td>                                                                        
                                                        <span class="badge badge-md badge-boxed  badge-soft-success">Shipped</span>
                                                    </td>
                                                    <td>
                                                    <a href="" class="btn btn-outline-success  waves-effect waves-light btn-round"><li class="far fa-eye"></li></a>
                                                   
                                                    <a href="" class="btn btn-outline-danger  waves-effect waves-light btn-round"><li class="far fa-trash-alt"></li></a>
                                                    </td>

                                                </tr><!--end tr-->
                                                
                                               
                                                <tr>
                                                    <td>
                                                       2 </td>
                                                    <td>
                                                        Beg
                                                    </td>
                                                    <td>                                                                
                                                        1234657890
                                                    </td>
                                                    <td>18/03/2019 5:09 PM</td>
                                                                                 
                                                    <td> $1150</td>
                                                    <td>
                                                        <span class="badge badge-md badge-boxed badge-soft-warning">Pending</span>
                                                    </td>
                                                    <td>
                                                    <a href="" class="btn btn-outline-success  waves-effect waves-light btn-round"><li class="far fa-eye"></li></a>
                                                  
                                                    <a href="" class="btn btn-outline-danger  waves-effect waves-light btn-round"><li class="far fa-trash-alt"></li></a>

                                                    </td>
                                                </tr><!--end tr-->                                           
                                            </tbody>
                                        </table> <!--end table-->                                               
                                    </div><!--end /div-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->

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