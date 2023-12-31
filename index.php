<?php
include("setting.php");
session_start();
if(isset($_SESSION['sid']))
{
	header("location:home.php");
}
$sid=mysqli_real_escape_string($set,$_POST['sid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

if($sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$p=md5($pass);
	$sql=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid' AND password='$p'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['sid'];
		header("location:home.php");
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
<div class="bg-primary text-white py-3">
<div class="container text-center">
        <h2 class="head">Library Management System</h2>
    </div>
</div>


<div class="container mt-4">
    <div id="wrapper" class="bg-gray p-4 rounded border border-primary">
        <h2 class="SubHead text-center">Student Sign In</h2>
        <form method="post" action="">
            <h3 class="text-center mb-3"><?php echo $msg; ?></h3>
            <div class="form-group">
                <label for="sid">Student ID:</label>
                <input type="text" name="sid" class="form-control fields" placeholder="Enter Student ID" required>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" name="pass" class="form-control fields" placeholder="Enter Password" required>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Sign In" class="btn btn-primary but">
            </div>
        </form>
        <div class="text-center">
            <a href="register.php" class="link">Sign Up</a>
            <br>
            <a href="admin.php" class="link">Admin Sign In</a>
        </div>
    </div>
</div>
</body>
</html>
