<div class="collapse" id="collapseExample">
  <div class="card mb-3 card-body">
    <div class="row">
        <div class="col">
            <h3>Cetak Kartu</h3>
            <table cellpadding="2" cellspacing=2>
                <tr>
                    <th class="align-top">Pilih Semua</th>
                    <td class="align-top">:</td>
                    <td class="align-top">
                        <button id="check" class="btn btn-primary">Pilih Semua</button>
                    </td>
                </tr>
                <tr>
                    <th class="align-top">Pilih Berdasarkan</th>
                    <td class="align-top">:</td>
                    <td class="align-top" style="width:350px">
                        <select name="admin" id="admin" class="form-control mb-3" style="width:100%">
                            <option value="">-pilih-</option>
                            <?php foreach ($admin as $adm) : ?>
                                <option value="<?= $adm['id_admin'] ;?>"><?= $adm['nama_unit']; ?> - <?= $adm['nama_admin']; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </div>
  </div>
</div>

<div class="card p-3">
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url();?>admin/alat/tambah" data-toggle='toogle' title='Tambah Data' class="btn btn-primary">Tambah Data</a>

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Cetak Kartu
            </button>
        
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
    
    <form action="<?= base_url() ;?>cetak/kartuAlat" method="post" target="blank">

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="tabel">
                <thead>
                    <tr>
                        <th class='align-middle'>No</th>
                        <?php if($this->session->userdata('key_kalibrasi') == 1) : ?>
                            <th class='align-middle'>Admin</th>
                        <?php endif ; ?>
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
                        <?php if($this->session->userdata('key_kalibrasi') == 1) : ?>
                            <?php if($this->session->flashdata('id') == $row['id_alat']) : ?>
                                <tr class="alert alert-success">
                            <?php else : ?>
                                <tr>
                            <?php endif ; ?>
                        <?php endif ; ?>

                            <td>
                                <?= $no++; ?> 
                                <input type="checkbox" class="alat_<?= $row['id_alat']; ?> admin_<?= $row['id_admin']; ?>" name="alat_<?= $row['id_alat']; ?>"  value="<?= $row['id_alat']; ?>">
                            </td>
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
                                <a href="<?= base_url(); ?>admin/alat/rincian/<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Rincian Data' class="badge badge-primary"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url(); ?>admin/alat/ubah/<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Ubah Data' class="badge badge-success"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url(); ?>admin/alat/hapus/<?= $row['id_alat']; ?>" data-toggle='tooltip' title='Hapus Data' class="badge badge-danger" onclick="return confirm('Yakin Hapus?');"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url();?>admin/alat/riwayat/<?= $row['id_alat'];?>" data-toggle='tooltip' title="Riwayat Pemakaian dan Kalibrasi Alat" class="badge badge-info"> <i class="fa fa-info"></i></a>
                            </td>
                        </tr>

                        <script>
                            $("#check").click(function(){
                                $(".alat_<?= $row['id_alat'];?>").prop('checked', true) ;
                            })
                            $("#admin").change(function(){
                                var adm = $("#admin").val() ;
                                $(".alat_<?= $row['id_alat'];?>").prop('checked', false) ;
                                $(".admin_"+adm).prop('checked', true) ;
                            })

                        </script>
                    <?php endforeach ; ?>
                </tbody>
            </table>
        </div>

        <button type="submit" value="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>

    </form>
</div>


<script>
    $(document).ready(function () {
        $("#divAlat").hide() ;
        $("#admin").select2({
            theme: 'bootstrap4',
            placeholder: "--Pilih--"
        });
    });
</script>