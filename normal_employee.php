<!DOCTYPE>
<html>
  <head>
    <title> HULAHULA HOSTEL</title>
	 <link rel="stylesheet" href="login.css">
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

#info {
    border: 2px #ddd solid;
    border-radius: 20px;
    width: 300px;
    padding: 20px;
	margin:30px;
	font-size: 15px;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	column-count: 2;
	
}
#info input {
    border: none;
    width: 260px;
    padding: 20px;
	font-size: 15px;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
}
#info input:not(:last-child) {
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-dize: 15px;
}
		</style>
		
		
		
		</head>
	<body>
	<font face="Swis721 BT" color="#664b50">

<center>
    <div id="container">
    	<br><a href="main.html"><img src="logo01.jpg"></a></br>
		
		<font size="1">SINCE 2015 </br>
		<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
		<ul class="menu">
    	<li><font size ="3" color ="575757""><a href="#">About</a></font>
		<li><font size ="3" color ="#c1caad""><a href="#">Room & Rate</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Facilities</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Log in</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Book</a></font></li>
        </li>
      </div>>
	  </center>
       <?PHP
		session_start();
		if(empty($_SESSION['EMPLOYEE_ID'])||empty($_SESSION['DEPARTMENT_ID'])){
		echo '<script>window.location = "Login.php";</script>';
		}
		
		$conn = oci_connect("hulahula","123123123", "//localhost/XE");
		?>
        <center>
     <div id = info>
     <div>
     <img src="toon.jpg">
     </div>
     <div>
     <?PHP
  	$id = $_SESSION['EMPLOYEE_ID'];
  	$query = "SELECT * from EMPLOYEE WHERE id = '$id'";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	//$_SESSION['ID'] = $row['ID'];
	echo "ID : ".$row['ID']."<br>";
	echo "NAME : ".$row['NAME']."<br>";
	echo "SURNAME : ".$row['LNAME']."<br>";
	echo "EMAIL : ".$row['EMAIL']."<br>";
	echo "<a href='logout.php'>Logout<br></a>";
	echo "<a href='changepass.php'>change password</a>";
	?>
    </div>
    </div>
	 </center> 
	  
	  
	  
	  
	  </div>
	  </center>
	  </br>
	   </br>
	    </br>
		 </br>
		  </br>
	  
	  <center>
	  <img src="bottom.gif">
		
		
		
		<div class="bottom">
	<ul class="column1">
		</br>
<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
	</ul></div>
		</center>
		
		
		


	</body>
	</html>