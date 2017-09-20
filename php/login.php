<?php
    $result = array();
    $callback = $_GET['callback'];
    $id = $_GET['id'];
    $pw = $_GET['pw'];
    $resultData = 'failed';
    //데이터베이스 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
 /*   mysqli_query("set names utf8"); //한글이 깨지지 않도록 유니코드로 설정*/
    //id와 비밀번호가 일치하는 데이터만 선택
    $query = mysqli_query($connection, "SELECT * FROM tbl_member WHERE userid = '" . $id . "' AND userpw ='" . $pw . "'");
    if($query){
        //위 쿼리문의 수행결과로 반환된 레코드 갯수를 가져옴
        $dataCnt = mysqli_num_rows($query);
        // $dataCnt가 0이 아니라면 위와 일치하는 데이터가 있다는 뜻으로 올바른 아이디 비밀번호를 입력한것
        $data = array();
         $row = mysqli_fetch_array($query);
        $mpsn = $row['member'];
        $data['mpsn'] = $mpsn;
        if($dataCnt)
            $resultData = 'success'; 
        else
            $resultData = "wrong";
    }
    $result = array('result' => $resultData, 'data' => $data);
    mysqli_close($connection);
    echo $callback . "(" . json_encode($result) . ")";
?>