<?php $this->load->view('cabang/header_cabang');?>

<h2 class="text-center"> <b> UBAH BRAND HEADER </b> <hr /> </h2>

<?php $class = "class = 'form-horizontal'";
echo form_open('cabang/do_edit_header', $class, '');?>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NAMA PC / BRAND BARU</label>

		<div class="col-sm-9">
		<input type="text" name="brand" id="form-field-1" placeholder="Contoh : PC PMII XXX" class="col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="form-group text-center">
		
		<div class="col-sm-12">
			<button type="reset" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-repeat"></span> Reset</button>
			<button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save </button>
		</div>
	</div>

</form>	
<?php $this->load->view('cabang/footer_cabang');?>