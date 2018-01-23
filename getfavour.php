<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','root','DTG6GHJmAy','user');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $un = $_POST["un"];
    $current = $_POST["current"];

    $sql = "SELECT * FROM user_tbl WHERE user_name='$un'";
    $retval = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($retval);
    $collection = $row["user_collection"];
    
    $favarr = explode(",",$collection);
    array_shift($favarr);

    $conn=mysqli_connect('127.0.0.1:3306','root','DTG6GHJmAy','bloglist');
    mysqli_query($conn , "set names utf8");

    mysqli_select_db($conn,"bloglist");
    $favblog = [];
    foreach ($favarr as $num){
        $sql = "SELECT * FROM blog_tbl WHERE blog_id=$num";
        $retval = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($retval);
        $obj = new stdclass();
        $obj -> id = $row["blog_id"];
        $obj -> title = $row["blog_title"];
        $obj -> content = $row["blog_content"];
        array_push($favblog,$obj);
    };

    $favblog = array_slice($favblog,0,$current+5);

    print_r(json_encode($favblog));

    mysqli_close($conn);
?>