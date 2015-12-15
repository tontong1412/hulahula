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
				margin:10px;
				border: none;
				width: 150px;
				padding: 20px;
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
	$function = $_GET['function'];
	$Did = $_GET['id'];
	
	if(isset($_POST['add']))
	{
		$getid = "select max(dept_id)+1 as nextid from department ";
		$parseRequest3 = oci_parse($conn, $getid);
		oci_execute($parseRequest3);
		$maxid = oci_fetch_array($parseRequest3, OCI_RETURN_NULLS+OCI_ASSOC);
		$id = $maxid['NEXTID'];
		$dname=$_POST['name'];
		$query = "insert into department(dept_id,dname) values ('$id','$dname')";
		
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		$check ="select * from department where dept_id='$id'";
		$parseRequest9 = oci_parse($conn, $check);
		oci_execute($parseRequest9);
		$row = oci_fetch_array($parseRequest9, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row){
			echo "<script>alert('Success');</script>";
			echo '<script>window.location = "manDept.php";</script>';	
		}
	}
	if(isset($_POST['change']))
	{
		$changeTo= $_POST['name'];
		$query="update department set dname= '$changeTo' where dept_id= '$Did'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo "<script>alert('Success');</script>";
		echo '<script>window.location = "manDept.php";</script>';	
		
	}
	
	if($function == 'change' )
	{
		echo $Did;
		echo "<form action='manDepFunction.php?id=$Did&function=change' method='post'>
				<input type='input' name='name'>
				<input type='submit' name='change' value='Confirm'>
			</from>";
		
	}
	
	if($function == 'add' )
	{
		echo "
		<form action='manDepFunction.php?id=$Did&function=add' method='post'>
		<input type='input' name='name'>
		<input type='submit' name='add' value='Confirm'>
		</form>";
		
	}
	
	if($function == 'del')
	{	
		$query = " delete from department where dept_id = '$Did' ";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo '<script>window.location = "manDept.php";</script>';
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
