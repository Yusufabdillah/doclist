<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/04/2019
 * Time: 16.02
 */
?>
<script type="text/javascript">App.datatables();</script>
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="fa fa-file"></i> Dokumen Mutasi
		</h1>
	</div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick" >
	<div class="col-md-12" >
		<div class="block full">
			<div class="block-title">
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#verifikasi">Verifikasi</a></li>
					<li><a href="#created">Dokumen Termutasi</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="verifikasi">
					<div class="row animation-fadeInQuick" >
						<div class="col-md-12" >
							<div class="block full">
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#false_verifikasi">Belum Verifikasi</a></li>
										<li><a href="#true_verifikasi">Sudah Verifikasi</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="false_verifikasi">
										<?php
										if (empty($get_verifikasi_false->data)) {
											?>
											<div class="row">
												<div class="col-md-1">
													<i class="fa fa-5x fa-info-circle"></i>
												</div>
												<div class="col-md-11">
													<h2>Data Kosong</h2><br><small>Belum ada data mutasi...</small>
												</div>
											</div>
											<?php
										} else if (!empty($get_verifikasi_false->data)) {
											?>
											<table id="tabel_verifikasi_false" width="100%" class="table table-striped table-bordered">
												<thead>
												<tr>
													<th style="text-align: center;font-size: 13px" width="20px">No</th>
													<th style="text-align: center;font-size: 13px" width="50px">Action</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nomor Dokumen</th>
												</tr>
												</thead>
												<tbody>
												<?php
												foreach ($get_verifikasi_false->data as $KEY => $data) {
													?>
													<tr>
														<td style="text-align: center"><?= $KEY + 1; ?></td>
														<td style="text-align: center">
															<div class="btn-group">
																<a href="<?= site_url('F_Mutasi/detail/' . encode_str($data->idDokumen)); ?>"
																   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
																		class="fa fa-book"></i></a>
																<a
																	data-vr_id_dok="<?= $data->idDokumen; ?>"
																	data-vr_id_mut="<?= $data->idMutasi; ?>"
																	data-vr_jdl_dok="<?= $data->judulDokumen; ?>"
																	title="Verifikasi Mutasi Dokumen" data-toggle="modal" href="#modalVerifikasi" class="modalVerifikasi btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Verifikasi</a>

																<a
																	data-tlk_id_dok="<?= $data->idDokumen; ?>"
																	data-tlk_id_mut="<?= $data->idMutasi; ?>"
																	data-tlk_jdl_dok="<?= $data->judulDokumen; ?>"
																	title="Tolak Mutasi Dokumen" data-toggle="modal" href="#modalTolak" class="modalTolak btn btn-xs btn-danger"><i class="fa fa-times-circle"></i> Tolak</a>
															</div>
														</td>
														<td><?= $data->judulDokumen; ?></td>
														<td><?= $data->nomorDokumen; ?></td>
													</tr>
													<?php
												}

												?>
												</tbody>
											</table>
											<script type="text/javascript">
												$('#tabel_verifikasi_false').dataTable({
													columnDefs: [{
														orderable: false
													}],
													pageLength: 10,
													"scrollX": true,
													lengthMenu: [ 5, 10, 20, 30, 50]
												});
											</script>
											<?php
										}
										?>
									</div>
									<div class="tab-pane" id="true_verifikasi">
										<?php
										if (empty($get_verifikasi_true->data)) {
											?>
											<div class="row">
												<div class="col-md-1">
													<i class="fa fa-5x fa-info-circle"></i>
												</div>
												<div class="col-md-11">
													<h2>Data Kosong</h2><br><small>Belum ada data mutasi...</small>
												</div>
											</div>
											<?php
										} else if (!empty($get_verifikasi_true->data)) {
											?>
											<table id="tabel_verifikasi_true" width="100%" class="table table-striped table-bordered">
												<thead>
												<tr>
													<th style="text-align: center;font-size: 13px" width="20px">No</th>
													<th style="text-align: center;font-size: 13px" width="50px">Action</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nomor Dokumen</th>
												</tr>
												</thead>
												<tbody>
												<?php
												foreach ($get_verifikasi_true->data as $KEY => $data) {
													?>
													<tr>
														<td style="text-align: center"><?= $KEY + 1; ?></td>
														<td style="text-align: center">
															<div class="btn-group">
																<a href="<?= site_url('F_Mutasi/detail/' . encode_str($data->idDokumen)); ?>"
																   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
																		class="fa fa-book"></i></a>
															</div>
														</td>
														<td><?= $data->judulDokumen; ?></td>
														<td><?= $data->nomorDokumen; ?></td>
													</tr>
													<?php
												}
												?>
												</tbody>
											</table>
											<script type="text/javascript">
												$('#tabel_verifikasi_true').dataTable({
													columnDefs: [{
														orderable: false
													}],
													pageLength: 10,
													"scrollX": true,
													lengthMenu: [ 5, 10, 20, 30, 50]
												});
											</script>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="created">
					<div class="row animation-fadeInQuick" >
						<div class="col-md-12" >
							<div class="block full">
								<div class="block-title">
									<ul class="nav nav-tabs" data-toggle="tabs">
										<li class="active"><a href="#false_created">Belum Verifikasi</a></li>
										<li><a href="#true_created">Sudah Verifikasi</a></li>
										<li><a href="#tolak">Dokumen Yang Ditolak</a></li>
									</ul>
								</div>
								<div class="tab-content">
									<div class="tab-pane active" id="false_created">
										<?php
										if (empty($get_created_false->data)) {
											?>
											<div class="row">
												<div class="col-md-1">
													<i class="fa fa-5x fa-info-circle"></i>
												</div>
												<div class="col-md-11">
													<h2>Data Kosong</h2><br><small>Belum ada data mutasi...</small>
												</div>
											</div>
											<?php
										} else if (!empty($get_created_false->data)) {
											?>
											<table id="tabel_created_false" width="100%" class="table table-striped table-bordered">
												<thead>
												<tr>
													<th style="text-align: center;font-size: 13px" width="20px">No</th>
													<th style="text-align: center;font-size: 13px" width="50px">Action</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nomor Dokumen</th>
												</tr>
												</thead>
												<tbody>
												<?php
												foreach ($get_created_false->data as $KEY => $data) {
													?>
													<tr>
														<td style="text-align: center"><?= $KEY + 1; ?></td>
														<td style="text-align: center">
															<div class="btn-group">
																<a href="<?= site_url('F_Mutasi/detail/' . encode_str($data->idDokumen)); ?>"
																   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
																		class="fa fa-book"></i></a>
															</div>
														</td>
														<td><?= $data->judulDokumen; ?></td>
														<td><?= $data->nomorDokumen; ?></td>
													</tr>
													<?php
												}
												?>
												</tbody>
											</table>
											<script type="text/javascript">
												$('#tabel_created_false').dataTable({
													columnDefs: [{
														orderable: false
													}],
													pageLength: 10,
													"scrollX": true,
													lengthMenu: [ 5, 10, 20, 30, 50]
												});
											</script>
											<?php
										}
										?>
									</div>
									<div class="tab-pane" id="true_created">
										<?php
										if (empty($get_created_true->data)) {
											?>
											<div class="row">
												<div class="col-md-1">
													<i class="fa fa-5x fa-info-circle"></i>
												</div>
												<div class="col-md-11">
													<h2>Data Kosong</h2><br><small>Belum ada data mutasi...</small>
												</div>
											</div>
											<?php
										} else if (!empty($get_created_true->data)) {
											?>
											<table id="tabel_created_true" width="100%" class="table table-striped table-bordered">
												<thead>
												<tr>
													<th style="text-align: center;font-size: 13px" width="20px">No</th>
													<th style="text-align: center;font-size: 13px" width="50px">Action</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nomor Dokumen</th>
												</tr>
												</thead>
												<tbody>
												<?php
												foreach ($get_created_true->data as $KEY => $data) {
													?>
													<tr>
														<td style="text-align: center"><?= $KEY + 1; ?></td>
														<td style="text-align: center">
															<div class="btn-group">
																<a href="<?= site_url('F_Mutasi/detail/' . encode_str($data->idDokumen)); ?>"
																   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
																		class="fa fa-book"></i></a>
															</div>
														</td>
														<td><?= $data->judulDokumen; ?></td>
														<td><?= $data->nomorDokumen; ?></td>
													</tr>
													<?php
												}
												?>
												</tbody>
											</table>
											<script type="text/javascript">
												$('#tabel_created_true').dataTable({
													columnDefs: [{
														orderable: false
													}],
													pageLength: 10,
													"scrollX": true,
													lengthMenu: [ 5, 10, 20, 30, 50]
												});
											</script>
											<?php
										}
										?>
									</div>
									<div class="tab-pane" id="tolak">
										<?php
										if (empty($get_tolak->data)) {
											?>
											<div class="row">
												<div class="col-md-1">
													<i class="fa fa-5x fa-info-circle"></i>
												</div>
												<div class="col-md-11">
													<h2>Data Kosong</h2><br><small>Belum ada data mutasi...</small>
												</div>
											</div>
											<?php
										} else if (!empty($get_tolak->data)) {
											?>
											<table id="tabel_tolak" width="100%" class="table table-striped table-bordered">
												<thead>
												<tr>
													<th style="text-align: center;font-size: 13px" width="20px">No</th>
													<th style="text-align: center;font-size: 13px" width="50px">Action</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Nomor Dokumen</th>
													<th style="text-align: center;font-size: 13px" width="80px">Ditolak Oleh</th>
												</tr>
												</thead>
												<tbody>
												<?php
												foreach ($get_tolak->data as $KEY => $data) {
													?>
													<tr>
														<td style="text-align: center"><?= $KEY + 1; ?></td>
														<td style="text-align: center">
															<div class="btn-group">
																<a href="<?= site_url('F_Mutasi/detail/' . encode_str($data->idDokumen)); ?>"
																   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
																		class="fa fa-book"></i></a>
															</div>
														</td>
														<td><?= $data->judulDokumen; ?></td>
														<td><?= $data->nomorDokumen; ?></td>
														<td><?= $data->verifikasiBy; ?></td>
													</tr>
													<?php
												}
												?>
												</tbody>
											</table>
											<script type="text/javascript">
												$('#tabel_tolak').dataTable({
													columnDefs: [{
														orderable: false
													}],
													pageLength: 10,
													"scrollX": true,
													lengthMenu: [ 5, 10, 20, 30, 50]
												});
											</script>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">$('.dataTables_filter input').attr('placeholder', 'Pencarian...');</script>
<?php
$this->load->view('frontend/mutasi/JS');
$this->load->view('frontend/mutasi/modalVerifikasi');
$this->load->view('frontend/mutasi/modalTolak');
