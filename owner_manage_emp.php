<?php session_start();
$conn = oci_connect("hulahula","123123123", "//localhost/XE"); ?>
<?php	
	echo $_GET['id'];
	echo $_GET['function'];
	$function = $_GET['function'];
	$id = $_GET['id'];
	$query;
	if ($function=='comment')
	{
		
	}
	elseif($function =='asswork')
	{
		//INSERT INTO DUTY VALUES ('$id','$position');
	}
	elseif($function=='fire')
	{
		$query = "delete from employee where id = '$id'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
	}
	elseif($function=='changedept')
	{
		
		echo 
		'<form action="owner_emp_info.php?id=$id" method="get">
			Department<br>
				<select id="cmbMake" name="dnum" >
					<option value="0">Select department</option>
					<option value="3">reception</option>
					<option value="6">gardener</option>
					<option value="5">maid</option>
				</select><br>
			<br>
			<input name="change" type="submit" value="Confirm">
		</from>';
		if (isset($_GET['change'])){
			$dname=$_GET['dnum'];
			echo $dname;
			$query = "update employee set dnumber = '$dnum' where id='$id';";
			$parseRequest = oci_parse($conn, $query);
			oci_execute($parseRequest);
		}
	}
	
	else
	{
		
	}
?>