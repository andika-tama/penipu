<div class="container-fluid mt-4">

	<div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Input Data Nomor Rekening
	</div>
	
	<form method="post" action="<?php echo base_url('admin/norek/input_norek') ?>">
		<div class="form-group">
			<label>Nomor Rekening</label>
			<input type="text" name="norek" placeholder="Masukkan Nomor Rekening" class="form-control">
			<?php echo form_error('norek', '<div class ="text-danger small" ml-3>') ?>
		</div>	
		<div class="form-group">
			<label>Nama Nasabah</label>
			<input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control">
			<?php echo form_error('nama_nasabah', '<div class ="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Bank</label>
			<select class="form-control" name="bank" id="exampleFormControlSelect1">
				<?php foreach($bank as $bk) : ?>
      			<option value="<?php echo $bk->id_bank ?>"><?php echo $bk->nama_bank ?></option>
      			<?php endforeach; ?>
    		</select>
			<!-- <input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control"> -->
			<?php echo form_error('bank', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status" id="exampleFormControlSelect2">
      			<option value="Terlapor">Terlapor</option>
      			<option value="Penipu">Penipu</option>
      			<option value="Tidak Diketahui">Tidak Diketahui</option>
    		</select>
			<!-- <input type="text" name="nama_nasabah" placeholder="Masukkan Nama Nasabah" class="form-control"> -->
			<?php echo form_error('status', '<div class ="text-danger small" ml-3>') ?>
		</div>
		<button type="submit" class="btn btn-emas">Tambah</button>
	</form>
</div>