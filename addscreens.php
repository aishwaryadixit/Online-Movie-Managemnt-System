
<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	///echo('database conn');
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
  
  
	<style>
body{
	margin-top:40px;
	}
</style>
  
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
	<li ><a href="adminlogin.php">Login as Manger</a></li>
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

<form action="addscreens.php" method="post" style="width:40%">
<div class="form-group">
	<label for="cinema">CINEMA:</label>
	<select class="form-control" name="cinema"><option>&lt select cinemas &gt </option>
	<?php
	
		$cname="";
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
	<button type="submit" class="btn btn-primary" name="cinm">SELECT THEATRES FROM THE SELECTED CINEMA</button><br>
	<br>
	
	</form>

	<form action="addscreens.php" method="post" style="width:80%">
	<label for "theatre">THEATRE :</label>
	<select class="form-control" name="theatre">
	<?php
	if(!empty($_POST['cinema'])){
			$cname=$_POST['cinema'];
		echo " cname is ".$cname;
		
			$s="select name,no_of_screens from theatre where cid in (select cid from cinema where cname='$cname')";		
			$q=mysqli_query($conn,$s);
			if(!$q)
				echo 'query failed';
			else
			{
				while($row=mysqli_fetch_assoc($q))
				{
					$name=$row['name'];
					$n=$row['no_of_screens'];
					echo '<option>'.$name.'</option><br>';
				}
		}
		
		
	}
	?>
	</select><br>
	
	<label for "av">SEATS AVAILABLE(TOTAL ACCOMODATION) :</label><input type="text" class="form-control" name="av"><br>
	<label for "bkd">SEATS BOOKED :</label><input type="text" class="form-control" name="bkd"><br>
	<label for "from">IN CINEMAS FROM :</label><input type="text" class="form-control" name="from"><br>
	<label for "to">IN CINEMAS UPTO :</label><input type="text" class="form-control" name="to"><br>
	<label for "showtime">SHOW TIME :</label><input type="text" class="form-control" name="showtime"><br>
	<label for "movie" style="color:white">MOVIE NAME (SHOWING AT THIS SCREEN AT THE TIME SPECIFIED ABOVE) :</label>	
	
	
	<select class="form-group" name="movie">
	
	
	
	
	<?php
		$s="select movie_name from movies";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else
		{
			while($row=mysqli_fetch_assoc($q))
			{
				$name=$row['movie_name'];
				echo '<option>'.$name.'</option>';
			}
		}
	?>
	</select><br>
	
	<button type="submit" class="btn btn-success">ENTER THE DETAILS OF THE SCREEN</button>	<br><br><br><br>
	</div>
</form>

<?php
	if(isset($_POST['theatre']) && !empty($_POST['theatre']))
	{
		//$cname=$_POST['cinema'];
		$theatre=$_POST['theatre'];
		$av=$_POST['av'];
		$booked=$_POST['bkd'];
		$showtime=$_POST['showtime'];
		$from=$_POST['from'];
		$to=$_POST['to'];
		$movie=$_POST['movie'];
		$s="select cid from cinema where cname='$cname'";
		echo $movie. ' selected ' ;
		$q=mysqli_query($conn,$s);
		while($row=mysqli_fetch_assoc($q))
			$cid=$row['cid'];
		
		$s="select thid from theatre where name='$theatre'";
		$q=mysqli_query($conn,$s);
		while($row=mysqli_fetch_assoc($q))
			$thid=$row['thid'];
		
	$s="select mid from movies where movie_name='$movie'";
		$q=mysqli_query($conn,$s);
		while($row=mysqli_fetch_assoc($q))
			$mid=$row['mid'];
		
		$s="INSERT INTO `screen`(`seats_booked`, `seats_available`, `from`, `to`, `show_time`, `mid`, `totalseats`) VALUES ('$booked','$av','$from','$to','$showtime','$mid',$av)";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else{
			echo 'Insertion Successfull<br>
			<form action=cinema.php>
			<button class=btn btn-primary type=submit >BACK</button></form>
			<form action=movie.php>
			<button class=btn btn-primary type=submit >EXIT</button></form>';			
			$scn_no=mysqli_insert_id($conn);
			echo '<br>th = '.$thid.' scn = '.$scn_no.'<br>';
			$s="INSERT INTO `theatreconsistsof`(`thid`, `scn_no`) VALUES ('$thid','$scn_no')";
			$r=mysqli_query($conn,$s);
			if(!$r)
				echo 'query failed';
			else
			{
				echo 'inserted into theatreconsistsof';

			}
			
			$s="INSERT INTO `shown_at`(`mid`, `cid`) VALUES ('$mid','$cid)";
			$r=mysqli_query($conn,$s);
			if(!$r)
				echo 'query failed';
			else
			{
				echo '<b<h1>inserted</h1>';

			}
			
			
		}
		
	}
?>