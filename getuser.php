<?php 
    error_reporting(0);
    $conn=mysqli_connect('localhost','root','','user',3306);
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $sql = "SELECT * FROM user_tbl";

    $result = mysqli_query($conn,$sql);

    $arr = [];
    while ($row = mysqli_fetch_assoc($result)){
        array_push($arr,$row);
    }

    print_r(json_encode($arr));

    mysqli_close($conn);
?>