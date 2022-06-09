<div class="card p-3">
    <form action="" method="post">
        <div class="row">
            <?php if($this->session->userdata('key_kalibrasi') == 1) : ?>
                
                <div class="col-md-12 mb-2">
    
                    <label for="id_admin">Admin</label> <i class="text-danger">*</i>
    
                    <select name="id_admin" id="id_admin" class="form-control">
                        <?php foreach ($admin as $a) : ?>
    
                            <?php if($a['id_admin'] == 1) : ?>
    
                                <?php $nama_admin = $a['nama_unit'].' ('. $a['nama_admin'].')' ;  ?>
    
                            <?php else : ?>
    
                                <?php $nama_admin = $a['nama_unit'].' '. $a['nama_admin'] ;  ?>
    
                            <?php endif ; ?>
    
                            <?php if( set_value('id_admin') == $a['id_admin'] ) : ?>
                                <option selected value="<?= $a['id_admin']; ?>"> <?= $nama_admin; ?> | <?= $a['nama_pj']; ?></option>
                            <?php else : ?>
                                <option value="<?= $a['id_admin']; ?>"> <?= $nama_admin; ?> | <?= $a['nama_pj']; ?></option>
                            <?php endif ; ?>
                        <?php endforeach ; ?>
    
                    </select>
                    <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_admin'); ?></small>
                </div>

            <?php else : ?>

                <input type="hidden" name='id_admin' value='<?= $this->session->userdata('key_kalibrasi');?>)'>

            <?php endif ; ?>

            <div class="col-md-6 mb-2">

                <label for="id_ma">Nama Alat</label> <i class="text-danger">*</i>
                <select name="id_ma" id="id_ma" class='form-control'>
                    <option value="">-pilih-</option>
                    <?php foreach ($data_alat as $da) : ?>
                        <?php if(set_value('id_ma') == $da['id_ma']) : ?>
                            <option selected value="<?= $da['id_ma']; ?>"><?= $da['nama_ma']; ?></option>
                        <?php else : ?>
                            <option value="<?= $da['id_ma']; ?>"><?= $da['nama_ma']; ?></option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>
                </select>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_ma'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_ta">Tambahan</label>
                <select name="id_ta" id="id_ta" class='form-control'>
                    <option value="">-pilih-</option>
                    <?php foreach ($tipe_alat as $ta) : ?>
                        <option class='<?= $ta['id_ma']; ?>' value="<?= $ta['id_ta']; ?>"><?= $ta['nama_ta']; ?></option>
                    <?php endforeach ; ?>
                </select>

            </div>

            <div class="col-md-6 mb-2">

                <label for="merek">Merek</label> <i class="text-danger">*</i>
                <input type="text" name="merek" id="merek" class='form-control mb-3' value='<?= set_value('merek') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('merek'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="tipe">Tipe</label> <i class="text-danger">*</i>
                <input type="text" name="tipe" id="tipe" class='form-control mb-3' value='<?= set_value('tipe') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tipe'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="no_seri">Nomor Seri</label> <i class="text-danger">*</i>
                <input type="text" name="no_seri" id="no_seri" class='form-control mb-3' value='<?= set_value('no_seri') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('no_seri'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="no_bmn">Nomor BMN</label>
                <input type="text" name="no_bmn" id="no_bmn" class='form-control mb-3' autocomplete="off">

            </div>

            <div class="col-md-6 mb-2">

                <label for="kode_lokal">Kode Alat (jika ada)</label>
                <input type="text" name="kode_lokal" id="kode_lokal" class='form-control mb-3' autocomplete="off">

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_lab">Laboratorium</label> <i class="text-danger">*</i>
                <select name="id_lab" id="id_lab" class="form-control">
                    <option value="">-pilih-</option>
                    <?php foreach ($lab as $l) : ?>

                        <?php if( set_value('id_lab') == $l['id_lab'] ) : ?>
                            <option selected value="<?= $l['id_lab']; ?>"> <?= $l['nama_lab']; ?></option>
                        <?php else : ?>
                            <option value="<?= $l['id_lab']; ?>"> <?= $l['nama_lab']; ?></option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>

                </select>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_lab'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="daya_listrik">Daya Listrik</label>
                <input type="text" name="daya_listrik" id="daya_listrik" class='form-control mb-3' autocomplete="off">

            </div>

            <div class="col-md-6 mb-2">

                <label for="tahun">Tahun</label> <i class="text-danger">*</i>
                <input type="number" name="tahun" id="tahun" class='form-control mb-3' autocomplete="off" value="<?= set_value('tahun') ;?>">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tahun'); ?></small>

            </div>
            <div class="col-md-12 mb-2">

                <label for="lokasi_alat">Lokasi Alat</label> <i class="text-danger">*</i>
                <textarea name="lokasi_alat" id="lokasi_alat" cols="30" rows="3" class="form-control"><?= set_value('lokasi_alat'); ?></textarea>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('lokasi_alat'); ?></small>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#id_ma").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#id_ta").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#id_admin").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#id_ta").chained("#id_ma");
    });
</script>