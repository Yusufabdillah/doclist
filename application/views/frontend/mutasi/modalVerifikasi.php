<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 05/11/2018
 * Time: 10:55
 */
?>
<div class="modal fade" id="modalVerifikasi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-check-circle-o text-warning"></i> Verifikasi Mutasi Dokumen</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="idMutasi" id="vr_idMutasi">
				<input type="hidden" name="idDokumen" id="vr_idDokumen">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label">Judul Dokumen</label>
								<input type="text" readonly class="form-control input-sm" name="judulDokumen" id="vr_judulDokumen">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i
						class="fa fa-times"></i>&nbsp; Batal
				</button>
				<button type="button" id="submitVerifikasi" class="btn btn-success btn-outline"><i
						class="fa fa-check-circle"></i>&nbsp; Setujui
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
	$('#submitVerifikasi').on('click', function () {
		Swal.fire({
			title: 'Verifikasi',
			text: "Apakah anda setuju dokumen di mutasi kedepartemen anda ?",
			type: 'question',
			customClass: 'pengaturanSwal',
			showCancelButton: true,
			confirmButtonColor: '#7db831',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, saya setuju',
			cancelButtonText: 'Tidak'
		}).then((result) => {
			if (result.value) {
				var idDokumen = $(".modal-body #vr_idDokumen").val();
				var idMutasi = $(".modal-body #vr_idMutasi").val();
				var judulDokumen = $(".modal-body #vr_judulDokumen").val();
				$.ajax({
					type: "POST",
					url: "<?= site_url('F_Mutasi/verifikasiMutasi')?>",
					data: {
						'idDokumen': idDokumen,
						'idMutasi': idMutasi,
						'judulDokumen': judulDokumen
					},
					success: function (msg) {
						$('#modalVerifikasi').modal('hide');
						location.reload();
						Swal.fire({
							title: 'Dokumen di Setujui',
							text: 'Dokumen berhasil disetujui ke departemen anda.',
							type: 'success',
							customClass: 'pengaturanSwal'
						})
					},
					error: function () {
						$('#modalVerifikasi').modal('hide');
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
