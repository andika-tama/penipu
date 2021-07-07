<div id="content" class="p-4 p-md-5 pt-5">
    <body class="bg-gradient-light">

        <div class="container mt-5">

            <!-- Outer Row -->
            <div class="row justify-content-center mx-auto">

                <div class="col-xl-5 col-lg-6 col-md-5">

                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-1">Lupa Password</h1>
                                            <h4 class="h6 text-gray-900 mt-1 mb-4">Password akan dikirim ke email Anda!</h4>
                                            <?php echo $this->session->flashdata('pesan') ?>
                                        </div>
                                        <hr>    
                                        <form method="post" action="" class="user">
                                            <div class="form-group">
                                                <input type="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username">

                                                <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                                            </div>

                                            <button class="btn btn-emas btn-user btn-block">Kirim Password</button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo base_url('akses/login');?>"> Kembali ke Login</a>
                                        </div><div class="text-center">
                                            <a class="small" href="<?php echo base_url('akses/login/register');?>">Buat Akun</a>
                                        </div>
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
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
