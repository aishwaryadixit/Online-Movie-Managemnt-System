<?php

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"movie");

/*if($db)
	echo('database conn');
else
	echo('could not connect');*/
?>


<!DOCTYPE html>



<html>
<head>
	<title>Online Movie Tickets</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#collapse']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== ""){
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>
</head>
<body background="bg2.jpg" >
<style type="text/css">
.classic_button_info{ position: absolute; right: 700px; top:315px; }
.classic_button_book { position: absolute; right: 610px; top:315px; }
.classic_button_rating { position: absolute; right: 530px; top:315px; }

.classic_button_info1{ position: absolute; right: 450px; top:315px; }
.classic_button_book1 { position: absolute; right: 370px; top:315px; }
.classic_button_rating1 { position: absolute; right: 280px; top:315px; }

.classic_button_info2{ position: absolute; right: 200px; top:315px; }
.classic_button_book2 { position: absolute; right: 120px; top:315px; }
.classic_button_rating2 { position: absolute; right: 30px; top:315px; }

.classic_button_info3{ position: absolute; left:780px; top:315px; }
.classic_button_book3 { position: absolute; left: 850px; top:315px; }
.classic_button_rating3 { position: absolute; left:930px; top:315px; }

.classic_button_info4{ position: absolute; right: 700px; top:660px; }
.classic_button_book4 { position: absolute; right: 610px; top:660px; }
.classic_button_rating4 { position: absolute; right: 530px; top:660px; }

.classic_button_info5{ position: absolute; right: 450px; top:660px; }
.classic_button_book5 { position: absolute; right: 370px; top:660px; }
.classic_button_rating5 { position: absolute; right: 280px; top:660px; }

.classic_button_info6{ position: absolute; right: 190px; top:660px; }
.classic_button_book6 { position: absolute; right: 110px; top:660px; }
.classic_button_rating6 { position: absolute; right: 30px; top:660px; }

.classic_button_info7{ position: absolute; left:780px; top:660px; }
.classic_button_book7 { position: absolute; left: 860px; top:660px; }
.classic_button_rating7 { position: absolute; left:930px; top:660px; }

</style>
<style>
body{
	padding-top:20px;
	}
</style>

<nav class="navbar navbar-inverse navbar-fixed-top" id="navb">
<div class="container">
<div class ="navbar-header page-scroll">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
<!--<span class="glyphicon glyphicon-align-justify"></span>-->
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

</button>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse">

<!--<a target="_blank" href="#" class= "btn btn-warning navbar-btn navbar-right">Book</a>-->
<!--<a href="" class="navbar-brand">About</a>-->
<ul class="nav navbar-nav">

<li class=active ><a href="movie.php">HOME</a>
<li><a href="#gal">GALLERY</a>
<li><a href="#features">ABOUT</a>

<li class="dropdown">
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

<li><a href="#contactus">CONTACT US</a>
</ul>
</div>
</div>
</nav>
-
<div class="container">
<br>
<h2 align="center"><u>Online Movie Booking</u></h2>
<section>

<div class="page-header" id="gal">
<div class="carousel slide" id="slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#slide" data-slide-to="0" class="active"></li>
<li data-target="#slide" data-slide-to="1"></li>
<li data-target="#slide" data-slide-to="2" ></li>
<li data-target="#slide" data-slide-to="3" ></li>
</ol>
<div class="carousel-inner">
<!--First Image-->
<div class="item active">
<center>
<a href="https://www.google.com/search?q=Aliceposter"><img src="Aliceposter.jpg" alt="image not found"></a>
<!--<div class="carousel-caption">
<h3>Movie</h3>
</div>-->
</div>
<!--Second Image-->
<div class="item">
<center>
<a target="_blank" href="https://www.google.com/search?q=Fantastic+beasts"><img src="fantasticbeasts.jpeg" alt="image not found"></a><!-- "https://drive.google.com/uc?id=0B2hIeKDRMXKAeDZzMWk4WXUzUHc"--> 
</div>
<!--Third Image-->
<div class="item">
<center>
<a target="_blank" href="https://www.google.com/search?q=Peregrines"><img src="peregrinesposter.jpg" alt="image not found"></a>
</div>
<!--Fourth Image-->
<div class="item">
<center>
<a  target="_blank" href="https://www.google.com/search?q=10+Clover+Lane"><img src="10Cloverfield.jpg" alt="image not found"></a>
</div>
</div>	<!--End Carousel inner-->
<!-- Sliding arrows-->
<a href="#slide" class="right carousel-control" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
<a href="#slide" class="left carousel-control" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<!--End of arrows-->
</div>	<!-- End Carousel-->
</div>
</section>
</div>
	<div class="col-lg-2">
	<form action="watchtrailers.php" method="POST"><button ><img src="trailerbutton.jpg"></button></form><br><br>
	<form action="loginpage.php" method="POST"><button ><img src="bookbutton.jpg"></button></form>
	</div>
	<div class="col-lg-8">	
	<center>
    <video width="700" height="500" controls autoplay style="background-color:black;">
		<source src="trailers/Fantastic Beasts and Where to Find Them - Teaser Trailer [HD].mp4">
		
    </video>
	<br>
	</div>
	
