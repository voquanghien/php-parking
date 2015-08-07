<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiểm tra trong khoảng thời gian</title>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
	
   <script type="text/javascript">
       $(function() {
               $("#startdate").datepicker({changeMonth:true, changeYear: true ,dateFormat: "dd-mm-yy" }).val()
			   $("#enddate").datepicker({changeMonth:true, changeYear: true ,dateFormat: "dd-mm-yy" }).val()
       });

   </script> 
</head>
</head>

<body>
<form method="post">
Ngày bắt đầu: <input type="text" id="startdate" name="startdate" size="30"/>   
Ngày kết thúc: <input type="text" id="enddate" name="enddate" size="30"/>  
<input id="submit" name="submit" type="submit" value="Xác nhận"/>
</form>
<?php
$referrer = $_SERVER['HTTP_REFERER'];
if (($referrer != "http://localhost/parking/") && ($referrer != "http://localhost/parking/index.php")) {
 	echo "Page not found!";
} ;
include ('config.php');
if(isset($_POST['submit']))
{
	echo "<table border='1px' style='width:100%'>
			<tr>
			<td width='10%'>Thời gian vào</td>
			<td width='10%'>Thời gian ra</td>
			<td width='20%'>Hình vào 1</td>
			<td width='20%'>Hình vào 2</td>
			<td width='20%'>Hình ra 1</td>
			<td width='20%'>Hình ra 2</td>
			</tr>";
	$datestring1 = $_POST['startdate'];
	$date1 = strtotime($datestring1);
	$day1 = date("d",$date1);
	$month1 = date("m",$date1);
	$year1 = date("Y",$date1);
	$datestring2 = $_POST['enddate'];
	$date2 = strtotime($datestring2);
	$day2 = date("d",$date2);
	$month2 = date("m",$date2);
	$year2 = date("Y",$date2);
	$sql = "select * from image";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($result))
	{
		$daterow = strtotime($row['date']);
		$dayr = date("d",$daterow);
		$monthr = date("m",$daterow);
		$yearr = date("Y",$daterow);
		if($dayr>=$day1 && $monthr>=$month1 && $yearr>=$year1 && $dayr<=$day2 && $monthr<=$month2 && $yearr<=$year2)
		{
			if($row['imageout1']!=''&&$row['imageout2']!='')
			{
			echo "
				<tr>
					<td align='center'>".$row['date']."</td>
					<td align='center'>".$row['dateout']."</td>
					<td><img width=100% src='".$row['images']."'</td>
					<td><img width=100% src='".$row['images1']."'</td>
					<td><img width=100% src='".$row['imageout1']."'</td>
					<td><img width=100% src='".$row['imageout2']."'</td>
				</tr>
			";
			}
			else
			{
				echo "
				<tr>
					<td align='center'>".$row['date']."</td>
					<td align='center'>Xe chưa rời bãi</td>
					<td><img width=100% src='".$row['images']."'</td>
					<td><img width=100% src='".$row['images1']."'</td>
					<td align='center'>Xe chưa rời bãi</td>
					<td align='center'>Xe chưa rời bãi</td>
				</tr>
			";
			}
		}
	}
	echo "</table>";
}
?>
</body>
</html>