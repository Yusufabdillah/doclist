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
                <i class="fa fa-file"></i> Dokumen
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick" >
    <div class="col-md-12" >
        <div class="block full table-responsive">
            <?php
            if ($get_dokumen == '401') {
                ?>
                <h1>
                    API Dilarang
                </h1>
                <?php
            } else if ($get_dokumen !== '401') {
                if (empty($get_dokumen)) {
                    ?>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-info-circle"></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Data Kosong</h2><br><small>Belum ada data dokumen...</small>
                        </div>
                    </div>
                    <?php
                } else if (!empty($get_dokumen)) {
                    ?>
                    <div class="block-title" >
                        <div class="block-options pull-right">
                            <a href="<?= site_url('F_Dokumen/form') ?>" class="btn btn-alt btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Dokumen</a>
                        </div>
                        <h2><strong>Tabel</strong> Dokumen</h2>
                    </div>
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;font-size: 13px" width="20px">No</th>
                            <th style="text-align: center;font-size: 13px" width="80px">Action</th>
                            <th style="text-align: center;font-size: 13px" >Departemen</th>
                            <th style="text-align: center;font-size: 13px" width="150px">Case Number</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Nomor Dokumen</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Instansi</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Judul Dokumen</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Deskripsi Dokumen</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Dokumen Terbit</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Dokumen Valid</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Dibuat Oleh</th>
                            <th style="text-align: center;font-size: 13px" width="200px">Dirubah Oleh</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_dokumen as $KEY => $data) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $KEY+1; ?></td>
                                <td style="text-align: center">
                                    <div class="btn-group">
										<?php
										if ($_SESSION['idAkses'] == 3 OR $_SESSION['idAkses'] == 1) {
											?>
											<a href="<?= site_url('F_Dokumen/form/'.encode_str($data->idDokumen)); ?>" class="btn btn-md btn-success"><i class="fa fa-pencil"></i></a>
											<?php
										} else {
											if ($data->se_ajuan_statusDokumen == 1) {
												?>
												<button class="btn btn-md btn-default" data-toggle="tooltip" title="Pengajuan pengubahan menunggu verifikasi koordinator, diajukan oleh <?= $data->se_ajuan_olehDokumen; ?>" type="button" ><i class="fa fa-pencil text-danger"></i></button>
												<?php
											} else if ($data->se_ajuan_statusDokumen == 0) {
												if ($data->status_editDokumen == 1) {
													?>
													<a href="<?= site_url('F_Dokumen/form/'.encode_str($data->idDokumen)); ?>" class="btn btn-md btn-success"><i class="fa fa-pencil"></i></a>
													<?php
												} else if ($data->status_editDokumen == 0) {
													?>
													<a
														data-pe_id="<?= $data->idDokumen; ?>"
														data-pe_jdl="<?= $data->judulDokumen; ?>"
														data-pe_no="<?= $data->nomorDokumen; ?>"

														href="#modalPengajuanEdit" data-toggle="modal" title="Pengajuan Edit" class="modalPengajuanEdit btn btn-md btn-default"><i class="fa fa-pencil"></i></a>
													<?php
													if (!empty($data->ktr_tolak_editDokumen)) {
														?>
														<a
															data-kt_jdl="<?= $data->judulDokumen; ?>"
															data-kt_ktr="<?= $data->ktr_tolak_editDokumen; ?>"

															href="#modalKeteranganDecline" data-toggle="modal" title="Keterangan Penolakan" class="modalKeteranganDecline btn btn-md btn-danger"><i class="fa fa-book"></i></a>
														<?php
													}
												}
											}
										}
										?>
										<a href="<?= site_url('F_Dokumen/detail/'.encode_str($data->idDokumen)); ?>" title="Lihat Dokumen" class="btn btn-md btn-info"><i class="fa fa-book"></i></a>
                                        <!-- <a
                                                data-h_id="<?//= $data->idDokumen; ?>"
                                                data-h_jdl="<?//= $data->judulDokumen; ?>"

                                                href="#modalDelete" data-toggle="modal" class="modalDelete btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                    </div>
                                </td>
                                <td><?= $data->namaDepartemen; ?></td>
                                <td><?= $data->casenumberDokumen; ?></td>
                                <td><?= $data->nomorDokumen; ?></td>
                                <td><?= $data->namaInstansi; ?></td>
                                <td><?= $data->judulDokumen; ?></td>
                                <td><?= $data->deskripsiDokumen; ?></td>
                                <td><?= isset($data->tgl_terbitDokumen) ? formatTanggal("-", $data->tgl_terbitDokumen, true) : '-'; ?></td>
                                <td><?= isset($data->tgl_habisDokumen) ? formatTanggal("-", $data->tgl_habisDokumen,true) : '-'; ?></td>
                                <td><?= $data->createdBy; ?></td>
                                <td><?= $data->updatedBy; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/dokumen/JSDatatable');
$this->load->view('frontend/dokumen/JS');
$this->load->view('frontend/dokumen/modalDelete');
$this->load->view('frontend/dokumen/modalPengajuanEdit');
$this->load->view('frontend/dokumen/modalKeteranganDecline');
$this->load->view('frontend/dokumen/JSNotify');
