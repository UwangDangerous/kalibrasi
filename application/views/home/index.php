<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"> <?= $about['judul']; ?> </h2>
                <!-- <hr class="divider divider-light" /> --> <br>
                <p class="text-white-75 mb-4"><?= $about['isi']; ?></p>
            </div>
        </div>
    </div>
</section>


<!-- scan-->
<section class="page-section" id="scan">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">SCAN QR CODE</h2>
        <!-- <hr class="divider" /> --> <br>
        <div class="row gx-4 gx-lg-5">
            <?php $i = 1; ?>
            <?php foreach ($scan as $s) : ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-3">
                        <?php if($i == 1) : ?>
                            <div class="mb-2"><i class="fas fa-qrcode fs-1 text-primary"></i></div>
                        <?php elseif($i == 2) : ?>
                            <div class="mb-2"><i class="fas fa-laptop fs-1 text-primary"></i></div>
                        <?php else : ?>
                            <div class="mb-2"><i class="fas fa-globe fs-1 text-primary"></i></div>
                        <?php endif ; ?>
                        <h3 class="h4 mb-2"><?= $s['judul']; ?></h3>
                        <p class="text-muted mb-0"><?= $s['isi']; ?></p>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach ; ?>
            
            
            <div class="col-lg-3 text-center mt-4"></div>
            <div class="col-lg-6 text-center mt-4">
                <br><br><br><br><br>
                
                <div class="d-grid" id="btn-scan">
                    <button class="btn btn-primary btn-xl bayangan"  type="button" id="go-scan">buka kamera</button>
                </div>
                
                <div id="scan-kamera"></div>
            </div>
        </div>
    </div>
    
</section>


<!-- Contact-->
<section class="page-section bg-primary text-light" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Hubungi Kami</h2>
                <br>
                <!-- <p class="mb-5">Silahkan berikan ulasan untuk aplikasi</p> -->
                <?php  if($this->session->flashdata('pesan')) : ?>
                    <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  endif ; ?>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5 text-dark">
            <div class="col-lg-6">
                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control" id="nama" name='nama' type="text" placeholder="Nama" value="<?= set_value('nama');?>"/>
                        <small id="usernameHelp" class="form-text text-light"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" name='email' type="email" placeholder="Email" value="<?= set_value('email');?>"/>
                        <small id="usernameHelp" class="form-text text-light"><?= form_error('email'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="no_telp" name='no_telp' type="number" placeholder="Nomor Telpon" value="<?= set_value('no_telp');?>"/>
                        <small id="usernameHelp" class="form-text text-light"><?= form_error('no_telp'); ?></small>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" id="pesan" name='pesan' type="text" placeholder="Tambahkan Pesan..." style="height: 10rem"><?= set_value('pesan');?></textarea>
                        <small id="usernameHelp" class="form-text text-light"><?= form_error('pesan'); ?></small>
                    </div>
                    <br>
                    <div class="d-grid"><button class="btn btn-primary btn-xl bayangan"  type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>



