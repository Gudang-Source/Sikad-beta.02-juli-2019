<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <meta name="description" content="Static &amp; Dynamic Tables" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="icon" href="<?=base_url();?>assets/images/logo/pmii.jpg">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.css" />
	<script src="<?=base_url();?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
  
  <style type="text/css">
  .navbar-default
  {
    background: #325bf1;
  }
  .navbar-default .navbar-nav > li > a, .navbar-default .navbar-text
  {
    color: white;
  }

  .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
    color: #f3f709;
  }

  .navbar-default .navbar-brand {
    color: white;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-default " role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url()?>member" alt="PMII">
      	<img src="<?=base_url()?>assets/images/logo/pc_pmii.jpg" class="img-responsive img-rounded" style="height:200%; margin-top:-10px">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?=base_url()?>member/profile" class="fa fa-user-circle"> Profile</a></li>
        <li><a href="<?=base_url()?>member/myconten" class="fa fa-send-o"> MyConten</a></li>
        <li><a href="<?=base_url()?>member/editprofile" class="fa fa-edit"> Edit Profile</a></li>
        <li><a href="<?=base_url()?>member/setting" class="fa fa-cogs"> Setting Akun</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="<?=base_url('login/logout')?>" class="glyphicon glyphicon-log-out"> LogOut </a>
        </li>
      </ul>
    </div>
  </div>
</nav>