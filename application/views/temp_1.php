<style type="text/css">
img{
  max-height:800px;
  max-width:500px;
  height:auto;
  width:auto;
}
</style>

<!DOCTYPE html>
<html lang="en">

<div id="content" class="p-4 p-md-5 pt-5">
  <body class=" bg-gradient-light">
    <div class="container">
      <?php $urut = 1; ?>
      <?php echo $this->session->flashdata('pesan'); $no = 0;?>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card card-margin bg-light">
            <div class="card-body">
              <div class="row search-body">
                <div class="col-lg-12">
                  <div class="search-result">
                    <h3><b> <center>  Daftar Laporan  </center> </b></h3>
                    <hr>
                    <!-- data -->
                    <div class="result-body">
                      <div class="card">
                        <div class="card-body"> 
                          <?php foreach ($laporan as $lp) : ?>       
                            <div class="btn btn-info btn-block mb-3" type="button" data-toggle="collapse" data-target="#laporan<?php echo $no; ?>" aria-expanded="false" aria-controls="laporan"> 
                              <div class="row justify-content-center mx-auto">
                                <div class="col-md-6 col-sm-6 text-left"> 
                                 #<?php echo $urut++; ?>
                               </div>                                  
                               <div class="col-md-6 col-sm-6 text-right"> 
                                <?php echo $lp->tgl_laporan ?>
                              </div>
                            </div>
                          </div>
                          <!-- Page Content -->
                          <div class="container">
                            <!-- Portfolio Item Heading -->
                            <hr class="bg-emas">
                            <!-- Portfolio Item Row -->
                            <div class="row">
                              <div class="col-md-6 col-sm-6 mb-4"> 
                                <table class="table table-hover table-borderless text-left"> 
                                  <tr>  
                                    <th class="text-center">Nomor Rekening </th>
                                    <td>  : </td>
                                    <td>  <?php   echo $lp->norek ?></td>
                                  </tr>
                                  <tr>  
                                    <th class="text-center">Jumlah kerugian </th>
                                    <td>  : </td>
                                    <td> Rp.  <?php   echo $lp->jml_kerugian ?></td>
                                  </tr>
                                  <tr>  
                                    <th class="text-center">Media Penipuan </th>
                                    <td>  : </td>
                                    <td>  <?php   echo $lp->media ?></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-md-6 col-sm-6 mb-4"> 
                                <table class="table table-hover table-borderless text-left"> 
                                  <tr>  
                                    <th class="text-center">Tanggal Transaksi </th>
                                    <td>  : </td>
                                    <td>  <?php   echo $lp->tgl_transaksi ?></td>
                                  </tr>
                                  <tr>  
                                    <th class="text-center">Tanggal Laporan </th>
                                    <td>  : </td>
                                    <td> <?php   echo $lp->tgl_laporan ?></td>
                                  </tr>
                                  <tr>  
                                    <th class="text-center">Status Konfirmasi </th>
                                    <td>  : </td>
                                    <?php   if($lp->status_knfr == NULL) {?>
                                      <td> <h6>   <div class="badge badge-secondary">Menunggu Konfirmasi </div> </h6></td>
                                    <?php   } else { ?>
                                      <?php if($lp->status_knfr == 'Diterima'){ ?>
                                        <td> <h6>   <div class="badge badge-success">Diterima </div> </h6></td>
                                      <?php }  else  { ?>
                                        <td> <h6>   <div class="badge badge-danger">Ditolak </div> </h6></td>
                                      <?php } ?>
                                    <?php } ?>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <div class="row justify-content-center mx-auto">
                              <div class="col-md-12 col-sm-6 mb-4">
                                <div class="card border-warning"> 
                                  <div class="card-body"> 
                                    <center>
                                      <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                          <a class="btn btn-primary btn-block" href ="<?php echo base_url() ?>cari/detail_laporan/<?php echo $lp->id_laporan?>"><i class="fa fa-search mr-2"></i><b>Detail Laporan</b></a>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                          <a class="btn  btn-success btn-block" href ="<?php echo base_url() ?>laporan/edit_laporan/<?php echo $lp->id_laporan?>"><i class="fa fa-edit mr-2"></i><b>Edit Laporan</b></a>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                          <a onclick= "javascript: return confirm('Anda yakin menghapus data?')" class="btn btn-danger btn-block" href ="<?php echo base_url() ?>laporan/hapus_laporan/<?php echo $lp->id_laporan?>"><i class="fa fa-trash mr-2"></i><b>Hapus Laporan</b></a>
                                        </div>

                                        <?php if($lp->status_knfr == NULL) : ?>
                                          <div class="col-md-3 col-sm-6">
                                            <button class="btn  btn-emas btn-block disabled" href ="<?php echo base_url() ?>cari/detail_laporan/<?php echo $lp->id_laporan?>"><i class="fa fa-file mr-2"></i><b>Pesan Admin</b></button>
                                          </div>
                                        <?php endif; ?>
                                        <?php if($lp->status_knfr != NULL) : ?>
                                          <div class="col-md-3 col-sm-6">
                                            <button class="btn  btn-emas btn-block" data-toggle="modal" data-target="#PesanAdmin<?php echo $lp->id_laporan;?>"><i class="fa fa-file mr-2"></i><b>Pesan Admin</b></button>
                                          </div>
                                        <?php endif; ?>
                                      </div>
                                    </center>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr class="bg-emas">
                          </div>
                          <!-- /.container -->
                        <?php endforeach; ?>
                      </div>    
                    </div>
                  </div>
                  <hr>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>


<?php $no = 0;
foreach ($laporan as $lp): $no++; ?>
  <div class="modal fade" id="PesanAdmin<?php echo $lp->id_laporan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Pesan Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover table-borderless text-left"> 
            <tr>  
              <th >Laporan (Nomor Rekening) </th>
              <td>  : </td>
              <td>  <?php   echo $lp->norek ?></td>
            </tr>
            <tr>  
              <th >Tanggal Konfirmasi </th>
              <td>  : </td>
              <td>  <?php   echo $lp->tgl_knfr ?></td>
            </tr> 
            <tr>  
              <th >Status Konfirmasi </th>
              <td>  : </td>
              <td>  <?php   echo $lp->status_knfr ?></td>
            </tr> 
            <tr>  
              <th colspan="3" class="text-center">Pesan</th>
            </tr>
            <tr>
              <td colspan="3" class="text-center"> <?php   echo $lp->pesan_knfr ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
    <!-- END Modal Edit bahan -->