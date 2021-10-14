<div class="card shadow mb-4">
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h5 class="m-0 font-weight-bold text-primary">Form Table Print</h5>
			<div class="right">
			</div>
	    </div>
        <?php echo form_open_multipart('upload_image/add_proses'); ?>
	    	<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Name</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" autofocus="" id="img_name" name="img_name" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Logo</label>
					  <div class="col-sm-9">
					    <input type="file" class="custom-file-input" id="img_file" name="img_file">
					    <label class="form-control custom-file-label" for="img_file">Pilih Gambar</label>
					  </div>
				</div>
	    	</div>
	    	<div class="card-footer">
	      	<!-- <div class="form-group row"> -->
				<button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
				<button type="Reset" class="btn btn-secondary"><i class="fas fa-spinner"></i> Reset</button>
			</div>
			<!-- </div> -->
		<?php echo form_close(); ?>
	</div>
