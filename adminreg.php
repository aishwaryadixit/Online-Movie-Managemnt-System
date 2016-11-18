<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	echo('database conn');
else
	echo('could not connect');
*/
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
	margin-top:40px;
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

	<div class="form-group" style="font-family:Calibiri; font-size:24">
		<br> ENTER YOUR POST </br>
		
		<form action="adminreg.php" method="post">
		<input type="radio" class="form-control" name="post" value="hop"/>Head Office Personnel</button><br>
		<input type="radio" class="form-control" name="post"  value="bm"/>Branch Manager</button><br>
		
		<button type="submit" class="btn btn-success">Select</button>	
		<button type="reset" class="btn btn-danger">Cancel</button>
		</form>
	</div>


<?php
if(isset($_POST['post']) && !empty($_POST['post']))
{
	
	$post=$_POST['post'];
	if($post=='hop')	
		require_once ('hopreg.php');
	else if($post=='bm')
		require_once('bmreg.php');
}
?>
