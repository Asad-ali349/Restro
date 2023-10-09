<?php 
include_once('session.php');
$hotelid=$_SESSION['User_id'];
if (isset($_POST['submit'])){
    $hotelId=$_SESSION['User_id'];
    foreach($_POST['table'] as $key=>$val){
        $table= $_POST['table'][$key];
        $insert_query=mysqli_query($conn,"INSERT INTO table_number (name,hotel_id)VALUES ('$table','$hotelId')");
 }
 if ($insert_query === TRUE) {  
  header("Location: Tables.php");
} else {
  echo "Error: " . $insert_query . "<br>" . $conn->error;
}

    
}
$table_query="SELECT * FROM table_number WHERE hotel_id='$hotelid' AND status=1";
$result_table_query = mysqli_query($conn,$table_query);

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
                                
                                <h4 class="page-title">Add Table</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <div class="card" style="padding: 2%;">

                      <div class="row mt-2">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                            <tr >
                                                <th>#</th>
                                                <th>Table Name</th>
                                                <th>Action</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count=1;
                                            while ($data=mysqli_fetch_array($result_table_query)) {
                                              ?>

                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $data['name'];?></td>
                                                <td>
                                                    <a type="button" class="btn btn-primary"  href="editTables.php?id=<?php echo $data['id'];?>"><li class="fa fa-edit"></li></a>
                                                    <a type="button" class="btn btn-danger" href="removeTable.php?id=<?php echo $data['id'];?>"><li class="fa fa-trash"></li></a>
                                                </td> 
                                               
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
                            <h4 class="mt-0 header-title">Add New Table:</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group row mt-4">
                            <div class="col-sm-9"></div>
                              <div class="col-sm-3">
                                  <center>
                                   <button type="button" class="btn btn-primary" id="click" onclick="addbtn();"> <li class="fa fa-plus"></li> Add Table</button>
                                  </center>
                              </div>
                             </div>
                            <div id="body">

                                                                                         
                            </div>
                                <div class="form-group col-md-12 text-center" id="add" style=" display: none;">
                                   
                                   <button type="submit" name="submit" class="btn btn-success mt-2" >Add Table!</button> 
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

        <script>
          $(function(){
            var html = '';
            var counter=0;
            $('#click').click(function(){
                   counter++ ;
                 
                  html = '<div class="row mt-2" id="'+counter+'">'+
                            '<div class="col-sm-4">'+
                            '  <input type="text" class="form-control" name="table[]" placeholder="Enter Table Name" style="width:100%"  required>'+
                            '</div>'+
                              ' <div class="col-sm-1">'+
                            '  <button type="button" class="btn btn-danger" onclick="deleterow('+counter+')"  ><li class="fa fa-times"></li></button>'+
                           ' </div>'+
                         '</div> ';
                  $('#body').append(html)
            })
          })

          function deleterow(id){
             
            $('#'+id).remove()

          }


        </script>
        <script >
            // var add_ing= document.getElementById('click');
            // add_ing.onclick(function(){
            //     // document.getElementById('add').style.display="block";
            //     alert("hello");
            // })
            function addbtn() {
                document.getElementById('add').style.display="block";
            }
        </script>

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
        
    </body>

</html>