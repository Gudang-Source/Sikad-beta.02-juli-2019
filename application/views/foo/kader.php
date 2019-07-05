<?php $this->load->view('foo/footerfoo');?>
	<div class="container">
		<div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <h3 class="panel-title">DATA KADER KOTA MALANG</h3>
	                </div>
	                <div class="panel-body table-responsive">
	                    <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>NAMA</th>
	                                <th>Komisariat</th>
	                                <th>Rayon</th>
	                                <th>Username</th>
	                                <th>Password</th>
	                                <th>Asal</th>
	                                <th>No HP</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php if (!empty($data)) {?>
	                        <?php $i=1;
	                        foreach ($data as $key) {?>
	                            <tr>
	                                <td><?=$i;?></td>
	                                <td><?= $key['nama'];?></td>
	                                <td><?= $key['nama_kom'];?> <b>(<?= $key['kode_kom'];?>)</b></td>
	                                <td><?= $key['nama_rayon'];?> <b>(<?= $key['kode_rayon'];?>)</b></td>
	                                <td><?= $key['username'];?></td>
	                                <td><?= $key['password'];?></td>
	                                <td><?= $key['alamat_asal'];?></td>
	                                <td><?= $key['tlp'];?></td>
	                                <td>
	                                	<a href="" class="btn btn-xs btn-info"><span class="fa fa-edit"></span> </a>
	                                	<a href="" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span> </a>
	                                </td>
	                            </tr>
		                       <?php 
			                        $i++;
			                        }
			                        }else{?>
		                        	<tr>
		                        		<td colspan="8"><h1 class="text-center">DATA KOSONG <span class="fa fa-database"></span></h1></td>
		                        	</tr>
		                        <?php }?>  
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>

</body>
</html>