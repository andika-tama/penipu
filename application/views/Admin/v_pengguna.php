<div class="container-fluid mt-4">
    <div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Pengguna
    </div>

    <?php echo $this->session->flashdata('pesan') ?>


    <table class="table table-bordered table-striped table-hover">
            <tr class="text-center bg-emas text-white">    
                <th width="20px">No</th>
                <!-- <th width="120px">Kode Bank</th> -->
                <th width="200px">Username</th>
                <th width="300px">Nama Pengguna</th>
                <th width="450px">Email</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php   
            $no=1;

            foreach ($pengguna as $pgn) : ?>
                <tr>
                        <td> <?php  echo $no++ ?></td>  
                        <!-- <td>    <?php   echo $bk->id_bank ?></td> -->
                        <td><?php echo $pgn->username ?></td> 
                        <td><?php echo $pgn->nama_pelapor ?></td>
                        <td><?php echo $pgn->email ?></td>  
                        <td width="20px"><?php echo anchor('admin/pengguna/edit/'.$pgn->id_user, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                        <td width="20px" onclick= "javascript: return confirm('Anda yakin menghapus data?')"><?php echo anchor('admin/pengguna/hapus/'.$pgn->id_user, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
            <?php   endforeach; ?>    
    </table>
</div>