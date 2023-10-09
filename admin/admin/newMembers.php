<?php 
include_once ('db/conn.php');

$sql="SELECT * FROM hotel Where status='0' ";
$result_sql=mysqli_query($conn,$sql);
?>
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
    
                                    <h4 class="mt-0 header-title">Orders List</h4>
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            


                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
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
                                                        <?php echo $data['name'];?>
                                                    </td>
                                                    <td><?php echo $data['email'];?>
                                                    </td>
                                                    <td> 
                                                        <?php echo $data['phone'];?>
                                                    </td>
                                                   
                                                    <td>
                                                    <a href="approveHotel.php?id=<?php echo $data['id']?>" class="btn btn-outline-success  waves-effect waves-light btn-round">Approve</a>
                                                  </td>
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
        <!--  For Alert-->
         <script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
         <script src="../assets/pages/jquery.sweet-alert.init.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
        
    </body>

</html>