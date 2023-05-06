<?php
	include 'connect.php';
	/************** Load slide begin ***************/
	$sql="SELECT * FROM movies ORDER BY rand() LIMIT 10";
	$result=mysqli_query($conn,$sql);
	/************** Load slide end ***************/
 ?>
<!-- banner-bottom -->
	<div class="banner-bottom">
		<h4 class="latest-text w3_latest_text pt-5">phim mới đề cử</h4>
		<div class="container text-center">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
					<?php while ($row=mysqli_fetch_array($result)) {
					 	$idmovie = 	$row["idmovie"];
					?>
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="moviedetail.php?idmovie=<?=$idmovie?>" title="<?php echo $row['viename']; ?>" class="hvr-shutter-out-horizontal">
								<img src="<?php echo $row["image"] ?>" title="<?php echo $row['viename']; ?>" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<a href="moviedetail.php?idmovie=<?=$idmovie?>" title="<?php echo $row['viename']; ?>"><?php echo $row['viename']; ?></a>
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
							<div class="ribbennew">
								<p><img src="images/new.gif"></p>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>