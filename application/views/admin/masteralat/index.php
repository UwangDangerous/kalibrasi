<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/masteralat/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
                    <th class='align-middle'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($alat as $row) : ?>
                    <?php
                        if($this->session->flashdata('id') == $row['id_ma']) : 
                            $alert = "class='alert-success'" ;
                        else : 
                            $alert = "" ;
                        endif ;
                    ?>    
                    <tr <?= $alert; ?>>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_ma']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/masteralat/ubah/<?= $row['id_ma']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url(); ?>admin/masteralat/hapus/<?= $row['id_ma']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger"><i class="fa fa-trash" onclick="return confirm('Data Akan Dihapus , Yakin?')"></i></a>
                            <a href="<?= base_url(); ?>admin/masteralat/tipe/<?= $row['id_ma']; ?>" data-toggle='tooltip' title='Tipe Alat' class="badge badge-primary"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
    </div>
</div>