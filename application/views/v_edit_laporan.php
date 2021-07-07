<link href="<?php echo base_url() ?>aset/css/lapor.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<body class="bg-gradient-light">
	<div id="content" class="p-4 p-md-5 pt-5">
<div class="container mb-3 mt-3">
	<div class="row">
		<div class="col-md-3 pl-5 pr-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2 class="text-white">Edit Laporan</h2>
				<h4 class="text-white">Edit Laporan Anda!</h4>
			</div>
		</div>
		<div class="col-md-9 pl-5">
			<?php echo $this->session->flashdata('pesan'); ?>
			<div class="contact-form">
				<div class="form-group">
					<?php echo form_open_multipart(); ?>
						<?php 	foreach ($laporan as $lp) : ?>
						<input type="hidden" name="id" value="<?php echo $lp->id_laporan ?>">
						<label class="control-label col-sm-4" for="fname">Nomor Rekening*</label>
						<div class="col-sm-11">          
							<input type="text" class="form-control" id="fname" placeholder="Masukkan nomor rekening" name="norek" value="<?php echo $lp->norek; ?>" disabled>
						</div>
						<?php echo form_error('norek', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-4" for="email">Media Penipuan*</label>
						<div class="col-sm-11">
							<input type="text" class="form-control" id="email" placeholder="Ex: Facebook, Instagram, etc..." name="media" value="<?php echo $lp->media ?>">
						</div>
						<?php echo form_error('media', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="email">Jumlah kerugian*</label>
						<div class="col-sm-11">
							<input type="text" class="form-control" id="email" placeholder="Masukkan jumlah kerugian" name="jml" value="<?php echo $lp->jml_kerugian ?>">
						</div>
						<?php echo form_error('media', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="comment">Kronologi:*</label>
						<div class="col-sm-11">
							<textarea class="col-sm-12 text-secondary" rows="5" id="comment" name="kronologi" placeholder="Jelaskan kronologi penipuan sedetail mungkin..."><?php echo $lp->kronologi; ?></textarea>
						</div>
						<?php echo form_error('kronologi', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				<?php 	endforeach; ?>

				<!-- di sini tambah checkbox! -->
					<div class="form-group">
						<label class="control-label col-sm-10" for="email">Bukti (Lampirkan file, minimal 1 bukti dan maksimal 4 bukti)*</label>
						<div class="col-sm-11">
							<div class="form-check">
								<input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="hapus_foto" value="yes" aria-label="..."> Hapus bukti lama
							</div>
							<div class="custom-file mt-3">
								<input type="file" class="file-input" name="bukti1[]" multiple >
							</div>
						</div>
					</div>
					<?php echo form_error('bukti1[]', '<small class="text-danger pl-3">', '</small>'); ?>
<!--  -->
					<div class="form-group">
						<label class="control-label col-sm-4 text-danger" for="email">(*) : Wajib diisi!</label>
					</div>

					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-emas">Submit</button>
						</div>
					</div>
				<?php 	echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</body>
