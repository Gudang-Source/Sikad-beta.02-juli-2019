<?php $this->load->view('foo/footerfoo');?>
<div class="container">
	<div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Cabang</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;
                        foreach ($data as $key) {?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $key['user_name'];?></td>
                                <td><?php echo $key['pass'];?></td>
                                <td>
                                	<?php 
                                		if ($key['status'] == 'active') {
                                			echo "<span class='btn btn-xs btn-success fa fa-check'> aktif</span>";
                                		}else{
                                			echo "<span class='btn btn-xs btn-danger fa fa-times'> non aktif</span>";
                                		}
                                	;?>
                                    
                                </td>
                                <td>
                                	<a href="<?=base_url().'foo/aktifkan/'.$key['id_user']?>" class="btn btn-xs btn-info"><span class="fa fa-check"></span> </a>
                                	<a href="<?=base_url().'foo/nonaktifkan/'.$key['id_user']?>" class="btn btn-xs btn-danger"><span class="fa fa-times"></span> </a>
                                </td>
                            </tr>
                        <?php $i++;
                        }?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>