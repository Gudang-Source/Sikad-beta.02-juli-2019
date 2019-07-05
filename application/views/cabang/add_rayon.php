<?php $this->load->view('cabang/header_cabang');?>

<h2 class="text-center"> <b>  FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> RAYON </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo isset($data)? form_open('cabang/update_rayon/', $class, array('kode_rayon'=>$data->kode_rayon)) : form_open('cabang/insert_data_rayon', $class);?>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

		<div class="col-sm-9">
			<input type="text" name="username" id="form-field-1" placeholder="username" class="col-xs-10 col-sm-5" required="" value="<?= isset($log)? $log->user:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

		<div class="col-sm-9">
			<input type="password" name="password" id="form-field-1-1" placeholder="password" class="form-control" required="" value="<?= isset($log)? $log->pass:'';?>" />
		</div>
	</div>

	<hr>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Rayon </label>

		<div class="col-sm-9">
			<input type="text" name="kode_rayon" id="form-field-1" placeholder="Kode Rayon" class="col-xs-10 col-sm-5" value="<?= isset($data)? $data->kode_rayon:'';?>" <?=isset($data)? 'readonly':'' ?>/>
		</div>
	</div>	
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Komisariat </label>

		<div class="col-sm-9">
			<?php echo "<select name='kode_kom' class='form-control' required><option value=''>Pilih KOM</option>";	
		foreach($kom as $d){	

			echo "<option value='".$d["kode_kom"]."'>".$d["nama_kom"]."</option>";
					    }
			echo "</select>";
					    ?>
			
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Rayon</label>

		<div class="col-sm-9">
			<input type="text" name="nama_rayon" id="form-field-1-1" placeholder="NAMA RAYON" class="form-control" required="" value="<?= isset($data)? $data->nama_rayon:'';?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fakultas</label>

		<div class="col-sm-9">
			<input type="text" name="fakultas" id="form-field-1-1" placeholder="Fakultas" class="form-control" required="" value="<?= isset($data)? $data->fakultas:'';?>" />
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