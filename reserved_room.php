		<?php 
			session_start();
			if (empty($_SESSION['DEPT_ID_LOGIN']) || empty($_SESSION['EMPLOYEE_ID_LOGIN']))
			{
				echo "<script>alert('please login');</script>";
				echo '<script>window.location = "Login.php";</script>';
			}
			$conn = oci_connect("hulahula", "123123123", "//localhost/XE"); 
		?>	
		<!---------------------------------------------------------header----------------------------------------------------------------->
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
				
				<style type="text/css">


					#login {
						border: 2px #ddd solid;
						border-radius: 20px;
						width: 300px;
						padding: 20px;
						margin:30px;
						font-size: 15px;
						font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
						
					}
					#login input {
						border: none;
						width: 260px;
						padding: 20px;
						font-size: 15px;
						font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
					}
					#login input:not(:last-child) {
						font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
						font-size: 15px;
					}
				</style>	
			</head>
			
			<body>
				<font face="tahoma" color="#664b50">
				<center>
					<div id="container">
						<br><a href="main.php"><img src="logo01.jpg"></a></br>
						<font size="1">SINCE 2015 </br>
						<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
						<ul class="menu">
							<li><font size ="3" color ="575757""><a href="about.html">About</a></font></li>
							<li><font size ="3" color ="#c1caad""><a href="room.php">Room & Rate</a></font></li>
							<li><font size ="3" color ="#c1caad""><a href="ShowReview.php">Review</a></font></li>
							<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
							<li><font size ="3" color ="#c1caad""><a href="booking1.php">Book</a></font></li>
						</ul>
		<!---------------------------------------------------------------------------------------------------------------------------------->				



		<?php 
			
			if (isset($_GET['id']))
			{
			$room = $_GET['id'];
			$query = "select * from reservation where RNUMBER = '$room'";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
			$bknum = $row['BOOKINGNUMBER'];
			$cidate = $row['CHECKIN'];
			$status = $row['STATUS'];
			$cEmail = $row['CUSTOMEREMAIL'];
			$codate = $row['CHECKOUT'];
			$guests = $row['GUESTS'];
			echo "<div id='login'>";
			echo "<div id='login' style='width:60%; margin-top:0px;'>";
				echo "<font size='4'>RESERVATION INFORMATION</font>";
				echo "</div>";
				echo "<li>BOOKING NUMBER: $bknum <br></li>";
				echo "<li>STATUS: $status <br></li>";
				echo "<li>CHECK-IN DATE: $cidate <br></li>";
				echo "<li>CHECK-OUT DATE: $codate <br></li>";
				echo "<li>CUSTOMER EMAIL: $cEmail<br></li>";
				echo "<li>GUESTS: $guests<br></li>";
				echo "<li>ROOM: $room<br></li>";
			}
			else // if null room number
			{
				echo "<script>alert('Room number not found');</script>";
				echo '<script>window.location = "reception.php";</script>';
			}
			echo "<form action='checkDelete.php' method='post' style='margin-top:20px;'>
					<input name='submit' type='submit' value='DELETE'>
					<input type='hidden' name='room' value=".$room.">
				</form>";
				echo "<form action='checkDelete.php' method='post' style='margin-top:10px;'>
					<input name='submit' type='submit' value='UPDATE'>
					<input type='hidden' name='room' value=".$room.">
				</form>";
			echo "<form action='checkDelete.php' method='post' style='margin-top:10px;'>
					<input name='submit' type='submit' value='BACK'>
				</form>";
				echo "</div>";
		?>




	










		<!----------------------------------------------------------bottom------------------------------------------------------------------>
				
				<img src="bottom.gif">
				<div class="bottom">
					<ul class="column1">
						</br>
						<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
					</ul>
				</div>
			</body>
		</html>
