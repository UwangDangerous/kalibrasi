<div class="card p-3">
    
    <form action="" method="post">

        <div class="row">

            <div class="col-md-6">
                <label for="nip">NIP / NIK</label> <i class="text-danger">*</i>
                <input type="text" name="nip" id="nip" class='form-control mb-3' value='<?= set_value('nip') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="nama_pelaksana">Nama Lengkap</label> <i class="text-danger">*</i>
                <input type="text" name="nama_pelaksana" id="nama_pelaksana" class='form-control mb-3' value='<?= set_value('nama_pelaksana') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('nama_pelaksana'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="telepon">No Telepon</label> <i class="text-danger">*</i>
                <input type="text" name="telepon" id="telepon" class='form-control mb-3' value='<?= set_value('telepon') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('telepon'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label> <i class="text-danger">*</i>
                <input type="email" name="email" id="email" class='form-control mb-3' value='<?= set_value('email') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="satker">Satuan Kerja</label> <i class="text-danger">*</i>
                <input type="text" name="satker" id="satker" class='form-control mb-3' value='<?= set_value('satker') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('satker'); ?></small>
            </div>
            <div class="col-md-6">
                <label for="bagian">Bagian</label> <i class="text-danger">*</i>
                <input type="text" name="bagian" id="bagian" class='form-control mb-3' value='<?= set_value('bagian') ;?>' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('bagian'); ?></small>
            </div>
            <div class="col-md-12"><button type="submit" class="btn btn-primary">Simpan</button></div>

        </div>
        
    </form>
</div>