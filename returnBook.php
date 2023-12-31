<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$r=$_GET['r'];
$r2=$_GET['r2'];
$r3=$_GET['r3'];
mysqli_query($set,"INSERT INTO books VALUES('$r','$r2','$r3')");
mysqli_query($set,"DELETE FROM request WHERE id='$r'");
header("location:bookRequests.php");
?>
