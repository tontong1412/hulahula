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
						<a href="book.php" class="subNavBtn">Book</a>
				</div>
<!--------------------------------------------------get input from booking2.php--------------------------------------------------------------->	
				<div id = login>
						<form action='booking4.php' method='post'>
				
				<?PHP
					if(isset($_POST['submit']) && $_POST['submit'] == 'Atype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumA']);
						$roomName = trim($_POST['roomTypeNameA']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'Btype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumB']);
						$roomName = trim($_POST['roomTypeNameB']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'Ctype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumC']);
						$roomName = trim($_POST['roomTypeNameC']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'Dtype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumD']);
						$roomName = trim($_POST['roomTypeNameD']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'Etype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumE']);
						$roomName = trim($_POST['roomTypeNameE']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'Ftype')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['AvailRoomNumF']);
						$roomName = trim($_POST['roomTypeNameF']);
					}
					else if(isset($_POST['submit']) && $_POST['submit'] == 'EDIT')
					{
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$bookingNumber = trim($_POST['bookingNumber']);
						$room = trim($_POST['room']);
						$roomName = trim($_POST['roomName']);
						
						$firstName = trim($_POST['firstName']);
						$lastName = trim($_POST['lastName']);
						$email = trim($_POST['email']);
						$phoneNumber = trim($_POST['phoneNumber']);
						$address = trim($_POST['address']);
					}
					
				?>					
<!-----------------------------------------------information side------------------------------------------------------------->
					<?php
					
						if($_POST['submit'] == 'EDIT')
						{
							echo	'FirstName: <br><input name="firstName" type="input" value="'.$firstName.'"><br>';
							echo	'LastName: <br><input name="lastName" type="input" value="'.$lastName.'"><br>';
							echo 	'Email:<br><input name="email" type="input" value="'.$email.'"><br>';
							echo	'PhoneNumber:<br> <input name="phoneNumber" type="input" value="'.$phoneNumber.'"><br>';
							echo	'Address:<br> <input name="address" type="input" value="'.$address.'"><br>';
							echo 	'<input name="submit" type="submit" value="Booking">';
						}
						else
						{
							echo	'FirstName: <br><input name="firstName" type="input" value><br>';
							echo	'LastName: <br><input name="lastName" type="input"><br>';
							echo 	'Email:<br><input name="email" type="input"><br>';
							echo	'PhoneNumber:<br> <input name="phoneNumber" type="input"><br>';
							echo	'Address:<br> <input name="address" type="input"><br>';
							echo 	'<input name="submit" type="submit" value="Booking">';
						}
					?>		
							
							<!----------------hidden input --------------------->
				<input type='hidden' name='room' value="<?php echo $room?>">
				<input type='hidden' name='roomName' value="<?php echo $roomName?>">
				<input type='hidden' name='ciDate' value="<?php echo $ciDate ?>">
				<input type='hidden' name='coDate' value="<?php echo $coDate ?>">
				<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
				<input type='hidden' name='guest' value="<?php echo $guest ?>">
						</form>
					</div>

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

