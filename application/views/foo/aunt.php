<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title><?=$title?></title>
	<link rel="icon" href="<?=base_url()?>assets/images/logo/nawa.jpg">
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/signin.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

</head>
<body >

	<div class="container ">
		<p class="text-center">
			<img src="<?=base_url()?>assets/images/logo/nawa.jpg" class="img-responsive img-thumbnail" style="height:200px; width:auto;">	
		</p>
		<?php echo $this->session->flashdata('msg'); ?>
	</div>
	<div class="container">

		<?php echo form_open ('foo/foo_aunt', "class='form-signin '")?>
			<h2 class="form-signin-heading" style="color: black;  font-weight: bold;"><i> <?=$title;?> </i><span class="fa fa-coffee green"></span></h2> 
			<input type="text" class="form-control" name="username" placeholder="Masukkan User name" required autofocus >
			<input type="password" class="form-control" name="password" placeholder="masukkan password" required>

			<button type="submit" class="btn btn-primary btn-block" name="login"> <span class="fa fa-unlock"></span> Login</button>
			
			
		<?php echo form_close()?>
    </div>

</body>
</html>
