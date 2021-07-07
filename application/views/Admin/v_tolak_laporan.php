<div class="container-fluid mt-4">

    <div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Form Tolak Lapaoran
    </div>

    <?php foreach($laporan as $lpr) : ?>
        <form method="post" action="">
        <div class="form-group">
            <input type="hidden" name="id_user" value="<?php echo $lpr->id_laporan?>">
            <label><b>Alasan Penolakan :</b></label>
            <textarea style="width:100%;height:300px;" class="form-control" name="pesan" placeholder="Masukkan alasan penolakan... "></textarea>
            <?php echo form_error('pesan', '<div class ="text-danger small" ml-3>') ?>
        </div> 
        <div class="form-group">
            <button onclick= "javascript: return confirm('Anda yakin ingin meolak laporan?')" type="submit" class="btn btn-emas">Konfirmasi</button>
        </div>
    </form>

    <?php endforeach; ?>
</div>