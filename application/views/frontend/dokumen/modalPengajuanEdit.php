<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<div class="modal fade" id="modalPengajuanEdit">
    <form action="<?= site_url('F_Dokumen/pengajuanEdit'); ?>" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-pencil text-info"></i> Pengajuan Pengubahan Dokumen</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idDokumen" id="pe_idDokumen" required>
                    <div class="row">
                        <div class="col-md-6">
							<div class="form-group">
								<label>Judul Dokumen</label>
								<input type="text" name="judulDokumen" class="form-control" id="pe_judulDokumen" readonly="true">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nomor Dokumen</label>
								<input type="text" name="nomorDokumen" class="form-control" id="pe_nomorDokumen" readonly="true">
							</div>
						</div>
                    </div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label>Keterangan Pengajuan</label>
								<textarea name="ktr_pengajuan_editDokumen" class="ckeditor"></textarea>
							</div>
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Tidak</button>
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-check"></i>&nbsp; Ya, saya yakin</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$this->load->view('frontend/dokumen/JSCKEditor');
