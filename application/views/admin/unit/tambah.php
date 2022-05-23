<div class="card p-3">
    <form action="" method="post">
        <label for="nama_unit">Nama Unit</label>
        <input type="text" name="nama_unit" id="nama_unit" class='form-control mb-3' value='<?= set_value('nama_unit') ;?>'>
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_unit'); ?></small>

        <label for="nama_lain">Nama Lain</label>
        <input type="text" name="nama_lain" id="nama_lain" class='form-control mb-3' value='<?= set_value('nama_lain') ;?>'>
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_lain'); ?></small>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>