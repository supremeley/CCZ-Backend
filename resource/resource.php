<?php
    error_reporting(0);

    $con = mysqli_connect('localhost:3306','root','','resource');

    // if (!$con){
    //     die('Could not connect: ' . mysql_error());
    // };

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $type = $_POST['type'];
    $disNum = $_POST['disNum'];

    $sql = "SELECT * FROM resource_".$type;
 
    // $sql = "UPDATE resource_video SET resource_title='2个HTML5特效源码' WHERE resource_id=15"; //修改数据
    
    $result = mysqli_query($con,$sql);

    $content= array();
    
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

        array_push($content,$row);

        // print_r(json_encode($row));

    }

    // print_r($row);

    print_r(json_encode($content));

    mysqli_close($con);

?>