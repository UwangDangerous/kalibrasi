<body class="" style="background-color:#1a237e;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                            </div>

                            <?php if(!empty($this->session->flashdata('login') )) : ?>

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?=  $this->session->flashdata('login'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                            <?php endif ; ?>

                            <form class="user" method='post'>
                                <div class="form-group">
                                    <input name='username' autocomplete="off" autofocus  type="text" class="form-control form-control-user" placeholder="Nama Pengguna / E-mail">
                                    <small id="usernameHelp" class="form-text text-danger"><?= form_error('username'); ?></small>
                                </div>
                                <div class="form-group">
                                    <input name='password' type="password" class="form-control form-control-user" placeholder="Kata Sandi">
                                    <small id="usernameHelp" class="form-text text-danger"><?= form_error('password'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block"  style="background-color:#1a237e;">
                                    Login
                                </button>
                            </form>
                            <br>
                            <div class="text-center">
                                <a class="small" href="<?= base_url(); ?>login/registers">Create an Account!</a>
                                <?= md5(sha1("coba123")); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

