<?php 
include('config.php');
$serial = $_POST['id'];
$sql = "select images, images1 from image where serial ='".$serial."' order by id DESC";
$result = mysqli_query($con,$sql) or die('error in query');
$row=mysqli_fetch_array($result);
$images=$row['images'];
$image=$row['images1'];
$vals=array(
	'image1' => $images,
	'image2' => $image,	
);
echo json_encode($vals);
?>