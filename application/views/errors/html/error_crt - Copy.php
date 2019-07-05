<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>ERROR</title>
	<link rel="icon" href="http://nawaide.com/images/logo/pmii.jpg">
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="http://nawaide.com/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://nawaide.com/css/signin.css" />
	<link rel="stylesheet" href="http://nawaide.com//font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="http://nawaide.com/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<script type="text/javascript" src="http://nawaide.com/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://nawaide.com/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="containter page-header text-center">
		<img src="http://nawaide.com/images/logo/pc_pmii.jpg" class="img-responsive img-thumbnail">
		<br /><br />
		<h1>
			<a href="http://sima.pmiikotamalang.or.id/">
				<b class="fa fa-home"></b>
			</a>
		</h1>
		<br>
		<h1><?php echo $heading; ?></h1>
		<h2 class="red"><?php echo $message; ?></h2>
		<h1>karakter alamat gak usah gawe aneh aneh</h1>
		<h2>!@$$%*^*&(&))&&)%*%*$($)$$?><":{}[]</h2>
		
	</div>
	<div class="containter text-center">
		<button class="btn btn-danger " type="button" class="fa fa-key" onclick="history.back(-1)">
			<span class="fa fa-arrow-left"></span> Back
		</button>
	</div>
		
</body>
</html>
