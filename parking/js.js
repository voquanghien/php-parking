video = document.getElementById("vid");
video1 = document.getElementById("vid1");
video2 = document.getElementById("vid2");
video3 = document.getElementById("vid3");

navigator.getUserMedia = navigator.getUserMedia ||navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

function failure(e) {
  console.log("Failure");
  alert(e.name)
}

function startall()
{
	start();
	start1();
	start2();
	start3();
}

function start() {
  MediaStreamTrack.getSources(gotSources);
  btn.disabled = false;
}

function start1() {
  MediaStreamTrack.getSources(gotSources1);
  

}

function start2() {
  MediaStreamTrack.getSources(gotSources2);
  

}

function start3() {
  MediaStreamTrack.getSources(gotSources3);
  

}

function gotStream(stream) {
	console.log("Gotstream");
  	video.src = webkitURL.createObjectURL(stream);
}

function gotStream1(stream) {
	console.log("Gotstream");
  	video1.src = webkitURL.createObjectURL(stream);
}

function gotStream2(stream) {
	console.log("Gotstream");
  	video2.src = webkitURL.createObjectURL(stream);
}

function gotStream3(stream) {
	console.log("Gotstream");
  	video3.src = webkitURL.createObjectURL(stream);
}

function sourceChanged()
{
	var selectList = document.getElementById("sources");
	
	console.log("Trying to turn on cam: " + sourceIDs[selectList.selectedIndex]);
	
	//Try to set the video based on this source:
	navigator.webkitGetUserMedia({ video: {optional: [{sourceId: sourceIDs[selectList.selectedIndex]}]}},
        gotStream, function() {});
}

function gotSources(sourceInfos)
{
  var selectList = document.getElementById("sources");
  selectList.options.length = 0;
  var storageIndex = 0;
  selectList.options.add(new Option('Default'), 0);
  for (var i=1; i <= sourceInfos.length; i++)
	  {
	  console.log(sourceInfos[i])
	  if (sourceInfos[i].kind == 'video')
		  {
			  selectList.options.add(new Option(sourceInfos[i].label||'Camera ' + (selectList.length)), i);
			  sourceIDs[storageIndex] = sourceInfos[i].id;
			  storageIndex++;
		  }
	  }
}


function sourceChanged1()
{
	var selectList = document.getElementById("sources1");
	
	console.log("Trying to turn on cam: " + sourceIDs[selectList.selectedIndex]);
	
	//Try to set the video based on this source:
	navigator.webkitGetUserMedia({ video: {optional: [{sourceId: sourceIDs[selectList.selectedIndex]}]}},
        gotStream1, function() {});
}

function sourceChanged2()
{
	var selectList = document.getElementById("sources2");
	
	console.log("Trying to turn on cam: " + sourceIDs[selectList.selectedIndex]);
	
	//Try to set the video based on this source:
	navigator.webkitGetUserMedia({ video: {optional: [{sourceId: sourceIDs[selectList.selectedIndex]}]}},
        gotStream2, function() {});
}

function sourceChanged3()
{
	var selectList = document.getElementById("sources3");
	
	console.log("Trying to turn on cam: " + sourceIDs[selectList.selectedIndex]);
	
	//Try to set the video based on this source:
	navigator.webkitGetUserMedia({ video: {optional: [{sourceId: sourceIDs[selectList.selectedIndex]}]}},
        gotStream3, function() {});
}

function gotSources1(sourceInfos)
{
  var selectList = document.getElementById("sources1");
  selectList.options.length = 0;
  var storageIndex = 0;
  selectList.options.add(new Option('Default'), 0);
  for (var i=1; i <= sourceInfos.length; i++)
	  {
	  console.log(sourceInfos[i])
	  if (sourceInfos[i].kind == 'video')
		  {
				selectList.options.add(new Option(sourceInfos[i].label||'Camera ' + (selectList.length)), i);
			 	sourceIDs[storageIndex] = sourceInfos[i].id;
			  	storageIndex++;		  
			}
	  }
}

function gotSources2(sourceInfos)
{
  var selectList = document.getElementById("sources2");
  selectList.options.length = 0;
  var storageIndex = 0;
  selectList.options.add(new Option('Default'), 0);
  for (var i=1; i <= sourceInfos.length; i++)
	  {
	  console.log(sourceInfos[i])
	  if (sourceInfos[i].kind == 'video')
		  {
	  			selectList.options.add(new Option(sourceInfos[i].label||'Camera ' + (selectList.length)), i);
			 	sourceIDs[storageIndex] = sourceInfos[i].id;
			  	storageIndex++;	
		  }
	  }
}

function gotSources3(sourceInfos)
{
  var selectList = document.getElementById("sources3");
  selectList.options.length = 0;
  var storageIndex = 0;
  selectList.options.add(new Option('Default'), 0);
  for (var i=1; i <= sourceInfos.length; i++)
	  {
	  console.log(sourceInfos[i])
	  if (sourceInfos[i].kind == 'video')
		  {
				selectList.options.add(new Option(sourceInfos[i].label||'Camera ' + (selectList.length)), i);
			  	sourceIDs[storageIndex] = sourceInfos[i].id;
			  	storageIndex++;		  
				}
	  }
}



