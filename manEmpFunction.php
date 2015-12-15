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
	$conn = oci_connect("hulahula", "123123123", "//localhost/XE","UTF8"); 
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
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 300px;
				padding: 30px;
				margin:40px;
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
				background: #fcf8c2;
			}
			.buttonA{
				margin:0px;
				border: none;
				width: 150px;
				padding: 5px;
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


<?php
	$function = $_GET['function'];
	$id = $_GET['id'];
	
	if(isset($_POST['add_work']))
	{
		$getid = "select max(id)+1 as nextid from worktime ";
		$parseRequest3 = oci_parse($conn, $getid);
		oci_execute($parseRequest3);
		$maxid = oci_fetch_array($parseRequest3, OCI_RETURN_NULLS+OCI_ASSOC);
		$id = $maxid['NEXTID'];
		$isdaily =1;
		if ($_POST['event']){
			$event=$_POST['event'];
			$isdaily=0;
		}
		else{
			$event="";
		}
			$event=$_POST['startdate'];
		$event=$_POST['event'];
		$startdate=$_POST['startdate'];
		$starttime=$_POST['starttime'];
		$enddate=$_POST['enddate'];
		$endtime=$_POST['endtime'];
		if ($isdaily)
		{
		$query = "insert into worktime(id,event,startdate,starttime,enddate,endtime) values ('$id','$event','$startdate','$starttime','$enddate','$endtime')";
		}
		else{
			$query = "insert into worktime(id,event) values ('$id','$event')";
		}
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		if(!empty($row))
		{
			echo "<script>alert('Success');</script>";
		}
	}
	if(isset($_POST['change']))
	{
		$changeTo= $_POST['dname'];
		$query = "update employee set dnumber = '$changeTo' where id = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo "<script>alert('Success');</script>";
		echo '<script>window.location = "manEmpFunc.php?id='.$id.'";</script>';	
		
	}
	if(isset($_POST['update_salary']))
	{
		$changeTo= $_POST['newsalary'];
		$query = "update employee set salary = '$changeTo' where id = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo "<script>alert('Success');</script>";
	}
	if($function == 'asswork' )
	{
		$query ="select * from worktime order by id";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Event</th>";
					echo "<th>Start time</th>";
					echo "<th>Start date</th>";
					echo "<th>End time</th>";
					echo "<th>End date</th>";
					echo "<th></th>";
					
				foreach ($rows as $aa) 
						{
							$wid = $aa['ID'];
							echo "<tr>";
							echo "<td>".strtoupper($aa['ID'])."</td>";
							echo "<td>".strtoupper($aa['EVENT']). "</td>"; 
							echo "<td>".strtoupper($aa['STARTTIME']). "</td>";
							echo "<td>".strtoupper($aa['STARTDATE']). "</td>";
							echo "<td>".strtoupper($aa['ENDTIME']). "</td>";
							echo "<td>".strtoupper($aa['ENDDATE']). "</td>";
							echo "<td><a href='assign_work.php?id=$id&wid=$wid'><button class='buttonA' type='button'>Add</button></a></td>";
							echo "</tr>";
						}
					echo "</table><br><br>";
		
	}
	if($function == 'salary')
	{
		$query = "select salary from employee where id= '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		$current_salary = $row['SALARY'];
		
		echo "<br><br><h1>Current salary:".$current_salary."</h1>";
		
		echo '<div id="login">
		<form action = "manEmpFunction.php?function=salary&id='.$id.'" method="post">
		<input type="input" name="newsalary"><br><br>
		<input type="submit" name="update_salary" value="update">
		</form></div>';
	}
	if($function == 'changedept')
	{
		echo '
		<form action = "manEmpFunction.php?function=changedept&id='.$id.'" method="post">
		Department <select id="cmbMake" name="dname" >
						<option value="0">Select department</option>
						<option value="2">reception</option>
						<option value="3">service</option>
						<option value="6">gardener</option>
						<option value="4">maid</option>
						<option value="5">maintanance</option>
					</select><br>
					<input type="submit" name="change" value="OK"/>
		</form>';

	}
	if($function == 'promote')
	{
		$query = "update department set mgr_id = $id where dept_id in (select dnumber from employee where id='$id')";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);	
		echo '<script>window.location = "manEmpFunc.php?id='.$id.'";</script>';		
	}
	if($function == 'fire')
	{	
		$query = " delete from employee where id = '$id' ";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo '<script>window.location = "manEmp.php";</script>';
	}
	
	
?>














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
