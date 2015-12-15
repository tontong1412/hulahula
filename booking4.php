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
				height: 430px;
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
			#login2 {
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 290px;
				position:relative;
				padding:10px;
				margin-bottom:20px;
				font-size: 15px;
				text-align:left;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#login input[type="submit"] {
				border: none;
				width: 100px;
				float:left;
				margin-left: 17px;
				height:50px;
				padding-top: 8px;
				padding-bottom: 8px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
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
<!--------------------------------------------------get input from booking3.php--------------------------------------------------------------->	
				<div id = login>
					<form action='booking5.php' method='post'>
				
				<?PHP
					if(isset($_POST['submit']))
					{
						// old part
						$ciDate = trim($_POST['ciDate']);
						$coDate = trim($_POST['coDate']);
						$guest = trim($_POST['guest']);
						$room = trim($_POST['room']);
						$roomName = trim($_POST['roomName']);
						
						// new part
						$firstName = trim($_POST['firstName']);
						$lastName = trim($_POST['lastName']);
						$email = trim($_POST['email']);
						$phoneNumber = trim($_POST['phoneNumber']);
						$address = trim($_POST['address']);
						$bookingNumber = trim($_POST['bookingNumber']);
					}
				?>		
<!-------------------------------------SHOW INPUT-------------------------------------------------------------------->
						CUSTOMER INFORMATION
						<div id = login2>
							FIRST NAME : <?php echo $firstName?><br>
							LAST NAME : <?php echo $lastName?><br>
							EMAIL : <?php echo $email?><br>
							PHONE NUMBER : <?php echo $phoneNumber?><br>
							ADDRESS : <?php echo $address?><br>
						</div>
						RESERVATION INFORMATION
						<div id = login2>
							BOOKING NUMBER : <?php echo $bookingNumber?><br>
							CHECK-IN DATE : <?php echo $ciDate?><br>
							CHECK-OUT DATE : <?php echo $coDate?><br>
							GUESTS : <?php echo $guest ?><br>
							TYPE : <?php echo $roomName ?><br>
						</div>
						
						<input type='submit' name='submit' value='AGREE'>
						<input type='submit' name='submit' value='CANCEL'>
						
						<!----------------hidden input --------------------->
						<input type='hidden' name='room' value="<?php echo $room?>">
						<input type='hidden' name='roomName' value="<?php echo $roomName?>">
						<input type='hidden' name='ciDate' value="<?php echo $ciDate ?>">
						<input type='hidden' name='coDate' value="<?php echo $coDate ?>">
						<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
						<input type='hidden' name='guest' value="<?php echo $guest ?>">
						
						<input type='hidden' name='firstName' value="<?php echo $firstName?>">
						<input type='hidden' name='lastName' value="<?php echo $lastName ?>">
						<input type='hidden' name='email' value="<?php echo $email ?>">
						<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
						<input type='hidden' name='phoneNumber' value="<?php echo $phoneNumber ?>">
						<input type='hidden' name='address' value="<?php echo $address ?>">
					</form>
					
					
					<!--------------- edit---------------------->
					<form action='booking3.php' method='post'>
						<input type='submit' name='submit' value='EDIT'>
						
						<!----------------hidden input --------------------->
						<input type='hidden' name='room' value="<?php echo $room?>">
						<input type='hidden' name='roomName' value="<?php echo $roomName?>">
						<input type='hidden' name='ciDate' value="<?php echo $ciDate ?>">
						<input type='hidden' name='coDate' value="<?php echo $coDate ?>">
						<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
						<input type='hidden' name='guest' value="<?php echo $guest ?>">
						
						<input type='hidden' name='firstName' value="<?php echo $firstName?>">
						<input type='hidden' name='lastName' value="<?php echo $lastName ?>">
						<input type='hidden' name='email' value="<?php echo $email ?>">
						<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
						<input type='hidden' name='phoneNumber' value="<?php echo $phoneNumber ?>">
						<input type='hidden' name='address' value="<?php echo $address ?>">
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