<!--Search Bar-->	
<div class="container">
	
<div class="row">
<div class="col-lg-2">
<h3>Search Movie:</h3>
	<form action= "movie.php" method="post">
	<div class="form-group">
	<label for="Name">Name:</label>
		<input type="text" class="form control" name="name" placeholder="Enter Name"/>
	</div>
	<div class="form-group">
	<label for="genre">Genre:</label>
		<input type="text" class="form control" name="genre" placeholder="Enter Genre"/>
	</div>
	<div class="form-group">
	<label for="Format">Language :</label>
		<input type="text" class="form control" name="lang" placeholder="Enter Language"/>
	</div>
	<div class="form-group">
	<label for="Format">Format:</label>
		<input type="text" class="form control" name="format" placeholder="Enter Format"/>
	</div>
	
	<button type="submit" class="btn btn-warning">Search</button>
	</form>



	<?php

if(isset($_POST['name']) && !empty($_POST['name']))
{
	
	$name=$_POST['name'];
	echo '<b style="background-color:white;">'.$name.'<br>';
	
	$s="select description from movies where movie_name='$name'";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo ('No such movie found');
	else
	{
		if(mysqli_fetch_assoc($q)==null)
			echo ('This movie is not yet in the cinemas <br>');
	else{$q=mysqli_query($conn,$s);
		while($rows=mysqli_fetch_assoc($q))
		{
			
			$desc=$rows['description'];
			echo '<b style="background-color:white;">'.$desc."<br>";
		}
			
	}
	}
}
?>

<?php

if(isset($_POST['genre']) && !empty($_POST['genre']))
{
	
	$genre=$_POST['genre'];
	$s="select movie_name from movies where mid in (select mid from genre where genre='$genre')";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo ('No such genre matched');
	else
	{
		if(mysqli_fetch_assoc($q)==null)
			echo ('No such genre matched<br>');
	else{$q=mysqli_query($conn,$s);
		
		while($rows=mysqli_fetch_assoc($q))
		{
			
			$name=$rows['movie_name'];
			echo '<b style="background-color:white;">'.$name."<br>";
		}
	}
	}
}




if(isset($_POST['lang']) && !empty($_POST['lang']))
{
	$lang=$_POST['lang'];
	$s="select movie_name from movies where mid in (select mid from language where language='$lang')";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo ('No movies are currently<br> available in this language');
	else
	{
		if($rows=mysqli_fetch_assoc($q)==null)
			echo ('No movies are currently<br> available in this language<br>');
	else{$q=mysqli_query($conn,$s);
		while($rows=mysqli_fetch_assoc($q))
		{
			$name=$rows['movie_name'];
			echo '<b style="background-color:white;">'.$name."<br>";
		}
	}
		
	}
}

if(isset($_POST['format']) && !empty($_POST['format']))
{
	$format=$_POST['format'];
	$s="select movie_name from movies where mid in (select mid from format where format='$format')";
	$q=mysqli_query($conn,$s);
	if(!$q)
		echo ('No movies are currently<br> available in this format');
	else
	{
		if($rows=mysqli_fetch_assoc($q)==null)
			echo ('No movies are currently<br> available in this format<br>');
	else{$q=mysqli_query($conn,$s);
		while($rows=mysqli_fetch_assoc($q))
		{
			$name=$rows['movie_name'];
			echo '<b style="background-color:white;">'.$name."<br>";
		}
	}
	}
}


?>			

</div>

