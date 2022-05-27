<div id="riwayatKalibrasi">
    
    <h3>Riwayat Kalibrasi</h3>

    <?php  if($this->session->flashdata('pesan_rk')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna_rk') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan_rk'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>

    <form action="" method="post" id="form_kalibrasi" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="mt-2 col-sm-6">
                <label for="no_lhk">Nomor LHK</label> <i class="text-danger">*</i>
                <input type="text" name="no_lhk" id="no_lhk" class='form-control' autocomplete="off" >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('no_lhk'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="no_sertifikat">Nomor Sertifikat</label> <i class="text-danger">*</i>
                <input type="text" name="no_sertifikat" id="no_sertifikat" class='form-control' autocomplete="off" >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('no_sertifikat'); ?></small>
            </div>
            <div class="mt-2 col-sm-6">
                <label for="hasil">Hasil Kalibrasi</label> <i class="text-danger">*</i>
                <input type="text" name="hasil" id="hasil" class='form-control' autocomplete="off" >
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('hasil'); ?></small>
            </div>
            <div class="mt-2 col-sm-6" >
                <label for="tanggal">Tanggal</label> <i class="text-danger">*</i>
                <input type="date" name="tanggal" id="tanggal" class='form-control' autocomplete="off">
                <small id="usernameHelp" class="form-text text-danger"><?= form_error('tanggal'); ?></small>
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
                    <th>NO LHK</th>
                    <th>NO Sertifikat</th>
                    <th>Hasil</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kalibrasi as $row) : ?>
                    <tr>
                        <td><?= $row['no_lhk']; ?></td>
                        <td><?= $row['no_sertifikat']; ?></td>
                        <td><?= $row['hasil']; ?></td>
                        <td><?= $row['keterangan']; ?></td>
                        <td><?= $this->Date_model->formatTanggal($row['tanggal']); ?></td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#form_kalibrasi").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= base_url(); ?>home/tambahRK/<?= $id; ?>',
            type: 'post',
            // data: $(this).serialize(),        
            data: new FormData(this), //ajax untuk upload
            processData:false,
            contentType:false,
            cache:false, 
            async:false, //ajax untuk upload            
            success: function(data) {              
                document.getElementById("form_kalibrasi").reset(); 
                $('#riwayatKalibrasi').html(data) ;      
            }
        });
    });
</script>