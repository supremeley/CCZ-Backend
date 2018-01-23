<?php 
    error_reporting(0);
    $conn=mysqli_connect('127.0.0.1:3306','bloglist','DTG6GHJmAy','bloglist');
    mysqli_query($conn , "set names utf8");
    header("Content-Type:text/html; charset=UTF-8");

    $id = $_POST['id'];
    $un = $_POST['username'];
    $isadd = $_POST['isadd'];

    $conn1=mysqli_connect('127.0.0.1:3306','cz','DTG6GHJmAy','cz');
    mysqli_query($conn , "set names utf8");

    $sql = "SELECT * FROM user_tbl WHERE user_name='$un'";
    mysqli_select_db( $conn1, 'cz' );
    
    $result = mysqli_query($conn1,$sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if(is_integer(strpos($row['user_collection'],(string)$id))){
            die("-1");
        }else {
            if($isadd != 1){
                $new = $row['user_collection'] . "," . (string)$id;
                $sql = "UPDATE user_tbl SET user_collection='$new' WHERE user_name='$un'";
                mysqli_select_db( $conn1, "cz" );
                $result = mysqli_query($conn1,$sql);
            }
        }
    };
    mysqli_close($conn);
?>