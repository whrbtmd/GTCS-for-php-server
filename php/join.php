<?php
    $result = array();
    $callback = $_GET['callback'];
    $id = $_GET['id'];
    $pw = $_GET['pw'];
    $resultData = 'failed';
    //데이터베이스에 연결합니다
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8"); //한글이 안깨지도록 유니코드로 설정*/
    //새로운 레코드 삽입
    $query = mysqli_query($connection, "INSERT INTO ACCOUNT(mid, mpw) VALUES('" . $id . "','" . $pw . "')");
    //쿼리문 성공이 회원가입 성공한것
    if($query) $resultData = "success";
    $result = array('result' => $resultData);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result). ")";
?>