<?php

    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','root','DTG6GHJmAy','resource');

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_select_db($con,'resource');

    $type = $_POST['type'];    
    $title = $_POST['title'];
    $imgsrc = $_POST['imgsrc'];
    $address = $_POST['address'];
    $downloads = '3';
    $describe = $_POST['describe'];
    $target = $_POST['target'];
    $password = $_POST['password'];
    $date = $_POST['date'];

    $sql = "INSERT INTO resource_".$type."(resource_title,resource_imgsrc,resource_address,resource_downloads,resource_describe,resource_target,resource_password,submission_date)
    VALUES
    ('$title','$imgsrc','$address','$downloads','$describe','$target','$password','$date')";
    
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

    echo '添加成功';

?>