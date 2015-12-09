<?php session_start();
$conn = oci_connect("hulahula","123123123", "//localhost/XE"); ?>
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

	
		</style>
	</head>
	<body>
				<center>
					<div id = search>
					
						<form action='add_emp.php' method='get'>
							ID<br>
							<input name='id' type='input'><br>
							Name<br>
							<input name='name' type='input'><br>
							Last name<br>
							<input name='lname' type='input'><br>
							Phone number<br>
							<input name='phonenum' type='input'><br>
							E-mail<br>
							<input name='email' type='input'><br>
							Department<br>
								<select id="cmbMake" name="dname" >
									<option value="0">Select department</option>
									<option value="3">reception</option>
									<option value="6">gardener</option>
									<option value="5">maid</option>
								</select><br><br>
							<input name='submit' type='submit' value='ADD'>
						</form>
					</div>
				</center> 

		<?php
				if(isset($_GET['submit'])){
					$id = $_GET['id'];
					$name = $_GET['name'];
					$lname = $_GET['lname'];
					$dept = $_GET['dname'];
					$phonenum =$_GET['phonenum'];
					$email = $_GET['email'];
					$hired = date('mm-dd-yyyy');
					
				$query = "INSERT INTO EMPLOYEE(ID,name,lname,phonenumber,email,dnumber) VALUES ('$id','$name','$lname','$phonenum','$email','$dept')";
				$parseRequest = oci_parse($conn, $query);
				oci_execute($parseRequest);
				}
					
	
		?>
	</body>
</html>