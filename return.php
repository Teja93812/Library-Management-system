<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];

$r=$_GET['r'];
$r1=$_GET['r1'];
$r2=$_GET['r2'];
$r3=$_GET['r3'];
mysqli_query($set,"INSERT INTO booklist VALUES('$r1','$r2','$r3')");
mysqli_query($set,"DELETE FROM issue WHERE id='$r'");
header("location:issue.php");
?>
