    <div id="content" class="p-4 p-md-5 pt-5">
<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ubah Data Akun</h1>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>
                            <hr>
                            <?php foreach ($user as $usr) :?>
                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" 
                                        placeholder="Username" value="<?php echo $usr->username ?>">

                                       <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>    
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" 
                                        placeholder="Email Address" value="<?php echo $usr->email ?>">
                                     <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>    
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                        placeholder="Nama Pengguna" value="<?php echo $usr->nama_pelapor ?>">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>  
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="pass1" name="pass1" placeholder="Password">
                                        <?php echo form_error('pass1', '<small class="text-danger pl-3">', '</small>'); ?>  
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="pass2" name="pass2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-danger small">*Note : Kosongkan kolom password apabila tidak ingin diubah</div>
                                </div>
                                <button type="submit" class="btn btn-emas btn-user btn-block">
                                    Ubah
                                </button>
                            </form>
                        <?php endforeach; ?>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</div>