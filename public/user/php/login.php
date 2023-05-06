<?php
	@session_start();
	 if(isset($_POST['login']))
	 {
	 	include 'connect.php';
	 	$username=isset($_POST['username'])?$_POST['username']:'';
	 	$password=isset($_POST['password'])?$_POST['password']:'';
	 	$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
	 	$result=mysqli_query($conn,$sql);
	 	if(mysqli_num_rows($result))
	    {
	    	while ($row=mysqli_fetch_assoc($result))
	    	{
	    		$namefilm=$row['name'];
	    		$iduserfilm=$row['iduser'];
	    	}
	    	$_SESSION['usernamefilm']=$username;
	    	$_SESSION['namefilm']=$namefilm;
	    	$_SESSION['iduserfilm']=$iduserfilm;
	 		header('Location:../index.php');
	    }
	 	else
	 		{
	 			unset ($_SESSION['usernamefilm']);
	 			$_SESSION['state']= '<script language="javascript">alert("Đăng nhập thất bại! Sai tài khoản hoặc mật khẩu! Trở về trang chủ!");</script>';
	 			header('location:../index.php');
			}
	 }
	 function getaccesslevel()
		{
			include 'connect.php';
			@$user=$_SESSION['usernamefilm'];
			$sqlaccesslevel="SELECT accesslevel FROM users WHERE username='$user'";
			$query=mysqli_query($conn,$sqlaccesslevel);
			while ($row=mysqli_fetch_assoc($query))
			{
				$resultaccesslevel=$row['accesslevel'];
			}
			return @$resultaccesslevel;
		}
 ?>