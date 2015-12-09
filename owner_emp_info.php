<?php session_start(); ?>
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

			#search {
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 1000px;
				padding: 20px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;	
			}
			#search input {
				border: none;
				width: 260px;
				height: 40px;
				padding: 20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				background-color:#faffbd;
				
			}
			#search input:not(:last-child) {
				font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-dize: 15px;
				margin: 5px;
			}
			#search input:not(:last-child) {
				font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-dize: 15px;
				margin: 5px;
			}


			#button input {
				border: none;
				width:100;
				height:60;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				background-color:#CCC;
			}
			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				padding: 8px;
				text-align:center;
				border-bottom: 1px solid #ddd;
			}
			
			
			#info {
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 300px;
				padding: 20px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				column-count: 2;
				
			}
			#info input {
				border: none;
				width: 260px;
				padding: 20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
			}
			#info input:not(:last-child) {
				font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-dize: 15px;
			}
			
			#function  {
				border: 2px #ddd solid;
				border-radius: 20px;
				width:1000;
				padding: 20px;
				margin:30px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				
			}
			#function button {
				border: none;
				width: 200px;
				padding: 20px;
				font-size: 15px;
				font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
				margin:20px;
			}

	
		</style>
<!--------------------------------------------------------session------------------------------------------------------------>	
		<?PHP
			if($_SESSION['DEPARTMENT_ID']!=1)
			{
			 echo "<script>alert('please login as owner');</script>";
			 echo '<script>window.location = "Login.php";</script>';
			}
			if(empty($_SESSION['EMPLOYEE_ID'])||empty($_SESSION['DEPARTMENT_ID']))
			{
			echo '<script>window.location = "Login.php";</script>';
			}
			$conn = oci_connect("hulahula","123123123", "//localhost/XE");
		?>	
	</head>
	
<!-------------------------------------------------------------Menu bar----------------------------------------------------------->
	
	<body>
		<font face="Swis721 BT" color="#664b50">

		<center>
			<div id="container">
				<br><a href="main.php"><img src="logo01.jpg"></a></br>
				<font size="1">SINCE 2015 </br>
				<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
				<ul class="menu">
					<li><font size ="3" color ="575757""><a href="#">About</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Room & Rate</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Facilities</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="login.php">Log in</a></font></li>
					<li><font size ="3" color ="#c1caad""><a href="#">Book</a></font></li>
				</ul>
			</div>>
		</center>
      
	  
	<!--------------------------------------------------------employee info --------------------------------------------------------------->  
	  
	  
	   <center>
			<div id = info>
				<div>
					<img src="toon.jpg">
				</div>
				<div>
					<?PHP
						//show info
						$id = $_GET['id'];
						$query = "SELECT * from EMPLOYEE,DEPARTMENT WHERE DEPT_ID = DNUMBER AND id = '$id'";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						echo "ID : ".$row['ID']."<br>";
						echo "NAME : ".$row['NAME']."<br>";
						echo "SURNAME : ".$row['LNAME']."<br>";
						echo "DEPARTMENT : ".$row['DNAME']."<br>";
						echo "PHONE NUMBER : ".$row['PHONENUMBER']."<br>";
						echo "EMAIL : ".$row['EMAIL']."<br>";
						echo "SALARY : ".$row['SALARY']."<br>";
						
					?>
				</div>
			</div>
		</center> 
<!---------------------------------------------------------------Input--------------------------------------------------------------->	
		
		<center>
			<div id= function>
				<center>
					<a href='owner_manage_emp.php?function=promote&id=<?php echo $id; ?>'>Promote</a> 		<!เลื่อนตำแหน่ง>
					<a href='owner_manage_emp.php?function=comment&id=<?php echo $id; ?>'>Comment</a>					<!comment>
					<a href='owner_manage_emp.php?function=asswork&id=<?php echo $id; ?>'>Assign work</a>				<!สั่งงาน>
					<a href='owner_manage_emp.php?function=fire&id=<?php echo $id; ?>'>Fire</a>						<!ไล่ออก>
					<a href='owner_manage_emp.php?function=changedept&id=<?php echo $id; ?>'>Change Department</a>	<!เปลี่ยนแผนก>
					<a href='owner_manage_emp.php?function=bonus&id=<?php echo $id; ?>'>Bonus</a>						<!โบนัส>	
				</center>
			</div>
		</center>
		
		
		
		
<!---------------------------------------------------------------Input--------------------------------------------------------------->
		<center>
			<div id = search>
				<center>
					<div>
						<form action='owner_emp_main.php' method='get'>
							<div>
								ID
								<input name='id' type='input'>
								Name
								<input name='name' type='input'>
								Last Name
								<input name='lastname' type='input'><br><br>
							</div>
							<div id=button>
								<input name='submit' type='submit' value='GO'>
							</div>
						</form>
					</div>
				</center>
			</div>
		</center> 
<!---------------------------------------------------------select from database--------------------------------------------------------------->	
    
		<?php
			if(isset($_GET['submit']))
			{
				$id = strtolower(trim($_GET['id']));
				if($id == NULL){
					$id = "@";}
				$name = strtolower(trim($_GET['name']));
				if($name == NULL){
					$name ="@";}
				$lastname = strtolower(trim($_GET['lastname']));
				if($lastname == NULL){
					$lastname = "@";}
				$query = "SELECT ID FROM employee where ID like '%$id%' UNION SELECT ID FROM employee where NAME like '%$name%' union SELECT ID FROM employee where Lname like '%$lastname%' ";
				$parseRequest = oci_parse($conn, $query);
				oci_execute($parseRequest);
				// Fetch each row in an associative array
				$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
		?>
        
 <!-----------------------------------------------------show searched employee--------------------------------------------------------------->       
				<center>
					<div id = search> 
						<table width = "100%">
		<?php
								$query2= "";
								$Eid;
								if ($rows){
									echo	"<tr>
											<th width = '15%'></th>
											<th width = '10%'>ID</th>
											<th width = '30%'>Name</th>
											<th width = '30%'>Lastname</th>
											<th width = '15%'></th>
											</tr>";
									foreach ($rows as $aa) {
										$Eid = $aa['ID'];
										$query2 = "select * from employee where id = '$Eid'";
										$parseRequest2 = oci_parse($conn, $query2);
										oci_execute($parseRequest2);
										$row2 = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC);
										echo "<center>";
										echo "<tr>";
										echo "<center><td width = '15%'><img src='toon.jpg'></td></center>";
										echo "<center><td width = '10%'>".strtoupper($row2['ID'])."</td></center>";
										echo "<center><td width = '30%'>".strtoupper($row2['NAME']). "</td></center>"; 
										echo "<center><td width = '30%'>".strtoupper($row2['LNAME']). "</td></center>";
										echo "<center><td width = '15%'><a href='owner_emp_info.php?id=$Eid'>Manage</a></div></td></center>";
										echo "</tr>";
									}
								}
								else{
									echo "<script>alert('Employee not found');</script>";
								}	
			}
		?>
	  
<!---------------------------------------------------bottom---------------------------------------------------------------------------->	  
	  </br></br></br></br></br>
	  
		<center>
			<img src="bottom.gif">
			<div class="bottom">
				<ul class="column1"></br>
					<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
				</ul>
			</div>
		</center>
	</body>
</html>