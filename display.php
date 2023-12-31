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
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="bg-primary ">
    <div class="container text-center">
        <h2 class="head text-white">Library Management System</h2>
    </div>
</div>
<div class="container mt-4">
<div id="wrapper" class="border border-primary p-4 rounded">

<h2 class=" text-center ">Welcome <?php echo $name;?></h2>

<table class="table table-bordered mt-4">
<tr class="bg-info"><th>S.No</th><th>Book Name</th><th>Author</th></tr><br>
<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class=""><td><?php echo $y['id']?></td><td><?php echo $y['name']?></td><td><?php echo $y['author']?></td></tr><br>
<?php
}
?>
<table>
<br />
<br />
<a href="home.php" class="text-center text-primary">Go Back</a>
</div>
</div>
</body>
</html>
