<?php
    $reuslt = array();
    $callback = $_GET['callback'];
    $food_name = $_GET['food_name'];
    $price = $_GET['price'];
    $size = $_GET['size'];
    $lev = $_GET['lev'];
    $resultData = 'failed';
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8"); //한글이 꺠지지 않도록 유니코드로 설정*/
    //새로운 레코드를 삽입
    $query = mysqli_query($connection, "INSERT INTO food_reservation(pfood_name, pprice,  psize, plev) VALUES('" .$food_name . "', " . $price. ",'" . $size ."인분"."','".$lev."')"); 
    if($lev == 1){
    $query = mysqli_query($connection, "INSERT INTO order_complete(pfood_name) VALUES('" .$food_name . "')");
        }
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result). ")";
?>