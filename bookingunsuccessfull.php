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
	<li class=active ><a href="movie.php">HOME</a>
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
<div class="row">
<div class="col-lg-5">
<center>
<img src="booking_closed.png"/>
<br>
<br>
</div>
<div class="col-lg-5">
<img src="SORRY.jpg"/>
<br>
<br>
</div>
</div>
<form action="booking.php" method="post">
<button class="btn btn-success" type="submit">Book another show</button>
</form>


<form action="movie.php" method="post">
<button class="btn btn-success" type="submit">Exit</button>
</form>

</body>
</html>