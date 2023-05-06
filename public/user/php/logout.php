<?php
	session_start();
	$str='<script>window.history.back();</script>';
	if (isset($_SESSION['usernamefilm'])) {
		unset ($_SESSION['usernamefilm']);
		unset ($_SESSION['iduserfilm']);
		unset ($_SESSION['accesslevel']);
		header ('location:../index.php');
	}
	else
		echo '<script>alert("Trang bạn chọn không đúng. Trở về trang trước đó!");window.history.back();</script>';
 ?>