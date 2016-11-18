
<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

if($db)
	echo('database conn');
else
	echo('could not connect');
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
	<li ><a href="movie.php">HOME</a>
	<li class="dropdown">
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

<form action="addtheatre.php" method="post" style="width:40%">
<div class="form-group">
	<label for="cinema">CINEMA:</label>
	<select class="form-control" name="cinema">
	<?php
	
		$s="select cname from cinema";		
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else
		{
			while($row=mysqli_fetch_assoc($q))
			{
				$cname=$row['cname'];
				echo '<option>'.$cname.'</option><br>';
			}
		}
	?>
	</select><br>
	<label for "theatre">NAME:</label><input type="text" class="form-control" name="name"><br>
	<label for "addr">ADDRESS:</label><input type="text" class="form-control" name="addr"><br>
	<label for "city">CITY:</label><input type="text" class="form-control" name="city"><br>
	<label for "screens">NUMBER OF SCREENS:</label><input type="text" class="form-control" name="screens"><br>
	<button type="submit" class="btn btn-success">ENTER THEATRE DETAILS</button>	
	</div>
</form>

<?php
	if(isset($_POST['name']) && !empty($_POST['name']))
	{
		$cname=$_POST['cinema'];
		$name=$_POST['name'];
		$addr=$_POST['addr'];
		$city=$_POST['city'];
		$screens=$_POST['screens'];
		$s="select cid from cinema where cname='$cname'";
		$q=mysqli_query($conn,$s);
		while($row=mysqli_fetch_assoc($q))
			$cid=$row['cid'];
		
		$s="INSERT INTO `theatre`(`cid`, `name`, `address`, `city`, `no_of_screens`) VALUES('$cid','$name','$addr','$city','$screens')";
		$thid=mysqli_insert_id($conn);
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else
		{
			echo 'Insertion Successfull<br>
			<form action=cinema.php>
			<button type=submit class=btn-btn-primary>BACK</button></form>
			<form action=movie.php>
			<button type=submit class=btn-btn-primary>EXIT</button></form>';
		}
		
		 
		
		
		
	}
?>