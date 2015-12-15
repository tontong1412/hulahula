<?php 
	session_start();
	if (empty($_SESSION['DEPT_ID_LOGIN']) || empty($_SESSION['EMPLOYEE_ID_LOGIN']))
	{
		echo "<script>alert('please login');</script>";
		echo '<script>window.location = "Login.php";</script>';
	}
	if ($_SESSION['EMPLOYEE_ID_LOGIN']!= $_SESSION['MGR_ID'])
	{
		echo "<script>alert('please login as manager');</script>";
		echo '<script>window.location = "Logout.php";</script>';
	}
	$conn = oci_connect("hulahula", "123123123", "//localhost/XE","UTF8"); 
?>	

<!DOCTYPE>
<html lang="th">
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="demo.css">
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
			
			table {
				border-collapse: collapse;
				width:1000px;
			}
			th, td {
				padding: 8px;
				text-align:center;
				border-bottom: 1px solid #ddd;
			}
			.buttonA{
				margin:10px;
				border: none;
				width: 145px;
				padding: 20px;
				font-size: 15px;
				}
		</style>

<link rel="stylesheet" href="js/fullcalendar-2.1.1/fullcalendar.min.css">	
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


<?PHP

	$whoIsLogin = $_SESSION['EMPLOYEE_ID_LOGIN'];
	$query = "select * from employee, department where dnumber = dept_id and id = '$whoIsLogin'";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	$id = $row['ID'];
	$name = strtoupper($row['NAME']);
	$lname = strtoupper($row['LNAME']);
	$tel = substr($row['PHONENUMBER'],0,3) . "-" . substr($row['PHONENUMBER'],3,7) ;
	$email = $row['EMAIL'];
	$dname=$row['DNAME'];
	$file = "_".$whoIsLogin.".jpg";
	echo "<div id = 'login'>";
		if (file_exists($file)){
			echo "<img src='_$whoIsLogin.jpg'>";
		}
		else
		{
			echo "<img src='_.jpg'>";
		}
		echo "<li>ID: $id <br></li>";
		echo "<li>NAME: $name <br></li>";
		echo "<li>Surname: $lname <br></li>";
		echo "<li>Department: $dname <br></li>";
		echo "<li>Tel: $tel<br></li>";
		echo "<li>E-mail: $email<br></li>";
		echo "<li><a href='logout.php'>Logout<br></a></li>";
		echo "<li><a href='changepass.php'>change password</a></li>";
	echo "</div>";
	echo "<a href='timetable.php?id=$id'><button class='buttonA' type='button'>Timetable</button></a><br><br><br>";

?>
		
	<?php
	
	$query = "SELECT * from employee where mgr_id = '$whoIsLogin' order by id ";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	// Fetch each row in an associative array
	$rows = array();
	while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
		$rows[]= $row;
	}
		
				
	if ($rows)
	{
		echo "<table>";
			echo	"<tr>
					<th></th>
					<th>ID</th>
					<th>Name</th>
					<th>Lastname</th>
					<th></th>
					</tr>";
						
			foreach ($rows as $aa) 
			{
				$Eid = $aa['ID'];
				$query2 = "select * from employee where id = '$Eid'";
				$parseRequest2 = oci_parse($conn, $query2);
				oci_execute($parseRequest2);
				$row2 = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
				$file = "_".$Eid.".jpg";
				echo "<tr>";
				if (file_exists($file)){
			echo "<td><img src='_$Eid.jpg'></td>";
			}
			else
			{
				echo "<td><img src='_.jpg'></td>";
			}
				echo "<td>".strtoupper($row2['ID'])."</td>";
				echo "<td>".strtoupper($row2['NAME']). "</td>"; 
				echo "<td>".strtoupper($row2['LNAME']). "</td>";
				echo "<td><a href='managerUnderEmp.php?id=$Eid'><button class='buttonA' type='button'>Manage</button></a></td>";
				echo "</tr>";
			}
		echo "</table>";
	}

?>


<!-------------------------------------------------bottom-------------------------------------------------------->		
		<img src="bottom.gif">
		<div class="bottom">
			<ul class="column1">
				</br>
				<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
			</ul>
		</div>
	</body>
</html>
