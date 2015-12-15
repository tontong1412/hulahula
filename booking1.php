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


			#login {
				border: 2px #ddd solid;
				position:relative;
				border-radius: 20px;
				width: 350px;
				padding: 20px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				
			}
			
			#login2 {
				border: none;
				width: 290px;
				position:relative;
				padding:10px;
				margin-bottom:20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#login input[type="submit"] {
				border: none;
				width: 260px;
				padding: 20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			.button {
				margin-top:100px;
				position:relative;
			}
			#right{
				font-size: 15px;
				top: 140px;
				right:70px;
				position:absolute;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#rightText {
				font-size: 15px;
				right:100px;
				position:absolute;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#leftText{
				font-size: 15px;
				left:75px;
				position:absolute;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#left{
				font-size: 15px;
				top: 140px;
				left:75px;
				position:absolute;
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
						<a href="ShowReview.php" class="subNavBtn">Review</a>
						<a href="login.php" class="subNavBtn">Log in</a>
						<a href="booking1.php" class="subNavBtn">Book</a>
				</div>
</div>
<!-----------------------------------------booking side------------------------------------------------------------>
				<center>
				<br><br><br>
					<div id="container">					
					<div id = login>
						<form action='booking2.php' method='post'>
						CHECK-IN DATE
						<div id = login2>
						<!--- fomat date : DD-MM-YYYY -->
							<select name="day">
								<option> - Day - </option>
								<option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
								<option value="09">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
							<select name="month">
								<option> - Month - </option>
								<option value="01">January</option>
								<option value="02">Febuary</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							
							<select name="year">
								<option> - Year - </option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
							</select>
							</div>
							<div id="rightText">
							NIGHT
							</div>
							<div id="right">
								<select name="night">
								<option> - Night - </option>
								<option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
								<option value="09">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
							</div>
							<div id="leftText">
							GUESTS
							</div>
							<div id="left">
							<select name="guest">
								<option> - Guests - </option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>	
							</div>
							<div class="button">
							<input name='submit' type='submit' value='Search' >
						
							</div>
						</form>
					</div>
				</center>
<!----------------------------------------------------check------------------------------------------------------------------>	
				<?PHP
					/*if(isset($_POST['submit']))
					{
						$day = trim($_POST['day']);
						$month = trim($_POST['month']);
						$year = trim($_POST['year']);
						if($month == "January")
						{
							$day = $day + 10;
							echo $day;
						}
					}*/
					//oci_close($conn);
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

