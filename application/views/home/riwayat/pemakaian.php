<div id="riwayatPemakaian">
    
    <h3>Riwayat Pemakaian</h3>

    <?php  if($this->session->flashdata('pesan_rp')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna_rp') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan_rp'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>

    <form action="" method="post" id="form_pemakaian">
        <div class="row mb-3">
            <div class="mt-2 col-sm-6" >
                <label for="tanggal">Tanggal Pemakaian</label> <i class="text-danger">*</i>
                <input type="date" name="tanggal" id="tanggal" class='form-control' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tanggal'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="pemakaian">Pemakaian Alat</label> <i class="text-danger">*</i>
                <input type="text" name="pemakaian" id="pemakaian" class='form-control' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('pemakaian'); ?></small>
            </div>
            <div class="mt-2 col-sm-6"> 
                <label for="mulai">Jam Mulai</label> <i class="text-danger">*</i>
                <input type="time" name="mulai" id="mulai" class='form-control' >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('mulai'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="selesai">Jam Selesai</label> <i class="text-danger">*</i>
                <input type="time" name="selesai" id="selesai" class='form-control'>
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('selesai'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="kondisi">Kondisi Alat</label> <i class="text-danger">*</i>
                <input type="text" name="kondisi" id="kondisi" class='form-control' autocomplete="off" >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('kondisi'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="pengguna">Nama Pengguna</label> <i class="text-danger">*</i>
                <input type="text" name="pengguna" id="pengguna" class='form-control' autocomplete="off" >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('pengguna'); ?></small>
            </div>
            <div class="mt-2 col-sm-12">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class='form-control' cols="30" rows="3"></textarea>
            </div>
            <div class="mt-4 col-sm-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>    

    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped text-center" id="tabel">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pemakaian</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Kondisi</th>
                    <th>Pengguna</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemakaian as $row) : ?>
                    <tr>
                        <td><?= $this->Date_model->formatTanggal($row['tanggal']); ?></td>
                        <td><?= $row['pemakaian']; ?></td>
                        <td><?= $row['mulai']; ?></td>
                        <td><?= $row['selesai']; ?></td>
                        <td><?= $row['kondisi']; ?></td>
                        <td><?= $row['pengguna']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#form_pemakaian").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>home/tambahRP/<?= $id; ?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {              
                document.getElementById("form_pemakaian").reset(); 
                $('#riwayatPemakaian').html(data) ;      
            }
        });
    });
</script>