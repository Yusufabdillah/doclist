<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<div class="modal fade" id="modalKeterangan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-book-o text-info"></i> Informasi Pengajuan</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label>Judul Dokumen</label>
							<input type="text" name="judulDokumen" class="form-control" id="kt_judulDokumen" readonly="true">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="kt_ktr_pengajuan_editDokumen"></div>
				</div>
			</div>
		</div>
	</div>
</div>
