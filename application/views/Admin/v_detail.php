<style type="text/css">
img{
  max-height:800px;
  max-width:200px;
  height:auto;
  width:auto;
}
</style>
<?php foreach ($laporan as $lp) :?>
  <div class="container-fluid mt-4">
    <div class="alert alert-dark" role="alert">
      <i class="fas fa-university "></i> Detail Laporan <?php echo $lp->nama_pelapor  ?>
    </div>



    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Laporan oleh
        <small> <?php echo $lp->nama_pelapor ?></small>
      </h1>

      <hr class="bg-emas">

      <!-- Portfolio Item Row -->
      <hr class="bg-emas">
      <h4 class="my-6 text-center"><b> Keterangan Laporan </b></h4>
      <hr class="bg-emas">
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
      <!-- /.row -->
      <hr class="bg-emas">
      <h4 class="my-6 text-center"><b> Kronologi Penipuan </b></h4>
      <hr class="bg-emas">
      <div class="card border-warning"> 
        <div class="card-body"> 
          <div class="row justify-content-center mx-auto">
            <div class="col-md-9 col-sm-6 mb-4"> 
              <p style="text-align: justify;"> <?php   echo $lp->kronologi ?></p>
            </div>
          </div>
        </div>
      </div>
      <!-- Related Projects Row -->
      <hr class="bg-emas">
      <h4 class="my-6 text-center"><b> Bukti Penipuan </b></h4>
      <hr class="bg-emas">
      <div class="card border-warning"> 
        <div class="card-body"> 
          <div class="row">
            <?php   foreach ($foto as $ft) : ?>
              <div class="col-md-3 col-sm-3 pb-3">
                <a href="<?php echo base_url(); ?>aset/bukti/<?php   echo $ft->foto ?>">
                  <img src="<?php echo base_url(); ?>aset/bukti/<?php   echo $ft->foto ?>"alt="">
                </a>
              </div>
            <?php   endforeach; ?>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <hr class="bg-emas">
      <h4 class="my-6 text-center"><b> Status Konfirmasi </b></h4>
      <hr class="bg-emas"> 

      <div class="row justify-content-center mx-auto">
        <div class="col-md-12 col-sm-6 mb-4">
          <div class="card border-warning"> 
            <div class="card-body">
              <div class="row justify-content-center mx-auto">
                <div class="col-md-9 col-sm-6">
                  <?php if($lp->status_knfr == NULL){ ?>
                    <center><a  onclick= "javascript: return confirm('Anda yakin ingin menerima laporan?')" class="btn  btn-outline-success btn-block" href ="<?php echo base_url() ?>admin/laporan_masuk/konfirmasi/<?php echo $lp->id_laporan?>"><b> Terima</b></a></center>
                    <center>  <b> OR </b> </center>
                    <center width="100px"><a class="btn  btn-outline-danger btn-block" href ="<?php echo base_url() ?>admin/laporan_masuk/konfirmasi_tolak/<?php echo $lp->id_laporan?>" ><b>Tolak</b></a></center></td>
                    <?php $dis = "";}
                    else
                    {   
                      if($lp->status_knfr == "Diterima"){?>
                        <center><h5><div class="btn btn-success btn-block disabled">Laporan Diterima</div></h5></center>
                      <?php }
                      else { ?>
                       <center> <h5><div class="btn btn-danger btn-block disabled">Laporan Ditolak</div></h5></center>
                     <?php } ?>
                   <?php } ?> 
                 </center>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

 <?php endforeach; ?>

</div>
<!-- /.container -->