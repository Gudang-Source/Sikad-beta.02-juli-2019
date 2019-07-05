<?php $this->load->view('cabang/header_cabang');?>
		<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/select2.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
	<button type="button" class="btn btn-warning btn-xs" onclick="history.back(-1)" /><span class="fa fa-arrow-left"></span> Back</button><br />	<br />
<div class="row">
	<div class="col-xs-12">
	
		<div>
			<div id="user-profile-2" class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active">
							<a data-toggle="tab" href="#home">
								<i class="green ace-icon fa fa-user bigger-120"></i>
								Profile
							</a>
						</li>


						<li>
							<a data-toggle="tab" href="#friends">
								<i class="blue ace-icon fa fa-users bigger-120"></i>
								Rayon
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#kader">
								<i class="blue ace-icon fa fa-users bigger-120"></i>
								Kader Komisariat 
							</a>
						</li>

					</ul>
<?php foreach($data as $d) {?>
								<div class="tab-content no-border padding-24">
									<div id="home" class="tab-pane in active">

										<div class="row">
											<div class="col-xs-12 col-sm-3 center">
												<span class="profile-picture">
													<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?=base_url();?>assets/images/logo/pmii.jpg" />
												</span>

												<div class="space space-4"></div>
											</div><!-- /.col -->
										
											<div class="col-xs-12 col-sm-9">
												<h4 class="blue">
													<span class="middle">
														Profile Komisariat <b><?=$d['nama_kom']?> </b>
													</span>
												</h4>

												<div class="profile-user-info">
													<div class="profile-info-row">
														<div class="profile-info-name"> Komisariat </div>

														<div class="profile-info-value">
															<span><?=$d['nama_kom']?></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Location </div>

														<div class="profile-info-value">
															<i class="fa fa-map-marker light-orange bigger-110"></i>
															<span><?=$d['alamat']?></span>
															
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Since </div>

														<div class="profile-info-value">
															<span><?=date("D-M-Y", strtotime($d['since']))?></span>
														</div>
													</div>

												</div>

												<div class="hr hr-8 dotted"></div>

												<div class="profile-user-info">
													<div class="profile-info-row">
														<div class="profile-info-name"> Website </div>

														<div class="profile-info-value">
															<a href="#" target="_blank">
																<?=$d['media']?>
															</a>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name">
															<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
														</div>

														<div class="profile-info-value">
															<a href="#" target="_blank">Find me on Facebook</a>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name">
															<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
														</div>

														<div class="profile-info-value">
															<a href="#" target="_blank">Follow me on Twitter</a>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name">
															<i class="middle ace-icon fa fa-instagram bigger-150 light-red"></i>
														</div>

														<div class="profile-info-value">
															<a href="#" target="_blank">Follow me on Twitter</a>
														</div>
													</div>
												</div>
											</div><!-- /.col -->

										</div><!-- /.row -->
										
										<div class="space-20"></div>

										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<div class="widget-box transparent">
													<div class="widget-header widget-header-small">
														<h4 class="widget-title smaller">
															<i class="ace-icon fa fa-check-square-o bigger-110"></i>
															Little About Me
														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															<p><?=$d['ket']?>
															</p>
														</div>
													</div>
												</div>
											</div>


										</div>
									</div><!-- /#home -->

									<div id="friends" class="tab-pane">
										<div class="profile-users clearfix">
										<?php foreach($rayon as $d ){?>
											<div class="itemdiv memberdiv">
												<div class="inline pos-rel">
													<div class="user">
														<a href="<?=base_url().'cabang/profile_rayon/'. $d['kode_rayon']?>">
															<img src="<?=base_url();?>assets/images/logo/pmii.jpg" alt="Bob Doe's avatar" />
														</a>
													</div>

													<div class="body">
														<div class="name">
															<a href="#">
																<span class="user-status status-online"></span>
																<?=$d['nama_rayon']?>
															</a>
														</div>
													</div>
												</div>
											</div>
										<?php }?>	
										</div>

										<div class="hr hr10 hr-double"></div>

										<ul class="pager pull-right">
											<li class="previous disabled">
												<a href="#">&larr; Prev</a>
											</li>

											<li class="next">
												<a href="#">Next &rarr;</a>
											</li>
										</ul>
									</div>

									<div id="kader" class="tab-pane">
										<div class="row">
											<div class="col-xs-12">

											<div class="clearfix">
													<div class="pull-right tableTools-container"></div>
													
											</div>
											<div class="table-header">	
												<?php if (!empty($d['nama_rayon'])) {?>
													DATA RAYON <?=$d['nama_rayon']?>
												<?php }else{?>	
													<h1 class="text-center">TIDAK ADA DATA <span class="fa fa-database"></span></h1>
												<?php }?>	
											</div>
											<div class="table-responsive">
															<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<tr >
															<th> Kode</th>
															<th> Foto</th>
															<th> Nama</th>
															<th> TTL</th>
															<th> ASAL</th>
															<th> Kampus</th>
															<th> fakultas</th>
															<th> Komisariat</th>
															<th> Rayon </th>
														</tr>
													</tr>
												</thead>

												<tbody>
												<?php foreach($kader as $a){?>
													<tr>
														<td > <?php echo $a['kode']; ?> </td>
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
														<td > <?php echo $a['lahir']; echo " "; echo $a['tgl_lahir'];?> </td>
														<td > <?php echo $a['alamat_asal']; ?> </td>
														<td > <?php echo $a['kampus']; ?></td>
														<td > <?php echo $a['fakultas']; ?></td>
														<td > <?php echo $a['kode_kom']; ?></td>
														<td > <?php echo $a['kode_rayon']; ?>
															<i><a href="<?=base_url('cabang/kta/'). $a['id']?>" target="_blank">
																<span class="fa fa-print"></span>
															</a></i>
														</td>

													</tr>
												<?php };?>	
												</tbody>
												</table>
												</div>
		</div>
										</div>										
									</div>
									
								</div>
<?php }?>											
							</div>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

		
		
		<script src="<?=base_url();?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootbox.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?=base_url();?>assets/js/select2.min.js"></script>
		<script src="<?=base_url();?>assets/js/spinbox.min.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap-editable.min.js"></script>
		<script src="<?=base_url();?>assets/js/ace-editable.min.js"></script>
		<script src="<?=base_url();?>assets/js/jquery.maskedinput.min.js"></script>

		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//editables 
				
				//text editable
			    $('#username')
				.editable({
					type: 'text',
					name: 'username'		
			    });
			
			
				
				//select2 editable
				var countries = [];
			    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
			        countries.push({id: k, text: v});
			    });
			
				var cities = [];
				cities["CA"] = [];
				$.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
					cities["CA"].push({id: v, text: v});
				});
				cities["IN"] = [];
				$.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
					cities["IN"].push({id: v, text: v});
				});
				cities["NL"] = [];
				$.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
					cities["NL"].push({id: v, text: v});
				});
				cities["TR"] = [];
				$.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
					cities["TR"].push({id: v, text: v});
				});
				cities["US"] = [];
				$.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
					cities["US"].push({id: v, text: v});
				});
				
				var currentValue = "NL";
			    $('#country').editable({
					type: 'select2',
					value : 'NL',
					//onblur:'ignore',
			        source: countries,
					select2: {
						'width': 140
					},		
					success: function(response, newValue) {
						if(currentValue == newValue) return;
						currentValue = newValue;
						
						var new_source = (!newValue || newValue == "") ? [] : cities[newValue];
						
						//the destroy method is causing errors in x-editable v1.4.6+
						//it worked fine in v1.4.5
						/**			
						$('#city').editable('destroy').editable({
							type: 'select2',
							source: new_source
						}).editable('setValue', null);
						*/
						
						//so we remove it altogether and create a new element
						var city = $('#city').removeAttr('id').get(0);
						$(city).clone().attr('id', 'city').text('Select City').editable({
							type: 'select2',
							value : null,
							//onblur:'ignore',
							source: new_source,
							select2: {
								'width': 140
							}
						}).insertAfter(city);//insert it after previous instance
						$(city).remove();//remove previous instance
						
					}
			    });
			
				$('#city').editable({
					type: 'select2',
					value : 'Amsterdam',
					//onblur:'ignore',
			        source: cities[currentValue],
					select2: {
						'width': 140
					}
			    });
			
			
				
				//custom date editable
				$('#signup').editable({
					type: 'adate',
					date: {
						//datepicker plugin options
						    format: 'yyyy/mm/dd',
						viewformat: 'yyyy/mm/dd',
						 weekStart: 1
						 
						//,nativeUI: true//if true and browser support input[type=date], native browser control will be used
						//,format: 'yyyy-mm-dd',
						//viewformat: 'yyyy-mm-dd'
					}
				})
			
			    $('#age').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 16,
						max : 99,
						step: 1,
						on_sides: true
						//,nativeUI: true//if true and browser support input[type=number], native browser control will be used
					}
				});
				
			
			    $('#login').editable({
			        type: 'slider',
					name : 'login',
					
					slider : {
						 min : 1,
						  max: 50,
						width: 100
						//,nativeUI: true//if true and browser support input[type=range], native browser control will be used
					},
					success: function(response, newValue) {
						if(parseInt(newValue) == 1)
							$(this).html(newValue + " hour ago");
						else $(this).html(newValue + " hours ago");
					}
				});
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
			
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						//onblur: 'ignore',  //don't reset or hide editable onblur?!
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							maxSize: 110000,//~100Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with 
							//examples/profile-avatar-update.js
			
							var deferred = new $.Deferred
			
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
							
							// ***END OF UPDATE AVATAR HERE*** //
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
				/**
				//let's display edit mode by default?
				var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
				if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
				*/
			
				//another option is using modals
				$('#avatar2').on('click', function(){
					var modal = 
					'<div class="modal fade">\
					  <div class="modal-dialog">\
					   <div class="modal-content">\
						<div class="modal-header">\
							<button type="button" class="close" data-dismiss="modal">&times;</button>\
							<h4 class="blue">Change Avatar</h4>\
						</div>\
						\
						<form class="no-margin">\
						 <div class="modal-body">\
							<div class="space-4"></div>\
							<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
						 </div>\
						\
						 <div class="modal-footer center">\
							<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
							<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
						 </div>\
						</form>\
					  </div>\
					 </div>\
					</div>';
					
					
					var modal = $(modal);
					modal.modal("show").on("hidden", function(){
						modal.remove();
					});
			
					var working = false;
			
					var form = modal.find('form:eq(0)');
					var file = form.find('input[type=file]').eq(0);
					file.ace_file_input({
						style:'well',
						btn_choose:'Click to choose new avatar',
						btn_change:null,
						no_icon:'ace-icon fa fa-picture-o',
						thumbnail:'small',
						before_remove: function() {
							//don't remove/reset files while being uploaded
							return !working;
						},
						allowExt: ['jpg', 'jpeg', 'png', 'gif'],
						allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
					});
			
					form.on('submit', function(){
						if(!file.data('ace_input_files')) return false;
						
						file.ace_file_input('disable');
						form.find('button').attr('disabled', 'disabled');
						form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
						
						var deferred = new $.Deferred;
						working = true;
						deferred.done(function() {
							form.find('button').removeAttr('disabled');
							form.find('input[type=file]').ace_file_input('enable');
							form.find('.modal-body > :last-child').remove();
							
							modal.modal("hide");
			
							var thumb = file.next().find('img').data('thumb');
							if(thumb) $('#avatar2').get(0).src = thumb;
			
							working = false;
						});
						
						
						setTimeout(function(){
							deferred.resolve();
						} , parseInt(Math.random() * 800 + 800));
			
						return false;
					});
							
				});
			
				
			
				//////////////////////////////
				$('#profile-feed-1').ace_scroll({
					height: '250px',
					mouseWheelLock: true,
					alwaysVisible : true
				});
			
				$('a[ data-original-title]').tooltip();
			
				$('.easy-pie-chart.percentage').each(function(){
				var barColor = $(this).data('color') || '#555';
				var trackColor = '#E2E2E2';
				var size = parseInt($(this).data('size')) || 72;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size/10),
					animate:false,
					size: size
				}).css('color', barColor);
				});
			  
				///////////////////////////////////////////
			
				//right & left position
				//show the user info on right or left depending on its position
				$('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
					var $this = $(this);
					var $parent = $this.closest('.tab-pane');
			
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $this.offset();
					var w2 = $this.width();
			
					var place = 'left';
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';
					
					$this.find('.popover').removeClass('right left').addClass(place);
				}).on('click', function(e) {
					e.preventDefault();
				});
			
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
			
			
				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});
				
				
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			});
		</script>

<?php $this->load->view('cabang/footer_cabang');?>
