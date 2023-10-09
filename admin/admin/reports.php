    <!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset="utf-8" />
        <title>Halol Alsada | orders list </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Halol Alsada Dashboard " name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 


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
                               
                                <h4 class="page-title">Orders</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                       
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-group row" method="post" >
                                      
                                            <label for="example-email-input" class="col-1 col-form-label text-right">
                                                From:
                                            </label>
                                                    
                                             <div class="form-group col-3">
                                               
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="e.g. Ali@gmail.com">
                                          
                                            </div>
                                             <label for="example-email-input" class="col-1 col-form-label text-right">
                                                To:
                                            </label>
                                             <div class="form-group col-3">
                                               
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="e.g. Ali@gmail.com">
                                          
                                            </div>
                                             <div class="col-3">
                                                <input type="submit" class="btn btn-secondary waves-effect" value="Search" name="">
                                            </div>
                                           
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-9">  
                            <div class="row">
                                  <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Total Orders</h5>
                                            <div class="media">
                                                <i data-feather="gift" class="align-self-center icon-lg icon-dual-purple"></i>                                     
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-24 m-0 text-danger font-weight-semibold">
                                                        73
                                                       
                                                    </h2> 
                                                  
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->
                               
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Total Sale</h5>
                                            <div class="media">
                                                <i data-feather="dollar-sign" class="align-self-center icon-lg icon-dual-warning"></i>                                     
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-24 m-0 font-weight-semibold">
                                                        21
                                                        
                                                    </h2> 
                                                    
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mt-0 mb-2 header-title">Profit</h5>
                                            <div class="media">
                                                <i data-feather="activity" class="align-self-center icon-lg icon-dual-success"></i>                                     
                                                <div class="media-body align-self-center text-truncate ml-3">
                                                    <h2 class="font-24 m-0 text-danger font-weight-semibold">
                                                        73
                                                         
                                                    </h2> 
                                                  
                                                </div><!--end media-body-->
                                            </div><!--end media-->
                                        </div><!--end card-body-->                                        
                                    </div><!--end card-->                                      
                                </div><!-- end col-->                                                       
                            </div>                                                 
                        </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title">Orders List</h4>
                                    
                                    <form>
                                        
                                    </form>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Constact</th>
                                            <th>Order Date/Time</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
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
                                                    <a href="order_detail.php" class="btn btn-outline-success  waves-effect waves-light btn-round"><li class="far fa-eye"></li></a>
                                                   
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
                                                    <a href="order_detail.php" class="btn btn-outline-success  waves-effect waves-light btn-round"><li class="far fa-eye"></li></a>
                                                  
                                                    <a href="" class="btn btn-outline-danger  waves-effect waves-light btn-round"><li class="far fa-trash-alt"></li></a>

                                                    </td>
                                                </tr><!--end tr-->   
                                        </tbody>
                                    </table>        
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    
                </div><!-- container -->

             
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

         <!-- Required datatable js -->
         <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
         <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="../plugins/datatables/jszip.min.js"></script>
         <script src="../plugins/datatables/pdfmake.min.js"></script>
         <script src="../plugins/datatables/vfs_fonts.js"></script>
         <script src="../plugins/datatables/buttons.html5.min.js"></script>
         <script src="../plugins/datatables/buttons.print.min.js"></script>
         <script src="../plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Responsive examples -->
         <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
         <script src="../assets/pages/jquery.datatable.init.js"></script>
        
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        
    </body>

</html>