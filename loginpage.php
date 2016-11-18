
<?php
require_once('sesslogin.inc.php');
?>
<html>
<head>
	<title>Online Movie Tickets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


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
	<li ><a href="movie.php">HOME</a>
	<li class="dropdown active">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">LOGIN
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><a href="loginpage.php">Login as Customer</a></li>
	<li><a href="adminlogin.php">Login as Manger</a></li>
	</ul>
	</li>
	<li class="dropdown">
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


<div class="jumbotron">
<div class="container text-center">
<b><h1><font color="black"> Online Ticket Management </font></h1></b>
<br>
<font face="verdana">
<p>This Website Manages Online Ticket Booking</p>
</font>
<div class="btn-group" >
<a href="" class="btn btn-lg btn-info">Book Ticket</a>
<!--<a href="" class="btn btn-lg btn-danger">Cancel Ticket</a>-->
</div>
</div>
<br>
<section>
<div class="well">
<div class="container text-center">
<h2><b>Login</b></h2>
<br>
<form action="loginpage.php" method="POST" class="form-horizontal">
<div class="form-group">
<label for="uname">User Name:</label>
<input type="text" class="form-control" id="email" name="username" placeholder="Enter Username"/>
<label for="password">Password:</label>
<input type="password" class="form control" id="password" name="password" />
</div>
<button type="submit"   class="btn btn-primary">OK</button>
</form> 
<form action="signup.php" method="POST">
NOT YET REGISTERED?<BR><button type=submit class="btn btn-success">SIGNUP TO REGISTER NOW!</button>
</form>
</div>
</div>
</section>

<?php

if(loggedin())
	
	header ('Location: booking.php');
else
{

if(isset($_POST['username']) && isset($_POST['password']))
{	
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$s="select cmid,fname from customer where username='$username' and password='$password'";
		$q=mysqli_query($conn,$s);
		
		if(!$q)echo 'error in selecting';
		
		else{
			$row=mysqli_num_rows($q);
			if($row==1)
			{				
				$_SESSION['username']=$username;
					header('Location: booking.php');
			}
			else echo 'invalid username or password';
		}
		
	}
	else{
		echo 'Please enter a username and a password';
	}
}
}

?>