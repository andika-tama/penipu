<div class="container-fluid mt-4">

	<div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Input Data Bank
	</div>
	
	<form method="post" action="<?php echo base_url('admin/bank/input_bank') ?>">
		<div class="form-group">
			<label>Nama Bank</label>
			<input type="text" name="nama_bank" placeholder="Masukkan Nama Bank" class="form-control">
			<?php echo form_error('nama_bank', '<div class ="text-danger small" ml-3>') ?>
		</div>	
		<div class="form-group">
			<label>Jumlah Digit</label>
			<input type="number" name="jml_digit" placeholder="Masukkan Jumlah Digit Nomor Rekening" class="form-control">
			<?php echo form_error('jml_digit', '<div class ="text-danger small" ml-3>') ?>
		</div>
		<button type="submit" class="btn btn-emas">Tambah</button>
	</form>
</div>