<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','bloglist','DTG6GHJmAy','bloglist');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $current = $_POST['current'] + 5;
    $target = $_POST['target'];

    if($target == null) {
        $sql = "SELECT * FROM blog_tbl WHERE blog_id <= $current";
    }else {
        $sql = "SELECT * FROM blog_tbl WHERE blog_id <= $current AND blog_target = '$target'";
    }
    mysqli_select_db( $conn, "bloglist" );
    $result = mysqli_query($conn,$sql);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($arr,$row);
    };

    print_r(json_encode($arr));
    mysqli_close($conn);
?>