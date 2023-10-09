
<?php 
include_once('db/conn.php'); 
session_start();
$msg="";
    

     
$email = $_POST['email'];
$password = $_POST['password'];

    
    $check = "SELECT email ,id, password FROM chefs WHERE email = '$email'";
    $result = mysqli_query($conn,$check);
    if($result->num_rows > 0 ){
    
        $data = $result->fetch_array();
        
        if($password == $data['password']){
          $msg = "You have logged In";
          $_SESSION['login_user'] = $email;
          $_SESSION['User_id'] = $data['id'];
          $result = [
            'error'=> false,
            'msg'=> $msg
        ];
         header('content-Type:application/json');
          echo json_encode($result);
        }
        else{
          $msg = "Wrong Password...!"; 
          $result = [
            'error'=> true,
            'msg'=> $msg
        ];
         header('content-Type:application/json');
          echo json_encode($result);
        }
    
    } else {
        $msg = "No User found...!"; 
        $result = [
            'error'=> true,
            'msg'=> $msg
        ];
         header('content-Type:application/json');
         echo json_encode($result);
        
     }

     
 

?>