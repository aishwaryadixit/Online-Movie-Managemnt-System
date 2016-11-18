<?php

include('dbcon.inc.php');
ob_start();
session_start();

function loggedin()
{
	if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
		return true;
	else
		return false;
}

function getcustomername ()
{
	$s="select fname,cmid from customer where username='$username'";
	$q=mysqli_query($conn,$s);
	if(!$q)
	{
		echo 'error selecting';
		return;
	}
	
	while($row=mysqli_fetch_assoc($q))
	{
		$fname=$row['fname'];
		$cmid=$row['cmid'];
	}
	
	return $cmid;
	
}
?>

