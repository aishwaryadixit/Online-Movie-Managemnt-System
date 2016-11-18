<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	echo('database conn');
else
	echo('could not connect');*/

if(isset($_POST['name']) && !empty($_POST['name']))
{
	$name=$_POST['name'];
	$message=$_POST['message'];
	
	$s="insert into feedback values ('$name','$message')";
	$q=mysqli_query($s);
	
}
?>
