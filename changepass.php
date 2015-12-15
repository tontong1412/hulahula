<?PHP
	session_start();
	if(empty($_SESSION['EMPLOYEE_ID_LOGIN'])||empty($_SESSION['DEPT_ID_LOGIN'])){
		echo '<script>window.location = "Login.php";</script>';
		}
	// Create connection to Oracle
	$conn = oci_connect("hulahula", "123123123", "//localhost/XE"); 
?>

<?php
if(isset($_POST['submit'])){
		$oldpass = trim($_POST['oldpass']);
		$newpass = trim($_POST['newpass']);
		$conpass = trim($_POST['conpass']);
		
		$id = $_SESSION['EMPLOYEE_ID_LOGIN'];
		$query = "SELECT * FROM LOGIN WHERE employee_id ='$id' and password='$oldpass'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		
		if($row && $conpass == $newpass){
			$query = "UPDATE LOGIN SET password = '$newpass' WHERE employee_id ='$id'";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			header( "location: login.php" );
		}
		else {
			echo "<script>alert('Please try again');</script>";
		}
}
?>


	<div>
		<li><font size ="3" color ="575757""><a href="#">About</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Room & Rate</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Facilities</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
		<li><font size ="3" color ="#c1caad""><a href="#">Book</a></font></li>
	</div>
        
		
	
     
     <div>
   <form action='changepass.php' method='post'>
		old Password <br>
		<input name='oldpass' type='password'><br>
		new Password<br>
		<input name='newpass' type='password'><br>
		confirm Password<br>
		<input name='conpass' type='password'><br><br>
		<input name='submit' type='submit' value='confirm'>	
	</form>
    
	  
