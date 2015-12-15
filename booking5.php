<!DOCTYPE>
<html>
	<!-----------------------------------------------start database---------------------------------------------------------->
	<?PHP
							session_start();
							// Create connection to Oracle
							$conn = oci_connect("hulahula","123123123", "//localhost/XE");
							if (!$conn) 
							{
								$m = oci_error();
								echo $m['message'], "\n";
								exit;
							} 
						?>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="booking3.css">
		<link href="demo.css" rel="stylesheet" type="text/css">
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


			#login {
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 370px;
				padding: 20px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				
			}
			#login input {
				border: none;
				width: 250px;
				padding-top: 10px;	
				margin-top: 5px;
				padding-bottom: 10px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#login input:not(:last-child) {
				font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 15px;
			}
		</style>	
	</head>
	
	
	
	<body onload="a();" onload="b();">
		<font face="Swis721 BT" color="#664b50">
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
						<a href="review.php" class="subNavBtn">Review</a>
						<a href="login.php" class="subNavBtn">Log in</a>
						<a href="booking1.php" class="subNavBtn">Book</a>
				</div>
				
					<!----------------------------check data from my self page php-------------------------------->
					<div id="login">
	<form action='main.php' method="post">
			<?php
				if(isset($_POST['submit']) && $_POST['submit'] == 'EDIT')
					{
					// hard !!!!!!!!!!!!!!!!!!!!!!!1
					echo"EDITTTTTTTTTTTTT";
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['room']);
						
						$firstName = trim($_POST['firstName']);
						$lastName = trim($_POST['lastName']);
						$email = trim($_POST['email']);
						$phoneNumber = trim($_POST['phoneNumber']);
						$address = trim($_POST['address']);
						
						echo '<input type="hidden" name="room" value="<?php echo $room?>">';
						echo '<input type="hidden" name="ciDate" value="<?php echo $ciDate ?>">';
						echo '<input type="hidden" name="coDate" value="<?php echo $coDate ?>">';
						echo '<input type="hidden" name="bookingNumber" value="<?php echo $bookingNumber ?>">';
						echo '<input type="hidden" name="guest" value="<?php echo $guest ?>">';
				
						echo '<input type="hidden" name="firstName" value="<?php echo $firstName?>">';
						echo '<input type="hidden" name="lastName" value="<?php echo $lastName ?>">';
						echo '<input type="hidden" name="email" value="<?php echo $email ?>">';
						echo '<input type="hidden" name="bookingNumber" value="<?php echo $bookingNumber ?>">';
						echo '<input type="hidden" name="phoneNumber" value="<?php echo $phoneNumber ?>">';
						echo '<input type="submit" name="address" value="<?php echo $address ?>">';
						
						
						
						echo '<script>window.location = "booking3.php";</script>';
					}
				else if(isset($_POST['submit']) && $_POST['submit'] == 'CANCEL')
					{
					echo "CANCALLLLLLLLLLLLLLL";
						echo '<script>window.location = "booking1.php";</script>';
					}
				else if(isset($_POST['submit']) && $_POST['submit'] == 'AGREE')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['room']);
						
						$firstName = trim($_POST['firstName']);
						$lastName = trim($_POST['lastName']);
						$email = trim($_POST['email']);
						$phoneNumber = trim($_POST['phoneNumber']);
						$address = trim($_POST['address']);
						// insert to table reservation
						$query = "INSERT INTO RESERVATION VALUES ('$bookingNumber','$ciDate','wait','$email','$coDate','$guest','$room')";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						
						$query = "SELECT * FROM CUSTOMER";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						if ($row['EMAIL'] != $email)
						{
						// insert to table customer
						$query = "INSERT INTO CUSTOMER VALUES ('$email','$address','$phoneNumber','$firstName','$lastName')";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						
						}
						else
						{
							echo "<script>alert('This customer have already');</script>";
							
						}
					
						echo "THANK YOU<br>";
						echo '<input name="submit" type="submit" value="BACK">';
					}
	
			?>
		</div>
			</form>
<!---------------------------------------------------bottom------------------------------------------------------------------>		  
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

