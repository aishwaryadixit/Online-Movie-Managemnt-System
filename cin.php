

<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	echo('database conn');
else
	echo('could not connect');*/

	if(isset($_POST['cname']) && !empty($_POST['cname']))
	{
	$cname=$_POST['cname'];
	$s="select * from cinema";
	$q=mysqli_query($conn,$s);
	while($rows=mysqli_fetch_assoc($q))
	{
		$cid=$rows['cid'];
		//echo $cname;
		$c=$rows['cname'];
		if($cname==$c)
		{
			echo 'This cinema is already recorded in the database <br>';
			header ('Location: cinema.php');
			break;
		}
		
		
	}
	//echo 'last cid was '.$cid;
	$cid=$cid+1;
	//echo 'new cid is '.$cid;
	$q="INSERT INTO `cinema`(`cid`,`cname`) VALUES ('$cid','$cname')";
		
		$query=mysqli_query($conn,$q);
	if($query)
		echo('inserted');
	else
		echo('error inserting');
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
<h1 style="color:green;">SUCCESSFULLY INSERTED INTO THE DATABASE</h1>

<form action="cinema.php" method="post">
<button class="btn btn-success" type="submit">Back</button>
</form>
<form action="movie.php" method="post">
<button class="btn btn-success" type="submit">Exit</button>
</form>