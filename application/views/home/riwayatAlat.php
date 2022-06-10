<link rel="stylesheet" href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css">

<script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js" ></script>
<script src="<?= base_url(); ?>assets/js/jquery.js" ></script>

<!-- About-->
<section class="page-section" id="riwayat">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100">
            <div class="col-12 align-self-end align-items-center justify-content-center text-center">
                <h1 class="font-weight-bold">Informasi Barang Milik Negara</h1>
                <br>
            </div>

            <div class="col-md-5">
                <table cellpadding=2 cellspacing=2>
                    <tr>
                        <th class="align-top">Nama Alat</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['nama_ma']; ?> <?= $alat['nama_ta']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Merek</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['merek']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Tipe</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['tipe']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Nomor Seri</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['no_seri']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Nomor BMN</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['no_bmn']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Laboratorium</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['nama_lab']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Lokasi</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['lokasi_alat']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Daya Listrik</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['daya_listrik']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="col-md-7 mt-3">
                <table cellpadding=2 cellspacing=2>
                    <tr>
                        <th class="align-top">Pemilik</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['nama_unit']; ?> - <?= $alat['nama_admin']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Alamat</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['alamat']; ?>, <?= $alat['nama_kota']; ?>, <?= $alat['nama_prov']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">Penanggung Jawab</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['nama_pj']; ?></td>
                    </tr>
                    <tr>
                        <th class="align-top">No. Telp</th> 
                        <td class="align-top">:</td> 
                        <td class="align-top"><?= $alat['telp_pj']; ?></td>
                    </tr>
                </table>
            </div>



            <!-- riwayat alat -->
            <div class="col-12 mt-4">
                <div class="card p-2">

                    <h3>Riwayat Alat</h3>

                    <?php  if($this->session->flashdata('pesan_rk')) : ?>
                        <div class="alert alert-<?= $this->session->flashdata('warna_rk') ;?> alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('pesan_rk'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php  endif ; ?>

                    <form action="" method="post" id="form_kalibrasi" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="mt-2 col-sm-6" >
                                <label for="tanggal">Tanggal</label> <i class="text-danger">*</i>
                                <input type="date" name="tanggal" id="tanggal" class='form-control' autocomplete="off" value="<?= set_value('tanggal'); ?>">
                                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tanggal'); ?></small>
                            </div>

                            <div class="mt-2 col-sm-6" >
                                <label for="id_kegiatan">Kegiatan</label> <i class="text-danger">*</i>
                                <select name="id_kegiatan" id="id_kegiatan" class="form-control">
                                    <option value="">-pilih-</option>
                                    <?php foreach ($kegiatan as $k) : ?>
                                        <?php if($k['id_kegiatan'] == set_value("id_kegiatan")) : ?>
                                            <option selected value="<?= $k['id_kegiatan']; ?>"><?= $k['nama_kegiatan']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $k['id_kegiatan']; ?>"><?= $k['nama_kegiatan']; ?></option>
                                        <?php endif ; ?>
                                    <?php endforeach ; ?>
                                </select>
                                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_kegiatan'); ?></small>
                            </div>

                            <div class="mt-2 col-sm-6">
                                <label for="hasil">Hasil Kalibrasi</label> <i class="text-danger">*</i>
                                <textarea name="hasil" id="hasil" class='form-control' cols="30" rows="3"><?= set_value("hasil"); ?></textarea>
                                <small id="usernameHelp" class="form-text text-danger"><?= form_error('hasil'); ?></small>
                            </div>
                            
                            <div class="mt-2 col-sm-6">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class='form-control' cols="30" rows="3"><?= set_value("keterangan"); ?></textarea>
                                <small id="usernameHelp" class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                            </div>

                            <div class="mt-2 col-sm-6">
                                <label for="no_serti">Nomor Sertifikat</label> <i class="text-danger">*</i>
                                <input type="text" name="no_serti" id="no_serti" class='form-control' autocomplete="off" <?= set_value("no_serti"); ?>>
                                <small id="usernameHelp" class="form-text text-danger"><?= form_error('no_serti'); ?></small>
                            </div>

                            <div class="mt-2 col-sm-6">
                                <label for="berkas_serti">Sertifikat</label> <i class="text-danger">*</i>
                                <input type="file" name="berkas_serti" id="berkas_serti" class='form-control' autocomplete="off" >
                                <small id="usernameHelp" class="form-text text-danger">*hanya menerima pdf, ukuran max 1 mb</small>
                            </div>

                            <div class="mt-4 col-sm-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form> 
                </div>

                <div class="card p-2 mt-4">

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-striped text-center" id="tabel">
                            <thead>
                                <tr>
                                    <th>NO Sertifikat</th>
                                    <th width="30px"><i class="fa fa-file"></i></th>
                                    <th>Hasil</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kalibrasi as $row) : ?>
                                    <tr>
                                        <td><?= $row['no_serti']; ?></td>
                                        <td><a href="<?= base_url() ;?>assets/sertifikat_kalibrasi/<?= $row['berkas_serti'];?>" target="blank" class="badge badge-secondary"><i class="fa fa-file"></i></a></td>
                                        <td><?= $row['hasil']; ?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><?= $this->Date_model->formatTanggal($row['tanggal']); ?></td>
                                    </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- riwayat alat tutup -->
        </div>
    </div>
</section>

