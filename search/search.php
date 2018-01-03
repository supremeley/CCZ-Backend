<?php

    error_reporting(0);

    $val = $_GET['condition'];

    $screen = $_GET['screen'];

    $sort = $_GET['sort'];

    // echo $screen;

    $obj= new stdClass();

    // if($scr == "all"){

    //     $type = array("video","pic");

    //     for($i = 0 ; $i<count($type) ; $i++){

    //         resource($type[$i],$val);

    //     };

    //     blog("blog",$val);

    // }else{

        if($screen == "blog"){

            blog($screen,$val);
            
        }else{

            resource($screen,$val);

        };
    // };

    function resource($screen,$val){ // 在资源库中搜索

        global $obj;

        $conn = mysqli_connect('127.0.0.1','root','','resource');

        mysqli_query($conn,'set names utf8');

        mysqli_select_db($conn,'resource');

        $sql = "SELECT * FROM resource_".$screen." WHERE resource_title LIKE '%$val%' or resource_target LIKE '%$val%' or resource_describe LIKE '%$val%'";
    
        $result = mysqli_query($conn,$sql);

        $input = array();

        while($row = mysqli_fetch_object($result)){
            array_push($input,$row);
        };

        usort($input,"downDeat");

        $obj->$screen = $input;

        // print_r($scr);

    };

    function blog($screen,$val){ // 在博客库中搜索

        global $obj;

        $conn = mysqli_connect('127.0.0.1','root','','bloglist');
    
        mysqli_query($conn,'set names utf8');

        mysqli_select_db($conn,'bloglist');

        $sql = "SELECT * FROM blog_tbl WHERE blog_title LIKE '%$val%' or blog_content LIKE '%$val%'";

        $result = mysqli_query($conn,$sql);

        $input = array();

        while($row = mysqli_fetch_object($result)){

            array_push($input,$row);

        };

        usort($input,"relevant");

        $obj->$screen = $input;

    };
    
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

    print_r(json_encode($obj));

    // mysqli_close($conn);

?>