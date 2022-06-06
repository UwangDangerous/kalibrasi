<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="#tambah" data-toggle='modal' data-target="#tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
        <table class="table table-bordered table-hover text-center" id="tabel">
            <thead>
                <tr>
                    <th class='align-middle'>No</th>
                    <th class='align-middle'>Nama Alat</th>
                    <th class='align-middle'>Tipe</th>
                    <th class='align-middle'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tipe as $row) : ?>
                    <?php
                        if($this->session->flashdata('id') == $row['id_ta']) : 
                            $alert = "class='alert-success'" ;
                        else : 
                            $alert = "" ;
                        endif ;
                    ?>    
                    <tr <?= $alert; ?>>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_ma']; ?></td>
                        <td><?= $row['nama_ta']; ?></td>
                        <td>
                            <a href="#ubah" data-toggle='modal' data-target='#ubah_<?= $row['id_ta'];?>' data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url(); ?>admin/masteralat/hapustipe/<?= $row['id_ma']; ?>/<?= $row['id_ta']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger"><i class="fa fa-trash" onclick="return confirm('Data Akan Dihapus , Yakin?')"></i></a>
                        </td>
                    </tr>

                    <!-- Modal Ubah Tipe -->
                    <div class="modal fade" id="ubah_<?= $row['id_ta'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Tipe Alat <?= $row['nama_ma']; ?> <?= $row['nama_ta']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url() ;?>admin/masteralat/ubahtipe/<?= $row['id_ma']; ?>/<?= $row['id_ta'];?>" method="post">
                                    <div class="modal-body">
                                        <label for="nama_ta">Tipe</label>
                                        <input type="text" name="nama_ta" id="nama_ta" class='form-control form-control-sm' value="<?= $row['nama_ta']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>












<!-- Modal Tambah Tipe -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Data Tipe Alat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ;?>admin/masteralat/tambahtipe/<?= $ma ;?>" method="post">
                <div class="modal-body">
                    <label for="nama_ta">Tipe</label>
                    <input type="text" name="nama_ta" id="nama_ta" class='form-control form-control-sm' autocomplete='off'>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>