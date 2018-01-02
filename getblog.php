<?php 
    error_reporting(0);
    $conn=mysqli_connect('localhost','root','','bloglist',3306);
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    // header('content-type:application:json;charset=utf8');  
    // header('Access-Control-Allow-Origin:*');  
    // header('Access-Control-Allow-Methods:POST');  
    // header('Access-Control-Allow-Headers:x-requested-with,content-type');  
    // $sql = 'CREATE DATABASE bloglist';
    // $sql = "CREATE TABLE blog_tbl( ".
    //         "blog_id INT NOT NULL AUTO_INCREMENT,".
    //         "blog_title VARCHAR(200) NOT NULL,".
    //         "blog_imgsrc VARCHAR(300) NOT NULL,".
    //         "blog_content TEXT NOT NULL,".
    //         "blog_date DATE NOT NULL,".
    //         "PRIMARY KEY ( blog_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
    $current = $_POST['current'] + 5;
    $target = $_POST['target'];

    // echo $target;
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