<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("hulahula", "123123123", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
	if(!empty($_SESSION['EMPLOYEE_ID_LOGIN']))
	{
		if ($_SESSION['DEPT_ID_LOGIN']==1)
			{
				echo '<script>window.location = "owner.php";</script>'; //owner
			}
			if ($_SESSION['DEPT_ID_LOGIN']==2 && $_SESSION['EMPLOYEE_ID_LOGIN']!= $_SESSION['MGR_ID'])
			{
				echo '<script>window.location = "reception.php";</script>'; //reception
			}
			if( $_SESSION['EMPLOYEE_ID']= $_SESSION['MGR_ID'])
			{
				echo '<script>window.location = "manager.php";</script>'; //manager
			}
			if( $_SESSION['DEPT_ID_LOGIN']!= 1 && $_SESSION['EMPLOYEE_ID_LOGIN']!= $_SESSION['MGR_ID'])
			{
				echo '<script>window.location = "normEmployee.php";</script>'; //manager
			}
	}	
?>

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
				
		<center>
			<div id="container"> 
				<img src = "login01.jpg">
			</div>
		</center>		


<?PHP
	if(isset($_POST['submit']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$query = "SELECT * FROM LOGIN, department WHERE department_id = dept_id and username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row)
		{
			$_SESSION['DEPT_ID_LOGIN'] = $row['DEPARTMENT_ID'];
			$_SESSION['EMPLOYEE_ID_LOGIN'] = $row['EMPLOYEE_ID'];
			$_SESSION['MGR_ID'] = $row['MGR_ID'];
			
			if ($row['DEPARTMENT_ID']==1)
			{
				echo '<script>window.location = "owner.php";</script>'; //owner
			}
			elseif ($row['DEPARTMENT_ID']==2 && $row['EMPLOYEE_ID']!= $row['MGR_ID'])
			{
				echo '<script>window.location = "reception.php";</script>'; //reception
			}
			elseif( $row['EMPLOYEE_ID']== $row['MGR_ID'])
			{
				echo '<script>window.location = "manager.php";</script>'; //manager
			}
			elseif($row['DEPT_ID_LOGIN']==6)
			{
				echo '<script>window.location = "normEmployee.php";</script>';
			}
			else
			{
				echo '<script>window.location = "normEmployee.php";</script>';
			}
		}
		else
		{
			echo "<script>alert('login fail');</script>";
		}
	}
	oci_close($conn);
?>
		
		<div id= 'login'>	
			<form action='login.php' method='post'>
				Username <br>
				<input name='username' type='input'><br>
				Password<br>
				<input name='password' type='password'><br><br>
				<input name='submit' type='submit' value='Login'>
			</form>
		</div>
		
		<img src="bottom.gif">
		<div class="bottom">
			<ul class="column1">
				</br>
				<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
			</ul>
		</div>
	</body>
</html>
