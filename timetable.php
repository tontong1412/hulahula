<!DOCTYPE html>
<html lang="th">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<head>
	<!----------------------------------------------------------session start------------------------------------------------------------>
			
		 				<?PHP
							session_start();
							// Create connection to Oracle
							$conn = oci_connect("hulahula","123123123", "//localhost/XE","UTF8");
							if (!$conn) 
							{
								$m = oci_error();
								echo $m['message'], "\n";
								exit;
							} 
						?>
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

  <link rel="stylesheet" href="js/fullcalendar-2.1.1/fullcalendar.min.css">
    <style type="text/css">
    html,body{
        maring:0;padding:0;
        font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;   
        font-size:12px;
    }
	#calendar{
		max-width: 700px;
		margin: 0 auto;
        font-size:13px;
	}        
    </style>
	
	<style type="text/css">


			#login2 {
				border: 2px #ddd solid;
				border-radius: 20px;
				height:600px;
				width:800px;
			}
		</style>
	
	</head>
	<body>
	<font face="Tahoma" color="#575757">

<center>
	<div id="container">
    	<br><a href="main.html"><img src="logo01.jpg"></a></br>
		
		<font size="1">SINCE 2015 </br>
		<font size ="5" color ="#c1caad""> HULAHULA HOSTEL</font></br>
		</div>
	
	<div class="subMenu">
	 	<div class="inner">
	 			<a href="about.php" class="subNavBtn">About</a> 
			<a href="room.php" class="subNavBtn">Room & Rate</a>
			<a href="review.php" class="subNavBtn">Review</a>
			<a href="login.php" class="subNavBtn">Log in</a>
			<a href="book.php" class="subNavBtn">Book</a>
		</div>
</div>
</div>
		</br>
		</br></br></br>
		<div id="container">
<!------------------------------------------------------TIME TABLE--------------------------------------------->		
<div id="login2">			
<br><br>
<div style="margin:auto;width:800px;">
 <div id='calendar'></div>
 </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>

<?php
	$query = "SELECT * FROM WORKTIME,WORKS_ON WHERE ID = WID";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	// Fetch each row in an associative array
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	//ini_set('max_execution_time', 300);
$idEmp = $_GET['id'];	
$realEvent = 'events: [';
while($row){
	if ($idEmp == $row['EID'])
	{	

		$eventName = $row['EVENT'];
		$startTime = $row['STARTTIME'];
		$endTime = $row['ENDTIME'];
		$startDate = $row['STARTDATE'];
		$endDate = $row['ENDDATE'];
		$realEvent .= '{title  : "'. $eventName .'",
						start  : "'.$startDate.'T'.$startTime.'",
						end    : "'.$endDate.'T'.$endTime.'"},';
		
		

	}			$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
}
$realEvent = $realEvent.']';
//echo $realEvent;
echo '<script>';
echo '$(function(){';
echo '$("#calendar").fullCalendar({';
echo 'header: {';
echo '           left: "prev,next today",  ';
echo '            center: "title",';
echo '            right: "month,agendaWeek,agendaDay",';
echo '       }, ';
echo $realEvent;



//
echo '	,';
echo '	dayClick: function() {';
echo '         alert("a day has been clicked!");';
//            var view = $('#calendar').fullCalendar('getView');
//            alert("The view's title is " + view.title);
echo '        }'; 
echo '});';


    
echo ' }); ';
echo '</script> ';
?>	
	
	
	
	
		
</div>		
		
		
		
		
<!-----------------------------------------------------bottom ------------------------------------------>		
		</div>
		<img src="bottom.gif">
		<div class="bottom">
	<ul class="column1">
		</br>
<font size ='2'>2015 by HULAHULA HOSTES. Proudly created with Group 1</font>
	</ul>
		
		
		
		
</center>

	</body>
	</html>
	