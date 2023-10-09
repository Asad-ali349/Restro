<?php 
include_once('session.php');
$hotelid=$_SESSION['User_id'];
$fid=$_GET['id'];

$success="";
$error="";
if(isset($_POST['submit'])){
    $name=$_POST['ing'];
    $quantity=$_POST['des'];

    $add_ing=mysqli_query($conn,"INSERT INTO ingredients (name,quantity,food_id)VALUES ('$name','$quantity','$fid')");
    if ($add_ing==true) {
        $success="Ingredient add successfully";
    }else{
        $error= "Error: " . $add_ing . "<br>" . $conn->error;
    }
    
}
$ingredient_query="SELECT * FROM ingredients WHERE food_id='$fid'";
$result_ingredient_query = mysqli_query($conn,$ingredient_query);

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
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  
        <style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 80%;
              
            }

            td, th {
              border: 1px solid #dddddd;
              text-align: center;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #dddddd;

            }
        </style>

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
                                
                                <h4 class="page-title">Add Ingridients</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <?php
                        if ($success!="") {
                    ?>
                        <div class="alert alert-success border-0" role="alert">
                            <strong>Success!</strong><?php echo $success;?> 
                        </div>
                    <?php        
                        }elseif ($error!="") {
                    ?>
                        <div class="alert alert-danger border-0" role="alert">
                            <strong>Error!</strong><?php echo $error;?>
                        </div>
                    <?php        
                        }

                    ?>
                    <div class="card" style="padding: 2%;">

                      <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                            <tr >
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count=1;
                                            while ($data=mysqli_fetch_array($result_ingredient_query)) {
                                              ?>

                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $data['name'];?></td>
                                                 <td><?php echo $data['quantity'];?></td>
                                                <td>
                                                    <a  class="btn btn-primary"  href="editIngridients.php?id=<?php echo $data['id'];?>"><li class="fa fa-edit"></li></a>
                                                    <a  class="btn btn-danger" onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $data['id'];?>&table=ingredients&page=addMoreIngridients.php?id=<?php echo $fid;?>"><li class="fa fa-trash"></li></a></td> 
                                               
                                            </tr><!--end tr-->

                                           <?php  
                                                $count++;
                                             } 
                                            ?>
                                        </tbody>
                                    </table><!--end table-->
                                </div>  <!--end /div-->                                          
                            </div>  <!--end col-->                                      
                        </div><!--end row-->
                    </div>                

                    <div class="card">
                        <div class="card-body">        
                            <h4 class="mt-0 header-title">Add New Ingridient:</h4>
                            <form action="" method="post" >
                             
                                <div class="row mt-2" >
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" name="ing"  placeholder="Name" required>
                                  </div>
                                  <div class="col-sm-5">
                                    <input type="text" class="form-control" name="des"  placeholder="Quantity" required>
                                  </div>
                                  <div class="col-sm-4">
                                    <button type="submit" name="submit" class="btn btn-success ">Add Ingridient!</button> 
                                  </div>
                                        
                                </div> 
                                
                            </form>
                            </div>
                                
                        </div><!--end card-->
                    </div><!--end card-->

                    <!-- end page title end breadcrumb -->
   

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
           <script >
            setTimeout(()=> {
                $('.alert').hide('slow')
            }, 1000)
        </script>
    </body>

</html>