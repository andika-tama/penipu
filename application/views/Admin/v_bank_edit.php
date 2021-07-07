<div class="container-fluid mt-4">

	<div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Update Data Bank
    </div>

    <?php foreach($bank as $bk) : ?>
    	<form method="post" action="">
		<div class="form-group">
			<input type="hidden" name="id_bank" value="<?php echo $bk->id_bank?>">
			<label>Nama Bank</label>
			<input type="text" name="nama_bank" placeholder="Masukkan Nama Bank" class="form-control" value="<?php echo $bk->nama_bank?>">
			<?php echo form_error('nama_bank', '<div class ="text-danger small" ml-3>') ?>
		</div>	

		<div class="form-group">
			<label>Jumlah Digit</label>
			<input type="number" name="jml_digit" placeholder="Masukkan Jumlah Digit Nomor Rekening" class="form-control" value="<?php echo $bk->jml_digit?>">
			<?php echo form_error('jml_digit', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-emas">Ubah</button>
	</form>

    <?php endforeach; ?>
</div>