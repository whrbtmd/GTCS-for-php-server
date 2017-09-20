<?php
    $reuslt = array();
    $callback = $_GET['callback'];
    $price =  $_GET['price'];
    $resultData = 'failed';
    $date = $_GET['date'];
    $qtt = $_GET['qtt'];
    $day = $_GET['day'];
    $month = $_GET['month'];
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
    //새로운 레코드를 삽입
    $query = mysqli_query($connection, "UPDATE sell_complete SET sell=(sell+(" .$price. "*" .$qtt. ")) where day=".$day);
    $query = mysqli_query($connection, "UPDATE sell_complete_month SET sell=(sell+(" .$price."*" .$qtt. ")) where month=".$month);
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo/*("<script> history.go(-1)  </script> ");*/
 $callback . "(" . json_encode($result). ")";
?>