

        <!-- Page Content  -->
 <div id="content" class="p-4 p-md-5 pt-5">
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
<body class=" bg-gradient-light">
<div class="container mt-5">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-head text-center mt-4">
                	<b><h2>Hasil Pencarian</h2></b>
                </div>
                <hr class="ml-3 mr-3">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="records alert alert-dark">Hasil ditemukan: <b><?php echo $bnyk_data ?></b> Nomor Rekening</div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- data -->
                                <div class="result-body">
                                    <div class="table-responsive table-striped table-ligth table-hover">
                                        <table class="table widget-26">
                                            <tbody>
                                                <?php if($bnyk_data>0){ ?>
                                                <tr class="font-weight-bold bg-emas text-white text-center">
                                                    <td>No</td>
                                                    <td>Nomor Rekening</td>
                                                    <td>Nama Nasabah</td>
                                                    <td>Status</td>
                                                    <td>Keterangan</td>
                                                    <td>Lihat Laporan</td>
                                                </tr>
                                                <?php } ?>
                                               <?php   
                                               $no=1;

                                               foreach ($norek as $nr) : ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <div class="widget-26">
                                                            <?php echo $no++; ?>
                                                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Company" /> -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-title">
                                                            <b><?php echo $nr->no_rek ?></b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="widget-26-job-info">
                                                           <?php echo $nr->nama_nasabah ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td>
                                                        <div class="widget-26-job-salary">$ 50/hr</div>
                                                    </td> -->
                                                    <?php   if($nr->status == "Penipu") { 
                                                        $badge = "danger"; }
                                                        else
                                                        {
                                                            $badge = "warning";
                                                        } ?>
                                                    <td>
                                                        <h5>
                                                            <div class="badge badge-<?php echo $badge; ?>">
                                                               <!--  <i class="indicator bg-base"></i> -->
                                                               <span><?php echo $nr->status ?></span>
                                                           </div>
                                                       </h5>
                                                   </td>
                                                   <td> 
                                                    <?php    if (($bnyk_laporan[$no-1] == 0) && ($nr->status) == "Penipu" ){ 
                                                        
                                                          echo  "Ditambahkan Oleh Admin.";
                                                   
                                                   } else { 
                                                   
                                                           echo $bnyk_laporan[$no-1]." Laporan Terkonfirmasi.";
                                                
                                                  } ?>
                                               </td>
                                                    <td>

                                                        <?php if ($bnyk_laporan[$no-1] > 0) { ?>
                                                        <div class="text-center widget-26-job-starred">
                                                            <?php echo anchor('cari/view_laporan/'.$nr->no_rek, '<div class="btn btn-block btn-info"><i class="fa fa"> Lihat Laporan</i></div>') ?>
                                                        </div>
                                                    <?php } else 
                                                    { ?>
                                                            <div class="text-center widget-26-job-starred">
                                                            <div class="btn btn-primary btn-block disabled"><i class="fa fa-warn"> Tidak ada laporan</i></div>
                                                        </div>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="alert alert-secondary">
                                           <h6>Waktu proses pencarian  : <?= $waktu ?></h6>
                                       </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
      </div>
		</div>

 