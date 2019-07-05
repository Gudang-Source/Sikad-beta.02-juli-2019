<?php $this->load->view('cabang/header_cabang');?>

<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> ADMIN </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo isset($data)? form_open('cabang/update_admin', $class, array('kode' =>$data[0]['user_name'])) : form_open('cabang/insert_admin', $class);?>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

		<div class="col-sm-9">
			<input type="email" name="email" id="form-field-1" placeholder="example@gaml.com" class="form-control" required="" value="<?= isset($data)? $data[0]['email']:'';?>" <?=isset($data)? "readonly":"" ?>/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

		<div class="col-sm-9">
			
			<input type="text" name="user_name" id="form-field-1" placeholder="Nick Name or anything" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['user_name']:'';?>" <?=isset($data)? "readonly":"" ?>/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

		<div class="col-sm-9">
			<input type="password" name="pass" id="form-field-1-1" placeholder="password" class="form-control" required="" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Divisi</label>

		<div class="col-sm-9">
			<input type="text" name="divisi" id="form-field-1-1" placeholder="Ketua" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['divisi']:'';?>"/>
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
<?php $this->load->view('cabang/footer_cabang');?>