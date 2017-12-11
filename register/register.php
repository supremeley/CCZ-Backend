<?php

    error_reporting(0);

    $con = mysqli_connect('localhost:3306','root','','user');

    // if(!$con){
    //     echo '1';
    // };

    mysqli_select_db('user');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_query('set names utf8'); 

    $username = $_POST['username'];
    $password = $_POST['password'];
    $createdate = $_POST['createdate']; 

    $sql_select = "SELECT user_id,user_name,user_password,submission_date FROM user_tbl WHERE user_name = '$username'";

    $result = mysqli_query($con,$sql_select);

    $row = mysqli_num_rows($result);

    // echo $row;

    if($row){

        echo '0';

    }else{

        $sql_insert = "INSERT INTO user_tbl(user_name,user_password,submission_date)VALUES('$username','$password','$createdate')";

        $result = mysqli_query($con,$sql_insert);

        // echo $sql;

        echo '1';
    }

    mysqli_close($con);

?>