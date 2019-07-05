<?php $this->load->view('komisariat/header_kom');?>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker3.css">
<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<h2 class="text-center"> <b>  FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> PROFILE </b> <hr /> </h2>
<h3 class="text-center"><?= isset($data)? $data[0]['nama_kom']:'';?> <small><?= isset($data)? $data[0]['kode_kom']:'';?></small></h3>

<?php $class = "class = 'form-horizontal'";
echo form_open('komisariat/proses_setting_akun/', $class, array('id_kom'=>$data[0]['id_kom'])) ;?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> </label>

		<div class="col-sm-9">
			<input type="username" name="username" id="form-field-1-1" placeholder="username" class="form-control" required="" value="<?=$data[0]['username']?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ubah Password</label>

		<div class="col-sm-9">
			<input type="password" name="password" id="form-field-1-1" placeholder="password" class="form-control" required="" value="" />
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-3 text-right">
			<button type="button" class="btn btn-warning" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
		</div>

		<div class="col-sm-9">
			<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-repeat"></span> Reset</button>
			<button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save </button>

		</div>
	</div>

</form>	
<?php $this->load->view('komisariat/footer_kom');?>