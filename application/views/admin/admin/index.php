<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/admin/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
                    <th>Nama Admin</th>
                    <th>Penanggung Jawab</th>
                    <th>No. Telp / WA</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($admin as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php if($row['id_unit'] == 1111) : ?>
                                <?= $row['nama_unit']; ?> (<?= $row['nama_admin']; ?>)
                            <?php else : ?>
                                <?= $row['nama_unit']; ?> <?= $row['nama_admin']; ?>
                            <?php endif ; ?>
                        </td>
                        <td><?= $row['nama_pj']; ?></td>
                        <td><?= $row['telp_pj']; ?></td>
                        <td>
                            <?= $row['alamat']; ?>, <?= $row['nama_kota']; ?>, <?= $row['nama_prov']; ?>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#rinci_<?= $row['id_admin']; ?>" data-toggle='tooltip' title='Rincian Data' class="badge badge-primary"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url(); ?>admin/admin/ubah/<?= $row['id_admin']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <?php if($row['id_admin'] != 1) : ?>
                                <a href="<?= base_url(); ?>admin/admin/hapus/<?= $row['id_admin']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger" onclick="return confirm('Yakin Hapus?');"><i class="fa fa-trash"></i></a>
                            <?php endif ; ?>
                        </td>
                    </tr>

                    <!-- modal rinci -->
                        <div class="modal fade" id="rinci_<?= $row['id_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rincian Data Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">Unit</div>
                                        <div class="col-6"> :
                                            <?php if($row['id_unit'] == 1111) : ?>
                                                <?= $row['nama_unit']; ?> (<?= $row['nama_admin']; ?>)
                                            <?php else : ?>
                                                <?= $row['nama_unit']; ?> <?= $row['nama_admin']; ?>
                                            <?php endif ; ?>
                                        </div>

                                        <div class="col-4">Nama Kepala</div>
                                        <div class="col-6"> : <?= $row['nama_kepala']; ?> </div>

                                        <div class="col-4">Penanggung Jawab</div>
                                        <div class="col-6"> : <?= $row['nama_pj']; ?> </div>

                                        <div class="col-4">No Telp / WA PJ</div>
                                        <div class="col-6"> : <?= $row['telp_pj']; ?> </div>

                                        <div class="col-4">Email</div>
                                        <div class="col-6">: <?= $row['email']; ?> </div>

                                        <div class="col-4">Alamat</div>
                                        <div class="col-6">: 
                                            <?= $row['alamat']; ?>, <?= $row['nama_kota']; ?>, <?= $row['nama_prov']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url(); ?>admin/admin/ubah/<?= $row['id_admin']; ?>" class="btn btn-success">Ubah</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    <!-- modal rinci -->
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>