var pictureArray =[];
var solved = [];
var GetpicLimit;
var cell;
var img = [];
var checkClick = false;
var index1;
var index;
var clickable = true;
var theTable = document.getElementById("myTable");
var theText = "You Win";
var checkWin; 
function remainingtime(){
	var getNumberOfPics = document.getElementById("PictureNumber").value;
	var seconds_left = document.getElementById("seconds").value;
	var interval = setInterval(function() {
		document.getElementById('timer_div').innerHTML = --seconds_left;
		if (seconds_left <= 0)
		{		
		  //array index holds the value of each of the pictures	
			for(var i = 0; i < img.length; i++){
				img[i].src = "front1.jpg";
			}
			if (getNumberOfPics== 8){
				seconds_left = 120;
			}
			if (getNumberOfPics == 10){
				seconds_left = 150;
			}
			if (getNumberOfPics == 12){
				seconds_left = 180;
			}
			document.getElementById('timer_div').innerHTML = "You are Ready!";
			var interval = setInterval(function() {
				document.getElementById('remaintime_div').innerHTML = --seconds_left;
				if (seconds_left <= 0)
				{
				   document.getElementById('remaintime_div').innerHTML = "Game over";
				   clearInterval(interval);
				}
				}, 1000);
			}
			clearInterval(interval);
		}, 1000);
}
function tableCreate() {
	theTable.innerHTML = "";
	GetpicLimit = document.getElementById("PictureNumber").value;
	var index = 0;
	for(var i=0; i < GetpicLimit; i++){
		var pics = "pics-" + (i + 1) + ".jpg";
		pictureArray[index++] = pics;
		pictureArray[index++] = pics;
	}
	
	randomize(); 
	
	var pair = document.getElementById("PictureNumber").value;
	var body = document.getElementsByTagName("body")[0];
	// create elements <table> and a <tbody>
	var raw;
	var cal;
	if(pair == 8){
		raw =4;
		cal =4;
	}
	if(pair == 10){
		raw =4;
		cal =5;
	}
	if(pair == 12){
		raw = 3;
		cal = 8;
	}
	// cells creation//rows
	var count = 0;				
	for (var j = 1; j <= raw; j++) {
		// table row creation
		var row = document.createElement("tr");
		//col
		for (var i = 0; i < cal; i++) {
			// create element <td> and text node
			//Make text node the contents of <td> element
			// put <td> at end of the table row
			cell = document.createElement("td"); 
			img[count] = document.createElement('img');
			img[count].src = pictureArray[count];
			img[count].id = "" + count;
			img[count].className = "tile1";
			img[count].onclick = function () {imgClick(this)};
			solved[count] = false;
			cell.appendChild(img[count]);
			//img.className= "tile1";
			//img.src = "frontImg.png";
			row.appendChild(cell);
			count++;
		}
		//row added to end of table body
		theTable.appendChild(row);
	}
}
function imgClick(event){
	if (clickable) {
		if(checkClick == false){
			index = event.id;
			checkClick = !checkClick;
			event.src = pictureArray[index];
		}else if (index != event.id){
		   clickable = false;
		   index1 = event.id;
		   compareStringAtIndex(index,index1);
		   checkClick = !checkClick;
		   event.src = pictureArray[index1];
		}
		if(allValuesSame() == true){
			//my animation
			WindoWave(2);
		}
	}
	
}
function compareStringAtIndex(){
	var str1 = pictureArray[index];
	var str2 = pictureArray[index1];
	if(str1 == str2){
		solved[index] = true;
		solved[index1] = true;
		clickable = true;
	}else{
		setTimeout(function () {flipDownTimer(index, index1)}, 1000);
	}
}

function flipDownTimer(flipIndex1, flipIndex2) {
	img[flipIndex1].src = "front1.jpg";
	img[flipIndex2].src = "front1.jpg";
	clickable = true;
}
function allValuesSame() {
    for(var i = 0; i < solved.length; i++)
    {
        if(solved[i] == false){
            return false;
		}
	}
	return true;
}
function randomize(){
	for(var i=0; i <= 500; i++){
		var random = parseInt(Math.random() * GetpicLimit * 2);
		var random2 = parseInt(Math.random() * GetpicLimit * 2);
		var temp = pictureArray[random];
		pictureArray[random] = pictureArray[random2];
		pictureArray[random2] = temp;
	}
}
 function nextSize(i,incMethod,textLength) 
{ 
if (incMethod == 1) return (72*Math.abs( Math.sin(i/(textLength/3.14))) ); 
if (incMethod == 2) return (255*Math.abs( Math.cos(i/(textLength/3.14)))); 
} 

function sizeCycle(text,method,dis) 
{ 
   output = ""; 
   for (i = 0; i < text.length; i++) 
   { 
       size = parseInt(nextSize(i +dis,method,text.length)); 
       output += "<font style='font-size: "+ size +"pt'>" +text.substring(i,i+1)+ "</font>"; 
   } 
   theDiv.innerHTML = output; 
} 

function WindoWave(n) 
{   
   sizeCycle(theText,1,n); 
   if (n > theText.length) {n=0} 
   setTimeout("WindoWave(" + (n+1) + ")", 50); 
} 