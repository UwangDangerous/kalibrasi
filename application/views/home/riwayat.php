<header class="masthead">
</header>
<!-- <link rel="stylesheet" href="<?//=base_url(); ?>assets/bootstrap/css/bootstrap.css"> -->
<link rel="stylesheet" href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css">

<script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
<script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js" ></script>
<script src="<?= base_url(); ?>assets/js/jquery.js" ></script>

<!-- About-->
<section class="page-section" id="riwayat">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100">
            <div class="col-12 align-self-end align-items-center justify-content-center text-center">
                <h1 class="font-weight-bold">Riwayat Alat</h1>
                <br>
            </div>

            <div class="col-12">
                <table cellpadding=2 cellspacing=2>
                    <tr>
                        <th>Nama Alat</th> <td>:</td> <td><?= $alat['nama_ma']; ?> <?= $alat['nama_ta']; ?></td>
                    </tr>
                    <tr>
                        <th>Merek</th> <td>:</td> <td><?= $alat['merek']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipe</th> <td>:</td> <td><?= $alat['tipe']; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Seri</th> <td>:</td> <td><?= $alat['no_seri']; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor BMN</th> <td>:</td> <td><?= $alat['no_bmn']; ?></td>
                    </tr>
                    <tr>
                        <th>Laboratorium</th> <td>:</td> <td><?= $alat['nama_lab']; ?></td>
                    </tr>
                    <tr>
                        <th>Lokasi</th> <td>:</td> <td><?= $alat['lokasi_alat']; ?></td>
                    </tr>
                    <tr>
                        <th>Daya Listrik</th> <td>:</td> <td><?= $alat['daya_listrik']; ?></td>
                    </tr>
                    <tr>
                        <th><br></th>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab</th> <td>:</td> <td><?= $alat['nama_pj']; ?></td>
                    </tr>
                    <tr>
                        <th>No. Telp</th> <td>:</td> <td><?= $alat['telp_pj']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="col-12 mt-4">
                <br><br>
                <div id="riwayatKalibrasi"></div>
                
            </div>

            <div class="col-12 mt-4">
                <br><br>
                <div id="riwayatPemakaian"></div>
                
            </div>
        </div>
    </div>
</section>

<script>
    $("#riwayatPemakaian").load("<?= base_url();?>Home/riwayatPemakaian/<?= $alat['id_alat']; ?>");
    $("#riwayatKalibrasi").load("<?= base_url();?>Home/riwayatKalibrasi/<?= $alat['id_alat']; ?>");
</script>

