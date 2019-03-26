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
				<i class="fa fa-list-alt"></i> Dokumen Audit
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick" >
    <div class="col-md-12" >
        <div class="block full table-responsive">
            <?php
            if ($get_audit == '401') {
                ?>
                <h1>
                    API Dilarang
                </h1>
                <?php
            } else if ($get_audit !== '401') {
                if (empty($get_audit)) {
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
                } else if (!empty($get_audit)) {
                    ?>
                    <div class="block-title" >
                        <h2><strong>Tabel</strong> Nama Audit</h2>
                    </div>
                    <table id="tabel" width="100%" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;font-size: 13px" width="20px">No</th>
                            <th style="text-align: center;font-size: 13px" width="50px">Action</th>
                            <th style="text-align: center;font-size: 13px" width="80px">Nama Audit</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Dibuat Oleh</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Dirubah Oleh</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_audit as $KEY => $data) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $KEY+1; ?></td>
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="<?= site_url('F_Audit/form/'.encode_str($data->idAudit)); ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </td>
                                <td><?= $data->namaAudit; ?></td>
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
$this->load->view('frontend/audit/JSDatatable');
$this->load->view('frontend/audit/JSNotify');
