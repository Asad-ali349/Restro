<?php 

include_once('session.php');
$response=['error'=>false];
if (isset($_POST['tableid']) && isset($_POST['foodid']) && isset($_POST['quantity'])) {
    $tableId=$_POST['tableid'];
    $foodId=$_POST['foodid'];
    $quantity=$_POST['quantity'];

    $get_food_detail=mysqli_query($conn,"SELECT * FROM food WHERE id='$foodId'");
    $result_get_food_detail=mysqli_fetch_array($get_food_detail);

    $totalprice=$quantity*$result_get_food_detail['price'];
    $totaldiscount=$quantity*$result_get_food_detail['discount_price'];

    $update_cart=mysqli_query($conn,"UPDATE cart SET quantity='$quantity',total_price='$totalprice',discount_price='$totaldiscount' WHERE table_id='$tableId' AND food_id='$foodId'");
    if ($update_cart==true) {
        $get_update_product=mysqli_query($conn,"SELECT * FROM cart WHERE table_id='$tableId' AND food_id='$foodId'");
        $get_bill=mysqli_query($conn,"SELECT SUM(total_price) AS total,SUM(discount_price) As dis, SUM(total_price)-SUM(discount_price) AS grand from cart WHERE table_id='$tableId'");
        $result_get_update_product=mysqli_fetch_array($get_update_product);
        $result_get_bill=mysqli_fetch_array($get_bill);
        

        $response['quantity']=$result_get_update_product['quantity'];
        $response['total_price']=$result_get_update_product['total_price'];
        $response['total']=$result_get_bill['total'];
        $response['dis']=$result_get_bill['dis'];
        $response['grand']=$result_get_bill['grand'];
        $response['msg']="Quantity Updated Successfully";
        header('content-Type:application/json');
        echo json_encode($response);

    }else{
        $response['error']=true;
        $response['msg']="Unable to Update";
        header('content-Type:application/json');
        echo json_encode($response);
    }


}



?>