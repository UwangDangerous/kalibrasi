<div class="card p-3">
    <form action="" method="post">

        <div class="row">

            <div class="col-md-6">
                <label for="nip">NIP / NIK</label>
                <input type="text" name="nip" id="nip" class='form-control mb-3'autocomplete="off" placeholder="kosongkan jika tidak ingin di ubah">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="nama_pelaksana">Nama Lengkap</label> <i class="text-danger">*</i>
                <input type="text" name="nama_pelaksana" id="nama_pelaksana" class='form-control mb-3' value='<?= $user['nama_pelaksana'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_pelaksana'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="telepon">No Telepon</label> <i class="text-danger">*</i>
                <input type="text" name="telepon" id="telepon" class='form-control mb-3' value='<?= $user['telepon'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('telepon'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label> 
                <input type="email" name="email" id="email" class='form-control mb-3' autocomplete="off" placeholder="kosongkan jika tidak ingin di ubah">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>

            </div>
            <div class="col-md-6">
                <label for="satker">Satuan Kerja</label> <i class="text-danger">*</i>
                <input type="text" name="satker" id="satker" class='form-control mb-3' value='<?= $user['satker'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('satker'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="bagian">Bagian</label> <i class="text-danger">*</i>
                <input type="text" name="bagian" id="bagian" class='form-control mb-3' value='<?= $user['bagian'] ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('bagian'); ?></small>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url(); ?>admin/pelaksana/reset_password/<?= $id ; ?>" class="btn btn-primary" data-toggle="tooltip" title="Reset Password Menjadi Default (P$w0rd)" onclick="return confirm('Apakah Anda Yakin?');">Reset Password</a>
            </div>

        </div>
        
    </form>
</div>