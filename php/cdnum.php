<?php
    $reuslt = array();
    $callback = $_GET['callback'];
    $idd = $_GET['iddz'];
    $cdnum = $_GET['cdnum'];
    $resultData = 'failed';
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
    //새로운 레코드를 삽입
    $query = mysqli_query($connection, "update cgroup set cdnum='".$cdnum."'where cname='".$idd."'"); 
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result). ")";
?>
