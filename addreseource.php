<?php

    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','resource','DTG6GHJmAy','resource');

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    mysqli_select_db($con,'resource');

    $type = $_POST['type'];    
    $title = $_POST['title'];
    $imgsrc = $_POST['imgsrc'];
    $address = $_POST['address'];
    $downloads = $_POST['downloads'];
    $describe = $_POST['describe'];
    $target = $_POST['target'];
    $date = $_POST['date'];

    $sql = "INSERT INTO resource_".$type."(resource_title,resource_imgsrc,resource_address,resource_downloads,resource_describe,submission_date)
    VALUES
    ('$title','$imgsrc','$address','$downloads','$describe','$date')";
    
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

    echo '添加成功';

?>