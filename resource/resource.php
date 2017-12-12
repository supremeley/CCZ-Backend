<?php

    error_reporting(0);

    $con = mysqli_connect('localhost:3306','root','','resource');

    mysql_select_db($con,'resource');

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $sql = "SELECT * FROM resource_video";//设置搜索范围
    
    $result = mysqli_query($con,$sql);

    $content= array();// 创建空数组

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

        array_push($content,$row);

    };
    // 将搜索值转换为php对象并添加进数组

    print_r(json_encode($content)); // php对象转为json格式

    mysqli_free_result($result); //释放游标

    mysqli_close($con);

?>