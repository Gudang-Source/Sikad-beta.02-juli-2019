<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>WELCOME</title>
	<link rel="icon" href="<?=base_url()?>assets/images/logo/pmii.jpg">

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/signin.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets//font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container ">
		<p class="text-center">
			<img src="<?=base_url()?>assets/images/logo/pc_pmii.jpg" class="img-responsive img-thumbnail">	
		</p>
		<?php echo $this->session->flashdata('msg'); ?>
	</div>
	<div class="container text-center">
		<div class="row">
			<div class="col-md-12">
				<form class="form-signin">
					<h2 class="form-signin-heading"><span class="fa fa-coffee green"></span> MILIH SAM/KABM</h2> 
					<?=anchor('dashboard/pc', 'CABANG',  "class='btn btn-primary btn-lg btn-block'");?>
					<?=anchor('dashboard/pk', 'KOMISARIAT',  "class='btn btn-info btn-lg btn-block'");?>
					<?=anchor('dashboard/pr', 'RAYON',  "class='btn btn-success btn-lg btn-block'");?>
					<?=anchor('dashboard/member', 'ANGGOTA',  "class='btn btn-danger btn-lg btn-block'");?>
					
				</form>
				<?=form_open('login/check_auth')?>
				<div class="col-md-3">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="login" class="btn btn-success">Login</button>
					</div>	
				</div>	
				</form>
			</div>
		</div>

			
	</div>

	<div class="modal fade" id="myModal">
	  <div class="modal-dialog text-center">
	    <div class='alert alert-success'>
	    	<h3 class='form-signin-heading'>
	    	<b>SELAMAT DATANG DAN SELAMAT MENIKMATI</b> <br/>
	    	<br/>
	    	<u>SILAHKAN MASUK SESUAI KAMAR</u>
	    	</h3>
	    </div>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Close</button>
	  </div>
	</div>
	<script type="text/javascript">
		$('#myModal').modal('show');
	</script>
</body>
</html>
