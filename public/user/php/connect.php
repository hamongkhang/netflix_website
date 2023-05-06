<?php
	global $conn;
	$conn=mysqli_connect('localhost','root','','minmovie');
	//$conn=mysqli_connect('fdb22.awardspace.net','3173347_minmovies','3173347_minmovies','3173347_minmovies');
	mysqli_set_charset($conn,'utf8');
 ?>