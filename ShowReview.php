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
	color:#575757;
	text-decoration:none;
	position:relative;
}

table {
	margin-top:300px
	border-collapse: collapse;
	text-align: left;
}
th, td {
	padding: 12px
}
th {
    background-color: #aaaaaa;
    color: white;
}

tr:hover {background-color: #f5f5f5}
tr:nth-child(even) {background-color: #f2f2f2}


		</style>
	<style type="text/css">	
		#rate{
			position:absolute;
			margin-left:950px;
			margin-top:-75px;
			font-size:26px;
		}
		
		#img{
			position:absolute;
			margin-left:930px;
			margin-top:-100;
		}
		#select{
			margin-top:-60px;
			position:absolute;
			margin-left:350px
		}
		.buttonA{
				margin:10px;
				border: none;
				width: 145px;
				padding: 20px;
				font-size: 15px;
				}
	</style>
 <?PHP
		session_start();
		// Create connection to Oracle
		$conn = oci_connect("hulahula","123123123", "//localhost/XE");
		
		$rate = "SELECT ROUND(AVG(RATE),1) as AVERAGE FROM REVIEW";
		$parseRequest = oci_parse($conn, $rate);
		oci_execute($parseRequest);
		$avg = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
  ?>
	
	
	</head>
	<body>
	<font face="tahoma" color="#664b50">
<!---------------------------------------------------------------menu bar-------------------------------------------------------------->
<center>
	
    <div id="container">
    	<br><a href="main.php"><img src="logo01.jpg"></a></br>
		
		<font size="1">SINCE 2015 </br>
		<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
		<ul class="menu">
    	<li><font size ="3" color ="575757""><a href="about.php">About</a></font>
		<li><font size ="3" color ="#c1caad""><a href="room.php">Room & Rate</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="ShowReview.php">Reviews & Rates</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="booking1.php">Book</a></font></li><br>
		
		<center>
		<div id='select'>
		<form method="post" name="form1">
		
		<label for="Selecter"><font size = 5px> จำนวนแถวที่จะแสดง : </label></font>
			<select id="Sco" name="ROWS" >
				<option value="Error">Select</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="40">40</option>
				<option value="50">50</option>
				<option value="10000">All</option>
			</select>
			<input type="submit" name="post" value="  Show  ">
			</form>
			</div>
			
	<?php		
			
		echo '<div id="rate">';
		//echo 'AVERAGE RATE';
		echo $avg['AVERAGE'];
		
		echo '</div>';
		echo '<div id="img">';
		echo '<img width=80px height=80px src="star.png" > ';
		echo '</div>';
	
		
		$query = "SELECT * FROM REVIEW";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$rows=array();
		$count=0;
		while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
		$rows[]= $row;
		$count++;
	}
	$temp = $count;
	$n = 10;
	if(isset($_POST['post'])){
		if($_POST['ROWS']!='Error'){
			$n = $_POST['ROWS'];
		}
	
		else
		{}
	}
	echo '<center>
	<table style="margin-top :180px;" >
	<tr>
	<th>BNo.</th>
	<th>Name</th>
	<th>Time</th>
	<th>Comment</th>
	<th>Rate</th>
	</tr>';
		foreach($rows as $test){
			if($temp>$count-$n){
			$nam=$test['NAME'];
			$book=$test['BKNUM'];
			$tex=$test['CONTENT'];
			$time=substr($test['TIME'],0,18).' '.substr($test['TIME'],26,2);
			$score=$test['RATE'];
			echo '<tr>';
			echo "<td width = 5%>$book</td>";
			echo "<td width = 12%>$nam</td>";
			echo "<td width = 12%>$time</td>";
			echo "<td width = 50%>$tex</td>";
			echo "<td width = 5%>$score</td>";
			echo '</tr>';
			$temp--;}
		}
		echo '</table></center>';
	?>
	
    </div>
	<li><font size ="3" color ="#c1caad""><a href="Review.php"><button class="buttonA" type="button">Review</button></a></font></li>
<!---------------------------------------------------------------photo--------------------------------------------------------------->	
		<img src="bottom.gif">
		
		
		
		<div class="bottom">
	<ul class="column1">
		</br>
<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
	</ul></div>
		
		
		
		
</center>
</body>
</html>
	