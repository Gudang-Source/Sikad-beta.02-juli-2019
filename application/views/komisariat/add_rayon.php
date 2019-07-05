<?php $this->load->view('komisariat/header_kom');?>

		<div class="col-sm-8">
			<h2 class="text-center"> KODE :<b> <?=$kode;?> </b> </h2>
			<h2 class="text-center"> <b>  FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> RAYON </b> <hr /> </h2>

			<?php $class = "class = 'form-horizontal'";
			echo isset($data)? form_open('komisariat/updateRayon/', $class, array('id_rayon'=>$data[0]['id_rayon'])) : form_open('komisariat/insertRayon', $class);?>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Rayon </label>

					<div class="col-sm-9">
						<input type="text" name="kode_rayon" id="form-field-1" placeholder="Kode Rayon" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['kode_rayon']:'';?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

					<div class="col-sm-9">
						<input type="text" name="username" id="form-field-1" placeholder="username" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['username']:'';?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Rayon</label>

					<div class="col-sm-9">
						<input type="text" name="nama_rayon" id="form-field-1-1" placeholder="Nama RAYON" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['nama_rayon']:'';?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fakultas</label>

					<div class="col-sm-9">
						<input type="text" name="fakultas" id="form-field-1-1" placeholder="Fakultas" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['fakultas']:'';?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

					<div class="col-sm-9">
						<input type="password" name="password" id="form-field-1-1" placeholder="password" class="col-xs-10 col-sm-5" required="" value="<?= isset($data)? $data[0]['password']:'';?>" />
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
		<div class="col-sm-4 text-center">
			<h2><b>PETUNJUK PENGISIAN FORM TAMBAH RAYON</b></h2>
			<img src="<?=base_url()?>assets/tutorial/3.jpg" class="img-responsive">
			<img src="<?=base_url()?>assets/tutorial/2.jpg" class="img-responsive">
			<img src="<?=base_url()?>assets/tutorial/3.jpg" class="img-responsive">
		</div>
	
<?php $this->load->view('komisariat/footer_kom');?>