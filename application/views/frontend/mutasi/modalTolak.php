<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 05/11/2018
 * Time: 10:55
 */
?>
<div class="modal fade" id="modalTolak">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-times-circle text-danger"></i> Tolak Mutasi Dokumen</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="idMutasi" id="tlk_idMutasi">
				<input type="hidden" name="idDokumen" id="tlk_idDokumen">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label">Judul Dokumen</label>
								<input type="text" readonly class="form-control input-sm" name="judulDokumen" id="tlk_judulDokumen">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i
						class="fa fa-times"></i>&nbsp; Batal
				</button>
				<button type="button" id="submitTolak" class="btn btn-success btn-outline"><i
						class="fa fa-check-circle"></i>&nbsp; Tolak
				</button>
			</div>
		</div>
	</div>
</div>
<style>
	.pengaturanSwal{
		font-size: 15px;
	}
</style>
<script type="application/javascript">
	$('#submitTolak').on('click', function () {
		Swal.fire({
			title: 'Tolak',
			text: "Apakah anda menolak dokumen yang akan dimutasi kedepartemen anda ?",
			type: 'question',
			customClass: 'pengaturanSwal',
			showCancelButton: true,
			confirmButtonColor: '#7db831',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, saya tolak',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				var idMutasi = $(".modal-body #tlk_idMutasi").val();
				var idDokumen = $(".modal-body #tlk_idDokumen").val();
				var judulDokumen = $(".modal-body #tlk_judulDokumen").val();
				$.ajax({
					type: "POST",
					url: "<?= site_url('F_Mutasi/tolakMutasi')?>",
					data: {
						'idMutasi': idMutasi,
						'idDokumen': idDokumen,
						'judulDokumen': judulDokumen
					},
					success: function (msg) {
						$('#modalTolak').modal('hide');
						location.reload();
						Swal.fire({
							title: 'Penolakan Dokumen',
							text: 'Dokumen berhasil ditolak.',
							type: 'success',
							customClass: 'pengaturanSwal'
						})
					},
					error: function () {
						$('#modalTolak').modal('hide');
						Swal.fire({
							title: 'Error',
							text: 'Ada sesuatu yang membuat error.',
							type: 'error',
							customClass: 'pengaturanSwal'
						})
					}
				})
			}
		});
	});
</script>
