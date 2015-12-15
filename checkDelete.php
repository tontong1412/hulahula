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
				
			
			</head>
			
			<body>

		<!---------------------------------------------------------------------------------------------------------------------------------->				
<?php
		if(isset($_POST['submit']))
		{
			//echo $_POST['room'];
			$room = $_POST['room'];
			if($_POST['submit'] == 'BACK')
			{
				echo '<script>window.location = "reception.php";</script>';
				
			}
			else if($_POST['submit'] == 'UPDATE')
			{
				$query="update reservation set status = 'purchase' where rnumber = '$room'";
				$parseRequest = oci_parse($conn, $query);
				oci_execute($parseRequest);
				echo "<script>alert('Success');</script>";
				echo '<script>window.location = "reception.php";</script>';	
				
				
			}
			else
			{
				$query = "DELETE FROM RESERVATION WHERE RNUMBER = '$room'";
				$parseRequest = oci_parse($conn, $query);
				oci_execute($parseRequest);
				
				
				echo "<script>alert('SUCCESS DELETE');</script>";
				echo '<script>window.location = "reception.php";</script>';
			}
		}
	?>


			</body>
		</html>
