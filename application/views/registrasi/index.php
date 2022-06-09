<link rel="stylesheet" href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css">

<script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js" ></script>
<script src="<?= base_url(); ?>assets/js/jquery.js" ></script>

<!-- About-->
<section class="page-section" id="regist">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100">
            <div class="col-12 align-self-end align-items-center  text-center">
                <h1 class="font-weight-bold">Registrasi Akun</h1>
                <br>
                <br>
            </div>
            <div class="col-12">
                <?php if($this->session->flashdata('pesan')) : ?>
                    <div class="alert alert-<?= $this->session->flashdata('warna') ; ?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('pesan') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ; ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nip">NIP / NIK</label> <i class="text-danger">*</i>
                            <input type="text" name="nip" id="nip" class='form-control mb-3' value='<?= set_value('nip') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_pelaksana">Nama Lengkap</label> <i class="text-danger">*</i>
                            <input type="text" name="nama_pelaksana" id="nama_pelaksana" class='form-control mb-3' value='<?= set_value('nama_pelaksana') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_pelaksana'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="telepon">No Telepon</label> <i class="text-danger">*</i>
                            <input type="text" name="telepon" id="telepon" class='form-control mb-3' value='<?= set_value('telepon') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('telepon'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Emial</label> <i class="text-danger">*</i>
                            <input type="email" name="email" id="email" class='form-control mb-3' value='<?= set_value('email') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="satker">Satuan Kerja</label> <i class="text-danger">*</i>
                            <input type="text" name="satker" id="satker" class='form-control mb-3' value='<?= set_value('satker') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('satker'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="bagian">Bagian</label> <i class="text-danger">*</i>
                            <input type="text" name="bagian" id="bagian" class='form-control mb-3' value='<?= set_value('bagian') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('bagian'); ?></small>
                        </div>
                        <div class="col-md-12">
                            <label for="username">Username</label> <i class="text-danger">*</i>
                            <input type="text" name="username" id="username" class='form-control mb-3' value='<?= set_value('username') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="password1">Password</label> <i class="text-danger">*</i>
                            <input type="password" name="password1" id="password1" class='form-control mb-3' value='<?= set_value('password1') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <div class="col-md-6">
                            <label for="password2">Konfirmasi Password</label> <i class="text-danger">*</i>
                            <input type="password" name="password2" id="password2" class='form-control mb-3' value='<?= set_value('password2') ;?>' autocomplete="off">
                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('password2'); ?></small>
                        </div>
                        <div class="col-md-12"><button type="submit" class="btn btn-primary">Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
