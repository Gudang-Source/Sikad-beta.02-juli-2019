<?php $this->load->view('komisariat/header_kom');?>						
<div class="row">
	<div class="col-xs-12">

		<div class="row">
			<div class="col-xs-12">

				<div class="clearfix">
					<div class="pull-right tableTools-container"></div>
					<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
					<a href="<?=base_url()?>komisariat/tambahrayon" class="btn btn-success btn-xs"> 
						<i class="fa fa-plus"> </i> TAMBAH DATA RAYON
					</a>
				</div>

				<div class="table-header">Data Rayon <?=$title;?></div>

				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr >
								<th> NO </th>
								<th> Komisariat</th>
								<th> Rayon</th>
								<th> Kode Rayon</th>
								<th> Username</th>
								<th> Password</th>
								<th> Telpn </th>
								<th> Action</th>
							</tr>
						</thead>

						<tbody>
						<?php if (empty($data)) {?>
							<tr>
								<td colspan="9"><h1 class="text-center">TIDAK ADA DATA <span class="fa fa-database"></span></h1></td>
							</tr>

						<?php }else{
						 $i = 1;foreach($data as $kr){ ?>
							<tr>
								<td > <?php echo $i; ?> </td>
								<td > <?php echo $kr['nama_kom']; ?> </td>
								<td > <?php echo $kr['nama_rayon']; echo " <b>( ".$kr['fakultas'] . " )</b>" ; ?></td>
								<td > <?php echo $kr['kode_rayon']; ?> </td>
								<td > <?php echo $kr['username']; ?> </td>
								<td > <?php echo do_hash($kr['password'], 'md5'); ?> </td>
								<td > <?php echo $kr['no_telp']; ?> </td>
								<td > 
									<a href="<?php echo base_url()."komisariat/editrayon/".$kr['id_rayon'] ?>">
										<span class="btn btn-xs btn-info fa fa-edit"></span>
									</a> 
									<a href="<?php echo base_url ()."komisariat/deleteRayon/".$kr['kode_rayon']; ?>" onclick="return confirm('yakin !!');"> 
										<span class="btn btn-xs btn-danger fa fa-trash" style="height: 100%"></span>
									</a>
									<a href="<?=base_url().'komisariat/kaderrayon/'. $kr['kode_rayon']?>">
										<?php 
										$session = $kr['kode_rayon'];
											$jml  = $this->Model_menu->jmlkader_rayon($session);
											foreach ($jml->result() as $hit) {
												echo "<b style=' padding:2px 7px 5px 7px; border-radius:1px; background:#919f8b; color:white'>"
														.$hit->jml.
													"</b>";
										}?>	
									</a>	 
								</td>
							</tr>
						<?php
						$i++; 
							}
						}?>
						</tbody>
						</table>
					</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<?php $this->load->view('komisariat/footer_kom');?>