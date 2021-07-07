<div class="container-fluid mt-4">
    <div class="alert alert-dark" role="alert">
        <i class="fas fa-university "></i> Daftar Laporan Masuk
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

<!--    <?php echo anchor('admin/norek/tambah_norek', '<button class="btn btn-sm btn-emas mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Nomor Rekening</button>') ?> -->

    <table class="table table-bordered table-striped table-hover">
            <tr class="text-center  bg-emas text-white">    
                <th width="10px">No</th>
                <!-- <th width="120px">Kode Bank</th> -->
                <th width="180px">Nama Pelapor</th>
                <th width="150px">Nomor Rekening</th>
                <th width="120px">Kerugian</th>
                <th width="130px">Tanggal Transaksi</th>
                <th width="200px">Status konfirmasi</th>
                <th colspan="2">Konfirmasi</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php   
            $no=1;

            foreach ($laporan as $nr) : ?>
                <tr>
                    <td> <?php  echo $no++ ?></td> 
                    <td><?php echo $nr->nama_pelapor ?></td>
                        <!-- <td>    <?php   echo $bk->id_bank ?></td> -->
                    <td><?php echo $nr->norek ?></td> 
                    <td class="text-center"><?php echo $nr->jml_kerugian ?></td> 
                    <td class="text-center"><?php echo $nr->tgl_transaksi ?></td> 
                    <td> 
                        <center>
                            <?php if($nr->status_knfr == NULL){ ?>
                                <h5><div class="badge badge-secondary">Menunggu Konfirmasi</div> </h5>
                            <?php $dis = "";}
                            else
                            {   
                                if($nr->status_knfr == "Diterima"){?>
                                    <h5><div class="badge badge-success">Laporan Diterima</div></h5>
                                <?php }
                                else { ?>
                                    <h5><div class="badge badge-danger">Laporan Ditolak</div></h5>
                                <?php } ?>
                            <?php $dis='disabled';} ?> 
                        </center>
                    </td> 
                    <td width="20px"><a  onclick= "javascript: return confirm('Anda yakin ingin menerima laporan?')" class="btn btn-sm btn-success <?php echo $dis ?>" href ="<?php echo base_url() ?>admin/laporan_masuk/konfirmasi/<?php echo $nr->id_laporan?>" <?php echo $dis ?> ><i class="far fa-check-circle"></i></a></td>
                    <td width="20px"><a class="btn btn-sm btn-danger <?php echo $dis ?>" href ="<?php echo base_url() ?>admin/laporan_masuk/konfirmasi_tolak/<?php echo $nr->id_laporan?>" <?php echo $dis ?> ><i class="fas fa-times-circle"></i></a></td>
                    <td width="20px"><?php echo anchor('admin/laporan_masuk/detail_laporan/'.$nr->id_laporan, '<div class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></div>') ?></td>
                    <td width="20px" onclick= "javascript: return confirm('Anda yakin menghapus data?')"><?php echo anchor('admin/norek/hapus/'.$nr->id_laporan, '<div class="btn btn-sm btn-danger" label="Hapus"><i class="fa fa-trash"></i></div>') ?></td>
                </tr>
            <?php   endforeach; ?>    
    </table>
</div>