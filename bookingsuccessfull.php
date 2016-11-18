<?php
require_once('sesslogin.inc.php');
if(!loggedin)
	header('loginpage.php');?>
<html>
<head>
	<title>Book Movie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<font align="center" face="comic sans ms"><h2>Book Your Movie</h2></font>


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
<div class="container">
<div align="right">

<form action="logout.php" method="POST">
<button type="submit" class="btn btn-success" name="logout">Logout</button>
</form>
</div>
<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
	die("error connecting");


$q=mysqli_select_db($con,"movie");
if(!$q)
	die("could not connect to the database");


//session_start();	
$username=$_SESSION['username'];

$s="SELECT * FROM movie_tickets ORDER BY tno DESC LIMIT 1";
$q=mysqli_query($con,$s);
if(!$q)
	echo 'some error occurred in the booking';
else
{
	echo '<br><br><b><h1>HELLO, '.$username.'! <br></h1><h2 style="color:blue;"><marquee direction="right">Your ticket details are as follows</marquee></h2>';
	while($r=mysqli_fetch_assoc($q))
	{
		
		$cid=$r['cid'];
		$thid=$r['thid'];
		$scn_no=$r['scn_no'];
		$mid=$r['mid'];
		$date=$r['date'];
		$time=$r['time'];
		$price=$r['price'];
		
	}
	
	
	$s="SELECT cname FROM cinema where cid='$cid'";
	$q=mysqli_query($con,$s);
	while($row=mysqli_fetch_assoc($q))
	{
		$cname=$row['cname'];
	}

	$s="SELECT name,address,city FROM theatre where thid='$thid'";
	$q=mysqli_query($con,$s);
	while($row=mysqli_fetch_assoc($q))
	{
		$name=$row['name'];
		$address=$row['address'];
			$city=$row['city'];
	}
	
	$s="SELECT movie_name,images FROM movies where mid='$mid'";
	$q=mysqli_query($con,$s);
	while($row=mysqli_fetch_assoc($q))
	{
		$movie=$row['movie_name'];
		$images=$row['images'];
	}
	
	
	
	
	echo '<br><table class="table table-bordered table-hover table-responsive" style="background-color:white">';
	echo '<tr><td>Cinema</td><td>'.$cname.'</td></tr>';
	echo '<tr><td>Theatre</td><td>'.$name.'</td></tr>';
	echo '<tr><td>Address</td><td>'.$address.'</td></tr>';
	echo '<tr><td>City</td><td>'.$city.'</td></tr>';
	echo '<tr><td>Movie</td><td>'.$movie.'</td></tr></table>';
	echo '<img src="data:image/jpeg;base64,' . base64_encode($images) . '" width="250" height="250"/>';
}

?>

<form action="movie.php" method="post">
<br><br><button class="btn btn-danger" type="submit">Exit</button>
</form>