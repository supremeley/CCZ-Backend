<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','root','','bloglist');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $current = $_POST['current'] + 5;
    $target = $_POST['target'];

    if($target == null) {
        $sql = "SELECT * FROM blog_tbl";
    }else {
        $sql = "SELECT * FROM blog_tbl WHERE blog_target = '$target'";
    }
    mysqli_select_db( $conn, "bloglist" );
    $result = mysqli_query($conn,$sql);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_unshift($arr,$row);
    };

    $arr2 = [];
    for ($i=0;$i<count($arr);$i++){
        if($i >= $current){
            break;
        }else {
            array_push($arr2,$arr[$i]);
        }
    }

    print_r(json_encode($arr2));
    mysqli_close($conn);
?>