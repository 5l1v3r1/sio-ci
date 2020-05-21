<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open('pengguna/myprofile'); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <?php if ($user['jk'] == 'L') : ?>
                                <option value="L" selected>Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            <?php else : ?>
                                <option value="P" selected>Perempuan</option>
                                <option value="L">Laki - Laki</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kode kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" value="<?= $user['kelas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor HP</label>
                        <input type="text" name="hp" id="hp" class="form-control" value="<?= $user['hp']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        Edit Password
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open('pengguna/edit_password'); ?>
                    <div class="form-group">
                        <label for="cp">Password Saat Ini</label>
                        <input type="password" name="cp" id="cp" class="form-control">
                        <?= form_error('cp', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="np">Password Baru</label>
                        <input type="password" name="np" id="np" class="form-control">
                        <?= form_error('np', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="np2">Konfirmasi Password Baru</label>
                        <input type="password" name="np2" id="np2" class="form-control">
                        <?= form_error('np2', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Simpan</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>