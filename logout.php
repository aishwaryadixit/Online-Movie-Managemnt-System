<?php

	echo 'inside logout';
session_start();
	session_destroy();
	header('Location: movie.php');

?>