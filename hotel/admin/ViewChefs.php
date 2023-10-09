<?php
include_once('session.php');
$hotelId=$_SESSION['User_id'];
$sql="SELECT * FROM chefs WHERE hotel_id='$hotelId'";
$result_sql=mysqli_query($conn,$sql);
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

    <body>
        <!-- leftbar-tab-menu -->
        <?php require_once("includes/navbar.php");?>

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
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Restro</a></li>
                                        <li class="breadcrumb-item active">Chefs</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Chefs</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                         <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Chef Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php 
                                            $count=1;
                                                while ($data=mysqli_fetch_array($result_sql)) {
                                                    
                                                
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
                                                    <!--<td>-->
                                                        <?php
                                                            if($data['status']==1){?>
                                                                <td><a href="blockchef.php?id=<?php echo $data['id'];?>" class="btn btn-outline-primary  waves-effect waves-light btn-round">Block</li></a></td>
                                                            <?php }else {?>
                                                            <td><a href="unblockChefs.php?id=<?php echo $data['id'];?>" class="btn btn-outline-primary  waves-effect waves-light btn-round">Unblock</li></a></td>
                                                            <?php }?>
                                                    <!--</td>-->

                                                </tr><!--end tr-->
                                            <?php
                                            $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>        
                        </div>
                    </div>
   

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
        <!--data tables-->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
         <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
         <script src="../assets/pages/jquery.datatable.init.js"></script>
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
        
    </body>

</html>