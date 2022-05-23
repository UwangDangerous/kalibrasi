<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/unit/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <?php  if($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php  endif ; ?>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Unit</th>
                    <th>Nama Lain</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($unit as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_unit'] ?></td>
                        <td><?= $row['nama_lain'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/unit/ubah/<?= $row['id_unit']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url(); ?>admin/unit/hapus/<?= $row['id_unit']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger"><i class="fa fa-trash" onclick="return confirm('Yakin Hapus?');"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>