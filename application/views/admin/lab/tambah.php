<div class="card p-3">
    <form action="" method="post">
        <label for="nama_lab">Nama Laboratorium</label>
        <input type="text" name="nama_lab" id="nama_lab" class='form-control mb-3' value='<?= set_value('nama_lab') ;?>'>
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_lab'); ?></small>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>