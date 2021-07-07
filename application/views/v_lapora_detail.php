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
<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>General Search Results - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url() ?>aset/css/result.css" rel="stylesheet">
  <style type="text/css">

</style>
</head>
<div id="content" class="p-4 p-md-5 pt-5">
<body class=" bg-gradient-light">
  <div class="container">

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row mt-5">
      <div class="col-12">
        <div class="card card-margin">
          <div class="card-body">
            <div class="row search-body">
              <div class="col-lg-12">
                <div class="search-result">
                  <hr>
                  <!-- data -->
                  <div class="result-body">
                    <div class="card">
                      <div class="card-body"> 
                        <?php foreach ($laporan as $lp) :?>

                          <!-- Page Content -->
                          <div class="container">

                            <!-- Portfolio Item Heading -->
                            <h1 class="my-4">Laporan oleh
                              <small> <?php echo $lp->nama_pelapor ?></small>
                            </h1>

                            <hr class="bg-emas">

                            <!-- Portfolio Item Row -->
                            <hr class="bg-emas">
                            <h4 class="my-6 text-center text-secondary"><b> Keterangan Laporan </b></h4>
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
                            <h4 class="my-6 text-center text-secondary"><b> Kronologi Penipuan </b></h4>
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
                            <h4 class="my-6 text-center text-secondary"><b> Bukti Penipuan </b></h4>
                            <hr class="bg-emas">
                            <div class="card border-warning"> 
                              <div class="card-body"> 
                                <div class="row">
                                  <?php   foreach ($foto as $ft) : ?>
                                    <div class="col-md-3 col-sm-3 pb-3">
                                      <a href="<?php echo base_url(); ?>aset/bukti/<?php   echo $ft->foto ?>"">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>aset/bukti/<?php   echo $ft->foto ?> ?>"alt="">
                                      </a>
                                    </div>
                                  <?php   endforeach; ?>
                                </div>
                                <!-- /.row -->
                              </div>
                            </div>
                          </div>

                        <?php endforeach; ?>

                      </div>
                      <!-- /.container -->
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
