<?php $this->load->view('member/header');?>

<?=$this->session->flashdata('pesan')?>
<div class="container">
	<div class="row">
		<?php foreach ($data as $key) {?>
		<div class="col-md-3 col-xs-12">
			<a href="<?=base_url('member/editfoto')?>" >
				<span class="profile-picture">
					<?php if ($key['foto'] == '') {?>
					<img class="editable img-responsive" alt="<?=$key['nama']?>"  src="<?=base_url();?>assets/images/logo/user.png" />
					<?php }else{?>
					<img class="editable img-responsive" alt="<?=$key['nama']?>" id="avatar2" src="<?=base_url()?>assets/foto/<?=$key['foto'];?>" />
					<?php }?>
				</span>
				<div class="text-center" style="margin-top:5px; margin-bottom: 12px">
					<span class="fa fa-image btn btn-lg btn-primary"> Ubah Foto</span>
				</div>
			</a>
		</div>
		<div class="col-md-9 col-xs-12">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-primary">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          Profile
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			      <div class="row">
			      	<div class="col-xs-12 col-md-6">NIK: <b><?=$key['username']?></b></div>
			      	<div class="col-xs-12 col-md-6 text-right" style="margin-bottom: 5px">
				      	<!-- <a href="<?=base_url()?>member/printCV" class="btn btn-sm btn-success " target="_blank">
							<span class="fa fa-print"></span>
						</a> -->
						<a href="<?=base_url()?>member/cpdf" class="btn btn-sm btn-success " target="_blank">
							<span class="fa fa-file-pdf-o"></span>
						</a>
			      	</div>
			      </div>
		          <div class="table-responsive">
		        	<table class="table table-striped">
					    <tr >
					    	<th>Nama dan NIK</th>
					    	<td><?=$key['nama']?> <p></p> </td>
					    
					    	<th>Nim</th>
					    	<td><?php if ($key['nim'] != "0") {echo $key['nim'];}else{echo "<b style='color: red'>Belom Ada Nomor Induk Mahasiswa</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>TTL</th>
					    	<td><?=$key['lahir']; echo ", " .date("d F-Y", strtotime($key['tgl_lahir']));?>
					    		<p><b>(<?php $birth = new DateTime($key['tgl_lahir']);
									$today = new DateTime('today');
									$y = $today->diff($birth)->y;

									if ($y >= "30" ) {
										echo " <u>Belum Di atur </u>";
									}else{
										echo "<u>".$y." Tahun</u>";
									}?>)</b></p>
					    	</td>
					    
					    	<th>Tahun Masuk</th>
					    	<td><?php if($key['since_enter'] != "0000-00-00") {echo date("d F-Y", strtotime($key['since_enter']));
																				$birth = new DateTime($key['since_enter']);
																				$today = new DateTime('today');
																				$y = $today->diff($birth)->y;
																				$m = $today->diff($birth)->m;
																				$d = $today->diff($birth)->d;
																				echo " <p><b>( ".$y." Tahun lalu ".$m." Bulan ".$d." Hari yang lalu )</b>";}else{echo "<b style='color: red'>Tanggal Masuk PMII belum di atur</b></p>";}?></td>
					    </tr>
					    <tr >
					    	<th>Kampus</th>
					    	<td><?php if (!empty($key['kampus'])) {echo $key['kampus'];}else{echo "<b style='color: red'>Kampus belum di atur</b>";}?></td>
					    
					    	<th>Fakultas</th>
					    	<td><?php if (!empty($key['fakultas'])) {echo $key['fakultas'];}else{echo "<b style='color: red'>Fakultas belum di atur</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Jurusan</th>
					    	<td><?php if (!empty($key['jurusan'])) {echo $key['jurusan'];}else{echo "<b style='color: red'>jurusan belum di atur</b>";}?></td>
					    
					    	<th>Alamat di Malang</th>
					    	<td><?php if (!empty($key['alamat_malang'])) {echo $key['alamat_malang'];}else{echo "<b style='color: red'>Alamat Di Malang belum di atur</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Komisariat</th>
					    	<td><?=$key['nama_kom']?></td>
					    
					    	<th>Rayon</th>
					    	<td><?=$key['nama_rayon']?></td>
					    </tr>
					    <tr>
					    	<th>Blog Pribadi</th>
					    	<td><?php if (!empty($key['blog'])) {echo "<a href='".$key['blog']."' target='_blank'>" .$key['blog']."</a>" ;}else{echo "<b style='color: red'>BLog belum di atur</b>";}?></td>
					    
					    	<th>Email</th>
					    	<td><?php if (!empty($key['email'])) {echo $key['email'];}else{echo "<b style='color: red'>Email belum di atur</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Facebook</th>
					    	<td>
					    		<?php if (!empty($key['fb'])) {?>
					    			<a href="<?=$key['fb']?>" target="_blank"><?=$key['fb']?></a>
					    		<?php }else{
					    			echo "<b style='color: red'>Facebook belum ada</b>";
					    		}?>	
					    	</td>
					    
					    	<th>Twitter</th>
					    	<td>
					    		<?php if (!empty($key['tw'])) {?>
					    			<a href="<?=$key['tw']?>" target="_blank"><?=$key['tw']?></a>
					    		<?php }else{
					    			echo "<b style='color: red'>Twitter belum ada</b>";
					    		}?>
					    	</td>
					    </tr>
					    <tr >
					    	<th>Instagram</th>
					    	<td>
					    		<?php if (!empty($key['ig'])) {?>
					    			<a href="<?=$key['ig']?>" target="_blank"><?=$key['ig']?></a>
					    		<?php }else{
					    			echo "<b style='color: red'>Instagram belum ada</b>";
					    		}?>
					    	</td>

					    	<th>Jenis Kelamin</th>
					    	<td><?php if ($key['jk'] == "lk") {
					    			echo "Laki - Laki";
					    		}else{
					    			echo "Perempuan";
					    		}?>
					    	</td>
					    </tr>
					   
				  	</table>
		          </div>
			      </div>
			      <div class="panel-footer text-center">
					Tri Motto <i><b>Dzikir, Fikir, Amal Sholeh</b></i>
				  </div>
			    </div>
			  </div>
			  <div class="panel panel-primary">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          Background
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body">
			        <table class="table table-striped">
			        	<tr >
					    	<th>Asal</th>
					    	<td><?php if (!empty($key['alamat_asal'])) {echo $key['alamat_asal'];}else{echo "<b style='color: red'>Alamat asal belum di atur</b>";}?></td>
					    </tr>
					    <tr>
					    	<th>Nama Ayah</th>
					    	<td><?php if (!empty($key['ayah'])) {echo $key['ayah'];}else{echo "<b style='color: red'>Nama ayah belum ada</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Nama Ibu</th>
					    	<td><?php if (!empty($key['ibu'])) {echo $key['ibu'];}else{echo "<b style='color: red'>Nama Ibu belum ada</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>No Telpn Orang Tua</th>
					    	<td><?php if (!empty($key['tlp_ortu'])) {echo $key['tlp_ortu'];}else{echo "<b style='color: red'>Belom Ada NO tlp</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Alamat Orang Tua</th>
					    	<td><?php if (!empty($key['alamat_ortu'])) {echo $key['alamat_ortu'];}else{echo "<b style='color: red'>Alamat Orang Tua belum di atur</b>";}?></td>
					    </tr>
			        </table>
			      </div>
			      <div class="panel-footer text-center">
					Tri Khidmah <i><b>Taqwa, Intelektualitas, Profesionalitas</b></i>
				  </div>
			    </div>
			  </div>
			  <div class="panel panel-primary">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Experience Dll
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <div class="panel-body">
			         <table class="table table-striped table-hover">
			         	<tr>
					    	<th>Bakat</th>
					    	<td><?php if (!empty($key['bakat'])) {echo $key['bakat'];}else{ echo "<b style='color: red'>Belum lengkap</b>";}?></td>
					    </tr>
					    <tr >
					    	<th>Minat</th>
					    	<td><?php if (!empty($key['minat'])) {echo $key['minat'];}else{ echo "<b style='color: red'>Belum lengkap</b>";}?></td>
					    </tr>
					    <tr>
					    	<th>Organisasi</th>
					    	<td><?php if (!empty($key['organisasi'])) {echo $key['organisasi'];}else{ echo "<b style='color: red'>Belum lengkap</b>";}?></td>
					    </tr>
					    <tr>
					    	<th>Alasan Masuk PMII</th>
					    	<td><?php if (!empty($key['alasan'])) {echo $key['alasan'];}else{ echo "<b style='color: red'>Belum lengkap</b>";}?></td>
					    </tr>
			         </table>
			      </div>
			      <div class="panel-footer text-center">
					Tri Komitmen <i><b>Kejujuran, Kebenaran, Keadilan</b></i>
				  </div>
			    </div>
			  </div>
			</div>
		</div>
		<?php }?>
	</div>
</div>

<?php $this->load->view('member/footer')?>