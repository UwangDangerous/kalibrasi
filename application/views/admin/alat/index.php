<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/alat/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>
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
                    <th class='align-middle'>No</th>
                    <th class='align-middle'>Admin</th>
                    <th class='align-middle'>Nama Alat</th>
                    <th class='align-middle'>No Seri</th>
                    <th class='align-middle'>Laboratorium</th>
                    <th class='align-middle'>Tahun</th>
                    <th class='align-middle'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($alat as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <?php if($row['id_unit'] == 1111) : ?>
                                <?= $row['nama_unit']; ?> (<?= $row['nama_admin']; ?>)
                            <?php else : ?>
                                <?= $row['nama_unit']; ?> <?= $row['nama_admin']; ?>
                            <?php endif ; ?>
                        </td>
                        <td><?= $row['nama_ma']; ?> <?= $row['nama_ta']; ?></td>
                        <td><?= $row['no_seri']; ?></td>
                        <td><?= $row['nama_lab']; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#rinci_<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Rincian Data' class="badge badge-primary"><i class="fa fa-eye"></i></a>
                            <a href="<?= base_url(); ?>admin/alat/ubah/<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                            <?php if($row['id_alat'] != 1) : ?>
                                <a href="<?= base_url(); ?>admin/alat/hapus/<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger"><i class="fa fa-trash" onclick="return confirm('Yakin Hapus?');"></i></a>
                            <?php endif ; ?>
                            <a href="<?= base_url();?>admin/alat/riwayat/<?= $row['id_alat'];?>" data-toggle='tooltip' title="Riwayat Pemakaian dan Kalibrasi Alat" class="badge badge-info"> <i class="fa fa-info"></i></a>
                        </td>
                    </tr>

                    <!-- modal rinci -->
                        <div class="modal fade" id="rinci_<?= $row['id_alat']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rincian Data Alat</h5>
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

                                        <hr>

                                        <div class="col-4">Nama Alat</div>
                                        <div class="col-6">: <?= $row['nama_ma']; ?> <?= $row['nama_ta']; ?></div>

                                        <div class="col-4">Merek</div>
                                        <div class="col-6">: <?= $row['merek']; ?></div>

                                        <div class="col-4">Tipe</div>
                                        <div class="col-6">: <?= $row['tipe']; ?></div>

                                        <div class="col-4">Nomor Seri</div>
                                        <div class="col-6">: <?= $row['no_seri']; ?></div>

                                        <div class="col-4">Nomor BMN</div>
                                        <div class="col-6">: <?= $row['no_bmn']; ?></div>

                                        <div class="col-4">Lab</div>
                                        <div class="col-6">: <?= $row['nama_lab']; ?></div>
                                        
                                        <div class="col-4">Lokasi Alat</div>
                                        <div class="col-6">: <?= $row['lokasi_alat']; ?></div>
                                        
                                        <div class="col-4">Daya Listrik</div>
                                        <div class="col-6">: <?= $row['daya_listrik']; ?></div>

                                        <div class="col-4">QR Code</div>
                                        <div class="col-6">:
                                              <img src="<?= base_url();?>assets/qr_code/<?= $row['kode_alat'];?>.png" alt="">  
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url(); ?>admin/alat/ubah/<?= $row['id_alat']; ?>" class="btn btn-success">Ubah</a>
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