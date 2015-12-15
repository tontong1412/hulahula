<?php session_start();?>
<!DOCTYPE>
<html>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="room.css">
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
			ul.menu li{
				
				float:left;
				width:200px;
				height:80px;
				background:url("bt01.jpg");
				position:relative;
				z-index: 0;
			}
			ul.menu li:hover{
				z-index: 2;
			}
			* html ul.menu li{
				display:inline;
				zoom:1;
			}
			*+html ul.menu li{
				display:inline;
				zoom:1;
			}
			ul.menu li a{
				display:block;
				width:100%;
				height:100%;
				line-height:80px;
				text-indent:0px;
				font-weight:none;
				color:#575757;
				text-decoration:none;
				position:relative;
			}
			ul.menu li a:hover{
				background:url("bt02.jpg");
			}
			ul.sub{
				display:none;
			}
			* html ul.sub{
				zoom:1;
				position:relative;
			}
			*+html ul.sub{
				zoom:1;
				position:relative;
			}
			ul.sub li{
				float:none;
			}
			ul.sub li ul.sub{
				position:absolute;
				left:179px;
				top:0;
			}
			ul.menu{
				zoom:1;
			}
			ul.menu:after {
				height:0;
				visibility:hidden;
				content:".";
				display:block;
				clear:both;
			}
		</style>
		</head>
	
	<!-------------------------------------->
	
	<body>
		<font face="tahoma" color="#664b50">
		<center>
			<div id="container">
				<br><a href="main.php"><img src="logo01.jpg"></a></br>
				<font size="1">SINCE 2015 </br>
				<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
				<ul class="menu">
					<li><font size ="3" color ="575757""><a href="about.php">About</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="room.php">Room & Rate</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="ShowReview.php">Review</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="booking1.php">Book</a></font></li>
				</ul>
		
	<!-------------------------------------->	
	</br>
	<img src="roomtype/title.jpg"><h2>ROOM / <i>Make your day</i></h></br>
	--------------------------------------------------</br></br>
	<div class="content">
	
		<ul class="column1">
			<li><a href="type1.html"><img class="imgtransparent" src="roomtype/t01.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">Mirror Suite</font></li></center>
			
		</ul>
		<ul class="column2">
			<li><a href="type2.html"><img class="imgtransparent" src="roomtype/t02.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">Pine Deluxe</font></li></center>
			
		</ul>
		<ul class="column3">
			<li><a href="type3.html"><img class="imgtransparent" src="roomtype/t03.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">Geneva Suite</font></li></center>
			
		</ul>
		<ul class="column4">
			<li><a href="type4.html"><img class="imgtransparent" src="roomtype/t04.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">Spa & Pool</font></li></center>
			
		</ul>
		<ul class="column5">
			<li><a href="type5.html"><img class="imgtransparent" src="roomtype/t05.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">Illusion Suite</font></li></center>
			
		</ul>
		<ul class="column6">
			<li><a href="type6.html"><img class="imgtransparent" src="roomtype/t06.jpg"/></a></li>
			<center><li><font size ="2" color ="#654C4F">White Deluxe</font></li></center>
			
		</ul>
		</div>
	</div>
		<center>
			<img src="bottom.gif">
			<div class="bottom">
				<ul class="column1">
					</br>
					<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
				</ul>
			</div>
		</center>
	</body>
</html>