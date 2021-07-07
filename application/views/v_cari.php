
<div id="content" class="p-4 p-md-5 pt-5 bg-gradient-light">
  <div class="s131">
    <form method="post" action="<?php echo base_url('cari/cari_data'); ?>">
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="inner-form">
        <div class="input-field first-wrap">
          <input id="search" type="text" name="norek" placeholder="Nomor Rekening" />
        </div>
        <div class="input-field second-wrap">
          <div class="input-select">
            <select data-trigger="" name="bank">
              <option placeholder="" value="NULL">Pilih Bank</option>
              <?php foreach($bank as $bk) : ?>
                <option value="<?php echo $bk->id_bank ?>"><?php echo $bk->nama_bank ?></option>
              <?php endforeach; ?>
              <option value="all">Cek Seluruh Bank</option>
              <option value="D10">Cek Bank (10 Digit)</option>
              <option value="D12">Cek Bank (12 Digit)</option>
              <option value="D13">Cek Bank (13 Digit)</option>
              <option value="D15">Cek Bank (15 Digit)</option>
              <option value="D16">Cek Bank (16 Digit)</option>
            </select>
          </div>
        </div>
        <div class="input-field third-wrap">
          <button class="btn-search" style="background: #ff9b00" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>

      <?php echo form_error('norek', '<div class ="text-danger small" ml-3>') ?> 
      <a href="" class="ml-1 mt-2" data-toggle="modal" data-target="#Digit_Norek"><u>Lihat Digit</u></a>
    </form>
  </div>
</div> 
<script src="<?php echo base_url() ?>aset2/js/extention/choices.js"></script>
<script>
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false
  });

</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>aset/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>aset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>aset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>aset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>aset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>aset/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>aset/js/demo/chart-pie-demo.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<div class="modal fade" id="Digit_Norek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Data Digit Nomor Rekening</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-hover text-left"> 
            <tr class="bg-emas text-white">  
              <th>Nama Bank </th>
              <th >Digit </th>
            </tr>
            <?php   $data_bank = $this->m_bank->tampil_data()->result(); 
            foreach ($data_bank as $dt) : ?>
             <tr> 
                <td> <?php  echo $dt->nama_bank; ?> </td>
                <td>  <?php   echo $dt->jml_digit; ?></td>
             </tr>
            <?php   endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
