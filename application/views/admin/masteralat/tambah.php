<div class="card p-3">
    <form action="" method="post">

        <label for="nama_ma">Nama Alat</label> <i class="text-danger">*</i>
        <input type="text" name="nama_ma" id="nama_ma" class='form-control mb-3' value='<?= set_value('nama_ma') ;?>' autocomplete="off">
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_ma'); ?></small>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>