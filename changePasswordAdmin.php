<?php
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
$pass=$b['password'];
$old=md5($_POST['old']);
$p1=md5($_POST['p1']);
$p2=md5($_POST['p2']);
if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
{

}
else
{
if($old!=$pass)
{
	$msg="Incorrect Old Password";
}
elseif($p1!=$p2)
	{
		$msg="New Password Didn't Matched";
	}
	else
	{
		mysqli_query($set,"UPDATE admin SET password='$p2' WHERE aid='$aid'");
		$msg="Successfully Changed your Password";
	}

}

?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="bg-primary py-3">
    <div class="container text-center">
        <h2 class="head text-white">Library Management System</h2>
    </div>
</div>

<div class="container mt-4">
    <div id="wrapper" class="border border-primary p-4 rounded">

<h2 class="text-center">Change Password</h2>

<form method="post" action="">

<h2><?php echo $msg;?></h2>
<div class="form-group">
<lable>Old Password :</lable><input type="password" name="old" size="25" class="form-control" placeholder="Enter Old Password" required="required" /></div>
<div class="form-group">
<lable>New Password :</lable><input type="password" name="p1" size="25" class="form-control" placeholder="Enter New Password" required="required"  /></div>
<div class="form-group">
<lable>Re-Type Password :</lable><input type="password" name="p2" size="25"  class="form-control" placeholder="Re-Type New Password" required="required" /></div>
<div class="text-center"><input type="submit" value="Change Password" class="btn btn-primary"/>
</form>

<a href="adminhome.php" class="btn btn-primary">Go Back</a>
</div>
</div>
</div>
</body>
</html>
