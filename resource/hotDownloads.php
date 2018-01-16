<?php
    error_reporting(0);

    $con = mysqli_connect('127.0.0.1:3306','root','DTG6GHJmAy','resource');

    mysqli_query($con,'set names utf8');

    header('Content-Type:text/html; charset=UTF-8');

    $type = $_POST['type'];
    $target = $_POST['target'];

    if($target){
        $sql = "SELECT * FROM resource_".$type." WHERE find_in_set('$target',resource_target)";
    }else{
        $sql = "SELECT * FROM resource_".$type;
    }
    
    $result = mysqli_query($con,$sql);

    $input= array();
    
    while($row = mysqli_fetch_object($result)){

        array_push($input,$row);

    };

    function downDeat($a,$b){
        if($a->resource_downloads < $b->resource_downloads){
            return 1;
        }else if($a->resource_downloads == $b->resource_downloads){
            return($a->resource_id > $b->resource_id)? 1:-1;
        }
    };

    usort($input,"downDeat");

    $output = array_slice($input,0,5);

    print_r(json_encode($output));

    mysqli_close($con);

?>