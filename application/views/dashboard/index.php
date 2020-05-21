<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('msg'); ?>
        </div>
    </div>
    <?php if ($this->session->userdata('akses') == 1) : ?>
        <div class="row">
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $jumlah_user; ?></h3>

                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="<?= base_url('pengguna'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $jumlah_kelas; ?></h3>

                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="<?= base_url('kelas'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $jumlah_surat; ?></h3>

                        <p>Surat</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="<?= base_url('surat'); ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-6">
            <div class="notice-board">
                <div class="panel panel-info">
                    <div class="panel-heading">

                        <?php
                        $years = date("m");
                        $month = date("m");
                        echo "Kalender&nbsp " . date(" M Y", mktime(0, 0, $month, $years));
                        ?>

                    </div>
                    <div class="panel-body">
                        <?php
                        $month = date("m");
                        $year = date("Y");
                        $day = date("d");
                        $endDate = date("t", time(0, 0, 0, $month, $day, $year));
                        echo '<font face="arial" size="4">';
                        echo '<table align="center" border="0" cellpadding=5 cellspacing=5 style="table"><tr><td align=center>';
                        echo "Hari ini : " . date("d / F / Y ", time(0, 0, 0, $month, $day, $year));
                        echo '<p>';
                        echo '</td></tr></table>';
                        echo '<table width="100%" align="center" border="0" cellpadding=1 cellspacing=1">
                                <tr bgcolor="#bce8f1">
                                <td align=center><font color=red>Minggu</font></td>
                                <td align=center>Senin</td>
                                <td align=center>Selasa</td>
                                <td align=center>Rabu</td>
                                <td align=center>Kamis</td>
                                <td align=center>Jumat</td>
                                <td align=center>Sabtu</td>
                                </tr>';
                        $s = date("w", mktime(0, 0, 0, $month, 1, $year));
                        for ($ds = 1; $ds <= $s; $ds++) {
                            echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFF\">
                                </td>";
                        }
                        for ($d = 1; $d <= $endDate; $d++) {
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
                                echo "<tr>";
                            }
                            $fontColor = "#000000";
                            if (date("D", mktime(0, 0, 0, $month, $d, $year)) == "Sun") {
                                $fontColor = "red";
                            }
                            echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
                            if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
                                echo "</tr>";
                            }
                        }
                        echo '</table>';
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <small class="text-muted">
                SIO atau <b>Surat Izin Online</b> adalah sebuah aplikasi berbasis web yang digunakan untuk
                mempermudah mengirim surat izin.<br>
                <br>
                Kontak Saya :
                <br>
                <ul>
                    <li style="list-style: none;">
                        <i class="fa fa-facebook"></i> : Ronaldo Kereh
                    </li>
                    <li style="list-style: none;">
                        <i class="fa fa-whatsapp"></i> : 089612225233
                    </li>
                    <li style="list-style: none;">
                        <i class="fa fa-envelope"></i> : kerehchannel@gmail.com
                    </li>
                </ul>
            </small>
        </div>
    </div>
</section>
<!-- /.content -->