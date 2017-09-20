<?php
    $result = array();
    $callback = $_GET['callback'];
    $resultData = 'failed';
    
    $connection = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
    $query = mysqli_query($connection, "select * from mygallery order by id desc");
    
    if($query){
        $resultData = "success";
        $data = array();
        
        $num = mysqli_num_rows($query);
        
        for($i = 0; $i < 1; $i++){
        mysqli_data_seek($query, $i);
        $row = mysqli_fetch_array($query);
        
        $id = $row['id'];
        $imageName = $row['imageName'];
        $data[$i]['id'] = $id;
        $data[$i]['imageName'] = $imageName;
        }
    }
    $result = array('result' => $resultData, 'data' => $data);
    mysqli_close($connection);
    
    echo $callback . "(" . json_encode($result) . ")";
    ?>