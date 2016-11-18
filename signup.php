<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

?>

<html>
<head>
	<title>Online Movie Tickets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
body{
	padding-top:100px;
	}
</style>


</head>
<body background="bg2.jpg">
<nav class="navbar navbar-inverse navbar-fixed-top" id="navb">
	<div class="container">
	<div class ="navbar-header page-scroll">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
	<ul class="nav navbar-nav">
	<li><a href="movie.php">HOME</a>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">LOGIN
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><a href="loginpage.php">Login as Customer</a></li>
	<li><a href="adminlogin.php">Login as Manger</a></li>
	</ul>
	</li>
	<li class="dropdown active">
	<a class="dropdown-toggle" data-toggle="dropdown" href="">SIGNUP
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><a href="signup.php">Signup as a Customer</a></li>
	<li><a href="adminreg.php">Signup as a Manager</a></li>
	</ul>
	</li>
	</ul>
	</div>
	</div>
</nav>
<center>
<form action="signup.php" method="POST" style="width:60%">
	<div class="form-group">
		<input type="text" class="form-control" name="fname" placeholder="Enter your first name"/><br>
		<input type="text" class="form-control" name="lname" placeholder="Enter your last name"/><br>
		<input type="text" class="form-control" name="username" placeholder="Username"/><br>
		<input type="password" class="form-control" name="password" placeholder="Password"/><br>
		<input type="text" class="form-control" name="age" placeholder="age"/><br>
		<input type="text" class="form-control" name="city" placeholder="city"/><br>
		<input type="text" class="form-control" name="contact" placeholder="contact"/><br>
		<button type="submit" class="btn btn-success">SignUp</button>
		<button type="reset" class="btn btn-danger">Cancel</button>
	</div>
</form>


<?php
if(isset($_POST['fname']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$age=$_POST['age'];
	$city=$_POST['city'];
	$contact=$_POST['contact'];
	
	$s="insert into customer (fname,lname,username,password,age,city,contact) values ('$fname','$lname','$username','$password','$age','$city','$contact')";
	$q=mysqli_query($conn,$s);
	
	if(!$q)
		echo 'could not insert';
	else
		echo 'conrgratulations! You are now our registered customer';
}
?>
<form action="loginpage.php" method="POST">
<button type="submit" class="btn btn-success">LOGIN</button>
		
</form>

</body>
</html>