<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 05/11/2018
 * Time: 10:55
 */
?>
<div class="modal fade" id="modalMutasi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-exchange text-warning"></i> Mutasi Dokumen</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="idDokumen" id="mt_idDokumen">
				<input type="hidden" name="idDepartemen_asal" id="mt_idDepartemen">
				<input type="hidden" name="judulDokumen" id="mt_judulDokumen">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php
							$departemen = array(
								'label' => 'Departemen',
								'name' => 'idDepartemen_tujuan',
								'id' => 'AJAX_idDepartemen_tujuan',
								'placeholder' => 'Pilih departemen...',
								'help' => 'Silahkan pilih tujuan departemen'
							);
							?>
							<div class="col-md-12">
								<label class="control-label"><?= $departemen['label']; ?></label><br>
								<select required id="<?= $departemen['id']; ?>" name="<?= $departemen['name']; ?>"
										class="<?= $departemen['name']; ?>"
										data-placeholder="<?= $departemen['placeholder']; ?>"
										style="width: 100%;">
									<option></option>
									<?php
									foreach ($get_departemen as $data) {
										?>
										<option
											value="<?= $data->idDepartemen; ?>"><?= $data->namaDepartemen; ?></option>
										<?php
									}
									?>
								</select>
								<span class="help-block">
                                    <?= $departemen['help']; ?>
                                    <a href="javascript:;" onclick="helpDepartemen()"><i
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
							<?php
							$idUser = array(
								'label' => 'Nama Koordinator',
								'name' => 'idUser',
								'id' => 'AJAX_idUser',
								'placeholder' => 'Pilih koordinator...',
								'help' => 'Silahkan pilih verifikator'
							);
							?>
							<div class="col-md-12">
								<label class="control-label"><?= $idUser['label']; ?></label><br>
								<select required id="<?= $idUser['id']; ?>" name="<?= $idUser['name']; ?>"
										class="<?= $idUser['name']; ?>"
										data-placeholder="<?= $idUser['placeholder']; ?>"
										style="width: 100%;">
									<option></option>
								</select>
								<span class="help-block">
                                    <?= $idUser['help']; ?>
                                    <a href="javascript:;" onclick="helpDepartemen()"><i
											class="fa fa-question-circle-o "
											style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-outline" data-dismiss="modal"><i
						class="fa fa-times"></i>&nbsp; Batal
				</button>
				<button type="button" id="submitMutasi" class="btn btn-success btn-outline"><i
						class="fa fa-exchange"></i>&nbsp; Mutasi
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
	$('#AJAX_idDepartemen_tujuan').select2({allowClear: true});
	$('#AJAX_idUser').select2({allowClear: true});
	$('.idDepartemen_tujuan').change(function () {
		var idDepartemen_tujuan = $(".modal-body #AJAX_idDepartemen_tujuan").val();
		$.ajax({
			type: "POST",
			url: "<?= site_url('F_Dokumen/AJAX')?>",
			data: {
				'fungsi' : 'toKoordinator',
				'idDepartemen': idDepartemen_tujuan
			},
			success: function (msg) {
				$('#AJAX_idUser').html(msg);
			},
			error: function () {
				$('#modalMutasi').modal('hide');
				Swal.fire({
					title : 'Error',
					text: 'Ada sesuatu yang membuat error.',
					type: 'error',
					customClass : 'pengaturanSwal'
				})
			}
		});
	});

	$('#submitMutasi').on('click', function () {
		var cekForm = $(".modal-body #AJAX_idDepartemen_tujuan").val() && $(".modal-body #AJAX_idUser").val();
		if (cekForm == '') {
			Swal.fire({
				title : 'Form Kosong',
				text: 'Input form mutasi semuanya wajib diisi.',
				type: 'info',
				customClass : 'pengaturanSwal'
			})
		} else if (cekForm !== '') {
			Swal.fire({
				title: 'Anda yakin ?',
				text: "Dokumen akan dimutasi ke departemen tujuan",
				type: 'warning',
				customClass: 'pengaturanSwal',
				showCancelButton: true,
				confirmButtonColor: '#7db831',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, saya yakin',
				cancelButtonText: 'Tidak'
			}).then((result) => {
				if (result.value) {
					var idDokumen = $(".modal-body #mt_idDokumen").val();
					var idDepartemen_asal = $(".modal-body #mt_idDepartemen").val();
					var idDepartemen_tujuan = $(".modal-body #AJAX_idDepartemen_tujuan").val();
					var idUser = $(".modal-body #AJAX_idUser").val();
					var judulDokumen = $(".modal-body #mt_judulDokumen").val();
					$.ajax({
						type: "POST",
						url: "<?= site_url('F_Mutasi/mutasiDokumen')?>",
						data: {
							'idDokumen': idDokumen,
							'idDepartemen_asal': idDepartemen_asal,
							'idDepartemen_tujuan': idDepartemen_tujuan,
							'idUser': idUser,
							'judulDokumen': judulDokumen
						},
						success: function (msg) {
							$('#modalMutasi').modal('hide');
							location.reload();
							Swal.fire({
								title: 'Dokumen di Mutasi',
								text: 'Dokumen berhasil diantarkan ke departemen tujuan.',
								type: 'success',
								customClass: 'pengaturanSwal'
							})
						},
						error: function () {
							$('#modalMutasi').modal('hide');
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
		}
	});
</script>
