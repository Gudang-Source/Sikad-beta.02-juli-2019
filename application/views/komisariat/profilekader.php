<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Curiculum Vitea</title>
	<link rel="icon" href="<?=base_url()?>assets/images/logo/pmii.jpg">
	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/signin.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

</head>
<body>
<h1 class="text-center" style="text-transform: uppercase;"><?=$title?></h1>
	<div class="container">
		<div class="row">
		<?php foreach ($data as $key) {?>
			<div class="panel panel-primary">
				<div class="panel-heading"> <u>Nomor Induk Kader</u> :<h6 style="text-transform: uppercase;"> <?=$key['username']?></h6></div>
				<div class="panel-body">
				  	<div class="col-sm-offset-6">
					  	<?php if (!empty($key['foto'])) {?>
					  		<img src="<?=base_url()?>assets/foto/<?=$key['foto']?>" width="350px">
					  	<?php }else{?>	
					  		<h1 class="thumbnail text-center" style="color: red"> Belum Ada Foto</h1>
					  	<?php }?>	
				  	</div>
				</div>
				<div class="table-responsive">
				
				  <table class="table table-bordered">
				    <tr >
				    	<th>Nama</th>
				    	<td><?=$key['nama']?></td>
				    </tr>
				    <tr >
				    	<th>Nim</th>
				    	<td><?php if ($key['nim'] != "0") {echo $key['nim'];}else{echo "<b style='color: red'>Belom Ada Nomor Induk Mahasiswa</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>TTL</th>
				    	<td><?php if(empty($key['lahir'])){echo "<b style='color: red;'>Tempat Lahir Belum Ada</b>";}else{echo $key['lahir'];}?>, 
				    		<?php if($key['tgl_lahir'] != "0000-00-00"){ date( 'd F Y' ,strtotime($key['tgl_lahir']));}else{echo "<b style='color: red'>Tanggal lahir belum di atur</b>";}?>
				    	</td>
				    </tr>
				    <tr>
				    	<th>Tahun Masuk</th>
				    	<td><?php if($key['since_enter'] != "0000-00-00") {echo date("d F Y", strtotime($key['since_enter']));}else{echo "<b style='color: red'>Tanggal Masuk PMII belum di atur</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Kampus</th>
				    	<td><?php if (!empty($key['kampus'])) {echo $key['kampus'];}else{echo "<b style='color: red'>Kampus belum di atur</b>";}?></td>
				    </tr>
				    <tr>
				    	<th>Fakultas</th>
				    	<td><?php if (!empty($key['fakultas'])) {echo $key['fakultas'];}else{echo "<b style='color: red'>Fakultas belum di atur</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Jurusan</th>
				    	<td><?php if (!empty($key['jurusan'])) {echo $key['jurusan'];}else{echo "<b style='color: red'>jurusan belum di atur</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Asal</th>
				    	<td><?php if (!empty($key['alamat_asal'])) {echo $key['alamat_asal'];}else{echo "<b style='color: red'>Alamat asal belum di atur</b>";}?></td>
				    </tr>
				    <tr>
				    	<th>Alamat di Malang</th>
				    	<td><?php if ($key['alamat_malang'] != "") {echo $key['alamat_malang'];}else{echo "<b style='color: red'>Alamat Di Malang belum di atur</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Komisariat</th>
				    	<td><?=$key['nama_kom']?></td>
				    </tr>
				    <tr>
				    	<th>Rayon</th>
				    	<td><?php if ($key['nama_rayon'] == "") {echo "00";}else{echo $key['nama_rayon'];}?></td>
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
				    	<td><?php if ($key['tlp_ortu'] != "0") {echo $key['tlp_ortu'];}else{echo "<b style='color: red'>Belom Ada NO tlp</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Alamat Orang Tua</th>
				    	<td><?php if (!empty($key['alamat_ortu'])) {echo $key['alamat_ortu'];}else{echo "<b style='color: red'>Alamat Orang Tua belum di atur</b>";}?></td>
				    </tr>
				    <tr>
				    	<th>Email</th>
				    	<td><?php if (!empty($key['email'])) {echo $key['email'];}else{echo "<b style='color: red'>Email belum di atur</b>";}?></td>
				    </tr>
				    <tr >
				    	<th>Facebook</th>
				    	<td><?=$key['fb']?></td>
				    </tr>
				    <tr>
				    	<th>Twitter</th>
				    	<td><?=$key['tw']?></td>
				    </tr>
				    <tr >
				    	<th>Instagram</th>
				    	<td><?=$key['ig']?></td>
				    </tr>
				    <tr>
				    	<th>Bakat</th>
				    	<td><?=$key['bakat']?></td>
				    </tr>
				    <tr >
				    	<th>Minat</th>
				    	<td><?=$key['minat']?></td>
				    </tr>
				    <tr>
				    	<th>Pengalaman Organisasi</th>
				    	<td><?=$key['organisasi']?></td>
				    </tr>
				    <!--<tr>
				    	<th>Status Keanggotaan</th>
				    	<td><?php 
					    		if ($key['st_pc'] == "ya" && $key['st_pk'] == "ya" && $key['st_pr'] == "ya") {
					    			echo "Pengurus Cabang";
				    			}elseif ($key['st_pc'] == "tidak" && $key['st_pk'] == "ya" && $key['st_pr'] == "ya") {
				    				echo "Pengurus Komisariat";
				    			}elseif ($key['st_pc'] == "tidak" && $key['st_pk'] == "tidak" && $key['st_pr'] == "ya") {
				    				echo "Pengurus Rayon";
				    			}else{
				    				echo "Anggota Rayon";
				    			}
				    		?>
				    	</td>
				    </tr>-->
				  </table>
				</div>
				<div class="panel-footer text-center">
					<i><b>Dzikir, Fikir, Amal Sholeh</b></i>
				</div>
			</div>
		<?php }?>
		</div>

	</div>

	<div class="modal fade" id="myModal">
	  <div class="modal-dialog text-center">
	    <div class='alert alert-success'>
	    	<h3 class='form-signin-heading'>
	    	<b>kalaw mau print tekan tombol</b> <br/>
	    	<br/>
	    	<b>Ctrl + P</b>
	    	<p><b>jangan lupa di <i>Close</i> dulu POPUP nya</b></p>
	    	</h3>
	    </div>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Close</button>
	  </div>
	</div>
	<script type="text/javascript">
		$('#myModal').modal('show');
	</script>
</body>
</html>