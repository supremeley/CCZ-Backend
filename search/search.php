<?php

    $con1 = mysqli_connect('127.0.0.1','root','','resource');

    mysqli_query($con1,'set names utf8');

    mysqli_select_db($con1,'resource');

    $val = $_GET['searchContent'];

    // echo $val;
    
    $sql = "SELECT * FROM resource_video WHERE resource_title LIKE '%$val%' or resource_target LIKE '%$val%' or resource_describe LIKE '%$val%'
            UNION
            SELECT * FROM resource_pic WHERE resource_title LIKE '%$val%' or resource_target LIKE '%$val%' or resource_describe LIKE '%$val%'
            ";
 
    $result = mysqli_query($con1,$sql);

    $input = array();

    while($row = mysqli_fetch_object($result)){
        array_push($input,$row);
    };

    function downDeat($a,$b){
        if($a->resource_downloads < $b->resource_downloads){
            return 1;
        }else if($a->resource_downloads == $b->resource_downloads){
            return($a->resource_id > $b->resource_id)? 1:-1;
        }
    };

    usort($input,"downDeat");

    $con2 = mysqli_connect('127.0.0.1','root','','bloglist');
    mysqli_query($con2,'set names utf8');

    mysqli_select_db($con2,'bloglist');

    $sql = "SELECT * FROM blog_tbl WHERE blog_title LIKE '%$val%' or blog_content LIKE '%$val%'";

    $result = mysqli_query($con2,$sql);

    while($row = mysqli_fetch_object($result)){
        array_push($input,$row);
    };

    print_r(json_encode($input));

?>