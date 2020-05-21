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
                    <?= form_open('kelas/edit?id=' . $getkelas['id_kelas']); ?>
                    <div class="form-group">
                        <label for="id_kelas">Id Kelas</label>
                        <input type="text" name="id_kelas" id="id_kelas" class="form-control" value="<?= $getkelas['id_kelas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Nama Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $getkelas['kelas']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-trash"></i> Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>