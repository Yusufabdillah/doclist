<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-user"></i> Profil User
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row">
    <div class="col-md-3">
        <div class="block">
            <div class="block-title text-center">
                <h2><strong>Status</strong> akses</h2>
            </div>
            <form class="form-horizontal form-bordered">
                <div class="form-group">
                    <?php
                    if ($get_profil->statusUser == true) {
                        $statusUser = array(
                            'style' => 'success',
                            'title' => 'Aktif'
                        );
                    } else if ($get_profil->statusUser == false) {
                        $statusUser = array(
                            'style' => 'danger',
                            'title' => 'Non Aktif'
                        );
                    }
                    ?>
                    <label class="col-md-7 control-label">Status User</label>
                    <div class="col-md-5" style="margin-top: 5px">
                        <span class="label label-<?= $statusUser['style']; ?>"><?= $statusUser['title']; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                    if ($get_profil->statusAPI == true) {
                        $statusAPI = array(
                            'style' => 'success',
                            'title' => 'Aktif'
                        );
                    } else if ($get_profil->statusAPI == false) {
                        $statusAPI = array(
                            'style' => 'danger',
                            'title' => 'Non Aktif'
                        );
                    }
                    ?>
                    <label class="col-md-7 control-label">API Akses</label>
                    <div class="col-md-5" style="margin-top: 5px">
                        <span class="label label-<?= $statusAPI['style']; ?>"><?= $statusAPI['title']; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                    if ($get_profil->statusPIC == true) {
                        $statusPIC = array(
                            'style' => 'success',
                            'title' => 'Aktif'
                        );
                    } else if ($get_profil->statusPIC == false) {
                        $statusPIC = array(
                            'style' => 'danger',
                            'title' => 'Non Aktif'
                        );
                    }
                    ?>
                    <label class="col-md-7 control-label">Person In Charge</label>
                    <div class="col-md-5" style="margin-top: 5px">
                        <span class="label label-<?= $statusPIC['style'] ?>"><?= $statusPIC['title']; ?></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-9">
        <div class="block">
            <div class="block-title">
                <h2><strong>Description</strong></h2>
            </div>
            <form id="form-validation" action="<?= site_url("b_user/saveUser") ?>" method="post" class="form-horizontal form-bordered">
                <?php
                if (isset($get_profil)) {
                    ?>
                    <input type="hidden" name="passUser" value="<?= !empty($get_profil) ? $get_profil->passUser : null; ?>">
                    <input type="hidden" name="createdBy" value="<?= !empty($get_profil) ? $get_profil->createdBy : null; ?>">
                    <input type="hidden" name="createdDate" value="<?= !empty($get_profil) ? $get_profil->createdDate : null; ?>">
                    <input type="hidden" name="idPerusahaan" value="<?= !empty($get_profil) ? $get_profil->idPerusahaan : null; ?>">
                    <input type="hidden" name="idDepartemen" value="<?= !empty($get_profil) ? $get_profil->idDepartemen : null; ?>">
                    <input type="hidden" name="idJabatan" value="<?= !empty($get_profil) ? $get_profil->idJabatan : null; ?>">
                    <input type="hidden" name="idGrup" value="<?= !empty($get_profil) ? $get_profil->idGrup : null; ?>">
                    <input type="hidden" name="_Update_" value="true">
                    <input type="hidden" name="profileUser" value="true">
                    <?php
                    if ($get_profil->statusAPI == true) {
                        ?>
                        <input type="hidden" name="statusAPI" value="<?= $get_profil->statusAPI; ?>">
                        <?php
                    } if ($get_profil->statusPIC == true) {
                        ?>
                        <input type="hidden" name="statusPIC" value="<?= $get_profil->statusPIC; ?>">
                        <?php
                    } if ($get_profil->statusUser == true) {
                        ?>
                        <input type="hidden" name="statusUser" value="<?= $get_profil->statusUser; ?>">
                        <?php
                    }
                }
                ?>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-text-input">Username</label>
                    <div class="col-md-10">
                        <input readonly type="text" name="idUser" value="<?= !empty($get_profil) ? $get_profil->idUser : null; ?>" class="form-control" placeholder="Masukkan username..." required>
                        <span class="help-block">Username tidak bisa dirubah.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-text-input">Nama Lengkap</label>
                    <div class="col-md-10">
                        <input type="text" name="namaUser" value="<?= !empty($get_profil) ? $get_profil->namaUser : null; ?>" class="form-control" placeholder="Masukkan nama lengkap..." required>
                        <span class="help-block">Tolong masukkan dengan format text.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="example-text-input">Nomor Telephone</label>
                    <div class="col-md-10">
                        <input type="text" name="telpUser" value="<?= !empty($get_profil) ? $get_profil->telpUser : null; ?>" class="form-control" placeholder="0000-0000-0000">
                        <span class="help-block">Tolong masukkan dengan format nomor telephone.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Perusahaan</label>
                    <div class="col-md-10" style="margin-top: 7px">
                        <?= $get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Departemen</label>
                    <div class="col-md-10" style="margin-top: 7px">
                        <?= $get_profil->namaDepartemen." di ".$get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Jabatan</label>
                    <div class="col-md-10" style="margin-top: 7px">
                        <?= $get_profil->namaJabatan." di ".$get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Grup User</label>
                    <div class="col-md-10" style="margin-top: 7px">
                        <?= $get_profil->namaGrup." di ".$get_profil->Grup_namaPerusahaan." ".$get_profil->Grup_lokasiPerusahaan; ?>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Login</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/user_profil/JSValidasi');

