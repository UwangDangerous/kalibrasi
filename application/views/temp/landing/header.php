<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?= SEO;?>" />
        <meta name="author" content="<?= SEO ;?>" />
        <title><?= $judul; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/logo-bpom.png" />
        <!-- Bootstrap Icons-->
        <link rel="stylesheet" href="<?=base_url(); ?>assets/bootstrap/css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/fontAwesome/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url(); ?>assets/templates/css/styles.css" rel="stylesheet" />

        <style>
            .divider{
                background-color : blue ;
            }

            .navbar ul li{
                text-shadow: 1px 2px rgba(255,255,255,0.2);
            }

            .masthead{
                text-shadow: 1px 2px rgba(0,0,0,0.4);
            }

            .bayangan{
                box-shadow: 2px 3px rgba(0,0,0,0.3);
            }

            #hilang-shadow{
                text-shadow: 0 0 0 rgba(0,0,0,0.1)!important;
            }
        </style>
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-primary fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?= base_url();?>">
                    <?= $brand; ?>
                </a>
                <button class="navbar-toggler navbar-toggler-right  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url();?>#about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url();?>#scan">SCAN QR</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url();?>#contact">Hubungi Kami</a></li>
                        <?php if($this->session->userdata('key_pelaksana')) : ?>
                            <li class="nav-item dropdown dropleft">
                                <a class="nav-link dropdown-toggle btn" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-tie"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Riwayat Penggunaan</a>
                                    <a class="dropdown-item" href="#">Pengaturan</a>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url();?>registrasi#regist">Registrasi Akun</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-toggle='modal' data-target="#login-pelaksana">Login</a></li>
                        <?php endif ; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold"><?= $jumbotron['judul']; ?></h1>
                        <!-- <hr class="divider"/> --> <br>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5"><?= $jumbotron['isi']; ?></p>
                        <a class="btn btn-primary btn-xl" href="#scan" data-target="#exampleModal">SCAN QR</a>
                    </div>
                    <?php if($this->session->flashdata('pesan_login')) : ?>
                        <div class="col-lg-6 col-md-6" id="hilang-shadow">
                            <div class="alert alert-<?= $this->session->flashdata('warna_login') ;?> alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('pesan_login'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif ; ?>
                </div>
            </div>
        </header>