<?php
    error_reporting(0); // 报错提示
    $conn = mysqli_connect('207.246.108.136:888', 'root' , 'DTG6GHJmAy' , 'cz20171106' );// 链接数据库

    // if(! $conn ) // 测试链接
    // {
    //     die('Could not connect: ' . mysqli_error());
    // }
    // echo '数据库连接成功！';

//     $sql = 'DROP DATABASE user'; // 删除库
//     mysqli_query($conn,'set names utf8'); // 设置编码

    $sql = 'CREATE DATABASE user '; // 创建库
    $retval = mysqli_query($conn,$sql);

    // 创建表（内容+主键）ENGINE=InnoDB DEFAULT+编码格式
    $sql = " CREATE TABLE user_tbl (".
            "user_id INT NOT NULL AUTO_INCREMENT,".
            "user_name CHAR(10) NOT NULL,".
            "user_password CHAR(30) NOT NULL,".
            "submission_date DATE NOT NULL,".
            "PRIMARY KEY (user_id))ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            
    mysqli_select_db($conn,'user'); // 选择库

    $retval = mysqli_query($conn,$sql);

    // 输入内容
    $sql = " INSERT INTO user_tbl ". 
            "(user_name,user_password,submission_date) ".
            "VALUES".
            "('111','123','2017-12-07')";

    $retval = mysqli_query($conn,$sql );

    // 选择查询内容
    $sql = 'SELECT user_id, user_name, 
    user_password, submission_date
    FROM user_tbl';

    mysqli_select_db( $conn, 'user' ); // 选择查询库
    $retval = mysqli_query( $conn, $sql );
    
    // $obj = new stdClass();

    // while($row = mysqli_fetch_array($retval))
    // {
    //     // echo $row['user_id']." ".$row['user_name']." ".$row['user_password'];
    //     $obj -> id = $row['user_id'];
    //     $obj -> name = $row['user_name'];
    //     $obj -> password = $row['user_password'];
    // }

    // $arr = array();

    // foreach($obj as $key => $val){

    //     array_push($arr,$val);

    // }

    print_r(json_encode($obj));

    mysqli_close($conn);
?>