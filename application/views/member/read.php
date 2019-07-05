<?php $this->load->view('member/header');?>

<?=$this->session->flashdata('pesan')?>
<div class="container" style="margin-bottom: 10%">
	<div class="row">
		<div class="col-md-12">
			<?php foreach($data as $v ):?>
				<h1><?=$v->judul?></h1>
				<p><?=$v->tanggal?></p>
				<p>
					<?php 
						if($v->to_konten == 1){
							echo "Cabang";
						}elseif($v->to_konten == 2){
							echo "Komsariat";
						}elseif ($v->to_konten == 3) {
							echo "Rayon";
						}else{
							echo "Self";
						}
				?></p>
				<p><?=$v->posting?></p>
				<?=$v->kategori?>
			<?php endforeach;?>
		</div>		
	</div>
</div>


<?php $this->load->view('member/footer')?>