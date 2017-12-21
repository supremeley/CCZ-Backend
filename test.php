<?php 
    error_reporting(0);
    $conn=mysqli_connect('localhost','root','','bloglist',3306);
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $id = $_POST['id'];
    $un = $_POST['username'];
    $isadd = $_POST['isadd'];

    $sql = "SELECT * FROM user_tbl WHERE user_name='$un'";
    mysqli_select_db( $conn, "user" );
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if(is_integer(strpos($row['user_collection'],(string)$id))){
            die("-1");
        }else {
            if($isadd != 1){
                $new = $row['user_collection'] . "," . (string)$id;
                $sql = "UPDATE user_tbl SET user_collection='$new' WHERE user_name='$un'";
                mysqli_select_db( $conn, "user_tbl" );
                $result = mysqli_query($conn,$sql);
            }
        }
    };
    mysqli_close($conn);
?>