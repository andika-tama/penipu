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
<body class=" bg-gradient-violet">
<div class="container">
<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                <form id="search-form" method="post" action="<?php echo base_url('cari/cari_data'); ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                
                                <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                                    <input type="text" name="norek" placeholder="Nomor Rekening" class="form-control" id="search" value="<?php echo set_value('norek'); ?>">
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-12 p-0">
                                  <select class="form-control" name="bank" value="<?php echo set_value('bank'); ?>">
                                      <option placeholder="" value="NULL">Pilih Bank</option>
                                      <?php foreach($bank as $bk) : ?>
                                      <option value="<?php echo $bk->id_bank ?>"><?php echo $bk->nama_bank ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-base">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<div class="row">
        <div class="col-12">
            <div class="card card-margin">
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
                                                    <td>
                                                        <h5>
                                                            <div class="badge badge-danger">
                                                               <!--  <i class="indicator bg-base"></i> -->
                                                               <span><?php echo $nr->status ?></span>
                                                           </div>
                                                       </h5>
                                                   </td>
                                                   <?php    if (($bnyk_laporan[$no-1] == 0) && ($nr->status) == "Penipu" ){ ?>
                                                        <td>
                                                           Nomor Rekening Ditambahkan Oleh Admin.
                                                   </td>
                                                   <?php} else { ?>
                                                   <td>
                                                           <?php echo $bnyk_laporan[$no-1]; ?> Laporan Terkonfirmasi.
                                                   </td>
                                               <?php    } ?>
                                                    <td>

                                                        <?php if ($bnyk_laporan[$no-1] > 0) { ?>
                                                        <div class="text-center widget-26-job-starred">
                                                            <?php echo anchor('cari/view_laporan/'.$nr->no_rek, '<div class="btn btn-block btn-info"><i class="fa fa"> Lihat Laporan</i></div>') ?>
                                                        </div>
                                                    <?php } else 
                                                    { ?>
                                                            <div class="text-center widget-26-job-starred">
                                                            <div class="btn btn-warning btn-block disabled"><i class="fa fa-warn"> Tidak ada laporan</i></div>
                                                        </div>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- navbar -->
                   <!--  <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">2</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">3</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
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