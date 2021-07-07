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
                                <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                            </div>
                            <form class="user" method="post" action="<?php echo base_url('akses/login/register'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" 
                                        placeholder="Username" value="<?php echo set_value('username'); ?>">

                                       <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>    
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" 
                                        placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                     <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>    
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                        placeholder="Nama Pengguna" value="<?php echo set_value('nama'); ?>">
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
                                <button type="submit" class="btn btn-emas btn-user btn-block">
                                    Daftar
                                </button>
                            </form>
                            <hr>
                        
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('akses/login');?>">Sudah Punya Akun? Silahkan login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
 </body>
 </div>   