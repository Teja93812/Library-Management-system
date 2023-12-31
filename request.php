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
$bn=$_POST['name'];
$ba=$_POST['author'];
if($bn!=NULL && $ba!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
	if($sql)
	{
		$msg="Successfully Requested";
	}
	else
	{
		$msg="Request Already Exists";
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
 <div id="wrapper" class="border border-primary rounded p-4">
        <h2 class="SubHead text-center">Request for Unavailable Book</h2>
        <h4 class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $msg;?></h4>
        <form method="post" action="">
            <div class="table">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label labels">Book :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control fields" required name="name" placeholder="Enter Book Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label labels">Author Name :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control fields" required name="author" placeholder="Enter Author Name">
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary but" value="Request">
                </div>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="home.php" class="link">Go Back</a>
        </div>
    </div>
</div>
</body>
</html>
