<div class="container-fluid mt-4">

	<div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Update Nomor Rekening
    </div>

    <?php foreach($norek as $nk) : ?>
    	<form method="post" action="">
		<div class="form-group">
			<input type="hidden" name="id_norek" value="<?php echo $nk->no_rek?>">
			<label>Nomor Rekening</label>
			<input type="text" name="norek" placeholder="Masukkan Nomor Rekening" class="form-control" value="<?php echo $nk->no_rek?>">
			<?php echo form_error('norek', '<div class ="text-danger small" ml-3>') ?>
		</div>	

		<div class="form-group">
			<label>Nama Nasabah</label>
			<input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control" value="<?php echo $nk->nama_nasabah?>">
			<?php echo form_error('nama_nasabah', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Bank</label>
			<select class="form-control" name="bank" id="exampleFormControlSelect1">
				<?php foreach($bank as $bk) : ?>
      			<option value="<?php echo $bk->id_bank ?>" <?php $pilih = ($nk->id_b == $bk->id_bank)? 'selected' : ''; echo $pilih ?>><?php echo $bk->nama_bank ?></option>
      			<?php endforeach; ?>
    		</select>
			<!-- <input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control"> -->
			<?php echo form_error('bank', '<div class ="text-danger small" ml-3>') ?>
		</div>

		
		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status" id="exampleFormControlSelect2">
      			<option value="Terlapor" <?php $pilih = ($nk->status == "Terlapor")? 'selected' : ''; echo $pilih ?>>Terlapor</option>
      			<option value="Penipu" <?php $pilih = ($nk->status == "Penipu")? 'selected' : ''; echo $pilih ?>>Penipu</option>
      			<option value="Tidak Diketahui"<?php $pilih = ($nk->status == "Tidak Diketahui")? 'selected' : ''; echo $pilih ?>>Tidak Diketahui</option>
    		</select>
			<!-- <input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control"> -->
			<?php echo form_error('status', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-emas">Ubah</button>
	</form>

    <?php endforeach; ?>
</div>