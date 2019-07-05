<?php $this->load->view('cabang/header_cabang');?>

<div class="row">
	<div class="col-xs-12">

		<div class="row">
			<div class="col-xs-12" >

				<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
						<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
						<a href="<?=base_url()?>cabang/tambah_admin" class="btn btn-success btn-xs"> 
							<i class="fa fa-plus"> </i> TAMBAH DATA ADMIN
						</a>
						<!-- <a href="<?php echo base_url()."cabang/createpdf/"?>" class="btn btn-xs btn-primary"> 
							<span class="fa fa-file-pdf-o"> Print PDF</span>
						</a> -->
				</div>
			<div class="table-header">DATA RAYON</div>	
			

		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<tr >
							<th> No</th>
							<th> Username</th>
							<th> Status</th>
							<th> E-Mail</th>
							<th> divisi</th>
							<th> Action </th>
						</tr>
					</tr>
				</thead>

				<tbody>
				<?php $i = 1;
				foreach($data as $a){ ?>
					<tr>
						<td > <?php echo $i; ?> </td>
						<td > <?php echo $a['user_name']; ?></td>
						<td > 
							<?php if ($a['status'] == "active") {
								echo "<b class='btn btn-xs btn-primary'>Active</b>";
							} else{
								echo "<b class='btn btn-xs btn-default'>NonActive</b>";
							}; ?> 
						</td>
						<td > <?php echo $a['email']; ?> </td>
						<td > <?php  echo $a['divisi'];?> </td>
						<td > 
							<a href="<?php echo base_url()."cabang/edit_admin/".$a['id_user'] ?>"> 
								<span class="btn btn-xs btn-info fa fa-edit"></span>
							</a>
							<a href="<?php echo base_url ()."cabang/delete_admin/".$a['user_name']; ?>" onclick="return confirm('yakin !!');"> 
								<span class=" btn btn-xs btn-danger fa fa-trash"></span>
							</a>
						</td>

					</tr>

					<?php 
						$i++;
					}?>
				</tbody>
				</table>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php $this->load->view('cabang/footer_cabang');?>