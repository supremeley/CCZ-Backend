<?php

    $con = mysqli_connect('localhost:3306','root','','resource');

    if (!$con){
        die('Could not connect: ' . mysql_error());
    };

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    // mysqli_select_db($con,'resource');
    
    // $sql = "CREATE DATABASE resource";

    // $sql = "CREATE TABLE resource_video (
    //     resource_id INT NOT NULL AUTO_INCREMENT,
    //     resource_title CHAR(60) NOT NULL,
    //     resource_imgsrc VARCHAR(100) NOT NULL,
    //     resource_address VARCHAR(255) NOT NULL,
    //     resource_downloads CHAR(10),
    //     resource_describe VARCHAR(255),
    //     submission_date DATE NOT NULL,
    //     PRIMARY KEY (resource_id))ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $sql = "INSERT INTO resource_video(resource_id,resource_title,resource_imgsrc,resource_address,resource_downloads,resource_describe,submission_date)VALUES()"
    
    $result = mysqli_query($con,$sql);

    mysqli_close($con);

?>