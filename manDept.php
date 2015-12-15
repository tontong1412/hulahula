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
				max-width: 1000px;
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 100%
				padding: 15px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				
			}
			#login input {
				border: none;
				width: 100px;
				padding: 10px;
				margin-left:20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#login input:not(:last-child) {
				font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 15px;
				background: #fcf8c2;
				margin: 15px;
				width: 170px;
			}
			.buttonA{
				margin:10px;
				border: none;
				width: 150px;
				padding: 20px;
				font-size: 15px;
				}
				
				.buttonB{
				margin:5px;
				border: none;
				width: 100px;
				padding: 10px;
				font-size: 15px;
				}
				table {
				
				border-collapse: collapse;
				max-width: 1000px;
				width:1000px;

			}
			th, td {
				padding: 8px;
				text-align:center;
				border-bottom: 1px solid #ddd;
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
				<ul class="menu">
					<li><font size ="3" color ="575757""><a href="about.html">About</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="room.php">Room & Rate</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="ShowReview.php">Review</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="booking1.php">Book</a></font></li>
				</ul>
				</div>
<!---------------------------------------------------------------------------------------------------------------------------------->				

<div>
		<a href= 'ownerFunction.php?function=manEmp'><button class="buttonA" type="button">Employee</button></a>
		
		<a href= 'ownerFunction.php?function=stat'><button class="buttonA" type="button">Statistic</button></a>
		<a href= 'ownerFunction.php?function=dept'><button class="buttonA" type="button">Department</button></a>
		<a href= 'ownerFunction.php?function=addEmp'><button class="buttonA" type="button">Add employee</button></a>
		<a href= "manDepFunction.php?id=<?php echo $id;?>&function=add"><button class="buttonA" type="button">Add department</button></a>
</div>



<?php
		if(isset($_GET['submit']))
		{
			$id = strtolower(trim($_GET['id']));
			if($id == NULL){
				$id = "@";}
			$name = strtolower(trim($_GET['name']));
			if($name == NULL){
				$name ="@";}
			$query = "SELECT dept_ID FROM department where dept_ID like '%$id%' UNION SELECT dept_ID FROM department where DNAME like '%$name%' ";
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
								<th width = 30%>ID</th>
								<th width = 40%>Name</th>
								<th width = 30%></th>
							</tr>";
					
					foreach ($rows as $aa) 
					{
						$Did = $aa['DEPT_ID'];
						$query2 = "select * from department where dept_id = '$Did'";
						$parseRequest2 = oci_parse($conn, $query2);
						oci_execute($parseRequest2);
						$row2 = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
						echo "<tr>";
							echo "<td>".strtoupper($row2['DEPT_ID'])."</td>";
							echo "<td>".strtoupper($row2['DNAME']). "</td>"; 
							echo "<td><a href='manDeptFunc.php?id=$Did'><button class='buttonB' type='button'>Manage</button></a></td>";
						echo "</tr>";
					}
				echo "</table>";
			}
			else{
				echo "<script>alert('Department not found');</script>";
			}	
		}
	else{
		
		$alldept = "select * from department";
		$parseRequest = oci_parse($conn, $alldept);
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
							<th width = 30%>ID</th>
							<th width = 40%>Name</th>
							<th width = 30%></th>
						</tr>";
				
				foreach ($rows as $aa) 
				{
					$Did = $aa['DEPT_ID'];
					$query2 = "select * from department where dept_id = '$Did'";
					$parseRequest2 = oci_parse($conn, $query2);
					oci_execute($parseRequest2);
					$row2 = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
					echo "<tr>";
						echo "<td>".strtoupper($row2['DEPT_ID'])."</td>";
						echo "<td>".strtoupper($row2['DNAME']). "</td>"; 
						echo "<td><a href='manDeptFunc.php?id=$Did'><button class='buttonB' type='button'>Manage</button></a></td>";
					echo "</tr>";
				}
			echo "</table>";
		}
		else{
			echo "<script>alert('Department not found');</script>";
		}	
	}
		
	?>

<div id='login'>
		<form action='manDept.php' method='get'>
			ID <input name='id' type='input'>
			Name <input name='name' type='input'>
			<input name='submit' type='submit' value='GO'>		
		</form>
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
