<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */

if (!empty($get_ref_audit)) {
	foreach ($get_ref_audit as $KEY => $ref_data) {
		$Inc = $KEY + 1;
		$cek_array[$Inc] = $ref_data->idDokumen;
	}
}
?>
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-list-alt"></i> <?= $get_audit->namaAudit ?><br>
				<small><?= $get_audit->deskripsiAudit; ?></small>
			</h1>
		</div>
	</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
			<div class="block full">
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="<?= site_url('F_Audit/index') ?>" class="btn btn-alt btn-sm btn-warning"><i
								class="fa fa-reply"></i> Kembali</a>
					</div>
					<h2><strong>Daftar</strong> Dokumen Terpilih</h2><br>
				</div>
				<?php
				if (empty($get_ref_audit)) {
					?>
					<div class="row">
						<div class="col-md-1">
							<i class="fa fa-5x fa-info-circle"></i>
						</div>
						<div class="col-md-11">
							<h2>Data Kosong</h2><br>
							<small>Belum ada data dokumen yang terpilih...</small>
						</div>
					</div>
					<?php
				} else if (!empty($get_ref_audit)) {
					?>
					<table id="tabel-audit" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th style="text-align: center;font-size: 13px" width="20px">No</th>
							<th style="text-align: center;font-size: 13px" width="80px">Action</th>
							<th style="text-align: center;font-size: 13px" width="100px">Departemen</th>
							<th style="text-align: center;font-size: 13px" width="150px">Case Number</th>
							<th style="text-align: center;font-size: 13px" width="200px">Nomor Dokumen</th>
							<th style="text-align: center;font-size: 13px" width="200px">Judul Dokumen</th>
							<th style="text-align: center;font-size: 13px" width="200px">Dokumen Terbit</th>
							<th style="text-align: center;font-size: 13px" width="200px">Dokumen Valid</th>
							<th style="text-align: center;font-size: 13px" width="200px">Dibuat Oleh</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($get_ref_audit as $KEY => $data) {
							?>
							<tr>
								<td style="text-align: center"><?= $KEY + 1; ?></td>
								<td style="text-align: center">
									<div class="btn-group">
										<a
											data-h_id="<?= $data->idRef_audit; ?>"
											data-h_audit="<?= $get_audit->idAudit; ?>"
											data-h_jdl="<?= $data->judulDokumen; ?>"
											data-h_no="<?= $data->nomorDokumen; ?>"

											href="#modalHapus" data-toggle="modal"
											title="Hapus Dokumen Dari Daftar Audit"
											class="modalHapus btn btn-md btn-danger"><i
												class="fa fa-times-circle"></i></a>
									</div>
								</td>
								<td><?= $data->namaDepartemen; ?></td>
								<td><?= $data->casenumberDokumen; ?></td>
								<td><?= $data->nomorDokumen; ?></td>
								<td><?= $data->judulDokumen; ?></td>
								<td><?= isset($data->tgl_terbitDokumen) ? formatTanggal("-", $data->tgl_terbitDokumen, true) : '-'; ?></td>
								<td><?= isset($data->tgl_habisDokumen) ? formatTanggal("-", $data->tgl_habisDokumen, true) : '-'; ?></td>
								<td><?= $data->createdBy; ?></td>
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
	</div>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
			<div class="block full">
				<div class="block-title">
					<h2><strong>Tabel</strong> Semua Dokumen</h2><br>
				</div>
				<?php
				if (empty($get_dokumen)) {
					?>
					<div class="row">
						<div class="col-md-1">
							<i class="fa fa-5x fa-info-circle"></i>
						</div>
						<div class="col-md-11">
							<h2>Data Kosong</h2><br>
							<small>Belum ada data dokumen...</small>
						</div>
					</div>
					<?php
				} else if (!empty($get_dokumen)) {
					?>
					<table id="tabel" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th style="text-align: center;font-size: 13px" width="20px">No</th>
							<th style="text-align: center;font-size: 13px" width="80px">Action</th>
							<th style="text-align: center;font-size: 13px" width="100px">Departemen</th>
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
								<td style="text-align: center"><?= $KEY + 1; ?></td>
								<td style="text-align: center">
									<div class="btn-group">
										<?php
										if (isset($get_ref_audit->status)) {
											?>
											<a
												data-t_audit="<?= $get_audit->idAudit; ?>"
												data-t_dokumen="<?= $data->idDokumen; ?>"
												data-t_jdl="<?= $data->judulDokumen; ?>"
												data-t_no="<?= $data->nomorDokumen; ?>"

												href="#modalTambah" data-toggle="modal"
												title="Tambah Dokumen Ke Daftar Audit"
												class="modalTambah btn btn-md btn-success"><i
													class="fa fa-plus"></i></a>
											<!-- <a href="<? //= site_url('F_Dokumen/detail/'.encode_str($data->idDokumen)); ?>" title="Lihat Dokumen" class="btn btn-md btn-info"><i class="fa fa-book"></i></a> -->
											<?php
										} else if (!isset($get_ref_audit->status)) {
											if (empty($get_ref_audit)) {
												?>
												<a
													data-t_audit="<?= $get_audit->idAudit; ?>"
													data-t_dokumen="<?= $data->idDokumen; ?>"
													data-t_jdl="<?= $data->judulDokumen; ?>"
													data-t_no="<?= $data->nomorDokumen; ?>"

													href="#modalTambah" data-toggle="modal"
													title="Tambah Dokumen Ke Daftar Audit"
													class="modalTambah btn btn-md btn-success"><i
														class="fa fa-plus"></i></a>
												<!-- <a href="<?//= site_url('F_Dokumen/detail/'.encode_str($data->idDokumen)); ?>" title="Lihat Dokumen" class="btn btn-md btn-info"><i class="fa fa-book"></i></a> -->
												<?php
											} else if (!empty($get_ref_audit)) {
												$Cek_idDokumen = array_search($data->idDokumen, $cek_array);
												if (!empty($Cek_idDokumen)) {
													?>
													<i class="fa fa-2x fa-check-circle"></i>
													<?php
												} else if (empty($Cek_idDokumen)) {
													?>
													<a
														data-t_audit="<?= $get_audit->idAudit; ?>"
														data-t_dokumen="<?= $data->idDokumen; ?>"
														data-t_jdl="<?= $data->judulDokumen; ?>"
														data-t_no="<?= $data->nomorDokumen; ?>"

														href="#modalTambah" data-toggle="modal"
														title="Tambah Dokumen Ke Daftar Audit"
														class="modalTambah btn btn-md btn-success"><i
															class="fa fa-plus"></i></a>
													<!-- <a href="<?//= site_url('F_Dokumen/detail/'.encode_str($data->idDokumen)); ?>" title="Lihat Dokumen" class="btn btn-md btn-info"><i class="fa fa-book"></i></a> -->
													<?php
												}
											}
										}
										?>
									</div>
								</td>
								<td><?= $data->namaDepartemen; ?></td>
								<td><?= $data->casenumberDokumen; ?></td>
								<td><?= $data->nomorDokumen; ?></td>
								<td><?= $data->namaInstansi; ?></td>
								<td><?= $data->judulDokumen; ?></td>
								<td><?= $data->deskripsiDokumen; ?></td>
								<td><?= isset($data->tgl_terbitDokumen) ? formatTanggal("-", $data->tgl_terbitDokumen, true) : '-'; ?></td>
								<td><?= isset($data->tgl_habisDokumen) ? formatTanggal("-", $data->tgl_habisDokumen, true) : '-'; ?></td>
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
				?>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/audit/JSDatatable');
$this->load->view('frontend/audit/JSNotify');
$this->load->view('frontend/audit/JS');
$this->load->view('frontend/audit/modalTambah');
$this->load->view('frontend/audit/modalHapus');

