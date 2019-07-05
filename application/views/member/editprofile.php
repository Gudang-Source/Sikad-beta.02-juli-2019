<?php $this->load->view('member/header');?>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap-datepicker3.min.css">
<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<div class="container">
<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> DATA </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo form_open('member/proses_edit', $class, array('id'=>$data[0]['id']));?>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sex </label>

		<div class="col-sm-9">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<?php
						$options = array(
						        ''      => '===Pilih===',
						        'lk'    => 'Laki - Laki',
						        'pr'    => 'Perempuan',    
						);

						$class = "class='col-xs-10 col-sm-5 form-control' required";
						echo form_dropdown('jk', $options, '', $class);

					?>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tempat Tanggal Lahir</label>

		<div class="col-sm-9">
			<div class="row">
				<div class="col-xs-6 col-sm-5">
					<input type="text" name="lahir" id="form-field-1-1" class="form-control" required="" value="<?= isset($data)? $data[0]['lahir']:'';?>"/>
				</div>
				<div class="input-group date col-xs-6 col-sm-3" data-provide="datepicker">
					<input type="text" name="tgl_lahir" id="form-field-1-1" class="form-control" required="" value="<?=isset($data)? $data[0]['tgl_lahir']: " " ?>"/>
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
			</div>			
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>

		<div class="col-sm-9">
			
			<input type="text" name="nama" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['nama']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Fak/Prodi </label>

		<div class="col-sm-9">
			
			<input type="text" name="fakultas" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['fakultas']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  Jurusan </label>

		<div class="col-sm-9">
			
			<input type="text" name="jurusan" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['jurusan']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nomor Induk Mahasiswa </label>

		<div class="col-xs-12 col-sm-5">
			
			<input type="text" name="nim" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['nim']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

		<div class="col-sm-9">
			<input type="email" name="email" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['email']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Blog Pribadi </label>

		<div class="col-sm-9">
			<input type="text" name="blog" id="form-field-1" class="form-control"  value="<?= isset($data)? $data[0]['blog']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facebook </label>

		<div class="col-sm-9">
			<input type="text" name="fb" id="form-field-1" class="form-control"  value="<?= isset($data)? $data[0]['fb']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Twitter </label>

		<div class="col-sm-9">
			<input type="text" name="tw" id="form-field-1" class="form-control"  value="<?= isset($data)? $data[0]['tw']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Instagram </label>

		<div class="col-sm-9">
			<input type="text" name="ig" id="form-field-1" class="form-control"  value="<?= isset($data)? $data[0]['ig']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Asal </label>

		<div class="col-sm-9">
			<textarea class="form-control" name="alamat_asal" required=""><?= isset($data)? $data[0]['alamat_asal']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Di Malang </label>

		<div class="col-sm-9">
			<textarea class="form-control" name="alamat_malang" required><?= isset($data)? $data[0]['alamat_malang']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Ayah</label>

		<div class="col-sm-9">
			<input type="text" name="ayah" id="form-field-1-1" ="password" class="form-control" required="" value="<?= isset($data)? $data[0]['ayah']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Ibu </label>

		<div class="col-sm-9">
			<input type="text" name="ibu" id="form-field-1" class="form-control" required="" value="<?= isset($data)? $data[0]['ibu']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nomor Tlpn Orang Tua</label>

		<div class="col-sm-9">
			<input type="number" name="tlp_ortu" id="form-field-1-1" class="form-control" required="" value="<?= isset($data)? $data[0]['tlp_ortu']:'';?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Alamat Orang Tua</label>

		<div class="col-sm-9">
			<textarea class="form-control" name="alamat_ortu" required rows="5"><?= isset($data)? $data[0]['alamat_ortu']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Motto Hidup</label>

		<div class="col-sm-9">
			<textarea class="form-control" name="motto" required rows="5"><?= isset($data)? $data[0]['motto']:'';?></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alasan Ikut PMII</label>

		<div class="col-sm-9">
			<textarea class="form-control" required="" name="alasan" rows="7"><?= isset($data)? $data[0]['alasan']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pengalaman Organisasi</label>

		<div class="col-sm-9">
			<textarea class="form-control" required="" name="organisasi" rows="7"><?= isset($data)? $data[0]['organisasi']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Bakat</label>

		<div class="col-sm-9">
			<textarea class="form-control" required="" name="bakat" rows="7"><?= isset($data)? $data[0]['bakat']:'';?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Minat</label>

		<div class="col-sm-9">
			<textarea class="form-control" required="" name="minat" rows="7"><?= isset($data)? $data[0]['minat']:'';?></textarea>
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