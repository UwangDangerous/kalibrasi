    <?php if($this->session->userdata('key_kalibrasi') == 1) : ?>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Master Data</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Awal</h6>
                    <a class="collapse-item" href="<?= base_url(); ?>admin/unit">Tipe Unit</a>
                    <a class="collapse-item" href="<?= base_url(); ?>admin/lab">Laboratorium</a>
                    <a class="collapse-item" href="<?= base_url(); ?>admin/lab/utility">Pengaturan</a>
                    <a class="collapse-item" href="<?= base_url(); ?>admin/lab/pesan">Pesan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/admin">
            <i class="fa fa-users"></i>
            <span>Daftar Admin</span></a>
        </a>
    </li>

    <?php endif ; ?>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/alat">
            <i class="fas fa-toolbox"></i>
            <span>Daftar Alat</span></a>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>