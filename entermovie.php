<?php


$name=$_POST['name'];
$rl=$_POST['release'];
$price=$_POST['price'];
$dir=$_POST['dir'];
$cast=$_POST['cast'];
$cr=$_POST['cr'];
$dur=$_POST['dur'];
$descr=$_POST['descr'];
$q='INSERT INTO `movies`(`movie_name`, `release_date`, `price`, `director`, `cast`, `critics_rating`, 
`duration`, `description`) VALUES ($name,$rl,$price,$dir,$cast,$cr,$dur,$descr)';

$query=mysqli_query($conn,$q);
if($query)
	echo('inserted');
else
	echo('error inserting');


?>