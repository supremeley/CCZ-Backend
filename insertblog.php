<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','root','','bloglist');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $target = $_POST['target'];

    $sql = "INSERT INTO blog_tbl".
           "(blog_title,blog_content,blog_date,blog_target)".
           "VALUES".
           "('$title','$content','$date','$target')";
    mysqli_select_db( $conn, 'bloglist' );
    $retval = mysqli_query( $conn, $sql );

    if($retval){
        echo 1;
    }
    mysqli_close($conn);
?>