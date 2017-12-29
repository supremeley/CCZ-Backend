<?php
    error_reporting(0);

    $con1 = mysqli_connect('127.0.0.1','root','','resource');

    mysqli_query($con1,'set names utf8');

    mysqli_select_db($con1,'resource');

    $val = $_GET['searchCondition'];

    $scr = $_GET['screening'];
    
    // echo $scr;

    if($scr == "all"){
      
    }else{
        if($scr == "blog"){
            
        }else{

        }
    }
    
    $sql = "SELECT * FROM resource_".$src." WHERE resource_title LIKE '%$val%' or resource_target LIKE '%$val%' or resource_describe LIKE '%$val%'";
 
    $result = mysqli_query($con1,$sql);

    $input1 = array();

    while($row = mysqli_fetch_object($result)){
        array_push($input1,$row);
    };

    usort($input1,"downDeat");

    $obj= new stdClass();
    $obj->resource = $input1;

    $con2 = mysqli_connect('127.0.0.1','root','','bloglist');
    
    mysqli_query($con2,'set names utf8');

    mysqli_select_db($con2,'bloglist');

    $sql = "SELECT * FROM blog_tbl WHERE blog_title LIKE '%$val%' or blog_content LIKE '%$val%'";

    $result = mysqli_query($con2,$sql);

    $input2 = array();

    while($row = mysqli_fetch_object($result)){
        array_push($input2,$row);
    };

    usort($input2,"relevant");

    // foreach($input2 as $value){
    //     array_push($input1,$value);
    // }

    $obj->blog = $input2;

    print_r(json_encode($obj));

    function relevant($a,$b){ // 根据值出现次数排序
        global $val;
        if(substr_count($a->blog_content,$val) < substr_count($b->blog_content,$val)){
            return 1;
        }else if(substr_count($a->blog_content,$val) == substr_count($b->blog_content,$val)){
            return($a->blog_id > $b->blog_id)? 1:-1;
        }
    };
  
    function downDeat($a,$b){ // 根据值下载次数排序
        if($a->resource_downloads < $b->resource_downloads){
            return 1;
        }else if($a->resource_downloads == $b->resource_downloads){
            return($a->resource_id > $b->resource_id)? 1:-1;
        }
    };

    mysqli_close($conn);

?>