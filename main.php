<!DOCTYPE>
<html>
  <head>
    <title> HULAHULA HOSTEL</title>
	 <link rel="stylesheet" href="main.css">
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

	 $(function(){
	
	$("#carouselInner").css("width",1024*$("#carouselInner ul.column").size()+"px");
	$("#carouselInner ul.column:last").prependTo("#carouselInner");
	$("#carouselInner").css("margin-left","-1024px");
	
	$("#carouselPrev").click(function(){
		$("#carouselNext,#carouselPrev").hide();
		$("#carouselInner").animate({
			marginLeft : parseInt($("#carouselInner").css("margin-left"))+1024+"px"
		},"slow","swing" , 
		function(){
			$("#carouselInner").css("margin-left","-1024px")
			$("#carouselInner ul.column:last").prependTo("#carouselInner");
			$("#carouselNext,#carouselPrev").show();
		});
	});
	
	$("#carouselNext").click(function(){
		$("#carouselNext,#carouselPrev").hide();
		$("#carouselInner").animate({
			marginLeft : parseInt($("#carouselInner").css("margin-left"))-1024+"px"
		},"slow","swing" , 
		function(){
			$("#carouselInner").css("margin-left","-1024px");
			$("#carouselInner ul.column:first").appendTo("#carouselInner");
			$("#carouselNext,#carouselPrev").show();
		});
	});
	
	var timerID = setInterval(function(){
		$("#carouselNext").click();
	},5000);
	
	$("#carouselPrev img,#carouselNext img").click(function(){
		clearInterval(timerID);
	});
	$("ul.menu li").hover(function(){
		$(">ul:not(:animated)",this).slideDown("fast");
	},
	function(){
		$(">ul",this).slideUp("fast");
	});
	
});
		</script>
    
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
	color:#CFDFB5;
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
		
		<style type="text/css">

*{
	margin:0;
	padding:0;
}
#carouselWrap{
	margin:20px auto;
	width:940px;
	height:550px;
	padding:5px;
	position:relative;
}

#carouselWrap2{
	margin:20px auto;
    width:1024px;
	height:500px;
	padding:5px;
	position:relative;
	z-index: -1000;
}

#carouselPrev{
	position:absolute;
	top:225px;
	left:-75px;
	cursor:pointer;
}
#carouselNext{
	position:absolute;
	top:225px;
	right:-75px;
	cursor:pointer;
}
#carouse{
	width:100%;
	height:100%;
	overflow:hidden;
	
}

#carouselInner ul.column{
	width:1024px;
	height:450px;
	
	list-style-type:none;
	float:left;
}
#carouselInner ul.column li{
	float:left;
	margin-right:10px;
	display:inline;
}
#carouselInner ul.column li img{
	border:none;
}
		</style>

 <?PHP
		session_start();
		// Create connection to Oracle
		$conn = oci_connect("hulahula","123123123", "//localhost/XE");
		?>

  
	
	
	</head>
	<body>
	<font face="Swis721 BT" color="#664b50">
<!---------------------------------------------------------------menu bar-------------------------------------------------------------->
<center>
    <div id="container">
    	<br><a href="main.php"><img src="logo01.jpg"></a></br>
		
		<font size="1">SINCE 2015 </br>
		<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
		<ul class="menu">
    	<li><font size ="3" color ="575757""><a href="#">About</a></font>
		<li><font size ="3" color ="#c1caad""><a href="#">Room & Rate</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Facilities</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Book</a></font></li>
	   
	    </li>
	
    </div>
	
<!---------------------------------------------------------------photo--------------------------------------------------------------->	
	
	  <div id="carouselWrap">
		<center>
			<p id="carouselPrev"><img src="slide_left.png" alt="previous" /></p>
			<p id="carouselNext"><img src="slide_right.png" alt="next" /></p>
			<div id="carouselWrap2">
			<div id="carouse">
				<div id="carouselInner">
					<ul class="column">
						<li><a href="#"><img src="M_Spa_and_Pool_Penthouse_503.jpg" /></a></li>
					</ul>
					<ul class="column">
						<li><a href="#"><img src="F_Illusion_Suite_502.jpg" /></a></li>
					</ul>
					<ul class="column">
						<li><a href="#"><img src="41.jpg" /></a></li>
					</ul>
					<ul class="column">
						<li><a href="#"><img src="J_Ballroom_Suite_1102_101.jpg" /></a></li>
					</ul>

					<ul class="column">
						<li><a href="#"><img src="K_Geneva_Suite_104.jpg" /></a></li>
					</ul>
				</div>
			</div>
			</div>
		 </center>
		</div>
		
		
		<img src="bottom.gif">
		
		
		
		<div class="bottom">
	<ul class="column1">
		</br>
<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
	</ul></div>
		
		
		
		
</center>

	</body>
	</html>
	