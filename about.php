<!DOCTYPE>
<html>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="demo.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
    


		<style type="text/css">
			*{
				margin:0;
				padding:0;
				list-style-type:none;
			}
			#container{
				margin:auto;
				width:75%;
				
			}
			.map1
			{
			right:700px;
			top:0px;
			position:absolute;
			}
			
		</style>

  <meta charset=utf-8 />
<title>Use geocoder to set map position</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v2.2.3/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' />
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:30%; height:50%; margin-left:480px; margin-top:920px;}
</style>
	
	
	</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	
	
	
	
	<body>
	<font face="Tahoma" color="#575757">

<center>



	
	<div id="container">
    	<br><a href="main.html"><img src="logo01.jpg"></a></br>
		
		<font size="1">SINCE 2015 </br>
		<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
		</div>
	
	<div class="subMenu">
	 	<div class="inner">
	 			<a href="about.php" class="subNavBtn">About</a> 
			<a href="room.php" class="subNavBtn">Room & Rate</a>
			<a href="ShowReview.php" class="subNavBtn">Review</a>
			<a href="login.php" class="subNavBtn">Log in</a>
			<a href="booking1.php" class="subNavBtn">Book</a>
		</div>
</div>
</div>
		</br>
		</br></br></br>
		<div id="container">
		
	<img src="star_abt.jpg"><font size = "4"  color="#654C4F"><i>About </i></font><img src="star_abt.jpg"></br>
	--------------------------------------------------------------------------</br>
	IT IS BEING THERE AS IT HAS BEEN LONG BEFORE.</br></br>
	<font size = "2">
Nothing is changed but sometimes the surroundings make it look different. 
It is difficult to guess what the eaves over the grape myrtle look like. 
It makes the surrounding gardens and the void look special. 
Grazing along small trees and tender greenery reaches the building. 
Gently reflected light comes like the wind.
 The bricks become the wall and make the entrance,
 and deep and long curtains replace the front door just like embracing you. 
 When you open this, it leads you to a different space. 
 You can see it at a glance but it is difficult to know what it is as it is shown. 
 Passing the counter formed like greeting someone, you will surely look back.
 It’s saying ‘Welcome you’.
Soft carpet, solid marble, anechoic wallpaper; 
these materials which have come across reaching here seem to be changed to the different appearance in the memories.
 A curving corridor extends over the sense continuously; Deja vu and a little dizziness.
It is natural but everybody can reach the door without failure. Finally, the door is open.
 Every room greets gladly all the conditions coming in. 
 The room has been set and it is filled with every functional element for being a room.
 The materials meet and part as a familiar but a new waywithout forgetting their nature. 
 The rodded joint which is made precisely on the hard surface looks like a firm handshake between the materials. 
 It is a warm hug.</br></br>
 <img src="about-3rd-1.jpg"> &nbsp;&nbsp;&nbsp;    <img src="about-3rd-2.jpg">    &nbsp;&nbsp;&nbsp; <img src="about-3rd-3.jpg"></br></br></br>
 WOOD AND STONE WHICH ARE FAMILIAR WITH AND OLD AS MUCH AS HUMAN HISTORY CONSTITUTE THE MAJORITY OF THE ROOMS.<br>
 Here, these two can be the backdrop of each other and also the protagonist themselves. 
 This warm and soft wood, at first, can be useful small table around a cozy bed or the comfortable backrest
 or the straight foot stool to put your feet on. But then, without realizing, it may wrap the body gently 
 as the guidance of the wall towards the bathroom and it may be with the bedroom as a thin windowsill 
 of the balcony which is full of wind and sunshine.</font>
 



 </div>
	
	
	
	
	
		<div id='map'></div>
		<script>
L.mapbox.accessToken = 'pk.eyJ1IjoibmljaGFzYWkiLCJhIjoiY2lpNmFyaWxyMDFtZnRva2Y0dGhrZHJ5dyJ9.dTSDKszIglHJhLj1ozUWFQ';
var geocoder = L.mapbox.geocoder('nichasai.oe5hh1jl'),
    map = L.mapbox.map('map', 'nichasai.oe5hh1jl');

geocoder.query('Chester, NJ', showMap);

function showMap(err, data) {
    // The geocoder can return an area, like a city, or a
    // point, like an address. Here we handle both cases,
    // by fitting the map bounds to an area or zooming to a point.
    if (data.lbounds) {
        map.fitBounds(data.lbounds);
    } else if (data.latlng) {
        map.setView([data.latlng[0], data.latlng[1]], 13);
    }
}
</script>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</br></br></br></br></br></br></br></br></br></br>
		<img src="bottom.gif">
		
		
		
		<div class="bottom">
	<ul class="column1">
		</br>
<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
	</ul></div>
		
		
		
		
</center>

	</body>
	</html>
	