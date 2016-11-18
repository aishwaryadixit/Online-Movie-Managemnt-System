<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

if($db)
	echo('database conn');
else
	echo('could not connect');
$count=0;
$res=mysql_query("select mid,movie_name from movies") or die("Query failed");

$x=$_POST["movie"];
$y=$_POST["tickets"];

while($row=mysql_fetch_array($res))
{
$a=strcmp($x,$row["Movie_name"]);
//Now we also need to make a tcount for every movie in tickets table

if($a==0)
{
echo "<h2><font face= 'verdana' > Tickets are available for your Movie </font></h2>";
echo "<table border='1' >";
echo "<tr>";
echo "<td>Name</td>";
echo "<td>id</td>";
echo "</tr>";

echo "<tr>";
echo "<td>".$row["Movie_name"]."</td>";
echo "<td>".$row["Mid"]."</td>";
echo "</tr>";

echo "<br>Booking Tickets for your movie";

$res1=mysql_query("update screen set seats_available=seats_available-1 where movies_showing=$x");

if($res1>0)
{
echo "Data updated" ;
}
else echo "Data not updated";

break;
}
else echo "Movie is not present";
}
/*
while($row="mysql_fetch_array($res)")
{
echo $row["Movie_name"];
}
*/
?>