<!--Images-->		
<div class="col-lg-8">		
	
	<table>
	<tr style="background-color:black">
	<td colspan="3" >
	<div>
	<?php
	$s='select images from movies where movie_name="dunkirk"';
	$_SESSION['movie']='dunkirk';
	$q=mysqli_query($conn,$s);
	while($i=mysqli_fetch_assoc($q))
	{
		$images=$i['images'];
		echo '<img src="data:image/jpeg;base64,' . base64_encode($i['images']) . '" width="250" height="350"/>';
		//echo '<img src='.htmlentities($images).' width="240" height="350">';
	}
	?>
	<!--<img src="https://s-media-cache-ak0.pinimg.com/236x/61/cf/53/61cf534ab6e463ff575303cb85fffa8c.jpg" width="250" height="350">-->
	<a target="_blank" href="http://www.google.com/search?q=dunkirk">
	
	<button type="button" class="classic_button_info btn btn-primary btn-md" id="info_button" >Info</button></a>
	<!--<a class="classic_button_book btn btn-primary btn-md" href="booking.php">Book</a>-->
	<!--<button type="button" class="classic_button_rating btn btn-primary btn-md" id="rating_button" >Rating</button>-->
	
	<!--<input type ="button" class="classic_button_next btn btn-primary" id="next_button" value="Next"/>-->
	<!--<<input type ="button" class="classic_button_prev btn btn-primary" id="prev_button" value="Previous">-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<img src="http://www.weeklyviral.com/wp-content/uploads/2015/09/Top-Upcoming-Hollywood-Science-Fiction-Movies-e1443244435167.jpg " width="260" height="350" >
	<a target="_blank" href="http://www.google.com/search?q=Avataar"><button type="button" class="classic_button_info1 btn btn-primary btn-md" id="info_button1" >Info</button></a>
	<!--<button type="button" id="btn1" class="classic_button_rating1 btn btn-primary btn-md"> Rating</button>-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<?php
	$s='select images from movies where movie_name="Miss Peregrines"';
	$_SESSION['movie']='Miss Peregrines';
	$q=mysqli_query($conn,$s);
	while($i=mysqli_fetch_assoc($q))
	{
		$images=$i['images'];
		echo '<img src="data:image/jpeg;base64,' . base64_encode($i['images']) . '" width="250" height="350"/>';
		
	}
	?>
	<!--<img src="https://upload.wikimedia.org/wikipedia/en/7/74/Miss_Peregrine_Film_Poster.jpg" width="250" height="350">-->
	<a target="_blank" href="http://www.google.com/search?q=Peregrines"><button type="button" class="classic_button_info2 btn btn-primary btn-md" id="info_button2" >Info</button></a>
	<!--<button type="button" class="classic_button_book2 btn btn-primary btn-md" id="book_button2" >Book</button>-->
	<!--<button type="button" class="classic_button_rating2 btn btn-primary btn-md" id="rating_button2" >Rating</button>-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<img src="http://movies.upcomingdate.com/wp-content/uploads/2016/01/Fillam-Poster1.jpg" width="250" height="350">
	
	<a target="_blank" href="http://www.google.com/search?q=Fillah"><button type="button" class="classic_button_info3 btn btn-primary btn-md"  id="info_button3" >Info</button></a>
	<!--<button type="button" class="classic_button_rating3 btn btn-primary btn-md" id="rating_button3" >Rating</button>-->
	</div>
	</td>
	</tr> 
	<!--End of row-->
	<tr style="background-color:black">
	<td colspan="3" >
	<div>
	<?php
	$s='select images from movies where movie_name="sully"';
	$_SESSION['movie']='sully';
	$q=mysqli_query($conn,$s);
	while($i=mysqli_fetch_assoc($q))
	{
		$images=$i['images'];
		echo '<img src="data:image/jpeg;base64,' . base64_encode($i['images']) . '" width="250" height="350"/>';
		//echo '<img src='.htmlentities($images).' width="240" height="350">';
	}
	?>
	<a target="_blank" href="http://www.google.com/search?q=Sully"><button type="button" class="classic_button_info4 btn btn-primary btn-md" id="info_button4" >Info</button></a>
	<!--<button type="button" class="classic_button_book4 btn btn-primary btn-md" id="book_button4" >Book</button>-->
	<!--<button type="button" class="classic_button_rating4 btn btn-primary btn-md" id="rating_button4" >Rating</button>-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<img src="https://pbs.twimg.com/media/ChxtDHGUoAEv2LA.jpg" width="250" height="350" >
	<a target="_blank" href="http://www.google.com/search?q=Inferno"><button type="button" class="classic_button_info5 btn btn-primary btn-md" id="info_button5">Info</button></a>
	<!--<button type="button" class="classic_button_rating5 btn btn-primary btn-md" id="rating_button5" >Rating</button>-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<img src="http://movies.upcomingdate.com/wp-content/uploads/2016/06/Justice-League-Poster.jpg" width="250" height="350">
	<a target="_blank" href="http://www.google.com/search?q=Justice+League"><button type="button" class="classic_button_info6 btn btn-primary btn-md" id="info_button6" >Info</button></a>
	<!--<button type="button" class="classic_button_rating6 btn btn-primary btn-md" id="rating_button6" >Rating</button>-->
	</div>
	</td>
	<td colspan="3">
	<div>
	<?php
	$s='select images from movies where movie_name="Fantastic Beasts"';
	$_SESSION['movie']='Fantastic Beasts';
	$q=mysqli_query($conn,$s);
	while($i=mysqli_fetch_assoc($q))
	{
		$images=$i['images'];
		echo '<img src="data:image/jpeg;base64,' . base64_encode($i['images']) . '" width="250" height="350"/>';
		//echo '<img src='.htmlentities($images).' width="240" height="350">';
	}
	?>
	<a target="_blank" href="http://www.google.com/search?q=Fantastic+Beasts"><button type="button" class="classic_button_info7 btn btn-primary btn-md" id="info_button7" >Info</button></a>
	<!--<button type="button" class="classic_button_book7 btn btn-primary btn-md" id="book_button7" >Book</button>-->
	<!--<button type="button" class="classic_button_rating7 btn btn-primary btn-md" id="rating_button7" >Rating-->
	</button>
	</div>
	</td>
	</tr> <!--End of second row"-->
