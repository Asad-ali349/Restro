    <!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset="utf-8" />
        <title>Halol Alsada | Customers list </title>
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
             
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Update  Profile</h4>
                                    
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Ali">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="e.g. Ali@gmail.com">
                                          
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contact#</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder ="e.g. 132456789" aria-describedby="emailHelp" >
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder ="e.g. Complete address" aria-describedby="emailHelp" >
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder ="e.g. Najaf" aria-describedby="emailHelp" >
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">state</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder ="e.g. State Name" aria-describedby="emailHelp" >
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Country</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder ="e.g. Iraq" aria-describedby="emailHelp" >
                                           
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">ZIP</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder ="e.g. 12345" aria-describedby="emailHelp" >
                                           
                                        </div>
                                        
                                       
                                        <button type="submit" class="btn btn-gradient-primary">Submit</button>
                                        <button type="button" class="btn btn-gradient-danger">Cancel</button>
                                    </form>                                           
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
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