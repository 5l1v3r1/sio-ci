<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open('surat/kirim'); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ht">Hari/Tanggal</label>
                        <input type="text" name="ht" id="ht" class="form-control" value="<?= date('d F Y', time()); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <?php foreach ($kelas as $kls) : ?>
                            <?php if ($user['kelas'] == $kls->id_kelas) : ?>
                                <input type="hidden" name="kelas" id="kelas" class="form-control" value="<?= $kls->id_kelas; ?>" readonly>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                        <?= form_error('keterangan', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>