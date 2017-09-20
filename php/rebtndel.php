<?php
    $result = array();
    $callback = $_GET['callback'];
    $time = $_GET['time2'];
    $resultData = 'failed';
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
    /*mysqli_query("set names urt8");*/
    //게세글을 삭제
    $query = mysqli_query($connection, "DELETE FROM morder_list WHERE ptime = "."'". $time ."'");
    //쿼리문 성공식 삭제 성공;
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result) . ")";
?>
    