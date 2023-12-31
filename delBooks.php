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
$bn=$_POST['name'];
$au=$_POST['auth'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"DELETE FROM `books` WHERE name='$bn' and author='$au'");
	if($sql)
	{
		$msg="Successfully Deleted";
	}
	else
	{
		$msg="Book Not Exists";
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
    <div id="wrapper" class="bg-gray border border-primary p-4 rounded">
<h2 class="text-center pb-3">Delete Books in Library</h2>	
<form method="post" action="">
<div><?php echo $msg;?></div>
<div>
	<lable>Book : </lable><input type="text" name="name" placeholder="Enter Book Name" size="25" class="form-control" required="required"  />
</div>
<div>
	<lable>Author :</lable> <input type="text" name="auth" placeholder="Enter Author Name" size="25" class="form-control" required="required"  />
</div>
<div class = "d-flex flex-row justify-content-center mt-3">
	<input type="submit" value="Del BOOK" class="btn btn-primary mr-3" />

	</form>
	<br />
	<br />
	<a href="adminhome.php" class = "btn btn-primary">Go Back</a>
	<br />
	<br />
</div>

</div>
</div>
</body>
</html>
