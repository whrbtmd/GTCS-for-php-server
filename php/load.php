<?php
    $result= array();
    $callback = $_GET['callback'];
    $resultData = 'failed';
    //데이터베이스와 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8");*/
    //데이터를 불러옴
    $query = mysqli_query($connection, "SELECT * FROM food_reservation f,imgapi i where f.pfood_name=i.pfood_name ORDER BY pid,plev DESC");
    if($query){
        $resultData = "success";
        $data = array();
        $num = mysqli_num_rows($query);
        for($i = 0; $i < $num; $i++){
            mysqli_data_seek($query, $i); //레코드 이동
            $row = mysqli_fetch_array($query);
            $id = $row['pid'];
            $food_name = $row['pfood_name'];
            $price = $row['pprice'];
            $size = $row['psize'];
            $lev = $row['plev'];
            $img = $row['img'];
            $data[$i] = array();
            $data[$i]['id'] = $id;
            $data[$i]['food_name'] = $food_name;
            $data[$i]['price'] = $price;
            $data[$i]['size'] = $size;
            $data[$i]['lev'] = $lev;
            $data[$i]['img'] = $img;
        }
    }
    $result = array('result' => $resultData, 'data' => $data);
    mysqli_close($connection);
    echo $callback. "(" . json_encode($result). ")";
?>
