<?php $this->load->view('cabang/header_cabang');?>
<div class="row">
	<div class="col-xs-12">

		<div class="row">
			<div class="col-xs-12">
				<div class="clearfix">
					<div class="tableTools-container"></div>
				</div>
			<div class="table-header">DATA ANGGOTA SE-KOTA MALANG</div>	
			

		<div class="table-responsive">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th> QRcode</th>
						<th> Foto</th>
						<th> Nama</th>
						<th> Joined</th>
						<th> ASAL</th>
						<th> Kampus</th>
						<th> fakultas</th>
						<th> Komisariat</th>
						<th> Rayon </th>
					
					</tr>
				</thead>

				<tbody>
				<?php
				foreach($data as $a){ ?>
					<tr>
						<td > 
							<a href="<?=base_url().'cabang/editkader/'.$a['id']?>" >
								<span class="fa fa-edit"></span>
							</a>
							<?php if($a['qrcode'] != NULL){?>

							<img src="<?=base_url().$a['qrcode'];?>" class="img-responsive" width="100">
							<?php }else{
								echo "TIdak ada QRcode
								";}?>
						</td>
						<td > 
							<?php if (!empty($a['foto'])) {?>
							<img src="<?=base_url()?>assets/foto/<?php echo $a['foto']; ?>" width="100px">
							<?php }else{?>
							Tidak Ada foto
							<?php }?>
						</td>
						<td > <?php echo $a['nama']; ?>
							<a href="<?=base_url().'cabang/lihatkader/'.$a['id']?>" target="_blank">
								<span class="fa fa-eye"></span>
							</a>
						</td>
						<td > <?php echo date('d F Y', strtotime($a['since_enter']));?> </td>
						<td > <?php echo $a['alamat_asal']; ?> </td>
						<td > <?php echo $a['kampus']; ?></td>
						<td > <?php echo $a['fakultas']; ?></td>
						<td > <?php echo $a['kode_kom']; ?></td>
						<td > <?php echo $a['kode_rayon']; ?>
							<!-- <i><a href="<?=base_url('cabang/kta/'). $a['id']?>" target="_blank">
								<span class="fa fa-print"></span>
							</a></i> -->
						</td>

					</tr>

					<?php 
					}?>
				</tbody>
				</table>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<?php $this->load->view('cabang/footer_cabang');?>