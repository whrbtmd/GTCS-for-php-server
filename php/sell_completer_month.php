<?php
$callback = $_GET['callback'];
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
$sth = mysqli_query($connection, "SELECT sell FROM sell_complete_month");
$rows1 = array();
$rows1['name'] = 'sell';
     $num = mysqli_num_rows($sth);
        for($i = 0; $i < $num; $i++){
        mysqli_data_seek($sth, $i);
        $row = mysqli_fetch_array($sth);
        $rows1['data'][] = $row['sell'];
    }
$result = array();
/*array_push($result,$rows);*/
array_push($result,$rows1);
echo
$callback ."(" . json_encode($result, JSON_NUMERIC_CHECK). ")";
mysqli_close($connection);
?>