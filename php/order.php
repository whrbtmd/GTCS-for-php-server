<?php
    $reuslt = array();
   $callback = $_GET['callback'];
//   $food_name = $_GET['food_name'];
    $id = isset($_POST['id']) ? $_POST['id'] : false;
    $food_name = isset($_POST['food_name']) ? $_POST['food_name'] : false;
    $price = isset($_POST['price']) ? $_POST['price'] : false;
    $qtt = isset($_POST['order_qtt']) ? $_POST['order_qtt'] : false;
/*    $id = $_REQUEST["id"];
    $food_name = $_REQUEST["food_name"];
    $qtt = $_REQUEST["order_qtt"];*/
    $resultData = 'failed';
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8"); //한글이 꺠지지 않도록 유니코드로 설정*/
    //새로운 레코드를 삽입
    $query2 = mysqli_query($connection, "set time_zone ='+9:00'");
    $query = mysqli_query($connection, "INSERT INTO order_list(pfood_name, pqtt,cid,pprice,ptime) VALUES('" .$food_name . "', '" . $qtt ."','". $id . "',".$price.", now())");
    
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo/*("<script> history.go(-1)  </script> ");*/
 $callback . "(" . json_encode($result). ")";
?>