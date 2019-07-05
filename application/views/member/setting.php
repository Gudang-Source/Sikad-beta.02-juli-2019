<?php $this->load->view('member/header');?>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker3.css">
<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<div class="container">
<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> AKUN </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo isset($data)? form_open('member/prosessetting', $class, array('id'=>$data[0]['id'])) : form_open('#', $class);?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Akun </label>

		<div class="col-xs-12 col-sm-5">
			
			<input type="text" name="username" id="form-field-1" class="form-control" readonly="" value="<?= isset($data)? $data[0]['username']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

		<div class="col-xs-12 col-sm-5">
			<input type="password" name="password" id="form-field-1-1" ="password" class="form-control" required="" />
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
</div>

<?php $this->load->view('member/footer')?>