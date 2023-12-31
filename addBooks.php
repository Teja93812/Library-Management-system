<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
<div id="banner" class="bg-primary text-white py-3">
    <div class="container text-center">
        <h2 class="head">Library Management System</h2>
    </div>
</div>

<div class="container mt-4">
    <div id="wrapper" class="bg-gray border border-primary p-4 rounded">

<h2 class="text-center">Add Books in Library</h2>
<br />
<br />
<form method="post" action="">
<div><?php echo $msg;?></div>
<div>
<lable>Book : </lable><input type="text" name="name" placeholder="Enter Book Name" size="25" class="form-control" required="required"  /></div>
<lable class="nm">Author :</lable> <input type="text" name="auth" placeholder="Enter Author Name" size="25" class="form-control" required="required"  /><br><br>
<div class="text-center">
<input type="submit" value="ADD BOOK" class="btn btn-primary" />
</div>
</form><br><br>
<div class="text-center">
<a href="adminhome.php" class="link">Go Back</a>
</div>

</div>
</div>
</body>
</html>
