<?php $this->load->view('rayon/header_pr');?>

<div class="row">
	<div class="col-xs-12">

		<div class="row">
			<div class="col-xs-12">

				<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
						<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button>
						<a href="<?=base_url()?>rayon/tambah_data" class="btn btn-success btn-xs"> 
							<i class="fa fa-plus"> </i> TAMBAH DATA
						</a>
				</div>
			<div class="table-header">DATA RAYON</div>	
			

		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<tr >
							<th> NO</th>
							<th> Nama</th>
							<th> Username</th>
							<th> Password</th>
							<th> Kode Kom</th>
							<th> Kode Rayon</th>
							<th> Kode UNIX</th>
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
						<td > <?php echo $a['nama']; ?></td>
						<td > <?php echo $a['username']; ?></td>
						<td > <?php  echo $a['password'];?> </td>
						<td > <?php  echo $a['kode_kom'];?> </td>
						<td > <?php echo $a['kode_rayon']; ?> </td>
						<td > <?php  echo $a['kode'];?> </td>
						
						<td > 
							<a href="<?php echo base_url()."rayon/edit/".$a['id'] ?>"> <span class="btn btn-xs btn-info fa fa-edit"></span></a>
							<a href="<?php echo base_url ()."rayon/delete_data/".$a['id']; ?>" onclick="return confirm('yakin !!');"> <span class=" btn btn-xs btn-danger fa fa-trash"></span></a>
							<a href="<?=base_url().'rayon/ligatkader/'.$a['id']?>" target="_blank"><span class="btn btn-xs fa fa-eye"></span></a>
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
<?php $this->load->view('rayon/footer_pr');?>