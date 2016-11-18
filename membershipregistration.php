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
</head>
<body>


<nav class="navbar navbar-inverse">
 
    <ul class="nav navbar-nav">
      <li class="active"><a href="bootweb.html">Home</a></li>
      <li><a href="product.html">ABOUT</a></li>
      <li><a href="carousel.html">FAQ</a></li> 
      <li><a href="index.html">CONTACT US</a></li> 
    </ul>
  </div>
</nav>

<center>
<form action="signup.php" method="POST" style="width:60%">
	<div class="form-group">