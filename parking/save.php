<?php
include ('config.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$rawData = $_POST['img1'];
$rawData1 = $_POST['img2'];
$serial = $_POST['serial'];
$filteredData = explode(',', $rawData);
$filteredData1 = explode(',', $rawData1);
$date = date("Y:m:d H:i:s");
$name = date('YmdHis');
$name1 = date('HisYmd');
$image = "image/".$name.".jpg";
$image1 = "image/".$name1.".jpg";
$unencoded = base64_decode($filteredData[1]);
$unencoded1 = base64_decode($filteredData1[1]);
//Create the image 
$fp = fopen($image, 'w');
fwrite($fp, $unencoded);
fclose($fp);
$fp1 = fopen($image1, 'w');
fwrite($fp1, $unencoded1);
fclose($fp1);

$sql="insert into image (serial,images,images1,date) values ('$serial','$image','$image1','$date')";
$result=mysqli_query($con,$sql);
?>