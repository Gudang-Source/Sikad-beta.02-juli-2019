<?php $this->load->view('rayon/header_pr');?>				

<div class="row">
	<div class="col-xs-12">
		<div>
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Profile
							</a>
						</li>

					</ul>
<?php foreach($data as $d){ ?>
					<div class="tab-content no-border padding-24">
						<div id="home" class="tab-pane in active">

							<div class="row">
								<div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?=base_url();?>assets/images/logo/pmii.jpg" />
									</span>

									<div class="space space-4"></div>
								</div><!-- /.col -->
							
								<div class="col-xs-12 col-sm-9">
									<h4 class="blue">
										<span class="middle">Profile <?=$d['nama_rayon']?></span>

									</h4>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> NAMA Rayon</div>
												
											<div class="profile-info-value">
												<i class="fa fa-user-circle"></i>
												
												<span><?=$d['nama_rayon']?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Berdiri  </div>
												
											<div class="profile-info-value">
												<i class="fa fa-calendar light-blue bigger-110"></i>
												
												<span><?=date("D F-Y", strtotime($d['since']));?></span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Umur </div>
												
											<div class="profile-info-value">
												<i class=" light-blue bigger-110"></i>
												
												<span><?php $birth = new DateTime($d['since']);
													$today = new DateTime('today');
													$y = $today->diff($birth)->y;
													echo $y. " Tahun";
													?>
												</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Fakultas </div>

											<div class="profile-info-value">
												<i class="fa fa-university"></i>
												<span><?=$d['fakultas']?></span>
												
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Alamat </div>

											<div class="profile-info-value">
												<i class="fa fa-map-marker light-orange bigger-110"></i>
												<span><?=$d['alamat']?></span>
												
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> NO TLPN </div>

											<div class="profile-info-value">
												<i class="fa fa-phone light-orange bigger-110"></i>
												<?=$d['no_telp']?>
												
											</div>
										</div>

									</div>

									<div class="hr hr-8 dotted"></div>

									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Website </div>

											<div class="profile-info-value">
												<a href="#" target="_blank">
													<i class="fa fa-globe "></i>
													<?=$d['website']?>
												</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>

											<div class="profile-info-value">
												<a href="#" target="_blank">
													<i class="fa fa-envelope"></i>
													<?=$d['email']?>
												</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
											</div>

											<div class="profile-info-value" >
												<a href="<?=$d['fb'];?>" target="_blank" style="color:black;">
													<?=$d['fb'];?>
												</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
											</div>

											<div class="profile-info-value">
												<a href="<?=$d['tw']?>" target="_blank">
													<?=$d['tw']?>
												</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name">
												<i class="middle ace-icon fa fa-instagram bigger-150 light-red"></i>
											</div>

											<div class="profile-info-value">
												<a href="<?=$d['ig']?>" target="_blank">
													<?=$d['ig']?>
												</a>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> MEDIA LAIN</div>

											<div class="profile-info-value">
												<i class="fa fa-user light-blue bigger-110"></i>
												<span><?=$d['media']?></span>
											</div>
										</div>
									</div>
								</div><!-- /.col -->

							</div><!-- /.row -->
							
							<div class="space-20"></div>

							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-small">
											<h4 class="widget-title smaller">
												<i class="ace-icon fa fa-check-square-o bigger-110"></i>
												Little About Me
											</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main">
												<p><?=$d['ket']?>
												</p>
											</div>
										</div>
									</div>
								</div>

								<!--<div class="col-xs-12 col-sm-6">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-small header-color-blue2">
											<h4 class="widget-title smaller">
												<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
												My Experiens
											</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-16">
												<div class="clearfix">
													<div class="col-xs-12 col-sm-6 left">
														<h3>Organization</h3>
														<div class="space-2"></div>
														<ul>
															<li><?=$d['organisasi']?></li>
														</ul>
														
													</div>

													<div class="col-xs-12 col-sm-6 left">
														<h3>Bakat</h3>
														<div class="space-2"></div>
														<p><?=$d['bakat']?></p>
													</div>
												</div>

												<div class="hr hr-16"></div>

												<div class="clearfix">
													<div class="col-xs-12 col-sm-6 left">
														<h3>Minat</h3>
														<div class="space-2"></div>
														<p><?=$d['minat']?></p>
													</div>

													<div class="col-xs-12 col-sm-6 left">
														<h3>MOTTO</h3>
														<div class="space-2"></div>
														<p><?=$d['motto']?></p>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>-->
							</div>
						</div><!-- /#home -->

						
					</div>
<?php }?>											
				</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
			

<?php $this->load->view('rayon/footer_pr');?>