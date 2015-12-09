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
		<font face="Swis721 BT" color="#664b50">
<!-------------------------------------------------------menu bar-------------------------------------------------------------->
		<center>
			<div id="container">
				<br><a href="main.php"><img src="logo01.jpg"></a></br>
				<font size="1">SINCE 2015 </br>
				<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
				<ul class="menu">
					<li><font size ="3" color ="575757""><a href="#">About</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Room & Rate</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Facilities</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Log in</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Book</a></font></li>
				</ul>
<!----------------------------------------------------------session start------------------------------------------------------------>
				<center>
					<div id="container"> 
						<img src = "login01.jpg">
		 
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
					</div>
				</center>
<!----------------------------------------------------check------------------------------------------------------------------>	
				<?php
					if(!empty($_SESSION['EMPLOYEE_ID']))
					{
						switch ($_SESSION['DEPARTMENT_ID'])
						{
							case 1:
								echo '<script>window.location = "owner_main.php";</script>'; //owner
								break;
							case 2:
							case 4:
								echo '<script>window.location = "manager_main.php";</script>'; //manager
								break;
								case 3:
								echo '<script>window.location = "test3.php";</script>'; //reception
								break;
							default:
								echo '<script>window.location = "normal_employee.php";</script>'; //normal employee
						}
					}	
				?>
	
				<?PHP
					if(isset($_POST['submit']))
					{
						$username = trim($_POST['username']);
						$password = trim($_POST['password']);
						$query = "SELECT * FROM LOGIN WHERE username='$username' and password='$password'";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						// Fetch each row in an associative array
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						if($row)
						{
							$_SESSION['DEPARTMENT_ID'] = $row['DEPARTMENT_ID'];
							$_SESSION['EMPLOYEE_ID'] = $row['EMPLOYEE_ID'];	
							switch ($row['DEPARTMENT_ID'])
							{
								case 1:
									echo '<script>window.location = "owner_main.php";</script>'; //owner
									break;
								case 2:
								case 4:
									echo '<script>window.location = "manager_main.php";</script>'; //manager
									break;
								case 3:
									echo '<script>window.location = "test3.php";</script>'; //reception
									break;
								default:
									echo '<script>window.location = "normal_employee.php";</script>'; //normal employee
							}		
						}
						else
						{
							echo "Login fail.";
						}
					}
					oci_close($conn);
				?>

<!----------------------------------------------------input------------------------------------------------------------------->   
				<center>
					<div id = login>
						<form action='login.php' method='post'>
							Username<br>
							<input name='username' type='input'><br>
							Password<br>
							<input name='password' type='password'><br><br>
							<input name='submit' type='submit' value='Login'>
						</form>
					</div>
				</center>
			</div>
		</center>
		</br></br></br></br></br>
<!----------------------------------------------------------------------------------------------------------------------------------->		  
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