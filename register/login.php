<?php

    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','root','','user');

    mysqli_select_db($con,'user');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_query($con,'set names utf8'); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT user_name,user_password FROM user_tbl WHERE user_name = '$username' AND user_password = '$password'";

    $retval = mysqli_query($con,$sql);

    if($row = mysqli_fetch_array($retval)){
        echo '1';
    }else{
        echo '0';
    };

?>