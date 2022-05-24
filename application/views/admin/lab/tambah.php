<div class="card p-3">
    <form action="" method="post">
        <label for="nama_lab">Nama Laboratorium</label> <i class="text-danger">*</i>
        <input type="text" name="nama_lab" id="nama_lab" class='form-control mb-3' value='<?= set_value('nama_lab') ;?>' autofocus autocomplete="off">
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_lab'); ?></small>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>