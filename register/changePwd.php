<?php

    error_reporting(0);
    $conn = mysqli_connect('127.0.0.1:3306','root','','user');
    header('Content-Type:text/html; charset=UTF-8');
    mysqli_query($conn,'set names utf8'); 
    mysqli_select_db($conn,'user');

    $username = $_POST['username']; 
    $password = $_POST['password'];
    $canChange = $_POST['canChange'];

    $sql = "SELECT * FROM user_tbl WHERE user_name = '$username'";

    if($canChange){
        $sql = "UPDATE user_tbl SET user_password='$password' WHERE user_name='$username'";   
    };
  
    $result = mysqli_query($conn,$sql);

    if($canChange){
        echo '1';
    }else{
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_password'] == $password){
                echo '1';
            }else{
                echo '0';
            }        
        }
    }
    
    mysqli_close($conn);
?>