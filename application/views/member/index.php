<?php $this->load->view('member/header');?>

<?=$this->session->flashdata('pesan')?>
<div class="container" style="margin-bottom: 10%">
	<h1><?=$title?> </h1>
	<strong><?=$id?></strong><br /> <br />

	<div class="row">
		<?php foreach($data as $v):?>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<p><?=$v->judul?></p>
				<p><?=$v->nama_kom;?> - <?=$v->nama_rayon;?></p>
				<img src="<?=base_url()?>assets/images/logo/pc_pmii.jpg" class="img img-responsive">
				<b><?=date('d M Y H:s', strtotime($v->tanggal))?></b>
			</div>
		<?php endforeach;?>
	</div>
</div>


<?php $this->load->view('member/footer')?>