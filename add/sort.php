<?php
    error_reporting(0);

    $con = mysqli_connect('localhost:3306','root','','resource');

    // if (!$con){
    //     die('Could not connect: ' . mysql_error());
    // };

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $sql = "SELECT * FROM resource_video";

    $result = mysqli_query($con,$sql);

    $input= array();
    
    while($row = mysqli_fetch_array($result)){

        array_push($input,$row);

    };

    $output =  json_decode(json_encode($input));

    function downDeat($a,$b){
        if($a->resource_downloads > $b->resource_downloads){
            return 1;
        }else{
            return -1;
        }
        // return ($a->resource_id > $b->resource_id)? 1:-1;
    };

    usort($input,"downDeat");

    // rsort($input);

    print_r($output);

    mysqli_close($con);

?>