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
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Book Already Exists";
	}
}
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<br />
<br />

<table class="table">
<tr class="bg-info"><th>Book Name</th><th>Author</th><th>Issued For<br>Student ID</th><th>Date</th><th>Status</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td><td><?php echo $y['sid'];?></td>
<td><?php echo $y['date'];?></td><td><a href="return.php?r=<?php echo urlencode($y['id']);?>&r1=<?php echo urlencode($y['sid']);?>&r2=<?php echo urlencode($y['name']);?>&r3=<?php echo urlencode($y['author']);?>" class="link">ISSUE</a></td>
</tr>
<?php
#print_r($y);
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
