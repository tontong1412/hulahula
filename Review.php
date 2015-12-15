<!DOCTYPE>
<html>
  <head>
    <title> HULAHULA HOSTEL</title>
	<link rel="stylesheet" href="Review.css">
	<link rel="stylesheet" href="demo.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript"></script>
    
<style type="text/css">
*{
	margin:0;
	padding:0;
	list-style-type:none;
}
#container{
	margin:0;
	width:75%;
	
}


#CommentBox {
	border: 2px #ddd solid;
	border-radius: 20px;
	height: auto;
	width: 300px;
	padding: 20px;
margin-top:100px;
margin-bottom:50px;
	font-size:14px;
	
}
#login {
			border: 2px #ddd solid;
			border-radius: 20px;
			width: 300px;
			padding: 20px;
			margin:80px;
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
		</style>
		</head>
		
 <?PHP
		session_start();
		$conn = oci_connect("hulahula","123123123", "//localhost/XE");
		
		if(isset($_POST['post'])){
			$name = $_POST['name'];
			$book = $_POST['booknum'];
			$comm = $_POST['comment'];
			$sco = $_POST['Score'];
			$have = 'no';
			$query = "select * from reservation";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
			$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
			while($row)
			{
				if($row['BOOKINGNUMBER'] == $book)
				{
					$have = 'yes';
					
				}
				$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
			}
			
			if($book!=null && $have =='yes'){
				echo "<script type=\"text/javascript\">alert('Thank you for review us') </script>";
					$query = "INSERT INTO REVIEW(NAME,BKNUM,CONTENT,RATE,TIME) VALUES ('$name','$book','$comm','$sco',sysdate)";
					$parseRequest = oci_parse($conn, $query);
					oci_execute($parseRequest);
					$have = 'no';
			}
			else if ($have =='no')
				
				{
					echo "<script type=\"text/javascript\">alert('ไม่มี Booking Number นี้') </script>";
					
				}
			else {
				echo "<script type=\"text/javascript\">alert('กรุณากรอก Booking Number') </script>";
			}
		}
		?>
	<body>
	<font face="tahoma" color="#664b50">
<!---------------------------------------------------------------menu bar-------------------------------------------------------------->
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
    
	
		<div id= 'login'>
			<form method="post" name="form1">
				<label>Name: <input type="text" name="name" size=25><br><br>
				<label>Booking number: <input type="text" name="booknum" size=10><br><br>
				<label for="Selecter"> กรุณาให้คะแนน : </label>
				<select id="Sco" name="Score" >
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select><br><br>

				<label>Comment: <br><textarea cols="35" rows="8" name="comment" font-size=14px></textarea></label><br>
			<br><input type="submit" name="post" value=" Post ">
			</form>
		</div>
	
	<img src="bottom.gif">
		
	<div class="bottom">
		<ul class="column1">
			</br>
			<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
		</ul>
	</div>
	
</center>

</body>
</html>
	