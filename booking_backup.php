<html>
<head>
	<title>Book Movie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<font align="center" face="comic sans ms"><h2>Book Your Movie</h2></font>

<?php

$conn=mysqli_connect("localhost","root","");
if(!$conn)
	die("error connecting");
else{
	echo 'connection established';
}

$q=mysqli_select_db($conn,"movie");
if(!$q)
	die("could not connect to the database");
else{
	echo 'database connected';
}

session_start();
	$username=$_SESSION['username'];
	
	echo '<center><br><br><b style="font-size:16">Hello, '.$username.'</b></center>';
?>






<script>
$().ready(function () {

    var selectedOnLoad = $('#city').val();
    setChild(selectedOnLoad);

    $('#city').change(function () {
       var selectedValue = $('#city').val();
       setChild(selectedValue);
    });

});

function setChild(value){
    //Have your three child selector names as follows in your markup as well and assuming they are not in divs
    var arr = ["cinema_","cinema_1", "cinema_2"];

    jQuery.each(arr, function() {
            if(this == "cinema_" + value){
                $("#" + this).show();
            }else{
                $("#" + this).hide();
            }
     });
}
</script>

</head>

<body background="bg2.jpg">

<div class="container">
<div align="right">

<form action="logout.php" method="POST">
<button type="submit" class="btn btn-success" name="logout">Logout</button>
</form>
</div>
<form action="booking.php" method="post">
<div class="form-group" >
<label for="movie">Movie:</label>
<br>
<select id="movie" class="form-control" name="movie">
<option>--Select Movie--</option>
<?php
$s="select movie_name from movies";
$q=mysqli_query($conn,$s);
if(!$q)
	echo 'error in connecting';
else
{
	while($row=mysqli_fetch_assoc($q))
	{
		$movie=$row['movie_name'];
		echo '<option>'.$movie.'</option>';
	}
}
?>

</select>
<br>
<center>
<button type=submit class="btn btn-primary  ">Select Cinemas for this movie</button>
</center>
</div>


<div class="form-group" >
<label for="city">City:</label>
<br>
<select id="city" class="form-control" name="city" >
<?php
$s="select distinct city from theatre where cid in (select cid from shown_at where mid in(select mid from movies where movie_name='$movie'))";
$q=mysqli_query($conn,$s);
if(!$q)
	echo 'error in connecting';
else
{
	while($row=mysqli_fetch_assoc($q))
	{
		$city=$row['city'];
		echo '<option>'.$city.'</option>';
	}
}
?>
</select>

</div>

<div class="form-group">
<label for="cinema">Cinema:</label>
<br>

<select class="form-control" name="cinema">
<option>--Select Cinema--</option>

<?php
if(isset($_POST['movie']) && !empty($_POST['movie']))
	$_SESSION['movie']=$_POST['movie'];
$s="select cname from cinema where cid in (select cid from shown_at where mid in (select mid from movies where movie_name='$movie'))";
$q=mysqli_query($conn,$s);
if(!$q)
{
	echo 'error in connecting';
	header('Location: bookingunsuccessfull');
}
else
{
	while($row=mysqli_fetch_assoc($q))
	{
		$cname=$row['cname'];
		echo '<option>'.$cname.'</option>';
		echo $cname;
	}
}
?>

</select>
</div>
 <center>
<button type=submit class="btn btn-primary  ">Select</button>
</center>
<br>
<div class="form-group" >
<label for="theatre">Theatre:</label>
<br>
<select id="theatre" class="form-control" name="theatre">
<?php
$cname=$_POST['cinema'];
$s="select name from theatre where cid in (select cid from cinema where cname='$cname')";
$q=mysqli_query($conn,$s);
if(!$q)
{
	echo 'error in connecting';
	header('Location: bookingunsuccessfull');
}
else
{
	while($row=mysqli_fetch_assoc($q))
	{
		$name=$row['name'];
		echo '<option>'.$name.'</option>';
	}
}
echo '</select>
</div>





<div class="form-group" >
<label for ="day">Day</label>
<input type=date name="date"/>
</div>

<div class="form-group">
<label for="time">Time</label>
<select class="form-group" name="time">';

if(isset($_POST['movie']) && !empty($_POST['movie']) && $_POST['movie']!='--Select Movie--')
{
	$movie=$_POST['movie'];
$s="select mid from movies where movie_name='$movie'";
	$q=mysqli_query($conn,$s);
	
	while($row=mysqli_fetch_assoc($q))
	{
		
		$mid=$row['mid'];
	}
	$_SESSION['mid']=$_POST['mid'];
}

echo 'in time';
//if(isset($_POST['movie']) && !empty($_POST['movie']))
//{
	$movie=$_POST['movie'];
	$_SESSION['mid']=$mid;
	echo $mid;
//}
//if(isset($_POST['cinema']) && !empty($_POST['cinema']) && $_POST['cinema']!='--Select Cinema--')

//{
	$movie=$_SESSION['movie'];
	echo 'mid is '.$mid;
	$s="select show_time from screen where mid='$mid')";
	$q=mysqli_query($conn,$s);
	while($row=mysqli_fetch_assoc($q))
	{
		$time=$row['show_time'];
		echo '<option>'.$time.'</option>';
	}
//}

?>
</select>
</div>

