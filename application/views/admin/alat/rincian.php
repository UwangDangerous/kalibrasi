<div class="card p-3">
    <div class="row">
        <div class="col-4">Unit</div>
        <div class="col-6"> :
            <?php if($alat['id_unit'] == 1111) : ?>
                <?= $alat['nama_unit']; ?> (<?= $alat['nama_admin']; ?>)
            <?php else : ?>
                <?= $alat['nama_unit']; ?> <?= $alat['nama_admin']; ?>
            <?php endif ; ?>
        </div>

        <div class="col-4">Nama Kepala</div>
        <div class="col-6"> : <?= $alat['nama_kepala']; ?> </div>

        <div class="col-4">Penanggung Jawab</div>
        <div class="col-6"> : <?= $alat['nama_pj']; ?> </div>

        <div class="col-4">No Telp / WA PJ</div>
        <div class="col-6"> : <?= $alat['telp_pj']; ?> </div>

        <div class="col-4">Email</div>
        <div class="col-6">: <?= $alat['email']; ?> </div>

        <hr>

        <div class="col-4">Nama Alat</div>
        <div class="col-6">: <?= $alat['nama_ma']; ?> <?= $alat['nama_ta']; ?></div>

        <div class="col-4">Merek</div>
        <div class="col-6">: <?= $alat['merek']; ?></div>

        <div class="col-4">Tipe</div>
        <div class="col-6">: <?= $alat['tipe']; ?></div>

        <div class="col-4">Nomor Seri</div>
        <div class="col-6">: <?= $alat['no_seri']; ?></div>

        <div class="col-4">Nomor BMN</div>
        <div class="col-6">: <?= $alat['no_bmn']; ?></div>

        <div class="col-4">Lab</div>
        <div class="col-6">: <?= $alat['nama_lab']; ?></div>
        
        <div class="col-4">Lokasi Alat</div>
        <div class="col-6">: <?= $alat['lokasi_alat']; ?></div>
        
        <div class="col-4">Daya Listrik</div>
        <div class="col-6">: <?= $alat['daya_listrik']; ?></div>

        <div class="col-4">QR Code</div>
        <div class="col-6">
            <?php if(file_exists('./assets/qr-code/'.$alat['kode_alat'].'.png') == true) : ?>
                <img src="<?= base_url();?>assets/qr-code/<?= $alat['kode_alat'];?>.png" alt="" width="200px">  
            <?php else: ?>
                <a href="<?= base_url(); ?>admin/alat/getQR/<?= $alat['kode_alat']; ?>/<?= $alat['id_alat'];?>" class="badge badge-success">Buat QR Code</a>
            <?php endif ; ?>
        </div>
    </div>
</div>