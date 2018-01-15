<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','bloglist','DTG6GHJmAy','bloglist');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $title = $_POST['title'];
    $imgsrc = $_POST['imgsrc'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $target = $_POST['target'];

    $sql = "INSERT INTO blog_tbl".
           "(blog_title,blog_imgsrc,blog_content,blog_date,blog_target)".
           "VALUES".
           "('$title','$imgsrc','$content','$date','$target')";
    mysqli_select_db( $conn, 'bloglist' );
    $retval = mysqli_query( $conn, $sql );
    mysqli_close($conn);
?>