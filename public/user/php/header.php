<?php
	@session_start();
	include 'php/facebookChat.php';
	require 'login.php';
	$accesslevel=getaccesslevel();
	$_SESSION['accesslevel']=$accesslevel;
	if(isset($_POST['signup']))
	{
		include 'signup.php';
	}
	/************** Load Categories begin ***************/
	$sql="SELECT * FROM categories";
	$resultCate=mysqli_query($conn,$sql);
	/************** Load Categories end ***************/
	/************** Load Nation begin ***************/
	$sql="SELECT * FROM nations";
	$resultNation=mysqli_query($conn,$sql);
	/************** Load Nation end ***************/
	/************** Load year begin ***************/
	$sql="SELECT * FROM years ORDER BY idyear DESC";
	$resultYear=mysqli_query($conn,$sql);
	/************** Load year end ***************/
	@$iduserfilm=$_SESSION['iduserfilm'];
	$sql="SELECT * FROM moviecabinet WHERE iduser='$iduserfilm'";
	$resultCabinet=mysqli_query($conn,$sql);
	$rowCabinet=mysqli_num_rows($resultCabinet);
 ?>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="w3layouts_logo">
						<a href="index.php"><h1>Min<span>Movies</span></h1></a>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="w3_search">
						<form action="search.php" method="post">
							<input type="text" name="search" placeholder="Tìm kiếm" required="">
							<input type="submit" value="Tìm">
						</form>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<?php
				if(@$_SESSION['usernamefilm']=='')
				{ ?>
					<div class="w3l_sign_in_register">
						<ul>
							<li><img src="images/hello.gif" style="padding-right: 10px; width: 50px;"><a href="#" data-toggle="modal" data-target="#myModal">Đăng Nhập</a></li>
						</ul>
					</div>
					<?php
				}
				else
					if($accesslevel==0)
					{ ?>
					<div>
                	<ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4><img src="/web/images/hi.gif" style="padding-right: 10px;">Chào <?php echo $_SESSION['namefilm']?></h4> <b class="caret"></b></a>
                        <ul class="dropdown-menu pull-center">
                            <li class="loggedin"><a href="moviecabinet.php?iduser=<?=$iduserfilm?>"><img src="images/cabinet.png">Tủ Phim <?php echo "($rowCabinet)"; ?></a></li>
                            <li class="loggedin"><a href="profile.php"><img src="images/profile.png">Hồ Sơ</a></li>
                            <li class="divider"></li>
                            <li class="loggedin"><a href="php/logout.php"><img src="images/logout.jpg">Đăng Xuất</a></li>
                        </ul>
                    </li>
                </ul>
              </div><?php
					}
					else if($accesslevel==1)
					{ ?>
					<div style="margin-top="1em";">
                	<ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><h4><img src="images/hi.gif" style="padding-right: 10px;">Chào <?php echo $_SESSION['namefilm'].' ';?><img src="images/vip.gif"></h4> <b class="caret"></b></a>
                        <ul class="dropdown-menu pull-center">
                            <li class="loggedin"><a href="moviecabinet.php?iduser=<?=$iduserfilm?>"><img src="images/cabinet.png">Tủ Phim <?php echo "($rowCabinet)"; ?></a></li>
                            <li class="loggedin"><a href="profile.php"><img src="images/profile.png">Hồ Sơ</a></li>
                            <li class="loggedin"><a href="adminHome.php"><img src="images/admin.png">Quản Trị</a></li>
                            <li class="divider"></li>
                            <li class="loggedin"><a href="php/logout.php"><img src="images/logout.jpg">Đăng Xuất</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
				<?php } ?>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Đăng Nhập & Đăng Ký
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Đăng ký ngay!</div>
							  </div>
							  <div class="form">
								<h3>Đăng Nhập</h3>
								<form action="php/login.php" method="post">
								  <input type="text" name="username" placeholder="Tài khoản" required="">
								  <input type="password" name="password" placeholder="Mật khẩu" required="">
								  <input type="submit" value="Đăng nhập" name="login">
								</form>
							  </div>
							  <div class="form">
								<h3>Đăng Ký Tài Khoản</h3>
								<form action="#" method="post">
								  <input type="text" name="username" placeholder="Tài khoản" required="">
								  <input type="password" name="password" placeholder="Mật khẩu" required="">
								  <input type="text" name="name" placeholder="Họ và tên" required="">
								  <input type="email" name="email" placeholder="Email" required="">
								  <input type="submit" value="Đăng ký" name="signup">
								</form>
							  </div>
							  <div ><a class="cta btn-block" href="recoverPassword.php">Quên mật khẩu?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">thể loại <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-2">
									<li>
									<?php while ($rowCate=mysqli_fetch_array($resultCate)) {
					 					$idcate = $rowCate["idcate"];
									?>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<li><a href="category.php?idcate=<?=$idcate?>"><?php echo $rowCate['catename']; ?></a></li>
										</ul>
									</div>
									<?php } ?>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">quốc gia<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
										<?php while ($rowNation=mysqli_fetch_array($resultNation)) {
					 						$idnation = $rowNation["idnation"];
										?>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="nation.php?idnation=<?=$idnation?>"><?php echo $rowNation['nationname']; ?></a></li>
											</ul>
										</div>
										<?php } ?>
										<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">năm sản xuất<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
										<?php while ($rowYear=mysqli_fetch_array($resultYear)){
											$idyear=$rowYear["idyear"];
										 ?>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="year.php?idyear=<?=$idyear?>"><?php echo $rowYear['year']; ?></a></li>
											</ul>
										</div>
										<?php } ?>
										<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="movielist.php">danh sách phim</a></li>
							<li><a href="movietrailer.php">series phim</a></li>
							<li><a href="introduce.php">giới thiệu</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
<!-- //nav -->