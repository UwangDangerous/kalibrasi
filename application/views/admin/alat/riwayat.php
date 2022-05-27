
    <?php  if($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>

<div class="card p-3">
    <h3>Riwayat Kalibrasi</h3>
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
    
<div class="card p-3 mt-4">
    <h3>Riwayat Pemakaian</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center" id="tabel">
            <thead>
                <tr>
                    <th class='align-middle'>Tanggal</th>
                    <th class='align-middle'>Pemakaian</th>
                    <th class='align-middle'>Mulai</th>
                    <th class='align-middle'>Selesai</th>
                    <th class='align-middle'>Kondisi</th>
                    <th class='align-middle'>Pengguna</th>
                    <th class='align-middle'>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
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

    <br><br>
</div>