<!DOCTYPE>
<html>
	<!-----------------------------------------------start database---------------------------------------------------------->
	<?PHP
							session_start();
							// Create connection to Oracle
							$conn = oci_connect("hulahula","123123123", "//10.70.46.48/XE");
							if (!$conn) 
							{
								$m = oci_error();
								echo $m['message'], "\n";
								exit;
							} 
						?>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link href="demo.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="login.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<script src="js/jquery.js"></script> 
		<script src="js/moment.min.js"></script> 
		<script src="js/combodate.js"></script> 


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
			
		</style>
			
		<style type="text/css">
			table {
				margin-top:600px
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
			td {
				color: black;
		}
		tr:hover {background-color: #f5f5f5}
		tr:nth-child(even) {background-color: #f2f2f2}
			#select {
				margin-top: 50px;
		{

		</style>	
	</head>
	
	
	
	<body onload="a();" onload="b();">
		<font face="Tahoma" color="#664b50">
<!-------------------------------------------------------menu bar-------------------------------------------------------------->
		<center>
			<div id="container">
				<br><a href="main.php"><img src="logo01.jpg"></a></br>
				<font size="1">SINCE 2015 </br>
				<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
				<div class="subMenu">
					<div class="inner">
						<a href="about.php" class="subNavBtn">About</a> 
						<a href="room.php" class="subNavBtn">Room & Rate</a>
						<a href="ShowReview.php" class="subNavBtn">Review</a>
						<a href="login.php" class="subNavBtn">Log in</a>
						<a href="booking1.php" class="subNavBtn">Book</a>
				</div>
</div>
<!---------------------------------------------------Show stat--------------------------------------------------------------->
		<div id="select">
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
			
	<?php		
		$query = "SELECT * FROM RESERVATION,ROOM WHERE RESERVATION.RNUMBER = ROOM.ROOMNUMBER ORDER BY CHECKIN";
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
	<table>
	<tr>
	<th>BNo.</th>
	<th>Checkin</th>
	<th>Checkout</th>
	<th>Guests</th>
	<th>Roomtype</th>
	<th>Price</th>
	</tr>';
		foreach($rows as $test){
			$check=$test['STATUS'];
			if($temp>$count-$n&&$check=="purchase"){
			$no=$test['GUESTS'];
			$book=$test['BOOKINGNUMBER'];
			$price=$test['PRICE'];
			$time1=$test['CHECKIN'];
			$time2=$test['CHECKOUT'];
			
			if($test['TYPE'] == 'a')
			{
				$roomt='Mirror Suite';
			}
			else if ($test['TYPE'] == 'b')
			{
				$roomt ='Pine Deluxe';
			}
			else if ($test['TYPE'] == 'c')
			{
			$roomt ='Geneva Suite';
			}
			else if ($test['TYPE'] == 'd')
			{
			$roomt ='Spa & Pool';
			}
			else if ($test['TYPE'] == 'e')
			{
			$roomt ='Illusion Suite';
			}
			else if ($test['TYPE'] == 'f')
			{
			$roomt ='White Deluxe';
			}
			echo '<tr>';
			echo "<td width = 5%>$book</td>";
			echo "<td width = 5%>$time1</td>";
			echo "<td width = 5%%>$time2</td>";
			echo "<td width = 5%>$no</td>";
			echo "<td width = 5%>$roomt</td>";
			echo "<td width = 5%>$price</td>";
			echo '</tr>';
			$temp--;}
		}
		echo '</table></center>';
	?>
<!---------------------------------------------------bottom------------------------------------------------------------------>		 
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

