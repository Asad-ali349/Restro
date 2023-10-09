<?php
include_once('../../db/conn.php');
session_start();

if(!isset($_SESSION['User_id'])|| $_SESSION['User_id']==''  ){         
         header('Location: index.php');

    }
?>