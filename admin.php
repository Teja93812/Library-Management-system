<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
$aid=mysqli_real_escape_string($set,$_POST['aid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($aid==NULL || $_POST['pass']==NULL)
{
	
}
else
{

	
	$sql=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:adminhome.php");
	}
	else
	{
		$msg="Incorrect Details";
	}
}
?>
<!DOCTYPE html>
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
    <div id="wrapper" class="border border-primary p-4 rounded">
        <h2 class="text-center">Admin Sign In</h2>

<form method="post" action="">
<div class="text-center"><?php echo $msg;?></div>
<div class="form-group">
<lable>Admin ID :</lable> <input type="text" name="aid" class="form-control" size="25" placeholder="Enter Admin ID" required="required" />
</div>
<div class="form-group">
<div>Password :</div> <input type="password" name="pass" class="form-control" size="25" placeholder="Enter Password" required="required" />
</div>
<div class="text-center">
<input type="submit" value="Sign In" class="btn btn-primary" />
</div>
</form><br><br>
<div class="text-center">
<a href="index.php">Main Page</a>
</div>
</div>
</div>
</body>
</html>
