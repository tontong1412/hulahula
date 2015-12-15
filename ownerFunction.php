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
				background: #fcf8c2;
				margin: 10px;
			}
			.buttonA{
				margin:10px;
				border: none;
				width: 150px;
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

if(isset($_POST['add_work']))
	{
		$getid = "select max(id)+1 as nextid from worktime";
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
		
		$check ="select * from worktime where id = '$id'";
		$parseRequest6 = oci_parse($conn, $check);
		oci_execute($parseRequest6);
		$row = oci_fetch_array($parseRequest6, OCI_RETURN_NULLS+OCI_ASSOC);
		
		if($row)
		{
			echo "<script>alert('Success');</script>";
		}
	}


	if(isset($_POST['add_emp'])){
		$getid = "select max(id)+1 as nextid from employee";
		$parseRequest3 = oci_parse($conn, $getid);
		oci_execute($parseRequest3);
		$maxid = oci_fetch_array($parseRequest3, OCI_RETURN_NULLS+OCI_ASSOC);
		$id = $maxid['NEXTID'];
		$name = $_POST['name'];
		$lname = $_POST['lname'];
		$dept = $_POST['dname'];
		$findmgr= "select mgr_id from department where dept_id = '$dept'";
		$parseRequest5 = oci_parse($conn, $findmgr);
		oci_execute($parseRequest5);
		$mgr = oci_fetch_array($parseRequest5, OCI_RETURN_NULLS+OCI_ASSOC);
		$mgrId=$mgr['MGR_ID'];
		$phonenum =$_POST['tel'];
		$email = $_POST['email'];
		$query = "INSERT INTO EMPLOYEE(ID,name,lname,phonenumber,email,dnumber,hire_date,mgr_id) VALUES ('$id','$name','$lname','$phonenum','$email','$dept',sysdate,'$mgrId')";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$query2 = "select * from employee where id='$id'";
		$parseRequest2 = oci_parse($conn, $query2);
		oci_execute($parseRequest2);
		$row = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
		
		
		
		$default = '1234';
		$addlogin = "INSERT INTO LOGIN(EMPLOYEE_ID,DEPARTMENT_ID,USERNAME,PASSWORD) VALUES ('$id','$dept','$email','$default')";
		$parseRequest9 = oci_parse($conn, $addlogin);
		oci_execute($parseRequest9);
		if ($row)
		{
			echo "<script>alert('Success');</script>";
		}
		
	}
?>


<?php
	$function = $_GET['function'];
	if($function == "manEmp")
	{
		echo '<script>window.location = "manEmp.php";</script>';
	}
	if($function == "review")
	{
		$query = "select * from review order by time desc";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
		foreach ($rows as $review)
		{
			$bnum= $review['BKNUM'];
			$time= $review['TIME'];
			$content = $review['CONTENT'];
			echo "<li> booking number: $bnum</li>";
			echo "<li> time: $time</li>";
			echo "<li> $content<br><br></li>";
			
		}
	}
	if($function == "stat")
	{
echo '<script>window.location = "statistic.php";</script>';
	}
	if($function == "dept")
	{
		echo '<script>window.location = "manDept.php";</script>';
	}
	if($function == "addWork")
	{
		echo '
		<div id="login">
		<form action = "ownerFunction.php?function=addWork" method="post">
			event<br><input type="input" name="event"><br>
			start date<br><input type="input" name="startdate"><br>
			start time<br><input type="input" name="starttime"><br>
			end date<br><input type="input" name="enddate"><br>
			end time<br><input type="input" name="endtime"> <br><br>
			<input type="submit" name="add_work" value="OK"/>
		</form>
		</div>';
	}
	if($function == "stock")
	{
		$alltool = "select * from tool";
		$parseRequest = oci_parse($conn, $alltool);
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
							<th>ID</th>
							<th>Name</th>
							<th></th>
						</tr>";
				
				foreach ($rows as $aa) 
				{
					$tid = $aa['ID'];
					$query2 = "select * from tool where id = '$tid'";
					$parseRequest2 = oci_parse($conn, $query2);
					oci_execute($parseRequest2);
					$row2 = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
					echo "<tr>";
						echo "<td>".strtoupper($row2['ID'])."</td>";
						echo "<td>".strtoupper($row2['NAME']). "</td>"; 
						echo "<td><a href='manEmpFunc.php?id=$tid'>Manage</a></td>";
					echo "</tr>";
				}
			echo "</table>";
		}
		else{
			echo "<script>alert('tool not found');</script>";
		}	
	}
	If($function == "addEmp")
	{
		echo "<div id='login'>
		<form action='ownerFunction.php?function=addEmp' method='post'>
			Name <input name='name' type='input'><br>
			Last Name <input name='lname' type='input'><br>
			Tel<br><input name='tel' type='input'><br>
			E-mail <input name='email' type='input'><br>
			Department <br><select id='cmbMake' name='dname' >
							<option value='0'>Select department</option>
						<option value='2'>reception</option>
						<option value='3'>service</option>
						<option value='6'>gardener</option>
						<option value='4'>maid</option>
						<option value='5'>maintanance</option>
						</select><br><br>
			<input name='add_emp' type='submit' value='Add'>
		</form></div>";
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
