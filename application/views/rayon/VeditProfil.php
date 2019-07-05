<?php $this->load->view('rayon/header_pr');?>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker3.css">
<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<h2 class="text-center"> <b>  FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> PROFILE </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo form_open('rayon/update_profile/', $class, array('id_rayon'=>$data[0]['id_rayon'])) ;?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Bediri </label>

		<div class="col-sm-9">
			<div class="input-group date col-xs-6 col-sm-3" data-provide="datepicker">
				<input type="text" class="form-control" name="since" value="<?= isset($data)? $data[0]['since']:'';?>">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Rayon</label>

		<div class="col-sm-9">
			<input type="text" name="nama_rayon" id="form-field-1-1"  class="form-control" required="" value="<?= isset($data)? $data[0]['nama_rayon']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fakultas</label>

		<div class="col-sm-9">
			<input type="text" name="fakultas" id="form-field-1-1"  class="form-control" required="" value="<?= isset($data)? $data[0]['fakultas']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NO TLP</label>

		<div class="col-sm-9">
			<input type="number" name="no_telp" id="form-field-1-1"  class="form-control" required="" value="<?= isset($data)? $data[0]['no_telp']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> ALAMAT</label>

		<div class="col-sm-9">
			<textarea class="form-control" name="alamat" required rows="5">
				<?= isset($data)? $data[0]['alamat']:'';?>
			</textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email</label>

		<div class="col-sm-9">
			<input type="email" name="email" id="form-field-1-1"  class="form-control" required="" value="<?= isset($data)? $data[0]['email']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Website</label>

		<div class="col-sm-9">
			<input type="text" name="website" id="form-field-1-1"  class="form-control"  value="<?= isset($data)? $data[0]['website']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> FACEBOOK</label>

		<div class="col-sm-9">
			<input type="text" name="fb" id="form-field-1-1"  class="form-control"  value="<?= isset($data)? $data[0]['fb']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> INSTAGRAM</label>

		<div class="col-sm-9">
			<input type="text" name="ig" id="form-field-1-1"  class="form-control"  value="<?= isset($data)? $data[0]['ig']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TWITTER</label>

		<div class="col-sm-9">
			<input type="text" name="tw" id="form-field-1-1"  class="form-control"  value="<?= isset($data)? $data[0]['tw']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Media Lain</label>

		<div class="col-sm-9">
			<input type="text" name="media" id="form-field-1-1"  class="form-control"  value="<?= isset($data)? $data[0]['media']:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tentang Rayon</label>

		<div class="col-sm-9">
			<textarea class="form-control" name="ket" required rows="10">
				<?= isset($data)? $data[0]['ket']:'';?>
			</textarea>
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
<?php $this->load->view('rayon/footer_pr');?>