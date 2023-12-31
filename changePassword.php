<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
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
		mysqli_query($set,"UPDATE students SET password='$p2' WHERE sid='$sid'");
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
<div id="banner" class="bg-primary text-white py-3">
    <div class="container text-center">
        <h2 class="head">Library Management System</h2>
    </div>
</div>
<div class="container mt-4">
    <div class="border border-primary p-4">
        <h2 class="SubHead text-center">Change Password</h2>
        <h4 class="alert alert-success alert-dismissible fade show" role="alert" ><?php echo $msg;?></h4>
        <form method="post" action="">
            <div class="table">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label labels">Old Password :</label>
                    <div class="col-sm-8">
                        <input type="password" name="old" class="form-control fields" placeholder="Enter Old Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label labels">New Password :</label>
                    <div class="col-sm-8">
                        <input type="password" name="p1" class="form-control fields" placeholder="Enter New Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label labels">Re-Type Password :</label>
                    <div class="col-sm-8">
                        <input type="password" name="p2" class="form-control fields" placeholder="Re-Type New Password" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-primary but" value="Change Password">
                </div>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="adminhome.php" class="link">Go Back</a>
        </div>
    </div>
</div>
</body>
</html>
