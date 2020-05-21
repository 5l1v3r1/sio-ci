<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->userdata('msg'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <th>Id Kelas</th>
                                <th>Kelas</th>
                                <th class="text-center">Aksi</th>
                            </thead>
                            <tfoot>
                                <th>Id Kelas</th>
                                <th>Kelas</th>
                                <th class="text-center">Aksi</th>
                            </tfoot>
                            <tbody>
                                <?php foreach ($kelas as $kls) : ?>
                                    <tr>
                                        <td><?= $kls->id_kelas; ?></td>
                                        <td><?= $kls->kelas; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('kelas/hapus?id=' . $kls->id_kelas); ?>" class="label label-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            <a href="<?= base_url('kelas/edit?id=' . $kls->id_kelas); ?>" class="label label-success"><i class="fa fa-pen"></i> Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>