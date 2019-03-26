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
            <i class="fa fa-file-o"></i> Draft Pengajuan Baru
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick">
    <?php
    if ($http_kode == '401') {
        ?>
    <div class="col-md-12">
        <div class="block full">
            <div class="row">
                <div class="col-md-1">
                    <i class="fa fa-5x fa-ban"></i>
                </div>
                <div class="col-md-11">
                    <h2>Akses API anda di blokir</h2><br><small>Silahkan hubungi sistem administator...</small>
                </div>
            </div>
        </div>
    </div>
        <?php
    } else if ($http_kode !== '401') {
        ?>
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="<?= site_url('F_Pengajuan/form') ?>" class="btn btn-alt btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Pengajuan</a>
                    </div>
                        <h2><strong>Draft</strong> Pengajuan Baru</h2>
                </div>
                <ul class="task-list">
                    <?php
                    foreach ($get_pengajuan as $data) {
                        ?>
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <img height="150px" src="<?= site_url('assets/img/aspek/'.imgAspek($data->idAspek)); ?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Judul Dokumen</label><a href="javascript:;" onclick="tampil_panduan_penjelasan()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i></a>
                                        <p style="text-align: justify">
                                            <?= $data->namaJudul.' ('.$data->desk_judulPengajuan.')'; ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label>Klasifikasi Dokumen</label><a href="javascript:;" onclick="tampil_panduan_penjelasan()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i></a>
                                        <p style="text-align: justify">
                                            <?= $data->namaKlasifikasi; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Instansi</label><a href="javascript:;" onclick="tampil_panduan_penjelasan()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i></a>
                                        <p style="text-align: justify">
                                            <?= $data->namaInstansi; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($data->tolak_status == 1) {
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <a
                                                data-t_id="<?= $data->idPengajuan; ?>"
                                                data-t_jdl="<?= $data->namaJudul; ?>"
                                                data-t_ket="<?= $data->tolak_ktr; ?>"
                                                data-t_user="<?= $data->TLK_namaUser; ?>"

                                                data-toggle="modal" class="modalKetTolak btn btn-md btn-danger pull-right" href="#modalKetTolak"><i class="fa fa-book"></i> Keterangan Penolakan</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h3 class="pull-right text-danger"><i class="fa fa-times-circle"></i> Pengajuan Ditolak</h3>
                                    </div>
                                </div>
                                <?php
                            } else if ($data->tolak_status == 0) {
                                ?>
                                <div class="row">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-md btn-success" href="<?= site_url('F_Pengajuan/form/'.encode_str($data->idPengajuan)); ?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a
                                                data-h_id="<?= $data->idPengajuan; ?>"
                                                data-h_jdl="<?= $data->namaJudul; ?>"

                                                data-toggle="modal" class="modalDelete btn btn-md btn-danger" href="#modalDelete"><i class="fa fa-trash-o"></i> Delete</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </li>
                        <hr>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
$this->load->view('frontend/pengajuan/JS');
$this->load->view('frontend/pengajuan/modalDelete');
$this->load->view('frontend/pengajuan/modalKetTolak');
$this->load->view('frontend/pengajuan/JSNotify');
