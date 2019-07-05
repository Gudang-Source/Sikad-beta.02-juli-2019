<?php $this->load->view('komisariat/header_kom');?>
<div class="row">
	<div class="col-xs-12">

		<div class="row">
			<div class="col-xs-12">
				<div class="clearfix">
					<div class=" tableTools-container"></div>
					
				</div>
			<div class="table-header">Data Kader <?=$title;?></div>	
			

		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<tr >
							<th> No</th>
							<th> Nama (username)</th>
							<th> Kode (password)</th>
							<th> Komisariat</th>
							<th> Rayon</th>
							<th> Asal</th>
							<th> TELEPON </th>
							<th> Action </th>
						</tr>
					</tr>
				</thead>

				<tbody>
				<?php if (empty($data)) {?>
					<tr>
						<td colspan="9"><h1 class="text-center">TIDAK ADA DATA <span class="fa fa-database"></span></h1></td>
					</tr>

				<?php }else{
					$i = 1;
				foreach($data as $a){ ?>
					<tr>
						<td > <?php echo $i; ?> </td>
						<td > <?php echo $a['nama']; echo " <b>(".$a['username'].")</b>";?></td>
						<td > <?php echo $a['kode']; echo " <b>(".$a['password'].")</b>";?> </td>
						<td > <?php echo $a['nama_kom']; ?></td>
						<td > <?php echo $a['nama_rayon']; echo " <b>(".$a['kode_rayon'].")</b>";?></td>
						<td > <?php echo $a['alamat_asal']; ?> </td>
						<td > <?php echo $a['tlp']; ?> </td>
						<td>
							<a href="<?php echo base_url()."komisariat/edit/".$a['id'] ?>"> <span class="btn btn-xs btn-info fa fa-edit"></span></a>
							<a href="<?php echo base_url ()."komisariat/delete_data/".$a['id']; ?>" onclick="return confirm('yakin !!');"> <span class=" btn btn-xs btn-danger fa fa-trash"></span></a>
							<a href="<?php echo base_url ()."komisariat/lihatkader/".$a['id']; ?>" target="_blank"> <span class=" btn btn-xs btn-default fa fa-eye"></span></a>
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