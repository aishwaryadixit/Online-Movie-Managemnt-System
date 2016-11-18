<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	//echo('database conn');
else
	echo('could not connect');*/
?>


<html>
<head>
	<title>Online Movie Tickets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<form action="hopreg.php" method="POST" style="width:40%">
	<div class="form-group">
		
		<input type="text" class="form-control" name="fname" placeholder="Enter your first name"/><br>
		<input type="text" class="form-control" name="lname" placeholder="Enter your last name"/><br>
		<input type="text" class="form-control" name="username" placeholder="Username"/><br>
		<input type="password" class="form-control" name="password" placeholder="Password"/><br>
		<input type="text" class="form-control" name="contact" placeholder="contact"/><br>
		<label for="cinema">Cinema name</label>
		<select  class="form-control" name="cinema">
		<?php
		$s="select cname from cinema";	
		$q=mysqli_query($conn,$s);
			while($row=mysqli_fetch_assoc($q)){
				$cname=$row['cname'];
				echo '<option  >'.$cname.'</option><br>';
			}
			
		?></select><br><br>
		<button type="submit" class="btn btn-success">SignUp</button>	
		<button type="reset" class="btn btn-danger">Cancel</button>
	</div>
</form>

<?php
//echo 'inside php script';
if(isset($_POST['fname']) && !empty($_POST['lname']))
{		
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$cinema=$_POST['cinema'];
	if(isset($_POST['cinema']) && !empty($_POST['cinema']))
	{	
		$cinema=$_POST['cinema'];
		
		$a="insert into manager (post) values ('hop')";
	$q=mysqli_query($conn,$a);
	
	 //retrieve last id
$mgid = mysqli_insert_id( $conn );
//mysqli_free_result( $conn,$q );

	
	$b="select cid from cinema where cname = '$cinema'";
	$q=mysqli_query($conn,$b);
	while($row=mysqli_fetch_assoc($q))
	{
		$cid=$row['cid'];
	}
	
	$s="insert into hop (mgid,fname,lname,username,password,cid,contact) values ('$mgid','$fname','$lname','$username','$password','$cid','$contact')";
	$q=mysqli_query($conn,$s);
	
	if(!$q)
		echo 'could not insert';
	else
	{
		echo '<h1>conrgratulations! You are now  registered as a Head Office Personnel</h1>';
		echo '<form action="adminlogin.php" method="POST"><button type="submit" class="btn btn-success">LOGIN</button></form>';
	}
}
}
	
	
?>