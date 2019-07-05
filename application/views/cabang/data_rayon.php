<?php $this->load->view('cabang/header_cabang');?>						
<div class="row">
<div class="col-xs-12">

<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
			<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
			<!-- <a href="<?=base_url()?>cabang/tambah_rayon" class="btn btn-success btn-xs"> 
				<i class="fa fa-plus"> </i> TAMBAH DATA RAYON
			</a> -->

			<button type="button" class="btn btn-success btn-xs" id="tambah_data"> 
				<i class="fa fa-plus"> </i> TAMBAH DATA RAYON
			</button>
		</div>
		<div class="table-header">DATA RAYON</div>	
			
		
		<div class="table-responsive" id="data_tables">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
				
						<tr >
							<th> No</th>
							<th> Komisariat</th>
							<th> Rayon <u>(kode)</u></th>
							<th> Fakultas</th>
							<th> Tlpn</th>
							<th> Alamat</th>
							<th> Email</th>
							<th> Jumlah Kader</th>
							<th> Action </th>
						</tr>
					
				</thead>

				<tbody>
				<?php $i = 1;
				foreach($data as $rayon){ ?>
					<tr>
						<td > <?=$i;?></td>
						<td > <?php echo $rayon ['nama_kom']; ?></td>
						<td > <?php echo $rayon ['nama_rayon']; echo " <b><u>".$rayon['kode_rayon']."</u></b>"; ?></td>
						<td > <?php echo $rayon ['fakultas']; ?> </td>
						<td > <?php echo $rayon ['no_telp']; ?></td>
						<td > <?php echo $rayon ['alamat']; ?> </td>
						<td > <?php echo $rayon ['email']; ?> </td>
						<?php 
                        	$var = $this->Foo_model->hitkaderrayon($rayon['kode_rayon']);
                        	if ($var > 1) {
                        		foreach ($var as $value) {
                            		echo "<td> <span class='badge'>".$value['jml']."<span></td>";
                            	}
                        	}else{
                        		echo "<td>Tidak ada kader</td>";
                        	}
                    	
                        ;?>
						<td > 
							<a href="<?php echo base_url()."cabang/edit_rayon/".$rayon['kode_rayon'] ?>">
								<span class="btn btn-xs btn-info fa fa-edit"></span>
							</a> 
							<a href="<?php echo base_url ()."cabang/delete_rayon/".$rayon['kode_rayon']; ?>" onclick="return confirm('yakin !!');"> 
								<span class="btn btn-xs btn-danger fa fa-trash"></span>
							</a> 
							<a href="<?php echo base_url ()."cabang/profile_rayon/".$rayon['kode_rayon']; ?>" > 
								<span class="btn btn-xs btn-success fa fa-users"></span>
							</a>
						</td>

					</tr>

					<?php 
						$i++;
					}?>
				</tbody>
				</table>
			</div>
			<div id="form_add" style="display: none;">

				<div class="row">
					<div class="col-sm-8">
						<h2 class="text-center"> <b>  FORM TAMBAH RAYON </b> <hr /> </h2>

						<?php $class = "class = 'form-horizontal'"; echo form_open('cabang/insert_data_rayon', $class);?>


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Rayon </label>

								<div class="col-sm-9">
									<input type="text" name="kode_rayon" id="form-field-1" placeholder="Kode Rayon" class="col-xs-10 col-sm-5" required=""  />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

								<div class="col-sm-9">
									<input type="text" name="username" id="form-field-1" placeholder="username" class="col-xs-10 col-sm-5" required=""  />
								</div>
							</div>	
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Komisariat </label>

								<div class="col-sm-9">
									<?php echo "<select name='kode_kom' class='form-control' required><option value=''>Pilih KOM</option>";	
								foreach($kom as $d){	

									echo "<option value='".$d["kode_kom"]."'>".$d["nama_kom"]."</option>";
											    }
									echo "</select>";?>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Rayon</label>

								<div class="col-sm-9">
									<input type="text" name="nama_rayon" id="form-field-1-1" placeholder="NAMA RAYON" class="form-control" required=""  />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Fakultas</label>

								<div class="col-sm-9">
									<input type="text" name="fakultas" id="form-field-1-1" placeholder="Fakultas" class="form-control" required="" />
								</div>
							</div>

							
							<div class="form-group">
								<div class="col-sm-10 text-center">
									<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-repeat"></span> Reset</button>
									<button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save </button>

								</div>
							</div>

						</form>	
					</div>
					<div class="col-sm-4">
						<h2><b>PETUNJUK PENGISIAN FORM TAMBAH RAYON</b></h2>
						<img src="<?=base_url()?>assets/tutorial/3.jpg" class="img-responsive">
						<img src="<?=base_url()?>assets/tutorial/2.jpg" class="img-responsive">
						<img src="<?=base_url()?>assets/tutorial/3.jpg" class="img-responsive">
					</div>
				</div>	

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	$('#tambah_data').on('click', function(){
		$('#data_tables').slideToggle('slow');
		$('#form_add').slideToggle('slow');
	})
</script>

<?php $this->load->view('cabang/footer_cabang');?>