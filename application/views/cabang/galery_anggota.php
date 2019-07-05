<?php $this->load->view('cabang/header_cabang');?>

					
<div class="page-header">
	<h1>
		Gallery Kader PMII Kota Malang
	</h1>
</div><!-- /.page-header -->

<style type="text/css">
	.bingkai{
      margin: 15px;
      border: 1px solid #ccc;
      float: left;
      width: 230px;
      height: 500px;
      padding: 15px;
    }

    .bingkai h1,h2,h3,h4,h5,h6, p{
      font-weight: bold;
      margin-top: 3px;
    }

    .bingkai img{
      width: 100%;
      height: 50%;
    }

    .bingkai:hover {
        border: 1px solid #777;
    }
    
    .tgl{
      border-left: 5px solid grey;
      background-color: lightgrey;
      padding: 3px;
      height: 30px;
    }
    .number{
		    background: rgba(59, 79, 115, 0.77);
		    color: #0e0301;
		    font-weight: bold;
		    float: left;
		    font-style: italic;
		    margin: 0 2px 12px 0;
		    font-size: 15px;
		    text-align: left;
		    height: 30px;
		    width: auto;
		    line-height: 28px;
		    padding-right: 5px ;
		    padding-left: 5px;
		    text-align: center;
		}
</style>
	<div class="row">
		<div class="col-md-12">
		<?php $i =1;
		foreach ($data as $key) {?>
			<div class="bingkai">
				<div class="number" style="margin-top: -10px;">
					V-04-02.<?=$key['kode_kom'];?>
				</div>
				<div class="tgl" style="margin-top: -10px; margin-bottom:12px" >
					<?=$key['kode_rayon'];?>
				</div>
				<h5 class="text-left"><?=$key['nama']; 
							$birth = new DateTime($key['tgl_lahir']);
							$today = new DateTime('today');
							$y = $today->diff($birth)->y;

							if ($y >= "90" ) {
								echo " <u>Tua</u>";
							}elseif ($y >= "30") {
								echo " <u>kader NU</u>";
							}else{
								echo " <u>".$y." Tahun</u>";
							}
						?>
				</h5>
				<b> 
					<?php
						echo "V-04-02";
						echo ".".$key['kode'];
					?>
				</b>
				<?php if (!empty($key['foto'])) {?>
					<img src="<?=base_url('assets/foto/').$key['foto']?>" class="img-resoponsive">
				<?php }else{?>
					<h2>Gambar Belum ada</h2>
				<?php }?>	
				<p><?php echo $key['lahir']. " "; 
						echo $key['tgl_lahir'];
					?></p>
				<p>Kampus : <?php if (empty($key['alamat_asal'])) {
						echo "belum ada";
					}else{
						echo $key['alamat_asal'];
					}?>
				</p>
				<p>Kampus : <?php if (empty($key['kampus'])) {
						echo "belum ada";
					}else{
						echo $key['kampus'];
					}?>
				</p>
				<p>Fakultas : <?php if (empty($key['fakultas'])) {
						echo "belum ada";
					}else{
						echo $key['fakultas'];
					}?>
				</p>


				<p class="text-left">
					<a href="<?=base_url('cabang/lihat_data/').$key['id'];?>" class="btn btn-info btn-xs" data-toggle="modal" data-target="#gambar">
						Preview
					</a>
				</p>	
			</div>
		<?php
		}?>	
		</div>
	</div>


</div>
</div>
</div>
<?php $this->load->view('cabang/footer_cabang');?>