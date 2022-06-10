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

            <!-- <div class="col-12 mt-4">
                <br><br>
                <div id="riwayatKalibrasi"></div>
                
            </div> -->

            <div class="col-12 mt-3">
                <a href="<?= base_url() ;?>home/riwayaKalibrasiAlat?k=<?= $this->input->get('k');?>#riwayat" class="btn btn-primary">Tambah Riwayat Alat</a>
            </div>
            <div class="col-12 mt-3">
                <div id="riwayatPemakaian"></div>
                
            </div>
        </div>
    </div>
</section>

<script>
    $("#riwayatPemakaian").load("<?= base_url();?>Home/riwayatPemakaian/<?= $alat['id_alat']; ?>");
    // $("#riwayatKalibrasi").load("<?//= base_url();?>Home/riwayatKalibrasi/<?//= $alat['id_alat']; ?>");
</script>

