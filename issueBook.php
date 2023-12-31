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
//$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author) VALUES('$sid','$bk','$ba')");
	if($sql)
	{
		$msg="Successfully Requested";
	}
	else
	{
		$msg="Error Please Try Later";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<div class="border border-primary rounded p-4">
 <h2 class="SubHead text-center">Ask for Books</h2>

<form method="post" action="issueBook.php">
<div class="text-success"><?php echo $msg;?></div><br><br>
<div class="form-group">
<span>Book : </span><select name="name" class="form-control" required >
<option value="" disabled="disabled" selected="selected"> - - Select Book - - </option>
<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_array($x))
{
	?>
<option value="<?php echo $y['id'];?>"><?php echo $y['name']." ".$y['author'];?></option>
<?php
}
?>
</select></td></tr><br><br>
<tr><td colspan="2" align="center"><input type="submit" value="SUBMIT" class="btn btn-primary" /></td></tr>
</table>
</form>
<br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>

</div>
</body>
</html>
