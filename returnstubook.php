<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
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
<div class="bg-primary ">
    <div class="container text-center py-3">
        <h2 class="head text-white">Library Management System</h2>
    </div>
</div>
<div class="container mt-4">
<div class="border border-primary p-4 rounded">

<h2 class="text-center">MY BOOKS</h2>


<table class="table table-bordered mt-4">
<tr class="bg-info"><th>Book Name</th><th>Author</th><th>Issued By<br>Student ID</th></tr>
<?php
$s=$_SESSION['sid'];
$x=mysqli_query($set,"SELECT * FROM booklist where sid='$s'");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels1" style="font-size:14px;"><td><?php echo $y['bookname'];?></td><td><?php echo $y['authorname'];?></td><td><?php echo $y['sid'];?></td>

</tr>
<?php
}
?>
</table>
<a href="adminhome.php" class="text-center btn btn-primary">Go Back</a>

</div>
</div>
</body>
</html>
