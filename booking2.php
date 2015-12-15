<!DOCTYPE>
<html>
	<!-----------------------------------------------start database---------------------------------------------------------->
	<?PHP
							session_start();
							// Create connection to Oracle
							$conn = oci_connect("hulahula","123123123", "//localhost/XE");
							if (!$conn) 
							{
								$m = oci_error();
								echo $m['message'], "\n";
								exit;
							} 
						?>
	<head>
		<title> HULAHULA HOSTEL</title>
		<link rel="stylesheet" href="login.css">
		<link rel="stylesheet" href="table.css">
		<link href="demo.css" rel="stylesheet" type="text/css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<script src="js/jquery.js"></script> 
		<script src="js/moment.min.js"></script> 
		<script src="js/combodate.js"></script> 


	<!-------------------------------------------------CSS------------------------------------------------------------------->			
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
			
		<style type="text/css">


			#login {
				border: 2px #ddd solid;
				border-radius: 20px;
				width: 750px;
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
			}
		</style>	
	</head>
	
	
	
	<body onload="a();" onload="b();">
		<font face="Swis721 BT" color="#664b50">
<!-------------------------------------------------------menu bar-------------------------------------------------------------->
		<center>
		
			<div id="container">
				<br><a href="main.php"><img src="logo01.jpg"></a></br>
				<font size="1">SINCE 2015 </br>
				<font size ="5" color ="#c1caad"> HULAHULA HOSTEL</font></br>
				<div class="subMenu">
					<div class="inner">
						<a href="about.php" class="subNavBtn">About</a> 
						<a href="room.php" class="subNavBtn">Room & Rate</a>
						<a href="review.php" class="subNavBtn">Review</a>
						<a href="login.php" class="subNavBtn">Log in</a>
						<a href="book.php" class="subNavBtn">Book</a>
				</div>
				<br>
				<br>
				<br>
				
				</center>
	<!----------------------------------------------------check------------------------------------------------------------------>	
	<center><br><br><br><div id="login"><font size ="5" color ="#c1caad">
				<?PHP
					if(isset($_POST['submit']))
					{
						$day = trim($_POST['day']);
						$month = trim($_POST['month']);
						$year = trim($_POST['year']);
						$guest = trim($_POST['guest']);
						$night = trim($_POST['night']);
						$dayCO = $day + $night;
						$monthCO = $month;
						$yearCO = $year;
						// check error message 
						if($day != "- Day -" && $month != "- Month -" && $year != "- Year -" && $guest != "- Guests -" && $night != "- Night -")
						{
							$dayOverCheck = '0'; // 0 -> not over 1 -> over
							//check dayCO over or not over and error message
							if($month == "01")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "02")
							{
								if ($dayCO > '28')
								{
									$dayCO = $dayCO - '28';
									$monthCO++;
								}
								if($day == 31 || $day == 30 || $day == 29)
								{
									echo '<script>window.alert("out of date");</script>';
									echo '<script>window.location = "booking1.php";</script>';
								}
							}
							if($month == "03")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "04")
							{
								if ($dayCO > '30')
								{
									$dayCO = $dayCO - '30';
									$monthCO++;
								}
								if($day == 31)
								{
									echo '<script>window.alert("out of date");</script>';
									echo '<script>window.location = "booking1.php";</script>';
								}
							}
							if($month == "05")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "06")
							{
								if ($dayCO > '30')
								{
									$dayCO = $dayCO - '30';
									$monthCO++;
								}
								if($day == 31)
								{
									echo '<script>window.alert("out of date");</script>';
									echo '<script>window.location = "booking1.php";</script>';
								}
							}
							if($month == "07")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "08")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "09")
							{
								if ($dayCO > '30')
								{
									$dayCO = $dayCO - '30';
									$monthCO++;
								}
								if($day == 31)
								{
									echo '<script>window.alert("out of date");</script>';
									echo '<script>window.location = "booking1.php";</script>';
								}
							}
							if($month == "10")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO++;
								}
							}
							if($month == "11")
							{
								if ($dayCO > '30')
								{
									$dayCO = $dayCO - '30';
									$monthCO++;
								}
								if($day == 31)
								{
									echo '<script>window.alert("out of date");</script>';
									echo '<script>window.location = "booking1.php";</script>';
								}
							}
							if($month == "12")
							{
								if ($dayCO > '31')
								{
									$dayCO = $dayCO - '31';
									$monthCO = '01';
									$yearCO++;
								}
							}
						}
						else
						{
							echo '<script>window.alert("value is null");</script>';
							echo '<script>window.location = "booking1.php";</script>';
						}
						$ciDate = $day."-".$month."-".$year;
						$coDate = $dayCO."-".$monthCO."-".$yearCO;
						
						//sql
						//query write
						//query count of type room and type name
						$query = "SELECT TYPE,COUNT(*) FROM ROOM GROUP BY TYPE";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						$roomTypeCount = array(); // array[typea,counta,typeb,countb,...............,typeN,countN]
						$roomTypeName = array('','','','','','');
						while($row) {
							if ($row['TYPE'] == 'a')
							{
								$roomTypeCount[0] = $row['TYPE'];
								$roomTypeCount[1] = $row['COUNT(*)'];
								$roomTypeName[0] = 'Mirror Suite';
							}
							else if ($row['TYPE'] == 'b')
							{
								$roomTypeCount[2] = $row['TYPE'];
								$roomTypeCount[3] = $row['COUNT(*)'];
								$roomTypeName[1] = 'Pine Deluxe';
							}
							else if ($row['TYPE'] == 'c')
							{
								$roomTypeCount[4] = $row['TYPE'];
								$roomTypeCount[5] = $row['COUNT(*)'];
								$roomTypeName[2] = 'Geneva Suite';
							}
							else if ($row['TYPE'] == 'd')
							{
								$roomTypeCount[6] = $row['TYPE'];
								$roomTypeCount[7] = $row['COUNT(*)'];
								$roomTypeName[3] = 'Spa & Pool';
							}
							else if ($row['TYPE'] == 'e')
							{
								$roomTypeCount[8] = $row['TYPE'];
								$roomTypeCount[9] = $row['COUNT(*)'];
								$roomTypeName[4] = 'Illusion Suite';
							}
							else if ($row['TYPE'] == 'f')
							{
								$roomTypeCount[10] = $row['TYPE'];
								$roomTypeCount[11] = $row['COUNT(*)'];
								$roomTypeName[5] = 'White Deluxe';
							}
							//print_r($roomTypeCount);
							$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						} 
						//query price of type room
						$query = "SELECT COUNT(*),PRICE FROM ROOM GROUP BY PRICE";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						$roomTypePrice = array();
						while($row) {
							array_push($roomTypePrice,$row['PRICE']);	
							//print_r($roomTypePrice);
							$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						} 
						//query for check used room
						$query = "SELECT * FROM RESERVATION,ROOM WHERE RNUMBER = ROOMNUMBER";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						$Avail = array($roomTypeCount[1], $roomTypeCount[3], $roomTypeCount[5], $roomTypeCount[7], $roomTypeCount[9], $roomTypeCount[11]); // a --> 0, b-->1 2c 3d 4e 5f 
						$AvailRoomNum = array('noAvailable','noAvailable','noAvailable','noAvailable','noAvailable','noAvailable'); // a --> 0, b-->1
						$countRoomUsed = array('0','0','0','0','0','0'); // a -> 0, b-> 1 2c 3d 4e 5f
						$AtypeRoomUsed = array('nodata'); // all of a room type used
						$BtypeRoomUsed = array('nodata'); // all of b room type used
						$CtypeRoomUsed = array('nodata'); // c 
						$DtypeRoomUsed = array('nodata'); // d 
						$EtypeRoomUsed = array('nodata'); // e
						$FtypeRoomUsed = array('nodata'); // f
						//substr(value,0,2) --> get day from database
						//substr(value,3,2) --> get month from database
						//substr(value,6,4) --> get year from database
						while($row) {
						// check how many used room
							// year redundancy
							if ($yearCO == substr($row['CHECKIN'],6,4) - '1')
							{
								if ($row['TYPE'] == 'a') // a room type
								{
									$countRoomUsed[0]++;
									$Avail[0]--;
									if ($AtypeRoomUsed[0] == 'nodata')
									{
										$AtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($AtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
								else if ($row['TYPE'] == 'b') // b room type
								{
									$countRoomUsed[1]++;
									$Avail[1]--;
									if ($BtypeRoomUsed[0] == 'nodata')
									{
										$BtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($BtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
								else if ($row['TYPE'] == 'c') // c room type
								{
									$countRoomUsed[2]++;
									$Avail[2]--;
									if ($CtypeRoomUsed[0] == 'nodata')
									{
										$CtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($CtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
								else if ($row['TYPE'] == 'd') // d room type
								{
									$countRoomUsed[3]++;
									$Avail[3]--;
									if ($DtypeRoomUsed[0] == 'nodata')
									{
										$DtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($DtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
								else if ($row['TYPE'] == 'e') // e room type
								{
									$countRoomUsed[4]++;
									$Avail[4]--;
									if ($EtypeRoomUsed[0] == 'nodata')
									{
										$EtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($EtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
								else if ($row['TYPE'] == 'f') // f room type
								{
									$countRoomUsed[5]++;
									$Avail[5]--;
									if ($FtypeRoomUsed[0] == 'nodata')
									{
										$FtypeRoomUsed = $row['ROOMNUMBER'];
									}
									else
									{
										array_push($FtypeRoomUsed,$row['ROOMNUMBER']);
									}
								}
							}
							// year equal ?
							else if (substr($row['CHECKIN'],6,4) == $year) 
							{
								// month equal ?
								if (substr($row['CHECKIN'],3,2) == $month)
								{
									// check room used --> day
									if (($day < substr($row['CHECKOUT'],0,2) && $dayCO > substr($row['CHECKIN'],0,2)) || ($day < substr($row['CHECKOUT'],0,2) && $dayCO < substr($row['CHECKIN'],0,2)))
									{
										if ($row['TYPE'] == 'a') // a room type
											{
												$countRoomUsed[0]++;
												$Avail[0]--;
												if ($AtypeRoomUsed[0] == 'nodata')
												{
													$AtypeRoomUsed[0] = $row['ROOMNUMBER'];
												}
												else
												{
													array_push($AtypeRoomUsed,$row['ROOMNUMBER']);
												}
											}
										else if ($row['TYPE'] == 'b') // b room type
										{
											$countRoomUsed[1]++;
											$Avail[1]--;
											if ($BtypeRoomUsed[0] == 'nodata')
											{
												$BtypeRoomUsed[0] = $row['ROOMNUMBER'];
											}
											else
											{
												array_push($BtypeRoomUsed,$row['ROOMNUMBER']);
											}
										}
										else if ($row['TYPE'] == 'c') // c room type
										{
											$countRoomUsed[2]++;
											$Avail[2]--;
											if ($CtypeRoomUsed[0] == 'nodata')
											{
												$CtypeRoomUsed[0] = $row['ROOMNUMBER'];
											}
											else
											{
												array_push($CtypeRoomUsed,$row['ROOMNUMBER']);
											}
										}
										else if ($row['TYPE'] == 'd') // d room type
										{
											$countRoomUsed[3]++;
											$Avail[3]--;
											if ($DtypeRoomUsed[0] == 'nodata')
											{
												$DtypeRoomUsed[0] = $row['ROOMNUMBER'];
											}
											else
											{
												array_push($DtypeRoomUsed,$row['ROOMNUMBER']);
											}
										}
										else if ($row['TYPE'] == 'e') // e room type
										{
											$countRoomUsed[4]++;
											$Avail[4]--;
											if ($EtypeRoomUsed[0] == 'nodata')
											{
												$EtypeRoomUsed[0] = $row['ROOMNUMBER'];
											}
											else
											{
												array_push($EtypeRoomUsed,$row['ROOMNUMBER']);
											}
										}
										else if ($row['TYPE'] == 'f') // b room type
										{
											$countRoomUsed[5]++;
											$Avail[5]--;
											if ($FtypeRoomUsed[0] == 'nodata')
											{
												$FtypeRoomUsed[0] = $row['ROOMNUMBER'];
											}
											else
											{
												array_push($FtypeRoomUsed,$row['ROOMNUMBER']);
											}
										}
									}
								}
							}
							/*echo 'type A<br>';
							print_r($AtypeRoomUsed);
							echo '<br><br> type B <br>';
							print_r($BtypeRoomUsed);*/
							$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						} 
						// assign null room available
						//query for get available room
						$query = "SELECT * FROM ROOM";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						
						while($row)
						{
							if ($row['TYPE'] == 'a')
							{
								for ($x = 0; $x < count($AtypeRoomUsed); $x++) 
								{
									if ($AtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[0] = $row['ROOMNUMBER'];
									}
								} 
							}
							if ($row['TYPE'] == 'b')
							{
								for ($x = 0; $x < count($BtypeRoomUsed); $x++) 
								{
									if ($BtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[1] = $row['ROOMNUMBER'];
									}
								} 
							}
							if ($row['TYPE'] == 'c')
							{
								for ($x = 0; $x < count($CtypeRoomUsed); $x++) 
								{
									if ($CtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[2] = $row['ROOMNUMBER'];
									}
								} 
							}
							if ($row['TYPE'] == 'd')
							{
								for ($x = 0; $x < count($DtypeRoomUsed); $x++) 
								{
									if ($DtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[3] = $row['ROOMNUMBER'];
									}
								} 
							}
							if ($row['TYPE'] == 'e')
							{
								for ($x = 0; $x < count($EtypeRoomUsed); $x++) 
								{
									if ($EtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[4] = $row['ROOMNUMBER'];
									}
								} 
							}
							if ($row['TYPE'] == 'f')
							{
								for ($x = 0; $x < count($FtypeRoomUsed); $x++) 
								{
									if ($FtypeRoomUsed[$x] != $row['ROOMNUMBER'])
									{
										$AvailRoomNum[5] = $row['ROOMNUMBER'];
									}
								} 
							}
							$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						}
						//query for get next bookingnumber
						$query = "SELECT COUNT(*) FROM RESERVATION";
						$parseRequest = oci_parse($conn, $query);
						oci_execute($parseRequest);
						$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
						$bookingNumber = $row['COUNT(*)'] + '1';
						// show table
						//echo	'<div class="datagrid"><table>';
						//echo		'<thead><tr><th>ROOM TYPE</th><th>PRICE</th><th>STATUS</th><th>BOOKING</th></tr></thead>';
						//echo		'<tbody><tr><td>'.$roomTypeCount[0].'</td><td>'.$roomTypePrice[0].'</td><td>Available : '.$Avail[0].'</td><td>data</td></tr>';
						//echo		'<tr class="alt"><td>'.$roomTypeCount[2].'</td><td>'.$roomTypePrice[1].'</td><td>Available : '.$Avail[1].'</td><td>data</td></tr>';
						//echo		'<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>';
						//echo		'<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>';
						//echo		'<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>';
						//echo		'</tbody>';
						//echo	'</table></div>';
						
					}
					//oci_close($conn);
				?>
	<!--------------------------------- SHOW TABLE --------------------------------------------->			
				<div class="datagrid">
				<form action='booking3.php' method='post'>
				
				<table>
					<!-- row 1 -->
					<thead><tr>
						<th>ROOM TYPE</th>
						<th>PRICE</th>
						<th>STATUS</th>
						<th>BOOKING</th>
					</tr></thead>
					<!-- row 2 type A--> 
					<tbody><tr>
						<td><img src="t01.jpg"><br><?php echo $roomTypeName[0]?></td>
						<td><?php echo $roomTypePrice[0]?></td>
						<td>Available : <?php echo $Avail[0]?></td>
						<?php
							if($Avail[0] == '0')
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
							}
							else
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Atype">';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit" disabled></td>';
							}
						?>
					</tr>
					<!-- row 3 type B -->
					<tr class="alt">
						<td><img src="t02.jpg"><br><?php echo $roomTypeName[1]?></td>
						<td><?php echo $roomTypePrice[1]?></td>
						<td>Available : <?php echo $Avail[1] ?></td>
						<?php
							if($Avail[1] == '0')
								{
									echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
									echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
								}
								else
								{	echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Btype">';
									echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit"disabled></td>';
								}
						?>
					</tr>
					<!-- row 4 type C-->
					<tr>
						<td><img src="t03.jpg"><br><?php echo $roomTypeName[2]?></td>
						<td><?php echo $roomTypePrice[2]?></td>
						<td>Available : <?php echo $Avail[2]?></td>
						<?php
							if($Avail[2] == '0')
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
							}
							else
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Ctype">';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit" disabled></td>';
							}
						?>
					</tr>
					<!-- row 5 type D-->
					<tr class="alt">
						<td><img src="t04.jpg"><br><?php echo $roomTypeName[3]?></td>
						<td><?php echo $roomTypePrice[3]?></td>
						<td>Available : <?php echo $Avail[3]?></td>
						<?php
							if($Avail[3] == '0')
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
							}
							else
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Dtype">';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit" disabled></td>';
							}
						?>
					</tr>
					<!-- row 6 type E-->
					<tr>
						<td><img src="t05.jpg"><br><?php echo $roomTypeName[4]?></td>
						<td><?php echo $roomTypePrice[4]?></td>
						<td>Available : <?php echo $Avail[4]?></td>
						<?php
							if($Avail[4] == '0')
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
							}
							else
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Etype">';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit" disabled></td>';
							}
						?>
					</tr>
					<!-- row 7 type F-->
					<tr class="alt">
						<td><img src="t06.jpg"><br><?php echo $roomTypeName[5]?></td>
						<td><?php echo $roomTypePrice[5]?></td>
						<td>Available : <?php echo $Avail[5]?></td>
						<?php
							if($Avail[5] == '0')
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="" disabled>';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve02.jpg" alt="submit" disabled></td>';
							}
							else
							{
								echo '<td><input name="submit" style="margin-top:20px; margin-left:20px; width:200px; height:50px; position:absolute; opacity:0.0;" type="submit" value="Ftype">';
								echo '<input type="image" style="width:200px; height:50px;" " src="reserve01.jpg" alt="submit" disabled></td>';
							}
						?>
					</tr>
					</tbody>
				</table></div>
				
				<!----------------hidden input --------------------->
				<input type='hidden' name='AvailA' value="<?php echo $Avail[0] ?>">
				<input type='hidden' name='AvailB' value="<?php echo $Avail[1] ?>">
				<input type='hidden' name='AvailC' value="<?php echo $Avail[2] ?>">
				<input type='hidden' name='AvailD' value="<?php echo $Avail[3] ?>">
				<input type='hidden' name='AvailE' value="<?php echo $Avail[4] ?>">
				<input type='hidden' name='AvailF' value="<?php echo $Avail[5] ?>">
				<input type='hidden' name='AvailRoomNumA' value="<?php echo $AvailRoomNum[0] ?>">
				<input type='hidden' name='AvailRoomNumB' value="<?php echo $AvailRoomNum[1] ?>">
				<input type='hidden' name='AvailRoomNumC' value="<?php echo $AvailRoomNum[2] ?>">
				<input type='hidden' name='AvailRoomNumD' value="<?php echo $AvailRoomNum[3] ?>">
				<input type='hidden' name='AvailRoomNumE' value="<?php echo $AvailRoomNum[4] ?>">
				<input type='hidden' name='AvailRoomNumF' value="<?php echo $AvailRoomNum[5] ?>">
				<input type='hidden' name='ciDate' value="<?php echo $ciDate ?>">
				<input type='hidden' name='coDate' value="<?php echo $coDate ?>">
				<input type='hidden' name='guest' value="<?php echo $guest ?>">
				<input type='hidden' name='bookingNumber' value="<?php echo $bookingNumber ?>">
				<input type='hidden' name='roomTypeNameA' value="<?php echo $roomTypeName[0] ?>">
				<input type='hidden' name='roomTypeNameB' value="<?php echo $roomTypeName[1] ?>">
				<input type='hidden' name='roomTypeNameC' value="<?php echo $roomTypeName[2] ?>">
				<input type='hidden' name='roomTypeNameD' value="<?php echo $roomTypeName[3] ?>">
				<input type='hidden' name='roomTypeNameE' value="<?php echo $roomTypeName[4] ?>">
				<input type='hidden' name='roomTypeNameF' value="<?php echo $roomTypeName[5] ?>">
				
				</form>
				</center></font></div>
<!---------------------------------------------------bottom------------------------------------------------------------------>		  
		<center>
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
