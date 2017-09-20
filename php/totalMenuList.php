<?php
    $result= array();
    $callback = $_GET['callback'];
    $gname = $_GET['gname'];
    $resultData = 'failed';
    //데이터베이스와 연결
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
/*    mysqli_query("set names utf8");*/
    //데이터를 불러옴
    $query2 = mysqli_query($connection, "set time_zone ='+9:00'");
    $query = mysqli_query($connection, "select pfood_name,pprice,pqtt from food_complete where date_format(ptime,'yyyy-mm-dd')=date_format(now(),'yyyy-mm-dd')
and cid = (select cname from calendar c,cgroup g where c.cid=g.cid and startday=curdate()
and g.gname1='".$gname."')");

    if($query){
        $resultData = "success";
        $data = array();
        $num = mysqli_num_rows($query);
        for($i = 0; $i < $num; $i++){
            mysqli_data_seek($query, $i); //레코드 이동
            $row = mysqli_fetch_array($query);
            $food_name = $row['pfood_name'];
            $price = $row['pprice'];
            $pqtt = $row['pqtt'];
            $data[$i] = array();
            $data[$i]['food_name'] = $food_name;
            $data[$i]['price'] = $price;
            $data[$i]['pqtt'] = $pqtt;
        }
    }
    $result = array('result' => $resultData, 'data' => $data);
    mysqli_close($connection);
    echo $callback. "(" . json_encode($result). ")";
?>
