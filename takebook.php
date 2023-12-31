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
<!DOCTYPE html>
<html>
<head>
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
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

<h2 class="text-center">Available Books Requests</h2>

<table class="table table-bordered mt-4">
<tr class="bg-info"><th>Book Name</th><th>Author</th><th>Issued For<br>Student ID</th><th>Status</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM booklist");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels1" style="font-size:14px;"><td><?php echo $y['bookname'];?></td><td><?php echo $y['authorname'];?></td><td><?php echo $y['sid'];?></td>
<td><?php echo $y['date'];?></td><td><a href="returnedbook.php?r1=<?php echo urlencode($y['sid']);?>&r2=<?php echo urlencode($y['bookname']);?>&r3=<?php echo urlencode($y['authorname']);?>" class="link"> Mark As Return</a></td>
</tr>
<?php
}

?>
</table><br />
<br />
<a href="adminhome.php" class="btn btn-primary">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>
