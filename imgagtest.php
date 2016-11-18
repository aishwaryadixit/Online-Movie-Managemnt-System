

<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

if($db)
	echo('database conn');
else
	echo('could not connect');

$s="select images from movies";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error';
	else 
	{
			while($row=mysqli_fetch_assoc($q))
			{
				
				$image=$row['images'];
				
				echo '<img src="data:image/jpeg;base64,' . base64_encode($row['images']) . '" />';
				//echo '<img src='.htmlentities($image).' width=200 height=200><br>';
			}
	}
	
?>
