<?php
include ('config.php');
$serial = $_POST['serial'];
$rawData = $_POST['img3'];
$rawData1 = $_POST['img4'];
$filteredData = explode(',', $rawData);
$filteredData1 = explode(',', $rawData1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y:m:d H:i:s");
$name = date('YmdHis');
$name1 = date('HisYmd');
$image = "imageout/".$name.".jpg";
$image1 = "imageout/".$name1.".jpg";
$unencoded = base64_decode($filteredData[1]);
$unencoded1 = base64_decode($filteredData1[1]);
//Create the image 
$fp = fopen($image, 'w');
fwrite($fp, $unencoded);
fclose($fp);
$fp1 = fopen($image1, 'w');
fwrite($fp1, $unencoded1);
fclose($fp1);

/*$sql="select id from image where serial='".$serial."' order by id DESC";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$sqlup = "update image set dateout = '".$date."' where id='".$id."'";
mysqli_query($con, $sqlup);*/
$sql="update image set dateout = '".$date."', imageout1='".$image."', imageout2='".$image1."' where serial = '".$serial."' order by id DESC";
mysqli_query($con,$sql);
?>