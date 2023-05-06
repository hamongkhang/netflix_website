<?php
		include 'connect.php';
		$username=$_POST['username'];
		$password=$_POST['password'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$sql="SELECT * FROM users WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
		if ($row=mysqli_fetch_array($result)) {
			echo '<script language="javascript">alert("Tên tài khoản đã tồn tại! Đăng ký thất bại! Trở về trang chủ!");</script>';
		}
		else
		{
			$sql="INSERT INTO users (username,password,name,email,accesslevel) VALUES ('$username','$password','$name','$email', 0)";
		$result=mysqli_query($conn,$sql);
		echo '<script language="javascript">alert("Đăng ký tài khoản thành công! Trở về trang chủ!");</script>';
		}
 ?>