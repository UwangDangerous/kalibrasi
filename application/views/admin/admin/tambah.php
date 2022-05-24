<div class="card p-3">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 mb-2">

                <label for="nama_admin">Nama Admin</label> <i class="text-danger">*</i>
                <input type="text" name="nama_admin" id="nama_admin" class='form-control mb-3' value='<?= set_value('nama_admin') ;?>' autofocus autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_admin'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_unit">Tipe Unit</label> <i class="text-danger">*</i>
                <select name="id_unit" id="id_unit" class="form-control">
                    <option value="">-pilih-</option>
                    <?php foreach ($unit as $u) : ?>
                        <?php if( set_value('id_unit') == $u['id_unit'] ) : ?>
                            <option selected value="<?= $u['id_unit']; ?>"> <?= $u['nama_unit']; ?> </option>
                        <?php else : ?>
                            <option value="<?= $u['id_unit']; ?>"> <?= $u['nama_unit']; ?> </option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>
                </select>

                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_unit'); ?></small>

            </div>

            <div class="col-md-12 mb-2">

                <label for="alamat">Alamat</label> <i class="text-danger">*</i>
                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_prov">Provinsi</label> <i class="text-danger">*</i>
                <select name="id_prov" id="id_prov" class="form-control">
                    <option value="">-pilih-</option>
                    <?php foreach ($prov as $p) : ?>
                        <?php if( set_value('id_prov') == $p['id_prov'] ) : ?>
                            <option selected value="<?= $p['id_prov']; ?>"> <?= $p['nama_prov']; ?> </option>
                        <?php else : ?>
                            <option value="<?= $p['id_prov']; ?>"> <?= $p['nama_prov']; ?> </option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>
                </select>

                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_prov'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="id_kota">Kota</label> <i class="text-danger">*</i>
                <select name="id_kota" id="id_kota" class="form-control">
                    <option value="">-pilih-</option>
                    <?php foreach ($kota as $k) : ?>
                        <?php if( set_value('id_kota') == $k['id_kota'] ) : ?>
                            <option id="id_kota" class='<?= $k['id_prov'] ;?>' selected value="<?= $k['id_kota']; ?>"> <?= $k['nama_kota']; ?> </option>
                        <?php else : ?>
                            <option id="id_kota" class='<?= $k['id_prov'] ;?>' value="<?= $k['id_kota']; ?>"> <?= $k['nama_kota']; ?> </option>
                        <?php endif ; ?>
                    <?php endforeach ; ?>
                </select>

                <small id="usernameHelp" class="form-text text-danger"><?= form_error('id_kota'); ?></small>

            </div>

            <div class="col-md-6 mb-2">

                <label for="nama_kepala">Nama Kepala</label> <i class="text-danger">*</i>
                <input type="text" name="nama_kepala" id="nama_kepala" class='form-control mb-3' value='<?= set_value('nama_kepala') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_kepala'); ?></small>

            </div>
            <div class="col-md-6 mb-2">

                <label for="nama_pj">Nama PJ</label> <i class="text-danger">*</i>
                <input type="text" name="nama_pj" id="nama_pj" class='form-control mb-3' value='<?= set_value('nama_pj') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_pj'); ?></small>

            </div>
            <div class="col-md-4 mb-2">

                <label for="telp_pj">No Telp / WA PJ</label> <i class="text-danger">*</i>
                <input type="text" name="telp_pj" id="telp_pj" class='form-control mb-3' value='<?= set_value('telp_pj') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('telp_pj'); ?></small>

            </div>
            <div class="col-md-4 mb-2">

                <label for="email">Email</label> <i class="text-danger">*</i>
                <input type="email" name="email" id="email" class='form-control mb-3' value='<?= set_value('email') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>

            </div>
            <div class="col-md-4 mb-2">

                <label for="username">Username</label> <i class="text-danger">*</i>
                <input type="text" name="username" id="username" class='form-control mb-3' value='<?= set_value('username') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('username'); ?></small>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


<script>
    $("#id_prov").click(function(){
        $("#id_kota").chained("#id_prov");
    });
</script>