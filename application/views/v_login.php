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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                    </div>
                                    <form method="post" action="<?php echo base_url('akses/login/proses_login') ?>" class="user">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" name="username">

                                                <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">

                                                <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                                        </div>

                                         <hr>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Login Sebagai</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="level">
                                                <option value="Pelapor">Pelapor</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                       <!--  <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button class="btn btn-emas btn-user btn-block">Login</button>
                                        <!-- <hr> -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('akses/login/lupa_pass');?>">Lupa Password?</a>
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
</div>