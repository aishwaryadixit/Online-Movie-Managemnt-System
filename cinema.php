<?php
require_once('sesslogin.inc.php');
if(!loggedin())
{	
	header ('Location: movie.php');
}


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
<body background="bg2.jpg" style="background-repeat: repeat-y;">
<div class="container">

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

<div class="container">
<br>
<h2 align="center"><u>Add Into The Database</u></h2>
<section>
<div align="right">

<form action="logout.php" method="POST">
<button type="submit" class="btn btn-success" name="logout">Logout</button>
</form>
</div>
<div align="center">

<form action="cinema.php" method="POST">
	ADD A NEW MOVIE<input type="radio" name="add" value="movie"><br><br>
	ADD A NEW CINEMA<input type="radio" name="add" value="cinema"/><br><br>
	ADD A NEW THEATRE<input type="radio" name="add"  value="theatre"><br><br>
	ADD A NEW SCREEN<input type="radio" name="add"  value="screen"><br><br>
	<button type=submit class="btn btn-success" value="submit">Submit</button>
</form>
</div></div>
</body>
</html>

<?php

if(isset($_POST['add']) && !empty($_POST['add']))
{
$name=$_POST['add'];

if($name=='cinema')
{
	echo '<form action=cin.php method=post>';
	
	echo '<center>Cinema Name<input type=text name=cname><br><br><button class="btn btn-primary" type=submit>ADD CINEMA</button></form>';
}


else if($name=="theatre")
	require_once('addtheatre.php');
else if($name=='screen')
	require_once('addscreens.php');
else if($name=='movie')
	require_once('addmovies.php');
}

?>

