<?php 
    error_reporting(0);
    $conn=mysqli_connect('localhost','root','','adminuser',3306);
    mysqli_query($conn , "set names utf8");

    $un = $_POST["un"];
    $pwd = $_POST["pwd"];

    $sql = "SELECT * FROM user_tbl WHERE user='$un'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if($pwd == $row["password"]) {
        print(1);
    }else {
        print(2);
    }

    mysqli_close($conn);
?>