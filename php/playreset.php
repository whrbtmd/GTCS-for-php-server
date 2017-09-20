<?php
    $reuslt = array();
    $callback = $_GET['callback'];
    $id = $_GET['id'];
    $resultData = 'failed';
    //데이터베이스에 연결
  $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8"); //한글이 꺠지지 않도록 유니코드로 설정*/
    //새로운 레코드를 삽입
    $query = mysqli_query($connection, "UPDATE cgroup SET play=0 WHERE cname = '".$id."' and play=1");
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo/*("<script> history.go(-1)  </script> ");*/
 $callback . "(" . json_encode($result). ")";
?>