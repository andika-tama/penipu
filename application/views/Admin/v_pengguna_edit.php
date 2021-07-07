<div class="container-fluid mt-4">

	<div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Update Data Pengguna
    </div>

    <?php foreach($pengguna as $pgn) : ?>
    	<form method="post" action="">
		<div class="form-group">
			<input type="hidden" name="id_user" value="<?php echo $pgn->id_user?>">
			<label>Username</label>
			<input type="text" name="username" placeholder="Masukkan username" class="form-control" value="<?php echo $pgn->username?>">
			<?php echo form_error('username', '<div class ="text-danger small" ml-3>') ?>
		</div>	

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Masukkan password" class="form-control" value="<?php echo $pgn->password?>">
			<?php echo form_error('password', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Pengguna</label>
			<input type="text" name="nama_pengguna" placeholder="Masukkan nama pengguna" class="form-control" value="<?php echo $pgn->nama_pelapor?>">
			<?php echo form_error('nama_pengguna', '<div class ="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" placeholder="Masukkan Email" class="form-control" value="<?php echo $pgn->email?>">
			<?php echo form_error('email', '<div class ="text-danger small" ml-3>') ?>
		</div>
		<button type="submit" class="btn btn-emas">Ubah</button>
	</form>

    <?php endforeach; ?>
</div>