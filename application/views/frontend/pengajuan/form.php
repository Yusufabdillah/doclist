<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */
?>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-file-o"></i> Pengajuan Baru
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
    <div class="row animation-fadeInQuick">
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <?php
                    if (isset($get_pengajuan)) {
                        if (!empty($get_pengajuan->ktrDecline)) {
                            ?>
                            <div class="block-options pull-right">
                                <a href="#modalKetDecline" data-toggle="modal" class="btn btn-alt btn-sm btn-warning"><i class="fa fa-info-circle"></i> Informasi Penolakan</a>
                            </div>
                            <?php
                            $this->load->view('frontend/pengajuan/modalKetDecline');
                        }
                    }
                    ?>
                    <h2><strong>Form</strong> Pengajuan Baru</h2>
                </div>
                <form id="formPengajuan" action="<?php echo base_url('F_Pengajuan/savePengajuan'); ?>" method="post" class="form-horizontal">
                    <?php
                    if (isset($get_pengajuan)) {
                        ?>
                        <input type="hidden" name="idPengajuan" value="<?= $get_pengajuan->idPengajuan; ?>">
                        <input type="hidden" name="draft_status" value="<?= $get_pengajuan->draft_status; ?>">
                        <input type="hidden" name="draft_createdby" value="<?= $get_pengajuan->draft_createdby; ?>">
                        <input type="hidden" name="draft_createddate" value="<?= $get_pengajuan->draft_createddate; ?>">
                        <?php
                    }
                    ?>
                    <div class="row container-fluid">
                        <label>Wilayah Dokumen</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $negara = array(
                                    'label' => 'Negara',
                                    'id' => 'AJAX_idNegara',
                                    'name' => 'idNegara',
                                    'placeholder' => 'Pilih negara',
                                    'help' => 'Mohon pilih negara'
                                );
                                ?>
                                <div class="col-md-12">
                                    <label class="control-label"><?= $negara['label']; ?></label><br>
                                    <select id="<?= $negara['id']; ?>" name="<?= $negara['name']; ?>"
                                            class="<?= $negara['name']; ?>"
                                            data-placeholder="<?= $negara['placeholder']; ?>" style="width: 100%;">
                                        <option></option>
                                        <?php
                                        foreach ($get_negara as $data) {
                                            ?>
                                            <option
                                                <?php
                                                if (isset($get_pengajuan)) {
                                                    if ($data->idNegara == $get_pengajuan->idNegara) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>
                                                    value="<?= $data->idNegara; ?>"><?= $data->namaNegara; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block">
                                    <?= $negara['help']; ?>
                                    <a href="javascript:;" onclick="helpNegara()"><i
                                                class="fa fa-question-circle-o "
                                                style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $provinsi = array(
                                        'label' => 'Provinsi',
                                        'name' => 'idProvinsi',
                                        'id' => 'AJAX_idProvinsi',
                                        'placeholder' => 'Pilih provinsi',
                                        'help' => 'Mohon pilih provinsi'
                                    );
                                    ?>
                                    <label class="control-label"><?= $provinsi['label']; ?></label><br>
                                    <select id="<?= $provinsi['id']; ?>" name="<?= $provinsi['name']; ?>"
                                            class="<?= $provinsi['name']; ?>"
                                            data-placeholder="<?= $provinsi['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_provinsi as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idProvinsi == $get_pengajuan->idProvinsi) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?= $data->idProvinsi; ?>"><?= $data->namaProvinsi; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                    <?= $provinsi['help']; ?>
                                    <a href="javascript:;" onclick="helpProvinsi()"><i
                                                class="fa fa-question-circle-o "
                                                style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $kota = array(
                                        'label' => 'Kota',
                                        'name' => 'idKota',
                                        'id' => 'AJAX_idKota',
                                        'placeholder' => 'Pilih kota',
                                        'help' => 'Mohon pilih kota'
                                    );
                                    ?>
                                    <label class="control-label"><?= $kota['label']; ?></label><br>
                                    <select id="<?= $kota['id']; ?>" name="<?= $kota['name']; ?>"
                                            class="<?= $kota['name']; ?>"
                                            data-placeholder="<?= $kota['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_kota as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idKota == $get_pengajuan->idKota) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?= $data->idKota; ?>"><?= $data->namaKota; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                    <?= $kota['help']; ?>
                                    <a href="javascript:;"
                                       onclick="helpKota()"><i
                                                class="fa fa-question-circle-o "
                                                style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $kecamatan = array(
                                        'label' => 'Kecamatan',
                                        'name' => 'idKecamatan',
                                        'id' => 'AJAX_idKecamatan',
                                        'placeholder' => 'Pilih kecamatan...',
                                        'help' => 'Mohon pilih kecamatan'
                                    );
                                    ?>
                                    <label class="control-label"><?= $kecamatan['label']; ?></label><br>
                                    <select id="<?= $kecamatan['id']; ?>" name="<?= $kecamatan['name']; ?>"
                                            class="<?= $kecamatan['name']; ?>"
                                            data-placeholder="<?= $kecamatan['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_kecamatan as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idKecamatan == $get_pengajuan->idKecamatan) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?= $data->idKecamatan; ?>"><?= $data->namaKecamatan; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>

                                    </select>
                                    <span class="help-block">
                                    <?= $kecamatan['help']; ?>
                                    <a href="javascript:;"
                                       onclick="helpKecamatan()"><i class="fa fa-question-circle-o "
                                                                    style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $kelurahan = array(
                                        'label' => 'Kelurahan',
                                        'name' => 'idKelurahan',
                                        'id' => 'AJAX_idKelurahan',
                                        'placeholder' => 'Pilih kelurahan',
                                        'help' => 'Mohon pilih kelurahan'
                                    );
                                    ?>
                                    <label class="control-label"><?= $kelurahan['label']; ?></label><br>
                                    <select id="<?= $kelurahan['id']; ?>" name="<?= $kelurahan['name']; ?>"
                                            class="<?= $kelurahan['name']; ?>"
                                            data-placeholder="<?= $kelurahan['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) { ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_kelurahan as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idKelurahan == $get_pengajuan->idKelurahan) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?= $data->idKelurahan; ?>"><?= $data->namaKelurahan; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                        <?= $kelurahan['help']; ?>
                                        <a href="javascript:;" onclick="helpKelurahan()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Site</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $perusahaan = array(
                                        'label' => 'Perusahaan',
                                        'name' => 'idPerusahaan',
                                        'id' => 'AJAX_idPerusahaan',
                                        'placeholder' => 'Pilih site perusahaan',
                                        'help' => 'Mohon pilih site perusahaan'
                                    );
                                    ?>
                                    <label class="control-label"><?= $perusahaan['label']; ?></label><br>
                                    <select name="<?= $perusahaan['name']; ?>"
                                            class="<?= $perusahaan['name']; ?> form-control"
                                            id="<?= $perusahaan['id']; ?>"
                                            data-placeholder="<?= $perusahaan['placeholder']; ?>" style="width: 100%;">
                                        <option></option>
                                        <?php
                                        foreach ($get_perusahaan as $data) {
                                            ?>
                                            <option
                                                <?php
                                                if (isset($get_pengajuan)) {
                                                    if ($data->idPerusahaan == $get_pengajuan->idPerusahaan) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>
                                                    value="<?= $data->idPerusahaan; ?>"><?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block">
                                <?= $perusahaan['help']; ?> <a href="javascript:;" onclick="helpPerusahaan()"><i
                                                    class="fa fa-question-circle-o"
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $instansi = array(
                                        'label' => 'Instansi',
                                        'name' => 'idInstansi',
                                        'id' => 'AJAX_idInstansi',
                                        'placeholder' => 'Pilih instansi',
                                        'help' => 'Mohon pilih instansi'
                                    );
                                    ?>
                                    <label class="control-label"><?= $instansi['label']; ?></label><br>
                                    <select name="<?= $instansi['name']; ?>" id="<?= $instansi['id']; ?>"
                                            class="<?= $instansi['name']; ?>"
                                            data-placeholder="<?= $instansi['placeholder']; ?>" style="width: 100%;">
                                        <option></option>
                                        <?php
                                        foreach ($get_instansi as $data) {
                                            ?>
                                            <option
                                                <?php
                                                if (isset($get_pengajuan)) {
                                                    if ($data->idInstansi == $get_pengajuan->idInstansi) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>
                                                    value="<?= $data->idInstansi; ?>"><?= $data->namaInstansi . ' di ' . $data->namaKota; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block">
                                <?= $instansi['help']; ?> <a href="javascript:;" onclick="helpAgency()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $tipe = array(
                                        'label' => 'Tipe Dokumen',
                                        'name' => 'idTipe',
                                        'placeholder' => 'Pilih tipe dokumen',
                                        'help' => 'Mohon pilih tipe dokumen'
                                    );
                                    ?>
                                    <label class="control-label"><?= $tipe['label']; ?></label><br>
                                    <select name="<?= $tipe['name']; ?>" class="<?= $tipe['name']; ?>"
                                            data-placeholder="<?= $tipe['placeholder']; ?>" style="width: 100%;">
                                        <option></option>
                                        <?php
                                        foreach ($get_tipe as $data) {
                                            ?>
                                            <option
                                                <?php
                                                if (isset($get_pengajuan)) {
                                                    if ($data->idTipe == $get_pengajuan->idTipe) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>
                                                    value="<?= $data->idTipe; ?>"><?= $data->namaTipe; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block">
                                <?= $tipe['help']; ?> <a href="javascript:;" onclick="helpType()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="AJAX_kpl_instansiPengajuan">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $kpl_instansi = array(
                                        'label' => 'Kepala Instansi',
                                        'name' => 'kpl_instansiPengajuan',
                                        'placeholder' => 'Input kepala instansi...',
                                        'help' => 'Mohon input kepala instansi'
                                    );
                                    ?>
                                    <label class="control-label"><?= $kpl_instansi['label']; ?></label>
                                    <input type="text" name="<?= $kpl_instansi['name']; ?>"
                                           class="form-control input-sm"
                                           placeholder="<?= $kpl_instansi['placeholder']; ?>"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->kpl_instansiPengajuan : null; ?>"/>
                                    <span class="help-block">
                                        <?= $kpl_instansi['help']; ?>
                                        <a href="javascript:;" onclick="helpAgencyleader()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $jbt_kplInstansi = array(
                                        'label' => 'Jabatan Kepala Instansi',
                                        'name' => 'jbt_kpl_insPengajuan',
                                        'placeholder' => 'Input jabatan kepala instansi...',
                                        'help' => 'Mohon input jabatan kepala instansi'
                                    );
                                    ?>
                                    <label class="control-label"><?= $jbt_kplInstansi['label']; ?></label>
                                    <input type="text" name="<?= $jbt_kplInstansi['name']; ?>"
                                           class="form-control input-sm"
                                           placeholder="<?= $jbt_kplInstansi['placeholder']; ?>"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->jbt_kpl_insPengajuan : null; ?>"/>
                                    <span class="help-block">
                                        <?= $jbt_kplInstansi['help']; ?>
                                        <a href="javascript:;" onclick="helpAgencyleader()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Klasifikasi Dokumen</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $aspek = array(
                                    'label' => 'Aspek',
                                    'id' => 'AJAX_idAspek',
                                    'name' => 'idAspek',
                                    'placeholder' => 'Pilih aspek',
                                    'help' => 'Mohon pilih aspek'
                                );
                                ?>
                                <div class="col-md-12">
                                    <label class="control-label"><?= $aspek['label']; ?></label><br>
                                    <select id="<?= $aspek['id']; ?>" name="<?= $aspek['name']; ?>"
                                            class="<?= $aspek['name']; ?>"
                                            data-placeholder="<?= $aspek['placeholder']; ?>" style="width: 100%;">
                                        <option></option>
                                        <?php
                                        foreach ($get_aspek as $data) {
                                            ?>
                                            <option
                                                <?php
                                                if (isset($get_pengajuan)) {
                                                    if ($data->idAspek == $get_pengajuan->idAspek) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>
                                                    value="<?= $data->idAspek; ?>"><?= $data->namaAspek; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block">
                                    <?= $aspek['help']; ?>
                                    <a href="javascript:;" onclick="helpAspek()"><i
                                                class="fa fa-question-circle-o "
                                                style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $kategori = array(
                                        'label' => 'Kategori',
                                        'name' => 'idKategori',
                                        'id' => 'AJAX_idKategori',
                                        'placeholder' => 'Pilih kategori',
                                        'help' => 'Mohon pilih kategori'
                                    );
                                    ?>
                                    <label class="control-label"><?= $kategori['label']; ?></label><br>
                                    <select id="<?= $kategori['id']; ?>" name="<?= $kategori['name']; ?>"
                                            class="<?= $kategori['name']; ?>"
                                            data-placeholder="<?= $kategori['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if ($get_pengajuan) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_kategori as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idKategori == $get_pengajuan->idKategori) {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                        value="<?= $data->idKategori; ?>"><?= $data->namaKategori; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                    <?= $kategori['help']; ?>
                                    <a href="javascript:;" onclick="helpKategori()"><i
                                                class="fa fa-question-circle-o "
                                                style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $subkategori = array(
                                        'label' => 'Sub Kategori',
                                        'name' => 'idSubk',
                                        'id' => 'AJAX_idSubk',
                                        'placeholder' => 'Pilih sub kategori',
                                        'help' => 'Mohon pilih sub kategori'
                                    );
                                    ?>
                                    <label class="control-label"><?= $subkategori['label']; ?></label><br>
                                    <select id="<?= $subkategori['id']; ?>" name="<?= $subkategori['name']; ?>"
                                            class="<?= $subkategori['name']; ?>"
                                            data-placeholder="<?= $subkategori['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if ($get_pengajuan) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_subk as $data) {
                                                ?>
                                                <option
                                                    <?php

                                                    if ($data->idSubk == $get_pengajuan->idSubk) {
                                                        echo "selected";
                                                    }

                                                    ?>
                                                        value="<?= $data->idSubk; ?>"><?= $data->namaSubk; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                        <?= $subkategori['help']; ?>
                                        <a href="javascript:;"
                                           onclick="helpSubKategori()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $subsubkategori = array(
                                        'label' => 'Sub Sub Kategori',
                                        'name' => 'idSub_subk',
                                        'id' => 'AJAX_idSub_subk',
                                        'placeholder' => 'Pilih sub sub kategori',
                                        'help' => 'Mohon pilih sub sub kategori'
                                    );
                                    ?>
                                    <label class="control-label"><?= $subsubkategori['label']; ?></label><br>
                                    <select id="<?= $subsubkategori['id']; ?>" name="<?= $subsubkategori['name']; ?>"
                                            class="<?= $subsubkategori['name']; ?>"
                                            data-placeholder="<?= $subsubkategori['placeholder']; ?>"
                                            style="width: 100%;">

                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) {
                                            ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_sub_subk as $data) {
                                                ?>
                                                <option
                                                    <?php
                                                    if ($data->idSub_subk == $get_pengajuan->idSub_subk) {
                                                        echo "selected";
                                                    }

                                                    ?>
                                                        value="<?= $data->idSub_subk; ?>"><?= $data->namaSub_subk; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>

                                    </select>
                                    <span class="help-block">
                                            <?= $subsubkategori['help']; ?>
                                            <a href="javascript:;"
                                               onclick="helpSubSubKategori()"><i class="fa fa-question-circle-o "
                                                                                 style="padding-left: 10px;font-size: 20px"></i>
                                            </a>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $klasifikasi = array(
                                        'label' => 'Klasifikasi',
                                        'name' => 'idKlasifikasi',
                                        'id' => 'AJAX_idKlasifikasi',
                                        'placeholder' => 'Pilih klasifikasi',
                                        'help' => 'Mohon pilih klasifikasi'
                                    );
                                    ?>
                                    <label class="control-label"><?= $klasifikasi['label']; ?></label><br>
                                    <select id="<?= $klasifikasi['id']; ?>" name="<?= $klasifikasi['name']; ?>"
                                            class="<?= $klasifikasi['name']; ?>"
                                            data-placeholder="<?= $klasifikasi['placeholder']; ?>"
                                            style="width: 100%;">
                                        <?php
                                        /**
                                         * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                         */
                                        if (isset($get_pengajuan)) { ?>
                                            <option></option>
                                            <?php
                                            foreach ($get_klasifikasi as $data) {
                                                ?>
                                                <option
                                                    <?php

                                                    if ($data->idKlasifikasi == $get_pengajuan->idKlasifikasi) {
                                                        echo "selected";
                                                    }

                                                    ?>
                                                        value="<?= $data->idKlasifikasi; ?>"><?= $data->namaKlasifikasi; ?></option>
                                                <?php
                                            }
                                        }
                                        //====================================
                                        ?>
                                    </select>
                                    <span class="help-block">
                                        <?= $klasifikasi['help']; ?>
                                        <a href="javascript:;" onclick="helpKlasifikasi()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $judulPengajuan = array(
                                        'label' => 'Judul Dokumen',
                                        'name' => 'idJudul',
                                        'id' => 'AJAX_judulPengajuan',
                                        'placeholder' => 'Input judul dokumen',
                                        'help' => 'Mohon input judul dokumen dan keterangan dokumen'
                                    );
                                    ?>
                                    <label class="control-label"><?= $judulPengajuan['label']; ?></label>
                                    <div class="row">
                                        <div class="col-md-7" style="margin-left:0px">
                                            <select id="<?= $judulPengajuan['id']; ?>"
                                                    name="<?= $judulPengajuan['name']; ?>"
                                                    class="<?= $judulPengajuan['name']; ?>"
                                                    data-placeholder="<?= $judulPengajuan['placeholder']; ?>"
                                                    style="width: 100%;">
                                                <?php
                                                /**
                                                 * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                                 */
                                                if (isset($get_pengajuan)) { ?>
                                                    <option></option>
                                                    <?php
                                                    foreach ($get_judul as $data) {
                                                        ?>
                                                        <option
                                                            <?php

                                                            if ($data->idJudul == $get_pengajuan->idJudul) {
                                                                echo "selected";
                                                            }

                                                            ?>
                                                                value="<?= $data->idJudul; ?>"><?= $data->namaJudul; ?></option>
                                                        <?php
                                                    }
                                                }
                                                //====================================
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <?php
                                            $keteranganJudul = array(
                                                'name' => 'desk_judulPengajuan',
                                                'placeholder' => 'keterangan, contoh: IMB tanah RSUP',
                                                // 'help' => 'Mohon input keterangan judul dokumen'
                                            );
                                            ?>
                                            <input type="text" name="<?= $keteranganJudul['name']; ?>"
                                                   class="form-control input-md"
                                                   placeholder="<?= $keteranganJudul['placeholder']; ?>"
                                                   value="<?= isset($get_pengajuan) ? $get_pengajuan->desk_judulPengajuan : null; ?>"/>
                                        </div>
                                    </div>
                                    <span class="help-block">
                                        <?= $judulPengajuan['help']; ?>
                                        <a href="javascript:;" onclick="helpJudulPengajuan()"><i
                                                    class="fa fa-question-circle-o "
                                                    style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $nomorPengajuan = array(
                                        'label' => 'Nomor Dokumen',
                                        'name' => 'nomorPengajuan',
                                        'placeholder' => 'Input nomor dokumen...',
                                        'help' => 'Mohon input nomor dokumen'
                                    );
                                    ?>
                                    <label class="control-label"><?= $nomorPengajuan['label']; ?></label>
                                    <input type="text" name="<?= $nomorPengajuan['name']; ?>"
                                           class="form-control input-sm"
                                           placeholder="<?= $nomorPengajuan['placeholder']; ?>"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->nomorPengajuan : null; ?>"/>
                                    <span class="help-block">
                                <?= $nomorPengajuan['help']; ?>
                                <a href="javascript:;" onclick="helpNomorPengajuan()"><i
                                            class="fa fa-question-circle-o "
                                            style="padding-left: 10px;font-size: 20px"></i></a>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $deskripsiPengajuan = array(
                                        'label' => 'Deskripsi Dokumen',
                                        'name' => 'deskripsiPengajuan',
                                        'placeholder' => 'Input deskripsi dokumen...',
                                        'help' => 'Mohon input deskripsi dokumen'
                                    );
                                    ?>
                                    <label class="control-label"><?= $deskripsiPengajuan['label']; ?></label>
                                    <textarea name="<?= $deskripsiPengajuan['name']; ?>" class="form-control"
                                              placeholder="<?= $deskripsiPengajuan['placeholder']; ?>"><?= isset($get_pengajuan) ? $get_pengajuan->deskripsiPengajuan : null; ?></textarea>
                                    <span class="help-block">
                                        <?= $deskripsiPengajuan['help']; ?>
                                            <a href="javascript:;" onclick="helpDiskripsi()"><i
                                                        class="fa fa-question-circle-o "
                                                        style="padding-left: 10px;font-size: 20px"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Dokumen Pendukung</label>
                    </div>
                    <div id="AJAX_rekom_syaratJudul"></div>
                    <div class="row" id="AJAX_referensiPersyaratan">
                        <?php
                        if (!isset($get_pengajuan)) {
                            ?>
                            <h3 class="text-center text-danger">
                                <i class="fa fa-info-circle"></i> Mohon pilih terdahulu judul dokumen.
                            </h3>
                            <?php
                        } else if (isset($get_pengajuan)) {
                            ?>
                            <div class="col-md-6 animation-fadeInQuick">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $referensi = array(
                                            'label' => 'Referensi Persyaratan',
                                            'name' => 'persyaratanPengajuan',
                                            'id' => 'AJAX_idReferensi',
                                            'help' => 'Mohon pilih dokumen pendukung dan status OSS.'
                                        );
                                        ?>
                                        <label class="control-label"><?= $referensi['label']; ?></label>
                                        <table class="table table-striped">
                                            <?php
                                            foreach ($get_referensi as $data) {
                                                if (empty($get_pengajuan->persyaratanPengajuan)) {
                                                    ?>
                                                    <tr>
                                                        <td width="85%">
                                                            <?= $data->namaPersyaratan; ?>
                                                        </td>
                                                        <td width="*">
                                                            <label class="switch switch-success"><input type="checkbox" value="<?= $data->idReferensi; ?>" name="persyaratanPengajuan[]"><span></span></label>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else if (!empty($get_pengajuan->persyaratanPengajuan)) {
                                                    ?>
                                                    <tr>
                                                        <td width="85%">
                                                            <?= $data->namaPersyaratan; ?>
                                                        </td>
                                                        <td width="*">
                                                            <label class="switch switch-success"><input type="checkbox" value="<?= $data->idReferensi; ?>" <?= array_search($data->idReferensi ,$get_persyaratan_pengajuan) !== false ? 'checked' : null; ?> name="persyaratanPengajuan[]"><span></span></label>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <span class="help-block">
                                    <?= $referensi['help']; ?>
                                    <a href="javascript:;"
                                       onclick="helpReferensi()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-6 animation-fadeInQuick">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $OSS = array(
                                            'label' => '&nbsp;',
                                            'name' => 'statusOSSPengajuan'
                                        );
                                        ?>
                                        <label class="control-label"><?= $OSS['label']; ?></label>
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="85%">
                                                    Online Single Submission
                                                </td>
                                                <td width="*">
                                                    <label class="switch switch-success"><input type="checkbox" value="1" <?= $get_pengajuan->statusOSSPengajuan == true ? 'checked' : null; ?> name="<?= $OSS['name']; ?>"><span></span></label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Perkiraan Biaya</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $biayaPengajuan = array(
                                        'label' => 'Biaya',
                                        'name' => 'biayaPengajuan',
                                        'id' => 'AJAX_biayaPengajuan',
                                        'placeholder' => '...',
                                        'help' => 'Mohon masukkan biaya dengan format angka'
                                    );
                                    ?>
                                    <label class="control-label"><?= $biayaPengajuan['label']; ?></label>
                                    <div class="input-group" id="AJAX_idCurrency">
                                        <input type="hidden" name="idCurrency" value="<?= isset($get_pengajuan) ? $get_pengajuan->idCurrency : null; ?>">
                                        <span class="input-group-addon"><?= isset($get_pengajuan) ? $get_pengajuan->idCurrency : '...'; ?></span>
                                        <input type="number" id="<?= $biayaPengajuan['id']; ?>"
                                               name="<?= $biayaPengajuan['name']; ?>"
                                               class="form-control input-sm"
                                               placeholder="<?= $biayaPengajuan['placeholder']; ?>"
                                               value="<?= isset($get_pengajuan) ? $get_pengajuan->biayaPengajuan : null; ?>"/>
                                    </div>
                                    <span class="help-block">
                                        <?= $biayaPengajuan['help']; ?>
                                        <a href="javascript:;" onclick="helpBiaya()">
                                            <i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="AJAX_Konversi">
                            <?php
                            if (!isset($get_pengajuan)) {
                                ?>
                                <h5 class="text-center text-danger">
                                    <i class="fa fa-info-circle"></i> Mohon masukkan dahulu nilai uang rupiah.
                                </h5>
                                <?php
                            } else if (isset($get_pengajuan)) {
                                $data_currency = json_decode($get_pengajuan->kurs_biayaPengajuan);
                                ?>
                                <textarea style="display: none"
                                          name="kurs_biayaPengajuan"><?= $get_pengajuan->kurs_biayaPengajuan; ?></textarea>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mata Uang</th>
                                        <th>Konversi dari IDR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($data_currency as $key => $data) {
                                        ?>
                                        <tr>
                                            <td><?= $key; ?></td>
                                            <td><?= number_format($data,4,',','.'); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-actions">
                                <div class="col-md-offset-9 col-md-3 btn-group">
                                    <a href="<?= site_url('F_Pengajuan/index'); ?>" class="btn btn-sm btn-warning"><i
                                                class="fa fa-reply"></i> Kembali</a>
                                    <button name="draft" type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-save"></i> Draft
                                    </button>
                                    <button type="button" data-toggle="modal" data-target="#modalSubmit"
                                            class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->load->view('frontend/pengajuan/modalSubmit');
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php
$this->load->view('frontend/pengajuan/JS');
$this->load->view('frontend/pengajuan/JSValidasi');
$this->load->view('frontend/pengajuan/JSSelect2');
if (isset($get_pengajuan)) {
    $currency['get_idCurrency'] = $get_pengajuan->idCurrency;
    $this->load->view('frontend/pengajuan/AJAX', $currency);
} if (!isset($get_pengajuan)) {
    $this->load->view('frontend/pengajuan/AJAX');
}
$this->load->view('frontend/pengajuan/JSSwal');
$this->load->view('frontend/pengajuan/JSNotify');
