<?php 
include_once('session.php');

$hotelId=$_SESSION['User_id'];

$cat_query="SELECT id,name FROM category WHERE hotel_id='$hotelId'";
$result_cat_query = mysqli_query($conn,$cat_query);
$success="";
$error="";

if (isset($_POST['submit'])){
    
    $foodName=$_POST['foodName'];
    $category=$_POST['Category'];
    $hotelId=$_SESSION['User_id'];
    $price=$_POST['price'];
    // $DiscountPrice=$_POST['discount_p'];
    $foodDescription=$_POST['Description'];
    $Discount=$_POST['discount'];
    
    if ($Discount==1) 
    {
        $DiscountPrice=$_POST['discountAmount'];
    }else{
        $DiscountPrice=0;
    }

    $insert_query_food="INSERT INTO food (hotel_id,category_id,name,price,discount_price,discount,descprition) VALUES ('$hotelId','$category','$foodName','$price','$DiscountPrice','$Discount','$foodDescription')";
    $result_insertion=mysqli_query($conn,$insert_query_food);

    $get_id_query="SELECT * FROM food WHERE hotel_id='$hotelId' AND category_id='$category' AND name='$foodName' AND price='$price' AND discount_price='$DiscountPrice' AND discount='$Discount' AND descprition='$foodDescription' ORDER BY id desc limit 1";
    $result_get_id =$conn->query($get_id_query);
//----------------------Geting FoodId ----------------------------------------------//
    $data_get_id = mysqli_fetch_assoc($result_get_id);
    
    $FoodId=$data_get_id['id'];

    
 //----------------------For  Images -----------------------------------------------//        
    $uid=date("Y-m-d_H:i:s");
    $filename = date("Y-m-d-H-i-s").$_FILES["files"]["name"]; 
    $tempname = $_FILES["files"]["tmp_name"];     
    $folder = "../../foodImages/".$filename;
    $allowed = array('gif', 'png', 'jpg','jpeg');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed)) {
            
        if (move_uploaded_file($tempname, $folder)) {

            $image_upload=mysqli_query($conn,"INSERT INTO food_images (food_image,food_id)VALUES ('$filename','$FoodId')");
            
        }  
    }

//----------------------For Videos ----------------------------------------------//    
    $filenames = date("Y-m-d-H-i-s").$_FILES["videos"]["name"]; 
    $tempnames = $_FILES["videos"]["tmp_name"];     
    $folders = "../../foodVideos/".$filenames;
    $alloweds = array('mkv','mp4','avi');
    $exts = pathinfo($filenames, PATHINFO_EXTENSION);
    if (in_array($exts, $alloweds)) {
            
        if (move_uploaded_file($tempnames, $folders)) {

            $sql=mysqli_query($conn,"INSERT INTO food_videos (food_video,food_id)VALUES ('$filenames','$FoodId')");
            
        }
            
    }
// -------------------------------------------------------------------------------------//
    if (isset($_POST['ingrid'])) {
        foreach($_POST['ing'] as $key=>$val){
            $ing= $_POST['ing'][$key];
            $des= $_POST['des'][$key];

            $addres_user=mysqli_query($conn,"INSERT INTO ingredients (name,quantity,food_id)VALUES ('$ing','$des','$FoodId')");


        }
    }
    

    if ($result_insertion === TRUE && $image_upload === TRUE) {
        $success="Product Added Successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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
                                
                                <h4 class="page-title">Add Category</h4>
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
                    
                    <div class="card">
                                <div class="card-body">        
                                    <h4 class="mt-0 header-title">Food Data</h4>
                                    <form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="fName">Food name:</label>
                                          <input type="text" class="form-control" name="foodName" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPhone4">Food Category:</label>
                                          <select name="Category" class="form-control" required>
                                            <option value="">Please select</option>
                                            <?php
                                              while ($data = mysqli_fetch_array($result_cat_query)) {
                                                ?>
                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option><?php  
                                              }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      
                                    <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="inputAddress">Price:</label>
                                            <input type="text" class="form-control" name="price" placeholder="0" required>
                                          </div>
                                            <div class="form-group col-md-2">
                                              <label for="inputState">Discount:</label>
                                              <select id="paymentMethod" class="form-control" name="discount">
                                                <option value="1" selected>yes</option>
                                                <option value="0">no</option>
                                              </select>
                                            </div>
                                            <div class="form-group col-md-4" id="disc">
                                              <label for="inputAddress">Enter Amount:</label>
                                              <input type="text" class="form-control" id="inputAddress" name="discountAmount">
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputAddress2">Food Description:</label>
                                          <textarea type="text" class="form-control" name="Description" placeholder="" required></textarea>
                                        </div>
                                    </div>
                                     <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Food Image:</label>
                                            <input type="file" accept="image/*" class="filestyle form-control" name="files" data-buttonname="btn-secondary" required >
                                        
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Food Video:</label>
                                            <input type="file" class="filestyle form-control" name="videos" data-buttonname="btn-secondary" >
                                        
                                        </div>
                                    </div>
                                      <div class="form-group row mt-4">
                                    <div class="col-sm-9"></div>
                                      <div class="col-sm-3">
                                          <center>
                                           <button type="button" class="btn btn-primary" id="click"name="ingrid" > <li class="fa fa-plus"></li> Add Ingridients</button>
                                          </center>
                                      </div>
                                     </div>
                                    <div id="body">

                                                                                                 
                                    </div>
                                        <div class="form-group col-md-12 text-center" >
                                           
                                           <button type="submit" name="submit" class="btn btn-success mt-2">Add Food!</button> 
                                        </div>
                                      
                                    </form>
                                    </div>
                                    
                            </div><!--end card-->
                    </div><!--end card-->

                    <!-- end page title end breadcrumb -->
   

                </div><!-- container -->

                

                <?php include_once 'includes/footer.php';?>
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
                            '  <input type="text" class="form-control" name="ing[]" placeholder="Enter Ingrediant Name" style="width:100%"  required>'+
                            '</div>'+
                            '<div class="col-sm-7">'+
                            '<textArea type="text" style="width:100%" class="form-control" name="des[]" placeholder="Quantity" required></textArea>'+
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
        <script>
            $(document).ready(function(){
              $('#paymentMethod').on('change', function() {

                if ( this.value == '0'){
                  // alert('hide');
                  $('#disc').css("display", "none");

                }else{
                  // alert('show');
                  $('#disc').css("display", "block");
                }
              });
            });
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
        <script >
            setTimeout(()=> {
                $('.alert').hide('slow')
            }, 1000)
        </script>
    </body>

</html>