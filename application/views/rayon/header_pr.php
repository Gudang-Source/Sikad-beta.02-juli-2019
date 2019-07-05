<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?php echo $title;?></title>
	<link rel="icon" href="<?=base_url()?>assets/images/logo/pmii.jpg">

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.gritter.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/select2.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker3.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-editable.min.css" />

	<!--end tmbah-->


	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	
	<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?=base_url();?>assets//css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?=base_url();?>assets//css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->
	<link rel="stylesheet" href="<?=base_url();?>assets//css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets//css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="<?=base_url();?>assets//css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?=base_url();?>assets//js/ace-extra.min.js"></script>

	
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="<?=base_url()?>dashboard" class="navbar-brand">
					<small>
						<img src="<?=base_url()?>assets/images/logo/pmii.jpg" class="img-reponsive" style="width:auto; height:30px; float: left; margin-right: 12px">
						PC PMII KOTA MALANG
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?=base_url();?>assets/images/logo/pmii.jpg" alt="Jason's Photo" />
							<span class="user-info">
								<small><?=$this->session->userdata('kode_rayon');?></small>
								<?=$this->session->userdata('nama_rayon');?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

							<li>
								<a href="<?=base_url()?>rayon/VeditProfil">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="<?=base_url()?>rayon/setting_akun">
									<i class="ace-icon fa fa-cogs"></i>
									Ubah Password
								</a>
							</li>
							
							<li>
								<a href="<?=base_url()?>rayon/profile">
									<i class="ace-icon fa fa-user"></i>
									<?php echo $this->session->userdata('nama_rayon');?>
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo site_url ('login/logout')?>">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>
			<style type="text/css">
				.badge, .label {
				    background-color: #1176B3;
				}    
			</style>
			<ul class="nav nav-list">

				<li class="active">
					<a href="<?=base_url()?>Rayon">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>

					<b class="arrow"></b>
				</li>
				
				<li>
					<a href="<?=base_url()?>rayon/profile">
						<i class="menu-icon fa fa-user-circle"></i>
						<span class="menu-text"> <?php echo $this->session->userdata('nama_rayon');?> </span>

					</a>
				</li>

				<li>
					<a href="<?=base_url()?>rayon/anggota_rayon" >
						<i class="menu-icon fa fa-users"></i>
						<span class="menu-text"> 
							Anggota 
							<?php 
								$session = $this->session->userdata('kode_rayon');
								$jml  = $this->model_menu->jmlkader_rayon($session);
								foreach ($jml->result() as $hit) {
									echo "<span class='badge'>"
											.$hit->jml.
										"</span>";
							}?>
						</span>

					</a>
				</li>

				<li>
					<a href="<?=base_url()?>rayon/tambah_data">
						<i class="menu-icon fa fa-plus-circle"></i>
						<span class="menu-text">Tambah Anggota</span>
					</a>
				</li>	

			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</div>

						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; Choose Skin</span>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
									<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
									<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
									<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
									<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
									<label class="lbl" for="ace-settings-add-container">
										Inside
										<b>.container</b>
									</label>
								</div>
							</div><!-- /.pull-left -->

							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
									<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
									<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
									<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
								</div>
							</div><!-- /.pull-left -->
						</div><!-- /.ace-settings-box -->
</div>



