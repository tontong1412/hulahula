<!DOCTYPE html>
<html lang="th">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!----------------------------------------------------------session start------------------------------------------------------------>
				<center>
					<div id="container"> 
						<img src = "login01.jpg">
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
					</div>
				</center>
    
    <title>Fullcalendar 1</title>
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
</head>
<body>
<br><br>
<div style="margin:auto;width:800px;">
 <div id='calendar'></div>
 </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript" src="js/fullcalendar-2.1.1/lib/moment.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/fullcalendar.min.js"></script>
<script type="text/javascript" src="js/fullcalendar-2.1.1/lang/th.js"></script>

<?php
	$query = "SELECT * FROM WORKTIME";
	$parseRequest = oci_parse($conn, $query);
	oci_execute($parseRequest);
	// Fetch each row in an associative array
	$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
	
	
$realEvent = 'events: [';
while($row){
	$eventName = $row['EVENT'];
	$startTime = $row['STARTTIME'];
	$endTime = $row['ENDTIME'];
	$startDate = $row['STARTDATE'];
	$endDate = $row['ENDDATE'];
$realEvent .= '{title  : "'. $eventName .'",
            start  : "'.$startDate.'T'.$startTime.'",
            end    : "'.$endDate.'T'.$endTime.'"},';

			$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
}			
$realEvent = $realEvent.']';
echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAA";
echo $realEvent;
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

</body>
</html>
