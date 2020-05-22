<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
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
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Hari/Tanggal</th>
                                <th>Kode Kelas</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </thead>
                            <tfoot>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hari/Tanggal</th>
                                <th>Kode Kelas</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($main as $srt) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $srt->nama; ?></td>
                                        <td><?= $srt->hari_tanggal; ?></td>
                                        <td><span class="label label-success"><?= $srt->kelas; ?></span></td>
                                        <td><?= $srt->keterangan; ?></td>
                                        <?php if ($srt->status == 0) : ?>
                                            <td><span class="label label-danger">Belum disetujui</span></td>
                                        <?php else : ?>
                                            <td><span class="label label-success">Disetujui</span></td>
                                        <?php endif; ?>
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