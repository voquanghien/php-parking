<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xe chưa ra</title>
</head>

<body>
<?php
$referrer = $_SERVER['HTTP_REFERER'];
if (($referrer != "http://localhost/parking/") && ($referrer != "http://localhost/parking/index.php")) {
 	echo "Page not found!";
} ;
include ('config.php');
$sql = "select * from image";
$result = mysqli_query($con, $sql);
$count=0;
while($row = mysqli_fetch_array($result))
{
	$count++;
}
if($count!=0)
{
	echo "
	<table width='60%' border='1px'>
	<tr>
		<td width='20%'>Thời gian vào</td>
		<td width='40%'>Hình vào 1</td>
		<td width='40%'>Hình vào 2</td>
	</tr>";
	$sql1 = "select * from image";
	$result1 = mysqli_query($con, $sql1);
	$count1 = 0;
	while($row1 = mysqli_fetch_array($result1))
	{
		if($row1['imageout1']=='' && $row1['imageout2']=='')
		{
			echo "
			<tr>
				<td align='center'>".$row1['date']."</td>
				<td><img width=100% src='".$row1['images']."'</td>
				<td><img width=100% src='".$row1['images1']."'</td>
			</tr>
			";
		}
	}
	echo "</table>";
}
?>
</body>
</html>