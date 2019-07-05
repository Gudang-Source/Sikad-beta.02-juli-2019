<?php $this->load->view('member/header');?>

<?=$this->session->flashdata('pesan')?>
<div class="container" style="margin-bottom: 10%">
	<h1><?=$title?> </h1>
	<strong><?=$id?></strong>
	<a href="<?=base_url()?>member/create_konten" class="btn btn-xs btn-primary">
		Compse <span class="fa fa-pencil"></span> 
	</a><br /> <br />
	<div class="row">
		<form class="form-horizontal" action="<?=base_url().'member/showdata'?>" method='POST'>
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-xs-4 col-sm-2">
						<select name="month" class="form-control">
							<option value="">pilih bulan</option>
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">Mei</option>
							<option value="6">Jun</option>
							<option value="7">Jul</option>
							<option value="8">Agt</option>
							<option value="9">Sep</option>
							<option value="10">Okt</option>
							<option value="11">Nov</option>
							<option value="12">Des</option>
						</select>
					</div>

					<div class="col-xs-4 col-sm-2">
						<select class="form-control" name="year">
							<?php foreach($month_yeer as $v):?>
								<option value="<?=$v->tahun?>"><?=$v->tahun?></option>
							<?php endforeach;?>	
						</select>
					</div>
					<div class="col-xs-4 col-sm-2">
						<button type="submit" class="btn btn-info">
							<span class="fa fa-search"></span>
						</button>
					</div>	
				</div>
			</div>	
		</form>
	</div>
	
	<div class="row">
		<div class="col-md-3">
			
			<h4><label class="label label-success"><b>Categories</b></label></h4>
			<ul class="list-group">
				<?php foreach($categori as $ct):?>
					<li class="list-group-item">
						<span class="badge"><?=$ct->jml?></span>
						<a href="<?=base_url()?>member/showcategori/<?=$ct->kategori?>"><?=$ct->kategori?></a>
					</li>
				<?php endforeach;?>
			</ul>
			
		</div>
		<div class="col-md-9 table-responsive">
			<table class="table table-condensed"> 
				<thead>
					<tr>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Kepada</th>
						<th>Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if (!empty($data)) {
					
					foreach($data as $v ):?>
					<tr>
						<td><?=$v->judul?></td>
						<td><?=$v->tanggal?></td>
						<td><?=$v->to_konten?></td>
						<td><?=$v->kategori?></td>
						<td>
							<a href="<?=base_url()?>member/edit/<?=$v->id_konten?>/<?=str_replace(' ', '-', $v->judul);?>" class="btn btn-xs btn-primary">
								<span class="fa fa-edit"></span>
							</a>
							<a href="<?=base_url()?>member/delete_konten/<?=$v->id_konten?>" class="btn btn-xs btn-danger">
								<span class="fa fa-trash"></span>
							</a>
							<a href="<?=base_url()?>member/readmore/<?=$v->id_konten?>/<?=str_replace(' ', '-', $v->judul);?>" class="btn btn-xs btn-info">
								<span class="fa fa-eye"></span>
							</a>
						</td>
					</tr>
					<?php endforeach;
					}else{?>
					<tr>
						<td colspan="5">
							<h4 class="alert alert-danger text-center">
								<span class="fa fa-database"></span> Tidak ada data 
							</h4>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>

	</div>
</div>


<?php $this->load->view('member/footer')?>