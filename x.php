<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$r2=$_GET['r'];
mysqli_query($set,"DELETE FROM booklist WHERE sid='$r'");
header("location:returnstubook.php");
?>
