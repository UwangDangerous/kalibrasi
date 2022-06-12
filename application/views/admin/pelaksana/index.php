<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/pelaksana/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
        <table class="table table-sm table-bordered table-hover text-center" id="tabel">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Satker</th>
                    <th>Bagian</th>
                    <?php if($id = $this->session->userdata('key_kalibrasi') == 1) : ?>
                        <th>Admin</th>
                    <?php endif ; ?>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pelaksana as $row) : ?>
                    <?php if($row['status'] == 0) : ?>
                        <tr class="alert alert-danger">
                    <?php else : ?>
                        <?php if($this->session->flashdata('id') == $row['id_pelaksana']) : ?>
                            <tr class="alert alert-success">
                        <?php else : ?>
                            <tr>
                        <?php endif ; ?>
                    <?php endif ; ?>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_pelaksana'] ?></td>
                            <td><?= $row['telepon'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['satker'] ?></td>
                            <td><?= $row['bagian'] ?></td>
                            <?php if($id = $this->session->userdata('key_kalibrasi') == 1) : ?>
                                <td><?= $row['nama_unit']; ?> <?= $row['nama_admin']; ?></td>
                            <?php endif ; ?>
                            <td><?= $row['username']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/pelaksana/ubah/<?= $row['id_pelaksana']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url(); ?>admin/pelaksana/hapus/<?= $row['id_pelaksana']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger" onclick="return confirm('Yakin Hapus?');"><i class="fa fa-trash"></i></a>
                                <?php if($row['status'] == 0) : ?>
                                    <a href="<?= base_url(); ?>admin/pelaksana/aktif/<?= $row['id_pelaksana']; ?>" data-toggle='tooltip' title='Lakukan Aktifasi' class="badge badge-secondary" onclick="return confirm('Aktifkan User?');"><i class="fa fa-check"></i></a>
                                <?php endif ; ?>
                            </td>
                        </tr>

                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>