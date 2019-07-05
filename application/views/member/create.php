<?php $this->load->view('member/header');?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center"> <b> FORM <?php echo isset($data)? 'EDIT':'TAMBAH';?> KONTEN </b> <hr /> </h2>

				<?php $class = "class = 'form-horizontal'";
				echo isset($data)? form_open('member/edit_data', $class, array('id_konten'=>$data[0]->id_konten)) : form_open('member/post_data', $class);?>
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pengurus </label>

					<div class="col-sm-9">
						<div class="row">
							<div class="col-xs-12 col-sm-3" style="margin-bottom: 5px">
								<?php
									$options = array(
									        ''	=>	'== Pengurus ==',
									        '1'	=>	'Cabang',
									        '2'	=>	'Komisariat',
									        '3'	=>	'Rayon',
									        '4'	=>	'kader/anggota'
									);

									$class = "class='col-xs-12 col-sm-3 form-control' required";
									echo form_dropdown('id_pengurus', $options, isset($data)? $data[0]->id_pengurus:'', $class);

								?>
							</div>

							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Posting Ke - </label>
							<div class="col-xs-12 col-md-3">
								<select name="to_konten" class="form-control">
									<option value="PC">PC</option>
									<option value="pribadi">Pribadi</option>
									<option value="<?=$this->session->userdata('kode_kom');?>">Rayon <?=$this->session->userdata('kode_kom');?></option>
									<option value="<?=$this->session->userdata('kode_rayon');?>">Rayon <?=$this->session->userdata('kode_rayon');?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori </label>

					<div class="col-sm-9">
						<div class="row">
							<div class="col-xs-12 col-md-3">
								<select name="id_kategori" class="col-xs-10 col-sm-5 form-control">
									<option value="">Pilih Kategori</option>
									<?php
										foreach ($kategori as $key => $value) {
											echo "<option value = '".$value->id_kategori ."'";
											echo isset($data)? "selected >":">";
											echo $value->kategori;
											echo "</option >";
									?>		
									<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>		

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul </label>

					<div class="col-sm-9">
						<div class="row">
							<div class="col-xs-12 col-md-9">
								<input type="text" name="judul" class="form-control" value="<?=isset($data)? $data[0]->judul:'';?>">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gambar </label>

					<div class="col-sm-9">
						<div class="row">
							<div class="col-xs-12 col-md-3">
								<input type="file" name="gambar" class="form-control">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Isi </label>

					<div class="col-sm-9">
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<textarea name="posting" id="mytext" rows="50" >
									<?=isset($data)? $data[0]->posting:'';?>
								</textarea>
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
		</div>	
	</div>
</div>

<script src="<?=base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/plugin/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/plugin/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#mytext'
  });
</script>
<?php $this->load->view('member/footer')?>