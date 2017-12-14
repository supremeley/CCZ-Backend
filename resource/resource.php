<?php
    error_reporting(0);

    $con = mysqli_connect('localhost:3306','root','','resource');

    // if (!$con){
    //     die('Could not connect: ' . mysql_error());
    // };

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $type = $_POST['type'];
    $disNum = $_POST['disNum'];
    $target = $_POST['target'];
    $thisPage = $_POST['thisPage'];

    if($target){
        $sql = "SELECT * FROM resource_".$type." WHERE resource_target='$target'";
    }else{
        $sql = "SELECT * FROM resource_".$type;
    }
    
 
    // $sql = "UPDATE resource_video SET resource_title='2个HTML5特效源码' WHERE resource_id=15"; //修改数据
    
    $result = mysqli_query($con,$sql);

    $input= array();
    
    while($row = mysqli_fetch_assoc($result)){

        array_push($input,$row);

        // print_r(json_encode($row));

    }

    $start = $disNum * $thisPage;

    $output = array_slice($input,$start,$disNum);

    // echo $start;
    // echo $end;

    print_r(json_encode($output));

    mysqli_close($con);

?>