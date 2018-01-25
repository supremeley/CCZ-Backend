<?php
    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','root','','resource');

    if (!$con){
        die('Could not connect: ' . mysql_error());
    };

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $type = $_POST['type'];
    $disNum = $_POST['disNum'];
    $target = $_POST['target'];
    $thisPage = $_POST['thisPage'];
    $id = $_POST['id'];

    if($target or $id){
        $sql = "SELECT * FROM resource_".$type." WHERE find_in_set('$target',resource_target) or resource_id='$id'";
    }else{
        $sql = "SELECT * FROM resource_".$type;
    };
    
    $result = mysqli_query($con,$sql);

    $input= array();
    
    while($row = mysqli_fetch_assoc($result)){

        array_push($input,$row);

    };

    $start = $disNum * $thisPage;

    $output = array_slice($input,$start,$disNum);

    array_push($output,count($input));

    print_r(json_encode($output));

    mysqli_close($con);

?>