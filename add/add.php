<?php

    error_reporting(0);
    $con = mysqli_connect('localhost:3306','root','','resource');

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $title = $_POST['title'];
    $imgsrc = $_POST['imgsrc'];
    $address = $_POST['address'];
    $downloads = $_POST['downloads'];
    $describe = $_POST['describe'];
    $date = $_POST['date'];

    mysqli_select_db($con,'resource');
    
    $sql = "INSERT INTO resource_pic(resource_title,resource_imgsrc,resource_address,resource_downloads,resource_describe,submission_date)
    VALUES
    ('$title','$imgsrc','$address','$downloads','$describe','$date')";
    
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

    echo '添加成功';

?>