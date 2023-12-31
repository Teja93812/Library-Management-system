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
        <h2 class="SubHead text-center">Welcome <?php echo $name; ?></h2>
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <td><a href="issueBook.php" class="btn btn-primary">Ask Book</a></td>
                    <td><a href="request.php" class="btn btn-primary">Request New Books</a></td>
                </tr>
                <tr>
                    <td><a href="changePassword.php" class="btn btn-primary">Change Password</a></td>
                    <td><a href="display.php" class="btn btn-primary">Display Books</a></td>
                    <td><a href="returnstubook.php" class="btn btn-primary">My Books</a></td>
                    <td><a href="logout.php" class="btn btn-primary">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
