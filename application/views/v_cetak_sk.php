<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br><br><br><br><br><br><br><br>

	<div><center><h3><b><u>SURAT KETERANGAN</u></b></h3></center></div>
	<center class ="ml-3">Nomor: SK/&nbsp;&nbsp;&nbsp;&nbsp;/V/2021/JKT/Cilincing </center>

	<br><br><br>
	<div class="row">
		<div class="col-md-1 col-sm-6 mb-4"></div>
		<div class="col-md-9 col-sm-6 mb-4">
			<p>Pada tanggal <?php echo $tgl_laporan ?>, laporan dibuat oleh seorang Laki-laki/Perempuan dengan Identitas sebagai berikut: </p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-sm-6 mb-4"></div>
		<div class="col-md-2 col-sm-6 mb-4">Nama</div>
		<div class="col-md-1 col-sm-6 mb-4">:</div>
		<div class="col-md-5 col-sm-6 mb-4"><?php echo $nama ?></div>
	</div>
	<div class="row">
		<div class="col-md-2 col-sm-6 mb-4"></div>
		<div class="col-md-2 col-sm-6 mb-4">Tanggal Lahir</div>
		<div class="col-md-1 col-sm-6 mb-4">:</div>
		<div class="col-md-5 col-sm-6 mb-4"><?php echo $tanggal_lahir ?></div>
	</div>	
	<div class="row">
		<div class="col-md-2 col-sm-6 mb-4"></div>
		<div class="col-md-2 col-sm-6 mb-4">Pekerjaan</div>
		<div class="col-md-1 col-sm-6 mb-4">:</div>
		<div class="col-md-5 col-sm-6 mb-4"><?php echo $pekerjaan ?></div>
	</div>	
	<div class="row">
		<div class="col-md-2 col-sm-6 mb-4"></div>
		<div class="col-md-2 col-sm-6 mb-4">Alamat</div>
		<div class="col-md-1 col-sm-6 mb-4">:</div>
		<div class="col-md-5 col-sm-6 mb-4"><?php echo $alamat ?></div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-1 col-sm-6 mb-4"></div>
		<div class="col-md-9 col-sm-6 mb-4">
			<p>Orang tersebut melaporkan bahwa pelapor adalah korban penipuan, kronologi penipuannya adalah sebagai berikut : "<?php echo $kronologi ?>". Korban mengalami penipuan melalui media <?php echo $media ?> dan melakukan transfer ke nomor rekening <?php echo $nama_bank ?> : <?php echo $norek ?> atas nama <?php echo $nama_nasabah ?>  pada tanggal : <?php echo $tgl_transaksi ?> dengan kerugian total yang dialami korban sebesar Rp.<?php echo $jml_kerugian ?>.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1 col-sm-6 mb-4"></div>
		<div class="col-md-9 col-sm-6 mb-4">
			<p>Demikian surat keterangan ini dibuat dengan sebenarnya dan dapat digunakan sebagaimana mestinya.</p>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-8 col-sm-6 mb-4"></div>
		<div class="col-md-3 col-sm-6 mb-4">
			<p>Jakarta, 05 - 02 - 2021 </p>
			<p>An. Kepala Kepolisian Cilincing</p>
			<p>KA SK1</p>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-8 col-sm-6 mb-4"></div>
		<div class="col-md-3 col-sm-6 mb-4">
			<p><u><b>Jono, SH</b></u></p>
			<b>IPTU NRP.017439128</b>
			
		</div>
	</div>


	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>