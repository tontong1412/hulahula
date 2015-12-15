<?php 
	session_start();
	if (empty($_SESSION['DEPT_ID_LOGIN']) || empty($_SESSION['EMPLOYEE_ID_LOGIN']))
	{
		echo "<script>alert('please login');</script>";
		echo '<script>window.location = "Login.php";</script>';
	}
	if ($_SESSION['DEPT_ID_LOGIN']!=1)
	{
		echo "<script>alert('please login as owner');</script>";
		echo '<script>window.location = "Logout.php";</script>';
	}
	$conn = oci_connect("hulahula", "123123123", "//localhost/XE"); 
?>
<!---------------------------------------------------------header----------------------------------------------------------------->
<!DOCTYPE>
<html>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="demo.css">
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
				margin:50px;
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
			
				.buttonA{
					margin:15px;
				border: none;
				width: 200px;
				padding: 20px;
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
				<div class="subMenu">
					<div class="inner">
							<a href="about.php" class="subNavBtn">About</a> 
						<a href="room.php" class="subNavBtn">Room & Rate</a>
						<a href="ShowReview.php" class="subNavBtn">Review</a>
						<a href="login.php" class="subNavBtn">Log in</a>
						<a href="booking1.php" class="subNavBtn">Book</a>
					</div>
				</div>
			</div>
<!---------------------------------------------------------------------------------------------------------------------------------->				

<?php 
	$whoIsLogin = $_SESSION['EMPLOYEE_ID_LOGIN'];
	$query = "select * from employee where id = '$whoIsLogin'";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	$id = $row['ID'];
	$name = strtoupper($row['NAME']);
	$lname = strtoupper($row['LNAME']);
	$tel = substr($row['PHONENUMBER'],0,3) . "-" . substr($row['PHONENUMBER'],3,7) ;
	$email = $row['EMAIL'];
	$file = "_".$whoIsLogin.".jpg";
	echo "<div id = 'login'>";
	if (file_exists($file)){
			echo "<li><img src='_$whoIsLogin.jpg'></li>";
		}
		else
		{
			echo "<li><img src='_.jpg'></li>";
		}
		echo "<li>ID: $id <br></li>";
		echo "<li>NAME: $name <br></li>";
		echo "<li>Surname: $lname <br></li>";
		echo "<li>Tel: $tel<br></li>";
		echo "<li>E-mail: $email<br></li>";
		echo "<li><a href='logout.php'>Logout<br></a></li>";
		echo "<li><a href='changepass.php'>change password</a></li>";
	echo "</div>";
?>

<div>
		<a href= 'ownerFunction.php?function=manEmp'><button class="buttonA" type="button">Employee</button></a>
		<a href= 'ownerFunction.php?function=stat'><button class="buttonA" type="button">Statistic</button></a>
		<a href= 'ownerFunction.php?function=dept'><button class="buttonA" type="button">Department</button></a>
		<a href= 'ownerFunction.php?function=addEmp'><button class="buttonA" type="button">Add employee</button></a><br>
		<a href= 'ownerFunction.php?function=addWork'><button class="buttonA" type="button">Add work</button></a>
		<a href= 'timetable.php?id=<?php echo $id?>'><button class="buttonA" type="button">Timetable</button></a>
		<a href= "manDepFunction.php?id=<?php echo $id;?>&function=add"><button class="buttonA" type="button">Add new department</button></a>
</div>















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
