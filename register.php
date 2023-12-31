<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
$sem=$_POST['sem'];
$branch=$_POST['branch'];
$sid=$_POST['sid'];
$pas=md5($_POST['pass']);
if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO students(sid,name,branch,sem,password,email) VALUES('$sid','$name','$branch','$sem','$pas','$email')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="User Already Exists";
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
<div class="bg-primary ">
    <div class="container text-center py-3">
        <h2 class="head text-white">Library Management System</h2>
    </div>
</div>


<div class="container mt-4">
<div class="border border-primary p-4 rounded">


<h2 class="text-center">Student Registration</h2>
<form method="post" action="" class="form">
<div class="form-group">
<label>Name:</label><input type="text" name="name" class="form-control" placeholder="Enter Full name" required="required" size="25" />
</div>
<div class="form-group">
<lable>Email ID : </lable><input type="email" name="email" class="form-control" placeholder="Enter Email ID" required="required" size="25" />
</div>
<div class="form-group">
<lable>Sem : </lable>
<select name="sem" class="form-control" required>
<option value="" disabled="disabled" selected="selected">- - Select Sem - -</option>
<option value="1">First Sem</option>
<option value="2">Second Sem</option>
<option value="3">Third Sem</option>
<option value="4">Fourth Sem</option>
<option value="5">Fifth Sem</option>
<option value="6">Sixth Sem</option>
<option value="7">Seventh Sem</option>
<option value="8">Eighth Sem</option>
</select>
</div>
<div class="form-group">
<lable>Branch : </lable>
<select name="branch" class="form-control" required>
<option value="" disabled="disabled" selected="selected">- - Select Branch - -</option>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Electronics and Comunication Engineering">Electronics and Comunication Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Metallurgical & Material Science Engineering">Metallurgical & Material Science Engineering</option>
<option value="Electrical & Electronics Engineering">Electrical & Electronics Engineering</option>
</select>
</div>
<div class="form-group">
<lable>User Type : </lable>
<select name="User Type" class="form-control" required>
<option value="" disabled="disabled" selected="selected">- - Select User Type - -</option>
<option value="Post Graduate">Post Graduate</option>
<option value="Under Graduate">Under Graduate</option>
<option value="Reaserch Scholor">Reasearch Scholor</option>
</select>
</div>
<div class="form-group">
<lable>Student ID : </lable><input type="text" name="sid" class="form-control" placeholder="Enter Student ID" required="required" >
</div>
<div class="form-group">
<lable>Password : </lable><input type="password" name="pass" class="form-control" placeholder="Enter Password" required="required" size="25">
</div>
<div class="form-group text-center">
<input type="submit" value="Register" class="btn btn-primary" >
<?php echo $msg;?>
</form>
<br>
<br>
<div class="text-center">
<a href="index.php" class="link">Go Back</a>
</div>
</div>
</div>
</body>
</html>
