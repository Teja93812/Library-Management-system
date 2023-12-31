<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];

$r1=$_GET['r1'];
$r2=$_GET['r2'];
$r3=$_GET['r3'];
mysqli_query($set,"DELETE FROM booklist WHERE sid='$r1' and bookname='$r2' and authorname='$r3'");
header("location:takebook.php");
?>
