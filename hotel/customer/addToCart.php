<?php
include_once('session.php');
$hotelId=$_SESSION['User_id'];
$tableId=$_SESSION['tableid'];
$success="";
$error="";
$response=['error'=>false];

if ($_POST['id']!="") {
    $foodId=$_POST['id'];

    $sql="SELECT * FROM cart WHERE table_id='$tableId' AND food_id='$foodId'";
    $result_sql=mysqli_query($conn,$sql);


    $get_price="SELECT * FROM food WHERE id='$foodId'";
    $result_get_price=mysqli_query($conn,$get_price);
    $result=mysqli_fetch_array($result_get_price);

    if (mysqli_num_rows($result_sql)>0) {
        $data=mysqli_fetch_array($result_sql);
        if ($data['table_id']==$tableId&&$data['food_id']==$foodId) {
            $qua=$data['quantity']+1;
            $totalprice=$qua*$result['price'];
            $disPrice=$qua*$result['discount_price'];
            //echo $hotelId; 
            $update_quantity="UPDATE cart SET quantity='$qua',total_price='$totalprice',discount_price='$disPrice' WHERE table_id='$tableId' AND food_id='$foodId'";
            $result_update_quantity=mysqli_query($conn,$update_quantity);
            //echo $hotelId; 
            if ($result_update_quantity==true) {
                $response['msg']="Product Quantity Updated";
                header('content-Type:application/json');
                echo json_encode($response);
            }else{
                $response['msg']="Unable To Add Item";
                header('content-Type:application/json');
                echo json_encode($response);
            }
        }
        
    }else{
        $totalprice=$result['price'];
        $disPrice=$result['discount_price'];
        // echo $hotelId; 
        $insert="INSERT INTO cart( table_id, food_id, quantity,total_price,discount_price) VALUES ('$tableId','$foodId','1','$totalprice','$disPrice')";
        $result_insert=mysqli_query($conn,$insert);
        if ($insert==true) {
            $response['msg']="Product added to Cart";
            header('content-Type:application/json');
            echo json_encode($response);
        }else{
            $response['msg']="Unable To Add Item";
            header('content-Type:application/json');
            echo json_encode($response);
        }
    }
}


 

?>