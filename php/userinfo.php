<?php
$callback = $_GET['callback'];
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
$sth = mysqli_query($connection, "SELECT mid from tbl_member");
$rows1 = array();
     $num = mysqli_num_rows($sth);
        for($i = 0; $i < $num; $i++){
        mysqli_data_seek($sth, $i);
        $row = mysqli_fetch_array($sth);
        $rows1['id'] = $row['userid'];
    }
$result = array();
/*array_push($result,$rows);*/
array_push($result,$rows1);
echo
$callback ."(" . json_encode($result, JSON_NUMERIC_CHECK). ")";
mysqli_close($connection);
?>