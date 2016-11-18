
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

<form action="addmovies.php" method="post" style="width:40%">
<div class="form-group">
	
	<label for "name">NAME:</label><input type="text" class="form-control" name="name"><br>
	<label for "rl">RELEASE DATE:</label><input type="text" class="form-control" name="rl"><br>
	<label for "price">PRICE:</label><input type="text" class="form-control" name="price"><br>
	<label for "dir">DIRECTOR:</label><input type="text" class="form-control" name="dir"><br>
	<label for "cast">CAST :</label><input type="text" class="form-control" name="cast"><br>
	<label for "cr">CRITIC'S RATING:</label><input type="text" class="form-control" name="cr"><br>
	<label for "dur">DURATION:</label><input type="text" class="form-control" name="dur"><br>
	<label for "desc">DESCRIPTION:</label><textarea rows="6" cols="30" class="form-control" name="desc"></textarea><br>
	<label for "genre">GENRE:</label><input type="text" class="form-control" name="genre"><br>
	<label for "lang">LANGUAGE:</label><input type="text" class="form-control" name="lang"><br>
	<label for "format">FORMAT :</label><input type="text" class="form-control" name="format"><br>
	<label for "image">POSTER :</label><input type="file" class="form-control" name="image"><br>
	
	<button type="submit" class="btn btn-success">ENTER MOVIE DETAILS</button>	
	</div>
</form>

<?php
	if(isset($_POST['name']) && !empty($_POST['name']))
	{
		$name=$_POST['name'];
		$rl=$_POST['rl'];
		$price=$_POST['price'];
		$dir=$_POST['dir'];
		$cast=$_POST['cast'];
		$cr=$_POST['cr'];
		$dur=$_POST['dur'];
		$desc=$_POST['desc'];
		$genre=$_POST['genre'];
		$lang=$_POST['lang'];
		$format=$_POST['format'];
		$image=$_POST['image'];
		
		$s="INSERT INTO `movies`(`movie_name`, `release_date`, `price`, `director`, `cast`, `critics_rating`, `duration`, `description`, `images`) VALUES('$name','$rl','$price','$dir','$cast','$cr','$dur','$desc','$image') ";
			
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else{
			echo 'Insertion Successfull<br>
			<form action=cinema.php>
			<button type=submit class=btn-btn-primary>BACK</button></form>
			<form action=movie.php>
			<button type=submit class=btn-btn-primary>EXIT</button></form>';
		}
		$mid=mysqli_insert_id($conn);
		$s="insert into language values('$mid','$lang')";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'could not insert into language';
		$s="insert into genre values('$mid','$genre')";
		$q=mysqli_query($conn,$s);
		
		$s="insert into format values('$mid','$format')";
		$q=mysqli_query($conn,$s);
		
	}
?>