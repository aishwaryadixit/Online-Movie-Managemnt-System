
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
  
  .bg{
	 background-size:100%;
	 background-repeat:no-repeat;
	 
  }
	
  
  </style>  
</head>


<body>
<!--
<nav class="navbar navbar-inverse navbar-fixed-top">
 
    <ul class="nav navbar-nav">
      <li class="active"><a href="moviehome.php">HOME</a></li>
      <li><a href="product.html">ABOUT</a></li>
       <li><a href="index.html">CONTACT US</a></li> 
	   
	  <li class="dropdown">
		  <a class="dropdown-toggle" data-toggle="dropdown" href="#">LOGIN<span class="caret"></span></a>
		  <!-- span displays the down arrow -->
		<!--	<ul class="dropdown-menu">
				<li><a href ="loginpage.php">LOGIN AS A CUSTOMER</li>
				<li><a href ="adminlogin.php">LOGIN AS A MANAGER</li>
			</ul>	  
	  </li> 
	  
     <li class="dropdown">
		 <a class="dropdown-toggle" data-toggle="dropdown" href="#gf">SIGNUP<span class="caret"></span></a>
		 <ul class="dropdown-menu">
			<li><a href="signup.php">SIGNUP AS A CUSTOMER</li>
			<li><a href ="adminreg.php">SIGNUP AS A MANAGER</li>
		 </ul
	
    </ul>
  </div>
</nav>
-->
<center>

<form action="addscreens.php" method="post" style="width:40%">
<div class="form-group">
	<label for="cinema">CINEMA:</label>
	<select class="form-control" name="cinema">
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
	<!--<button type="submit" class="btn btn-success" name="cinm">SELECT CINEMA</button><br>-->
	
	<label for "theatre">THEATRE :</label>
	<select class="form-control" name="theatre">
	<?php
	if(!empty($_POST['cinema'])){
			$cname=$_POST['cinema'];
		echo " cname is ".$cname;
		
			$s="select name from theatre where cid in (select cid from cinema where cname='$cname')";		
			$q=mysqli_query($conn,$s);
			if(!$q)
				echo 'query failed';
			else
			{
				while($row=mysqli_fetch_assoc($q))
				{
					$name=$row['name'];
					echo '<option>'.$name.'</option><br>';
				}
		}
		
	}
	?>
	</select><br>
	
	<label for "addr">SEATS AVAILABLE(TOTAL ACCOMODATION) :</label><input type="text" class="form-control" name="av"><br>
	<label for "city">SEATS BOOKED :</label><input type="text" class="form-control" name="bkd"><br>
	<label for "screens">SHOW TIME :</label><input type="text" class="form-control" name="showtime"><br>
	<label for "screens">MOVIE NAME (SHOWING AT THIS SCREEN AT THE TIME SPECIFIED ABOVE) :</label><input type="text" class="form-control" name="movie"><br>	
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
	
	<button type="submit" class="btn btn-success">ENTER THE DETAILS OF THE SCREEN</button>	
	</div>
</form>

<?php
	if(isset($_POST['av']) && !empty($_POST['av']))
	{
		$cname=$_POST['cinema'];
		$theatre=$_POST['theatre'];
		$av=$_POST['av'];
		$booked=$_POST['booked'];
		$showtime=$_POST['showtime'];
		$movie=$_POST['movie'];
		$s="select cid from cinema where cname='$cname'";
		
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
			$cid=$row['mid'];
		
		$s="INSERT INTO `screen`(`seats_booked`, `seats_available`, `show_time`, `mid`) VALUES ('$booked','$av','$showtime','$mid')";
		$thid=mysql_insert_id($conn);
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else{
			echo 'inserted';
		}
		
		$scn_no=$mysqli_insert_id($q);
		
		$s="insert into  theatreconsistsof ('$thid','$scn_no')";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'query failed';
		else
		{
			echo 'inserted into theatreconsistsof';
		}
	}
?>