<div class="form-group" >
<label for="tickets">Tickets:</label>
<br>
<select id="tickets" class="form-control" name="tickets">
<?php
$i=1;
while($i<=10)
{
	echo 'i is '.$i;
	echo '<option>'.$i.'</option>';
	$i++;
}
?>
</select>
</div>
<!--Last-->
<div class="form-group" align="center" >
<button type="submit" class="btn btn-primary" name="check">Check Tickets</button><br>

</form>
<br> 

<form action="movie.php" action="post">
<button class="btn btn-primary" type=submit value="Back">Back</button>
</form>
</div>
</body>
</html>

<?php

if(isset($_POST['movie']) && !empty($_POST['movie']) && $_POST['movie']!='--Select Movie--' && isset($_post['cinema']) && $_post['cinema']!='--Select Cinema--')
{
	
	$movie=$_POST['movie'];
	$city=$_POST['city'];
	$cinema=$_POST['cinema'];
	
	$s="select cid from cinema where cname='$cinema'";
	$q=mysqli_query($conn,$s);
	
	while($row=mysqli_fetch_assoc($q))
	{
		$cid=$row['cid'];
	}
	echo 'cid is '.$cid;
	
	if(isset($_POST['movie']) && !empty($_POST['movie']))
	{
		$s="select price,mid from movies where movie_name='$movie'";
	$q=mysqli_query($conn,$s);
	
	while($row=mysqli_fetch_assoc($q))
	{
		$price=$row['price'];
		$mid=$row['mid'];
	}
	echo 'price is'.$price.' movie is '.$mid;
}

	$_SESSION['price']=$price;
	$_SESSION['mid']=$mid;
	$_SESSION['cid']=$cid;
}

if(isset($_POST['theatre']) && !empty($_POST['theatre']))
{
	
	$theatre=$_POST['theatre'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$tickets=$_POST['tickets'];
	$cid=$_SESSION['cid'];
	$mid=$_SESSION['mid'];
	$price=$_SESSION['price'];
	$s="select thid from theatre where name='$theatre'";
	$q=mysqli_query($conn,$s);
	
	while($row=mysqli_fetch_assoc($q))
	{
	
		$thid=$row['thid'];
	}
		$a="select scn_no from theatreconsistsof where thid='$thid'";
		$q=mysqli_query($conn,$a);
		
		while($row=mysqli_fetch_assoc($q))
		{
			$scn_no=$row['scn_no'];
		}
	
	
	$s="select show_time,seats_booked,seats_available from screen where scn_no='$scn_no' and mid='$mid'";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error in screens';
	while($row=mysqli_fetch_assoc($q))
	{
		$show_time=$row['show_time'];
		$sb=$row['seats_booked'];
		$sa=$row['seats_available'];
		$total=$sa+$sb;
		
	}	
	
	//check if date is avialable
	$s="select * from screen where mid='$mid' and scn_no='$scn_no'";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error in screens';
	while($row=mysqli_fetch_assoc($q))
	{
		$from=$row['from'];
		$to=$row['to'];
		echo 'dates are'.$to.$from.'<br>';
		
	}	
	$today=date("Y-m-d");
	echo 'today is '.$today;
	if($date<$today || $date>$to)
	{
			echo 'the movie is unavailable on this date<br>Please choose another date<br>';
			header('Location: bookingunsuccessfull.php');
	}
	echo $mid.' '.$thid.' '.$cid.' '.$scn_no.' '.$date.' '.$time.' '.$price;
	
			//1 2 2 14 2016-11-05 14:05:00 36
	
	
	$s="SELECT sum(seats_booked) as 'booked' FROM `screen` WHERE mid='$mid' and scn_no in(select scn_no from movie_tickets where date=curdate())";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error in booking the tickets';
	else{
		while($n=mysqli_fetch_assoc($q))
			$booked=$n['booked'];
		echo 'there are '.$booked.'seats booked for this show';
		
		
		$s="SELECT totalseats FROM `screen` WHERE mid='$mid' and scn_no='$scn_no'";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error in booking the tickets';
	else{
			while($n=mysqli_fetch_assoc($q))
			$total=$n['totalseats'];
		echo 'the total seats for this show are '.$total;
		
		if($booked>=$total)
		{
			header('Location: bookingunsuccessfull.php');
		}
	}
	
	
	
	/*$s="INSERT INTO `movie_tickets`(`mid`, `thid`, `cid`, `scn_no`, `date`, `time`,`price`) VALUES('$mid','$thid','$cid','$scn_no','$date','$time','$price')";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo 'error in booking the tickets';
	else
	{
		$tno=mysqli_insert_id($conn);
		echo 'booking successfull';
		$s="update screen set seats_booked=seats_booked+'$tickets' where scn_no='$scn_no'";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'error in updating seats booked';
		
		$s="update screen set seats_available=seats_available-'$tickets' where scn_no='$scn_no'";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'error in updating seats available';
	
	
	
	$s="INSERT INTO `schedule`(`cid`, `thid`, `scn_no`, `mid`, `tno`) VALUES ('$cid','$thid','$scn_no','$mid','$tno')";
		$q=mysqli_query($conn,$s);
		if(!$q)
			echo 'error in scheduling';
		else {echo 'the ticket has been recorded in schedules';
		//header ('Location: bookingsuccessfull.php');}
	}
*/		
}
}
?>