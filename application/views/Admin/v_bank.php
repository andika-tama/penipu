<div class="container-fluid mt-4">
    <div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> BANK
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <?php echo anchor('admin/bank/tambah_bank', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Bank</button>') ?>

    <table class="table table-bordered table-striped table-hover">
            <tr class="text-center bg-emas text-white">    
                <th width="20px">NO</th>
                <!-- <th width="120px">Kode Bank</th> -->
                <th>Nama Bank</th>
                <th width="150px">Jumlah Digit</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php   
            $no=1;

            foreach ($bank as $bk) : ?>
                <tr>
                        <td> <?php  echo $no++ ?></td>  
                        <!-- <td>    <?php   echo $bk->id_bank ?></td> -->
                        <td><?php echo $bk->nama_bank ?></td> 
                        <td><?php echo $bk->jml_digit ?></td> 
                        <td width="20px"><?php echo anchor('admin/bank/edit/'.$bk->id_bank, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                        <td width="20px" onclick= "javascript: return confirm('Anda yakin menghapus data?')"><?php echo anchor('admin/bank/hapus/'.$bk->id_bank, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
            <?php   endforeach; ?>    
    </table>
</div>