<?php

    error_reporting(0);

    $con1 = mysqli_connect('localhost:3306','root','','resource');

    mysqli_select_db($con1,'resource');

    $con2 = mysqli_connect('localhost:3306','root','','user');

    mysqli_select_db($con2,'user');

    mysqli_query($con1,'set names utf8');

    mysqli_query($con2,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $sql = "SELECT * FROM resource_video where resource_target = 'css' 
    UNION 
    SELECT * FROM resource_pic  where resource_target = 'css'
    order by resource_target";

    $result = mysqli_query($con1,$sql);

    $input= array();
    
    while($row = mysqli_fetch_object($result)){

        array_push($input,$row);

    };

    print_r(json_encode($input));

    mysqli_close($con);

?>