</table><!--End of Table-->
</div><!--End of Second main col-->
</div>
</div>


<br>
<br>
<!--Features-->
<div class="container text-center" >
<div class="page-header" id="features">
<section>
<h2><b><u>Features</u></b></h2>
<hr>
<div class="row">
<div class="col-lg-4">
<div class = "panel panel-primary text-center">
<div class="panel-heading"><h3><strong>Convenient...</strong></h3></div>
<div class="panel-body">
<p align="left">The Interface offers an amazing interface to book,cancel,check avaliability your movie tickets on-the-go</p>
<span class="glyphicon glyphicon-ok"></span>
</div>
</div>
</div>	<!--End of Column-->
<div class="col-lg-4">
<div class = "panel panel-primary text-center">
<div class="panel-heading"><h3><strong>Stay with the world...</strong></h3></div>
<div class="panel-body">
<p align="left">Website gets updated whenever a new movie is released. Now you can watch your latest movie without any worries</p>
<span class="glyphicon glyphicon-ok"></span>
</div>
</div>
</div>	<!--End of Column-->
<div class="col-lg-4">
<div class = "panel panel-primary text-center">
<div class="panel-heading"><h3><strong>Affordable…</strong></h3></div>
<div class="panel-body">
<p align="left">Special discounts are available to regular customers and VIP’s. So everything goes in your budget..</p>
<span class="glyphicon glyphicon-ok"></span>
</div>
</div>
</div>	<!--End of Column-->
</div>	<!--End of Row-->
</section>
</div>
</div> 	<!--End of container-->

<!--Contact Us-->
<div class="container">
<section>
<div class="page-header" id="contactus">
<h2 align="center"><u>Contact us</u></h2>
</div>
<div class="row">
<div class="col-lg-4">
<p>Email us or send us a message:</p>
<address>
<strong>Aayush Pant</strong><br>
ayush.pant@sitpune.edu.in<br>
<strong>Aishwarya Dixit</strong><br>
aishwarya.dixit@sitpune.edu.in
</address>
</div>
<div class="col-lg-8">


<form class="form-horizontal" action="movie.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-lg-2" for="user-message" name="message">Message:</label>
  <div class="col-lg-10">
  <textarea name="message" id="user-message" class="form-control"  placeholder="Enter your feedback" col="20" rows="10" >
	</textarea>
	</div>
	</div>
	<div class="form-group">
	<div class="col-lg-10 col-lg-offset-2">
	<button type="submit" class="btn btn-primary">Submit</button>
	</div>
  </form>
  
  <?php
  if(isset($_POST['message']) && !empty($_POST['message']))
{
	$name=$_POST['name'];
	$message=$_POST['message'];
	
	$s="insert into feedback values ('$name','$message')";
	$q=mysqli_query($conn,$s);
	
}
  ?>
</div>
</div>
</section>
</div>
<hr>
<hr>
<footer>
<!--Visit Count-->
<div align=center><font color="#FF7449" size="3"><i><b> Visit Count:</b></i></font><img src='http://www.counter12.com/img-3C775xYY-13.gif' border='0' alt='free web counter'></a><script type='text/javascript' src='http://www.counter12.com/ad.js?id=3C775xYY'></script></div>

<br>
<div class="container text-center">
 <ul class="list-inline">
 <li><a  target="_blank" href="http://www.facebook.com">Facebook</a></li>
 <li><a  target="_blank" href="http://www.twitter.com">Twitter</a></li>
 <li><a  target="_blank" href="http://www.youtube.com">Youtube</a></li>
 </ul>
 &copy;Copyright @2016
 </div>
</footer> 
</body>
</html>

