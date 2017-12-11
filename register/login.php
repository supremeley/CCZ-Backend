<?php

    error_reporting(0);
    $con = mysqli_connect('127.0.0.1','root','','user',3306);
    header('Content-Type:text/html; charset=UTF-8');
    mysqli_query($con,'set names utf8'); 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT user_id,user_name,user_password,submission_date 
    FROM user_tbl 
    WHERE user_name = '$username'";

    mysqli_select_db($con,'user');

    $retval = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($retval))
    {
        
        if($row['user_password'] == $password){
            print('1');          
        }else{
            print('0');
        }

    };


?>