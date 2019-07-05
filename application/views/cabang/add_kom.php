<?php $this->load->view('cabang/header_cabang');?>

<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> KOMISARIAT </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo isset($data)? form_open('cabang/update_kom', $class, array('id_kom'=>$data[0]['id_kom'])) : form_open('cabang/add_data_kom', $class);?>

	

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Komisariat </label>

		<div class="col-sm-9">
			
			<input type="text" name="kode_kom" id="form-field-1" placeholder="1 or abkc" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['kode_kom']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Komisariat</label>

		<div class="col-sm-9">
			<input type="text" name="nama_kom" id="form-field-1-1" placeholder="Nama Komisariat" class="form-control" required="" value="<?= isset($data)? $data[0]['nama_kom']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Universitas</label>

		<div class="col-sm-9">
			<input type="text" name="kampus" id="form-field-1-1" placeholder="Universitas" class="form-control" required="" value="<?= isset($data)? $data[0]['kampus']:'';?>"/>
		</div>
	</div>

	<hr>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username</label>

		<div class="col-sm-9">
			<input type="text" name="username" id="form-field-1-1" placeholder="Username" class="form-control" required="" value="<?= isset($data)? $data[0]['username']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

		<div class="col-sm-9">
			<input type="password" name="password" id="form-field-1-1" placeholder="password" class="form-control" required="" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

		<div class="col-sm-2">
			<?php
        		$options = array(
        					''		   => '=== Pilih ===',
					        'active'   => 'Active',
					        'inactive' => 'Nonactive',
					);

					$class = 'class="form-control" required';
					echo form_dropdown('status', $options, '', $class);
        	?>
			
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