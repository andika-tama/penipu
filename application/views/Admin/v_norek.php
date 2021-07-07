<div class="container-fluid mt-4">
    <div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Nomor Rekening
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

   <?php echo anchor('admin/norek/tambah_norek', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Nomor Rekening</button>') ?>

    <table class="table table-bordered table-striped table-hover">
            <tr class="text-center bg-emas text-white">    
                <th width="20px">NO</th>
                <!-- <th width="120px">Kode Bank</th> -->
                <th>Nomor Rekening</th>
                <th>Nama Nasabah</th>
                <th>Bank</th>
                <th>status</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php   
            $no=1;

            foreach ($norek as $nr) : ?>
                <tr>
                    <td> <?php  echo $no++ ?></td>  
                        <!-- <td>    <?php   echo $bk->id_bank ?></td> -->
                    <td><?php echo $nr->no_rek ?></td> 
                    <td><?php echo $nr->nama_nasabah ?></td> 
                    <td><?php echo $nr->nama_bank ?></td> 
                    <td><?php echo $nr->status ?></td> 
                    <td width="20px"><?php echo anchor('admin/norek/edit/'.$nr->no_rek, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                    <td width="20px" onclick= "javascript: return confirm('Anda yakin menghapus data?')"><?php echo anchor('admin/norek/hapus/'.$nr->no_rek, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
            <?php   endforeach; ?>    
    </table>
</div>