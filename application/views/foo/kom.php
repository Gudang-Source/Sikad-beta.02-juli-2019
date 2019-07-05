<?php $this->load->view('foo/footerfoo');?>
	<div class="container">
		<div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <h3 class="panel-title">DATA KOMISARIAT</h3>
	                </div>
	                <div class="panel-body table-responsive">
	                    <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Kode Kom</th>
	                                <th>Komisariat</th>
	                                <th>Jumlah Rayon</th>
	                                <th>Jumlah Kader</th>
	                                <th>status</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php if (!empty($data)) {?>
	                        <?php $i=1;
	                        foreach ($data as $key) {?>
	                            <tr>
	                                <td><?=$i;?></td>
	                                <td><?php echo $key['kode_kom'];?></td>
	                                <td><?php echo $key['nama_kom'];?></td>
	                                <?php 
	                                	$var = $this->foo_model->hitrayon($key['kode_kom']);
	                                	if (!empty($var)) {
	                                		foreach ($var as $value) {
		                                		echo "<td>".$value['jml']."</td>";
		                                	}
	                                	}else{
	                                		echo "<td>tidak Ada Rayon</td>";
	                                	}
                                	
	                                ;?>
	                                
	                                <?php 
	                                	$var = $this->foo_model->hitkaderkom($key['kode_kom']);
	                                	if (!empty($var)) {
	                                		foreach ($var as $value) {
		                                		echo "<td>".$value['jml']."</td>";
		                                	}
	                                	}else{
	                                		echo "<td>tidak Ada kader kom</td>";
	                                	}
                                	
	                                ;?>

	                                <td>
	                                	<?php 
	                                		if ($key['status'] == 'active') {
	                                			echo "<span class='btn btn-xs btn-success'>Active</span>";
	                                		}else{
	                                			echo "<span class='btn btn-xs btn-warning'>Inactive</span>";
	                                		}
	                                	;?>
	                                    
	                                </td>
	                                <td>
	                                	<a href="" class="btn btn-xs btn-info"><span class="fa fa-edit"></span> </a>
	                                	<a href="" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span> </a>
	                                	<a href="<?=base_url('foo/cetak_kom/').$key['kode_kom']?>" class="btn btn-xs btn-primary"><span class="fa fa-file-pdf-o"></span> </a>
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