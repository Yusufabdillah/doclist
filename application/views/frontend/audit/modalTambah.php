<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 05/11/2018
 * Time: 10:55
 */
?>
<div class="modal fade" id="modalTambah">
	<form action="<?= site_url('F_Audit/tambahDokumen'); ?>" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-plus-circle text-success"></i> Tambahkan Dokumen</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="idAudit" id="t_idAudit" required>
					<input type="hidden" name="idDokumen" id="t_idDokumen" required>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Judul Dokumen</label>
								<input type="text" name="judulDokumen" class="form-control" id="t_judulDokumen" readonly="true">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nomor Dokumen</label>
								<input type="text" name="nomorDokumen" class="form-control" id="t_nomorDokumen" readonly="true">
							</div>
						</div>
					</div>
					<hr>
					<div class="container-fluid">
						<div class="row">
							<h1>Anda yakin ?</h1>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Tidak</button>
					<button type="submit" id="submit" class="btn btn-success btn-outline"><i class="fa fa-check"></i>&nbsp; Ya, saya yakin.</button>
				</div>
			</div>
		</div>
	</form>
</div>
