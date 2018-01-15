<?php

    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','cz','DTG6GHJmAy','cz');

    mysqli_select_db($con,'user');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_query($con,'set names utf8'); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT user_name,user_password FROM user_tbl WHERE user_name = '123' AND user_password = '123123'";

    $retval = mysqli_query($con,$sql);  

    if($row = mysqli_num_rows($retval)){
        echo '1';
    }else{
        echo '0';
    };

?>