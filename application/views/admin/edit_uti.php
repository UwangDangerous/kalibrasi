<div class="card p-3">
    <form action="" method="post">
        <label for="judul">Judul</label> <i class="text-danger">*</i>
        <input type="text" name="judul" id="judul" class='form-control mb-3' value='<?= $row['judul'] ;?>' autofocus autocomplete="off">
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('judul'); ?></small>
        <label for="isi">Isi</label> <i class="text-danger">*</i>
        <textarea name="isi" id="isi" class='form-control mb-3' cols="30" rows="5"><?= $row['isi']; ?></textarea>
        <small id="usernameHelp" class="form-text text-danger"><?= form_error('isi'); ?></small>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>