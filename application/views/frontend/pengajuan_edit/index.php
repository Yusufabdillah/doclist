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
				<i class="fa fa-pencil-square-o"></i> Pengajuan Pengubahan
			</h1>
		</div>
	</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
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
								<h2>Data Kosong</h2><br>
								<small>Belum ada data pengajuan...</small>
							</div>
						</div>
						<?php
					} else if (!empty($get_dokumen)) {
						?>
						<div class="block-title">
							<h2><strong>Tabel</strong> Daftar Pengajuan Pengubahan Dokumen</h2>
						</div>
						<table id="tabel" class="table table-striped table-bordered">
							<thead>
							<tr>
								<th style="text-align: center;font-size: 13px" width="20px">No</th>
								<th style="text-align: center;font-size: 13px" width="200px">Action</th>
								<th style="text-align: center;font-size: 13px">Departemen</th>
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
											<a
												data-ap_id="<?= $data->idDokumen; ?>"
												data-ap_jdl="<?= $data->judulDokumen; ?>"
												data-ap_no="<?= $data->nomorDokumen; ?>"

												href="#modalApprove" data-toggle="modal"
												class="modalApprove btn btn-md btn-success"><i
													class="fa fa-check-circle"></i></a>
											<a
												data-de_id="<?= $data->idDokumen; ?>"
												data-de_jdl="<?= $data->judulDokumen; ?>"
												data-de_no="<?= $data->nomorDokumen; ?>"

												href="#modalDecline" data-toggle="modal"
												class="modalDecline btn btn-md btn-danger"><i
													class="fa fa-times-circle"></i></a>
											<a href="<?= site_url('F_PengajuanEdit/detail/'.encode_str($data->idDokumen)); ?>" class="btn btn-md btn-info"><i
													class="fa fa-book"></i></a>
											<?php
											if (!empty($data->ktr_pengajuan_editDokumen)) {
												?>
												<a
													data-kt_jdl="<?= $data->judulDokumen; ?>"
													data-kt_ktr="<?= $data->ktr_pengajuan_editDokumen; ?>"

													href="#modalKeterangan" data-toggle="modal"
													title="Keterangan"
													class="modalKeterangan btn btn-md btn-warning"><i
														class="fa fa-info-circle"></i></a>
												<?php
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
				}
				?>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/pengajuan_edit/JSDatatable');
$this->load->view('frontend/pengajuan_edit/JS');
$this->load->view('frontend/pengajuan_edit/JSNotify');
$this->load->view('frontend/pengajuan_edit/modalApprove');
$this->load->view('frontend/pengajuan_edit/modalDecline');
$this->load->view('frontend/pengajuan_edit/modalKeterangan');
