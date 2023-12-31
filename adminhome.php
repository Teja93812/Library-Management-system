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
?>
<!DOCTYPE html >
<html>
<head>
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

<h2 class="text-center">Welcome <?php echo $name;?></h2>
 <table class="table table-borderless">
                <tr>
<td><a href="addBooks.php" class="btn btn-primary">Add Books</a></td>
<td><a href="delBooks.php" class="btn btn-primary">Delete Books</a></td>
<td><a href="bookRequests.php" class="btn btn-primary">Books Requests</a></td>
<td><a href="issue.php" class="btn btn-primary">Book Issue</a></td>
</tr>
<td><a href="display1.php" class="btn btn-primary">Display Books</a></td>
<td><a href="takebook.php" class="btn btn-primary">Return Books</a></td>
<td><a href="changePasswordAdmin.php" class="btn btn-primary">Change Password</a></td>

<td><a href="logout.php" class="btn btn-primary">Logout</a></td>
	
</div>
</div>
</body>
</html>
