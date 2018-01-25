<?php

    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','root','','user');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_query($con,'set names utf8');

    mysqli_select_db($con,'user');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $createdate = $_POST['createdate']; 

    $sql_select = "SELECT user_name FROM user_tbl WHERE user_name = '$username'";

    $result = mysqli_query($con,$sql_select);
    
    if($row = mysqli_num_rows($result)){
        echo '0';
    }else{
        if($password){
            $sql_insert = "INSERT INTO user_tbl(user_name,user_password,submission_date) VALUES ('$username','$password','$createdate')";
            $result = mysqli_query($con,$sql_insert);
            echo '1';
        }else{
            
            echo '2';
        }
    }

    mysqli_close($con);

?>