<?php 
include_once('session.php');
$fid=$_GET['id'];



$success="";
$error="";

if (isset($_POST['submit'])){
    
    $foodName=$_POST['foodName'];
    $category=$_POST['Category'];
    $hotelId=$_SESSION['User_id'];
    $price=$_POST['price'];
   
    $foodDescription=$_POST['Description'];
    $Discount=$_POST['discount'];
    
    if ($Discount==1) 
    {
        $DiscountPrice=$_POST['discountAmount'];
    }else{
        $DiscountPrice=0;
    }

    $insert_query_food="UPDATE food SET hotel_id='$hotelId',category_id='$category',name='$foodName',price='$price',discount_price='$DiscountPrice',discount='$Discount',descprition='$foodDescription' WHERE id='$fid'";
    $result_insertion=mysqli_query($conn,$insert_query_food);
    
 //----------------------For  Images -----------------------------------------------//        
    $uid=date("Y-m-d_H:i:s");
    $filename = date("Y-m-d-H-i-s").$_FILES["files"]["name"]; 
    $tempname = $_FILES["files"]["tmp_name"];     
    $folder = "../../foodImages/".$filename;
    $allowed = array('gif', 'png', 'jpg','jpeg');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed)) {
            
        if (move_uploaded_file($tempname, $folder)) {

            $image_upload=mysqli_query($conn,"UPDATE food_images SET food_image='$filename' WHERE food_id='$fid'");
            
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
            $sql=mysqli_query($conn,"SELECT * FROM food_videos WHERE food_id='$fid'");
            if(mysqli_num_rows($sql)>0){
                $update_video=mysqli_query($conn,"UPDATE food_videos SET food_video='$filenames' WHERE food_id='$fid'");
            }else{
                $add_video=mysqli_query($conn,"INSERT INTO food_videos (food_video,food_id)VALUES ('$filenames','$fid')");
            }
            
        }
            
    }
// -------------------------------------------------------------------------------------//
    
   
       foreach($_POST['ing'] as $key=>$val){
            $ing= $_POST['ing'][$key];
            $des= $_POST['des'][$key];
            $ing_id= $_POST['id'][$key];

            $addres_user=mysqli_query($conn,"UPDATE ingredients SET  name='$ing',quantity='$des' WHERE id='$ing_id'");


        } 
    
    

    if ($result_insertion === TRUE) {
        $success="Product Updated Successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $conn->close();
}
$food_detail_query=mysqli_query($conn,"SELECT * FROM food WHERE id='$fid'");
$result_food_detail_query=mysqli_fetch_array($food_detail_query);
$cat_query='SELECT id,name FROM category';
$result_cat_query = mysqli_query($conn,$cat_query);

$get_in=mysqli_query($conn,"SELECT * FROM ingredients WHERE food_id='$fid'");

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
                                
                                <h4 class="page-title">UPDATE FOOD</h4>
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
                                          <input type="text" class="form-control" name="foodName" value="<?php echo $result_food_detail_query['name']?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPhone4">Food Category:</label>
                                          <select name="Category" class="form-control" required>
                                            <option value="">Please select</option>
                                            <?php
                                              while ($data = mysqli_fetch_array($result_cat_query)) {
                                                    if ($data['id']==$result_food_detail_query['category_id']) {
                                                ?>
                                                    <option value="<?php echo $data['id']; ?>" selected><?php echo $data['name']; ?></option>
                                                <?php        
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                                <?php
                                                    }

                                                 
                                              }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      
                                    <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="inputAddress">Price:</label>
                                            <input type="text" class="form-control" name="price" placeholder="0" value="<?php echo $result_food_detail_query['price']?>" required>
                                          </div>
                                            <div class="form-group col-md-2">
                                              <label for="inputState">Discount:</label>

                                              <select id="paymentMethod" class="form-control" name="discount">
                                                <?php 
                                                    if ($result_food_detail_query['discount']==1) {
                                                ?>
                                                    <option value="1" selected>yes</option>
                                                    <option value="0">no</option>
                                                <?php        
                                                    }else{
                                                ?>
                                                    <option value="0" selected>no</option>
                                                    <option value="1">yes</option>
                                                <?php        
                                                    }
                                                ?>
                                                
                                              </select>
                                            </div>
                                            <div class="form-group col-md-4" id="disc">
                                              <label for="inputAddress">Enter Amount:</label>
                                              <input type="text" class="form-control" id="inputAddress" name="discountAmount" value="<?php echo $result_food_detail_query['discount_price']?>">
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputAddress2">Food Description:</label>
                                          <textarea type="text" class="form-control" name="Description"  required><?php echo $result_food_detail_query['descprition']?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Food Image:</label>
                                            <input type="file" class="filestyle form-control" name="files" data-buttonname="btn-secondary" >
                                        
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Food Video:</label>
                                            <input type="file" class="filestyle form-control" name="videos" data-buttonname="btn-secondary" >
                                        
                                        </div>
                                    </div>
                                      
                                    <div id="body">
                                        <h4 class="mt-4 header-title">Ingridients</h4>
                                        <?php 
                                            $counter=0;
                                            while ($result_get_in=mysqli_fetch_array($get_in)) {
                                                $counter++;
                                        ?>
                                            <div class="row mt-2" id="<?php echo $counter; ?>">
                                              <div class="col-sm-4">
                                                <input type="text" class="form-control" name="ing[]" value="<?php echo $result_get_in['name'] ?>" style="width:100%"  required>
                                              </div>
                                              <div class="col-sm-7">
                                                <textArea type="text" style="width:100%" class="form-control" name="des[]" required><?php echo $result_get_in['quantity'] ?></textArea>
                                              </div>
                                                 <div class="col-sm-1">
                                                <input type="text" class="form-control" name="id[]" value="<?php echo $result_get_in['id'] ?>" style="width:100%; display: none;"  required>
                                                 <a type="button" class="btn btn-danger"  href="delete.php?id=<?php echo $result_get_in['id'];?>&table=ingredients&page=EditProducts.php?id=<?php  echo $fid;?>" onclick="return confirm('Are you sure?')"  ><li class="fa fa-times"></li></a>
                                              </div>
                                            </div> 
                                        <?php        
                                            }
                                        ?>
                                                                                                 
                                    </div>
                                        <div class="form-group col-md-12 text-center" >
                                           
                                           <button type="submit" name="submit" class="btn btn-success mt-2">UPDATE Food!</button> 
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