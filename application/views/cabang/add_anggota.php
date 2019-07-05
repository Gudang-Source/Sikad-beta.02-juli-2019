<?php $this->load->view('cabang/header_cabang');?>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker3.css">
<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> DATA KADER </b>  </h2>
<h2 class="text-center" style="text-transform: uppercase"><?= isset($data)? $data[0]['username']:'';?> <hr /></h2>
<?php $class = "class = 'form-horizontal'";
echo isset($data)? form_open('cabang/prosesedit_anggota/', $class, array('id'=>$data[0]['id'])) : form_open('cabang/prosestambah_anggota', $class);?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Unic </label>

		<div class="col-sm-9">
			
			<input type="text" name="kode" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="Kode Unic" required="" value="<?= isset($data)? $data[0]['kode']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>

		<div class="col-sm-9">
			
			<input type="text" name="nama" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="Nama" required="" value="<?= isset($data)? $data[0]['nama']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Komisariat </label>

		<div class="col-sm-9">
			<?php echo "<select multiple name='kode_kom' class='col-xs-10 col-sm-5' required>";	
			foreach ($kom as $key) {

			echo "<option value='".$key['kode_kom']."'>".$key['nama_kom']."</option>";
					    }
			echo "</select>";
					    ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kampus </label>

		<div class="col-sm-9">
			<?php echo "<select multiple name='kampus' class='col-xs-10 col-sm-5' required>";	
			foreach ($kom as $key) {

			echo "<option value='".$key['kampus']."'>".$key['kampus']."</option>";
					    }
			echo "</select>";
					    ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rayon </label>

		<div class="col-sm-9">
			<?php echo "<select multiple name='kode_rayon' class='col-xs-10 col-sm-5' >";	
			foreach ($rayon as $key) {

			echo "<option value='".$key['kode_rayon']."'>".$key['nama_rayon']."</option>";
					    }
			echo "</select>";
					    ?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fakultas </label>

		<div class="col-sm-7">
			<?php if (!empty($rayon)) {
				echo "<div class='row'>
						<div class='col-md-6'>
							<select multiple name='fakultas'>";	
					foreach ($rayon as $key) {

							echo "<option value='".$key['fakultas']."'>".$key['fakultas']."</option>";
							}
						echo "</select>
						</div>";
					echo "<div class='col-md-6'>
							<label> <b>Jika tidak tersedia</b>
									<input type='fakultas' name='fakultas' class='form-control'>
							</label>
						</div>
					</div>";
					}else{
						echo "<input type='text' name='fakultas' id='form-field-1' placeholder='Fakultas' class='col-xs-10 col-sm-5' required />";
					}
	
			?>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Masuk PMII Sejak</label>

		<div class="col-sm-9">
			<div class="input-group date col-xs-6 col-sm-3" data-provide="datepicker">
				<input type="text" name="since_enter" id="form-field-1-1" class="form-control" required="" value="<?= isset($data)? $data[0]['since_enter']:'';?>"/>
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
			</div>
			
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