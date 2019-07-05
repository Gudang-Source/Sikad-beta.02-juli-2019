<?php $this->load->view('cabang/header_cabang');?>
<script type="text/javascript">
	// $(window).on('load', function() {
	// 	$('.tambah_data').hide();
	// });
</script>
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
			<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
			
			<button type="button" class="btn btn-success btn-xs" id="tambah_data"> 
				<i class="fa fa-plus"> </i> TAMBAH DATA KOMISARIAT
			</button>
		</div>
		<div class="table-header">DATA KOMISARIAT</div>	

		<div class="table-responsive" id="data_tables">
			<table id="dynamic-table" class="table table-bordered table-hover">
				<thead>
					<tr >
						<th> NO</th>
						<th> Kode </th>
						<th> Komisariat</th>
						<th> Kampus</th>
						<th> Email</th>
						<th> Telpn</th>
						<th> Username</th>
						<th> status</th>
						<th> Action </th>
					</tr>
				</thead>

				<tbody>
					<?php if (empty($data)) {?>
					<td colspan="9"><h1 class="text-center">TIDAK ADA DATA <span class="fa fa-database"></span></h1></td>
					<?php }else{
					$i = 1;
					foreach($data as $kom){ ?> 
						
						<tr>
							<td > <?php echo $i; ?> </td>
							<td > <?php echo $kom ['kode_kom']; ?></td>
							<td > <?php echo $kom ['nama_kom']; ?></td>
							<td > <?php echo $kom ['kampus']; ?> </td>
							<td > <?php echo $kom ['email']; ?></td>
							<td > <?php echo $kom ['no_telp']; ?> </td>
							<td > <?php echo $kom ['username']; ?></td>
							<td > <?php 
	                        		if ($kom['status'] == 'active') {
	                        			echo "<span class='btn btn-xs btn-success'>Active</span>";
	                        		}else{
	                        		?> 
	                        		<form>
	                        			<input type="hidden" class="id_kom1" name="id_kom1" value="<?=$kom['id_kom']?>">
	                        			<input type="hidden" class="status1" name="status1" value="active">
		                        		<button type="button" type="submit" class="btn btn-xs btn-warning btn_act">
		                        			Inactive
		                        		</button>
	                        		</form>
	                        	<?php }?>
	                        </td>
							<td > 
								<i><a href="<?php echo base_url()."cabang/edit_kom/".$kom['id_kom'] ?>"> <span class="btn btn-xs btn-info fa fa-edit"></span></a></i>
								<i><a href="<?php echo base_url ()."cabang/delete_kom/".$kom['kode_kom']; ?>" onclick="return confirm('yakin !!');"> <span class="btn btn-xs btn-danger fa fa-trash"></span></a></i>
								<i><a href="<?=base_url().'cabang/getById/'.$kom['kode_kom'];?>"><span class="btn btn-xs btn-success fa fa-folder-open"></span></a></i>
								<i><a href="<?=base_url().'cabang/profile_kom/'.$kom['kode_kom'];?>"><span class="btn btn-xs btn-primary fa fa-user"></span></a></i>
							</td>

						</tr>

					<?php $i++;
						}
					}?>
				</tbody>
			</table>
		</div>
			
		<div id="form_add" style="display: none">
			<div class="row">
				<div class="col-sm-8">
					<h2 class="text-center"> <b>  FORM TAMBAH KOMISARIAT </b> <hr /> </h2>
					<?php $class = "class = 'form-horizontal'";
							echo form_open('cabang/add_data_kom', $class);?>	

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Komisariat </label>

							<div class="col-sm-9">
								
								<input type="text" id="kode_kom" name="kode_kom" id="form-field-1" placeholder="1 or abkc" class="col-xs-10 col-sm-5" required="" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Komisariat</label>

							<div class="col-sm-9">
								<input type="text" id="nama_kom" name="nama_kom" id="form-field-1-1" placeholder="Nama Komisariat" class="form-control" required="" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Universitas</label>

							<div class="col-sm-9">
								<input type="text" id="kampus" name="kampus" id="form-field-1-1" placeholder="Universitas" class="form-control" required="" />
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username</label>

							<div class="col-sm-9">
								<input type="text" id="username" name="username" id="form-field-1-1" placeholder="Username" class="form-control" required="" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password</label>

							<div class="col-sm-9">
								<input type="password" id="password" name="password" id="form-field-1-1" placeholder="password" class="form-control" required="" />
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

										$class = 'class="form-control" required id="status"';
										echo form_dropdown('status', $options, '', $class);
					        	?>
								
							</div>
						</div>

						<div class="form-group">

							<div class="col-sm-10 text-center" >
								<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-repeat"></span> Reset</button>
								<button type="submit" type="button" class="btn btn-primary" id="btn_save"> <span class="fa fa-save"></span> Save </button>
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
	</div>
</div>

<script type="text/javascript">
	$('#tambah_data').on('click', function() {
		$('#data_tables').slideToggle('slow');
		$('#form_add').slideToggle('slow');
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn_save').on('click', function() {
			var kode_kom = $('#kode_kom').val();
			var nama_kom = $('#nama_kom').val();
			var username = $('#username').val();
			var kampus   = $('#kampus').val();
			var password = $('#password').val();
			var status   = $('#status option:select').val();

			$.ajax({
				type : 'POST',
				url : "<?=site_url()?>cabang/add_data_kom",
				dataType : 'json',
				data : {kode_kom:kode_kom, nama_kom:nama_kom, username:username, kampus:kampus, password:password, status:status},
				success: function(data){
					location.reload(true);
					$('#data_tables').slideToggle('slow');
					$('#form_add').slideToggle('slow');
				}
			});
			return true;
		});

		$('.btn_act').on('click', function () {
			var id_kom = $('.id_kom1').val();
			var status = $('.status1').val();

			$.ajax({
				type : 'POST',
				url  : '<?=site_url()?>cabang/store_act',
				dataType : 'json',
				data : {id_kom:id_kom, status:status},
				success: function(data){
					alert('Berhasil Di ubah');
					location.reload(true);
				}
			});
		})
	})
</script>

<?php $this->load->view('cabang/footer_cabang');?>