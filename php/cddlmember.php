<?php
    $result = array();
    $callback = $_GET['callback'];
    $postId = $_GET['cdid'];
    $resultData = 'failed';
    //데이터베이스에 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
    /*mysqli_query("set names urt8");*/
    $query = mysqli_query($connection, "delete from cgroup where cname='".$postId."'");
    //쿼리문 성공시 업데이트 성공;/
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result) . ")";
?>
    