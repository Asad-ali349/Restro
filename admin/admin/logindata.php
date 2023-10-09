<?php 
include_once('db/conn.php'); 
session_start();
    $msg="";
  
    if(isset($_POST['submit'])){
      
      $email = $_POST['email'];
      $password = $_POST['password'];

      $check = "SELECT email ,id, password FROM admin WHERE email = '$email'";
      $result = mysqli_query($conn,$check);
       // print_r($result);
      if($result->num_rows > 0 ){

        $data = $result->fetch_array();

        if($password == $data['password']){
          $msg = "You have logged In";
          $_SESSION['login_user'] = $email;
          $_SESSION['User_id'] = $data['id'];
           
          header("Location: dashboard.php");
        }
        else{
          $msg = "Wrong Password...!"; 
          header("Location: index.php? error=".$msg);
          $msg=''; 
        }

      } else {
        $msg = "No username found...!"; 
        header("Location: index.php? error=".$msg); 
        $msg='';
      }

      
 
    }

?>