<?php
include("connection/connect.php"); //connection to db
error_reporting(0);
session_start();

// sending query
if($_GET['type'] == 'orderid'){
    mysqli_query($db,"DELETE FROM users_orders WHERE order_id = '".$_GET['order_del']."'");
    mysqli_query($db,"DELETE FROM otp WHERE order_id = '".$_GET['order_del']."'");
}else{
    $query = mysqli_query($db,"SELECT COUNT(*) AS num FROM `users_orders` WHERE order_id = '".$_GET['order_id']."'");
    $rows=mysqli_fetch_array($query);
    if($rows['num'] == 1 ){
        mysqli_query($db,"DELETE FROM users_orders WHERE o_id = '".$_GET['order_del']."'");
        mysqli_query($db,"DELETE FROM otp WHERE order_id = '".$_GET['order_id']."'");
    }else{
        mysqli_query($db,"DELETE FROM users_orders WHERE o_id = '".$_GET['order_del']."'");
    }
} 
header("location:your_orders.php"); 
?>