<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($user['jk'] == 'L') : ?>
                    <img src="<?= base_url('assets/'); ?>dist/img/male.svg" class="img-circle" alt="User Image">
                <?php else : ?>
                    <img src="<?= base_url('assets/'); ?>dist/img/female.svg" class="img-circle" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="pull-left info">
                <p><?= $user['nama']; ?></p>
                <?php if ($user['akses'] == 1) : ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?= 'Admin'; ?></a>
                <?php else : ?>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?= 'Siswa'; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu Utama</li>
            <?php if ($user['akses'] == 2) : ?>
                <li>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-inbox"></i> <span>Beranda</span>
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 2) : ?>
                <li>
                    <a href="<?= base_url('surat/kirim'); ?>">
                        <i class="fa fa-paper-plane"></i> <span>Kirim Surat</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 1) : ?>
                <li>
                    <a href="<?= base_url('surat'); ?>">
                        <i class="fa fa-envelope"></i> <span>Surat Masuk</span>
                        <span class="pull-right-container">
                            <?php if (!$jumlah_surat) : ?>
                            <?php else : ?>
                                <span class="label label-danger">
                                    <?= $jumlah_surat; ?>
                                </span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user['akses'] == 1) : ?>
                <li class="header">Master</li>
                <li>
                    <a href="<?= base_url('pengguna'); ?>"><i class="fa fa-user-plus"></i> <span>Master Pengguna</span></a>
                </li>
                <li>
                    <a href="<?= base_url('kelas'); ?>"><i class="fa fa-building"></i> <span>Master Kelas</span></a>
                </li>
            <?php endif; ?>
            <li class="header">Pengaturan</li>
            <li>
                <a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->