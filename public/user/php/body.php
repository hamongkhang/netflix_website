<?php
	/************** Load hot movies begin ***************/
	$sql="SELECT * FROM movies ORDER BY idmovie DESC LIMIT 24";
	$result=mysqli_query($conn,$sql);
	/************** Load hot movies end ***************/
	/************** Load random movies begin ***************/
	$sql="SELECT * FROM movies ORDER BY rand() LIMIT 24";
	$resultRand=mysqli_query($conn,$sql);
	/************** Load random movies end ***************/
	/************** Load category browse random movies begin ***************/
	$sql="SELECT * FROM categories";
	$resultCateRand=mysqli_query($conn,$sql);
	/************** Load category browse random movies end ***************/
 ?>
<!-- general -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">danh mục phim</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Phim Hot Mới</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Phim Ngẫu Nhiên</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies text-center">
							<?php while ($row=mysqli_fetch_array($result)) {
							 	$idmovie = 	$row["idmovie"];
							?>
							<div class="col-md-2 w3l-movie-gride-agile float-right">
								<a href="moviedetail.php?idmovie=<?=$idmovie?>" title="<?php echo $row['viename']; ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo $row["image"] ?>" title="<?php echo $row['viename']; ?>" class="img-responsive" alt=" " />
									<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a class="mid-1" href="moviedetail.php?idmovie=<?=$idmovie?>" title="<?php echo $row['viename']; ?>"><?php echo $row['viename']; ?></a></h6>
									</div>
									<div class="mid-2 agile_mid_2_home">
										<p>
											<?php
												echo $row['year'];
											?>
										</p>
										<div class="block-stars">
											<ul class="w3l-ratings">
												<p><?php echo $row['time'] ?></p>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben">
									<p><?php echo $row['quality'] ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
						<?php while ($rowRand=mysqli_fetch_array($resultRand)) {
							 $idmovie = 	$rowRand["idmovie"];
						?>
						<div class="col-md-2 w3l-movie-gride-agile">
							<a href="moviedetail.php?idmovie=<?=$idmovie?>" title="<?php echo $rowRand['viename']; ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo $rowRand["image"] ?>" title="<?php echo $rowRand['viename']; ?>" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="moviedetail.php?idmovie=<?=$idmovie?>"title="<?php echo $rowRand['viename']; ?>"><?php echo $rowRand['viename']; ?></a></h6>
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>
										<?php
											echo $rowRand['year'];
										?>
									</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<p><?php echo $rowRand['time'] ?></p>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p><?php echo $rowRand['quality'] ?></p>
							</div>
						</div>
						<?php } ?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //general -->
