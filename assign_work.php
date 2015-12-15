<?php
session_start();
$conn = oci_connect("hulahula", "123123123", "//localhost/XE");
$eid = $_GET['id'];
$wid =$_GET['wid'];
$query="insert into works_on(eid,wid) values ('$eid','$wid')";
$parseRequest = oci_parse($conn, $query);
oci_execute($parseRequest);

$check ="select *from works_on where wid='$wid'";
$parseRequest2 = oci_parse($conn, $check);
oci_execute($parseRequest2);
if($row = oci_fetch_array($parseRequest2, OCI_RETURN_NULLS+OCI_ASSOC))
{
	echo "<script>alert('success');</script>";
}
echo '<script>window.location = "manEmpFunc.php?id='.$eid.'";</script>';


?>