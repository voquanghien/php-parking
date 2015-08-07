<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Parking</title>
<style>
video {
    width:100%
}
button {
    font: 15px sans-serif;
}
#div
{
	height:auto;
	width:25%;
	float:left;
}
#camera {
	height:auto;
	width:100%;
}
canvas
{
	width:100%;
	margin-top:1px;
}
p
{
	font-size:20px;
	display:inline;
}
nav ul li
{
	font-size:18px;
	width:200px;
	text-align:center;
	position:relative;
	float: left;
	list-style: none;
}
nav
{
	padding:0;
	margin:0;
	margin-bottom:5px;
}
nav ul li a
{
	text-decoration:none;
}
nav ul
{
	margin:0;
	padding:0;
}
</style>
<script>
	var mainStream;
	var choices;
	var sourceIDs = new Array();
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

</head>
<body>
		<nav>
            <ul style="display:inline-block">
                <li><a href="check.php" target="_blank"><button style="width:100%">Lịch sử ngày</button></a></li>
                <li><a href="checkperiod.php" target="_blank"><button style="width:100%">Lịch sử thời gian</button></a></li>
                <li><a href="notout.php" target="_blank"><button style="width:100%">Xe chưa ra</button></a></li>
            </ul>
        </nav>
<div style="margin-bottom:2px;">
    <p>Checkin:</p><input style="font-size:18px" type="text" id="serial" name="serial" autofocus onKeyPress="take_snapshot(event)" />
    <p>Checkout:</p><input style="font-size:18px" type="text" name="serial1" id="serial1" onKeyPress="onEnter(event)"/>
    <button id="btn" onclick="startall()">Nguồn camera</button>
</div>
<div id="camera">
    <div id="div">
        <select id="sources" onchange = "sourceChanged()"></select>
        <div id="choices">
        </div>
        <video id="vid" autoplay></video>
        <br>
        <canvas id="canvasEle" height="250"></canvas>
    </div>
    
    <div id="div">
        
        <select id="sources1" onchange="sourceChanged1()"></select>
        <div id="choices1">
        </div>
        <video id="vid1" autoplay></video>
        <br>
        <canvas id="canvasEle1" height="250"></canvas>
    </div>
    
    <div id="div">
        
        <select id="sources2" onchange = "sourceChanged2()"></select>
        <div id="choices2">
        </div>
        <video id="vid2" autoplay></video>
        <br>
        <canvas id="canvasEle2" height="250" style="display:none;"></canvas>
    </div>
    
    <div id="div"> 
        <select id="sources3" onChange="sourceChanged3()"></select>
        <div id="choices3">
        </div>
        <video id="vid3" autoplay></video>
        <br>
        <canvas id="canvasEle3" height="250" style="display:none;"></canvas>
    </div>
</div>
<script src="js.js"></script>
<script>
var vidObj = document.getElementById("vid");
var canvas = document.getElementById("canvasEle"),
ctx = canvas.getContext("2d")
/*document.getElementById("saveImgButton").addEventListener("click",function(){
	var serial = document.getElementById('serial').value;
	document.getElementById('serial').value = '';
	ctx.drawImage(vidObj, 0, 0, 640, 320);
	ctx1.drawImage(vidObj1, 0, 0, 640, 320);
	var dataUrl = canvas.toDataURL();	
	var dataUrl1 = canvas1.toDataURL();			
	$.ajax({
	type: "POST",
	url: "save.php",
	data: { 
		img1: dataUrl,
		img2: dataUrl1,
		serial: serial
	}
	}).done(function(msg) {
	console.log('saved');
	// Do Any thing you want
	});
});*/

$('#form').submit(function () {
 return false;
});

function take_snapshot(e){
	if(e.which==13)
	{
		e.preventDefault();
		var serial = document.getElementById('serial').value;
		if(serial!='')
		{
			document.getElementById('serial').value = '';
			ctx.drawImage(vidObj, 0, 0, 320, 250);
			ctx1.drawImage(vidObj1, 0, 0, 320, 250);
			var dataUrl = canvas.toDataURL();	
			var dataUrl1 = canvas1.toDataURL();			
			$.ajax({
			type: "POST",
			url: "save.php",
			data: { 
				img1: dataUrl,
				img2: dataUrl1,
				serial: serial
			}
			}).done(function(msg) {
			console.log('saved');
			// Do Any thing you want
			});
		}
	}
}
var vidObj1 = document.getElementById("vid1");
var canvas1 = document.getElementById("canvasEle1"),
ctx1 = canvas1.getContext("2d")
</script>

<div id="image1" style="width:25%; height:auto; float:left; margin-top:1px;"></div>
<div id="image2" style="width:25%; height:auto; float:left; margin-top:1px;"></div>
<script>
var vidObj2 = document.getElementById("vid2");
var canvas2 = document.getElementById("canvasEle2"),
ctx2 = canvas2.getContext("2d")
function onEnter(e)
{
	if(e.which ==13)
	{
		e.preventDefault();
		var serial = document.getElementById('serial1').value; 
		if(serial!='')
		{
		$.ajax({
        	url: 'image.php',
        	type: 'POST',
			datatype: 'json',
        	data: {id: serial},
        	success: function(data) {
				var obj = $.parseJSON(data);
				var url1 = obj.image1;
				var url2 = obj.image2;
				//$('#t').html(o.image1);
				document.getElementById('image1').innerHTML ="<img width='100%' height ='100%' src="+url1+">";
				document.getElementById('image2').innerHTML ="<img width='100%' height ='100%' src="+url2+">";
        	}
    	});
		
		ctx2.drawImage(vidObj2, 0, 0, 320, 250);
			ctx3.drawImage(vidObj3, 0, 0, 320, 250);
			var dataUrl2 = canvas2.toDataURL();	
			var dataUrl3 = canvas3.toDataURL();			
			$.ajax({
			type: "POST",
			url: "saveout.php",
			data: { 
				serial : serial,
				img3: dataUrl2,
				img4: dataUrl3,
			}
			}).done(function(msg) {
			console.log('saved');
			// Do Any thing you want
			});
		}
    	document.getElementById('serial1').value ="";
		document.getElementById('serial').focus();
	}
}
var vidObj3 = document.getElementById("vid3");
var canvas3 = document.getElementById("canvasEle3"),
ctx3 = canvas3.getContext("2d")
</script>
</div>
</body>
</html>



