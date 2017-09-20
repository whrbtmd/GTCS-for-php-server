<?php
include_once("MathSwap_config.php");
$link = mysqli_connect("us-cdbr-iron-east-04.cleardb.net", "b178ff1d6bac8e", "3bfbada9","heroku_9c61de29d0bd0f9");
if(!$link)
die('Could not connect to database: '. mysql_error());

mysql_select_db($database, $link);

$image = stripslashes($_REQUEST["imgname"]);
//이건 프라이머리 키입니다.. 
$sql = mysql_query("SELECT imgfile FROM food_reservation");
//디비 쿼리문

$data = mysql_result($sql, 0, "file_data");        //이미지 파일 (BLOB 타입)
$type = mysql_result($sql, 0, "mime_type");        //이미지 타입

header("Content-type: $type"); 
echo $data;     //이미지 프린트..
exit();
?>