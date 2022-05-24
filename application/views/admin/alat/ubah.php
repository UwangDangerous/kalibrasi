<div class="card p-3">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-12 mb-2">

                <label for="id_admin">Admin</label> <i class="text-danger">*</i>

                <select name="id_admin" id="id_admin" class="form-control">
                    <?php foreach ($admin as $a) : ?>

                        <?php if($a['id_admin'] == 1) : ?>

                            <?php $nama_admin = $a['nama_unit'].' ('. $a['nama_admin'].')' ;  ?>

                        <?php else : ?>

                            <?php $nama_admin = $a['nama_unit'].' '. $a['nama_admin'] ;  ?>

                        <?php endif ; ?>

                        <?php if( $alat['id_admin'] == $a['id_admin'] ) : ?>
                            <option selected value="<?= $a['id_admin']; ?>"> <?= $nama_admin; ?> | <?= $a['nama_pj']; ?></option>
                        <?php else : ?>
                            <option value="<?= $a['id_admin']; ?>"> <?= $nama_admin; ?> | <?= $a['nama_pj']; ?></option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>

                </select>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_admin'); ?></small>
            </div>

            <div class="col-md-12 mb-2">

                <label for="nama_alat">Nama Alat</label> <i class="text-danger">*</i>
                <input type="text" name="nama_alat" id="nama_alat" class='form-control mb-3' value='<?= $alat['nama_alat'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_alat'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="merek">Merek</label> <i class="text-danger">*</i>
                <input type="text" name="merek" id="merek" class='form-control mb-3' value='<?= $alat['merek'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('merek'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="tipe">Tipe</label> <i class="text-danger">*</i>
                <input type="text" name="tipe" id="tipe" class='form-control mb-3' value='<?= $alat['tipe'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tipe'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="no_seri">Nomor Seri</label> <i class="text-danger">*</i>
                <input type="text" name="no_seri" id="no_seri" class='form-control mb-3' value='<?= $alat['no_seri'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('no_seri'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="no_bmn">Nomor BMN</label>
                <input type="text" name="no_bmn" id="no_bmn" class='form-control mb-3' autocomplete="off" value='<?= $alat['no_bmn'];?>'>

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_lab">Laboratorium</label> <i class="text-danger">*</i>
                <select name="id_lab" id="id_lab" class="form-control">
                    <option value="">-pilih-</option>
                    <?php foreach ($lab as $l) : ?>

                        <?php if( $alat['id_lab'] == $l['id_lab'] ) : ?>
                            <option selected value="<?= $l['id_lab']; ?>"> <?= $l['nama_lab']; ?></option>
                        <?php else : ?>
                            <option value="<?= $l['id_lab']; ?>"> <?= $l['nama_lab']; ?></option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>

                </select>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_lab'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="lokasi_alat">Lokasi Alat</label> <i class="text-danger">*</i>
                <textarea name="lokasi_alat" id="lokasi_alat" cols="30" rows="3" class="form-control"><?= $alat['lokasi_alat']; ?></textarea>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('lokasi_alat'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="daya_listrik">Daya Listrik</label>
                <input type="text" name="daya_listrik" id="daya_listrik" class='form-control mb-3' autocomplete="off" value='<?= $alat['daya_listrik'];?>'>

            </div>

            <div class="col-md-6 mb-2">

                <label for="tahun">Tahun</label> <i class="text-danger">*</i>
                <input type="number" name="tahun" id="tahun" class='form-control mb-3' autocomplete="off" value="<?= $alat['tahun'] ;?>">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tahun'); ?></small>

            </div>
            <div class="col-md-6 mb-2"> 

                <label for="kondisi">Kondisi</label> <i class="text-danger">*</i>
                <input type="text" name="kondisi" id="kondisi" class='form-control mb-3' value='<?= $alat['kondisi'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('kondisi'); ?></small>

            </div>

            <div class="col-md-6 mb-2"> 

                <label for="no_serti">Nomor Sertifikat</label>
                <input type="text" name="no_serti" id="no_serti" class='form-control mb-3' autocomplete="off" value='<?= $alat['no_serti'];?>'>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>