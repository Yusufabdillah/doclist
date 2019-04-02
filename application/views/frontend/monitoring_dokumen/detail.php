<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */
?>
<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="fa fa-file-o"></i> Detail Dokumen
		</h1>
	</div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#detail">Detail</a></li>
					<?php
					if (isset($get_dokumen)) {
						if (isset($get_dokumen->fileDokumen)) {
							?>
							<li><a href="#pdf">File</a></li>
							<?php
						}
					}
					?>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="detail">
					<form class="form-horizontal">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php
									$departemen = array(
										'label' => 'Departemen',
										'name' => 'namaDepartemen',
										'placeholder' => 'Pilih departemen',
										'help' => 'Departemen otomatis terpilih sesuai sesi yang aktif'
									);
									?>
									<div class="col-md-12">
										<label class="control-label"><?= $departemen['label']; ?></label><br>
										<input type="text" name="<?= $departemen['name']; ?>"
											   class="form-control input-sm"
											   readonly
											   placeholder="<?= $departemen['placeholder']; ?>"
											   value="<?= isset($get_dokumen) ? $get_dokumen->namaDepartemen : null; ?>"/>
										<span class="help-block">
                                    <?= $departemen['help']; ?>
                                    <a href="javascript:;" onclick="helpDepartemen()"><i
											class="fa fa-question-circle-o "
											style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php
									$instansi = array(
										'label' => 'Instansi',
										'name' => 'namaInstansi',
										'id' => 'AJAX_idInstansi',
										'placeholder' => 'Pilih instansi',
										'help' => 'Mohon pilih instansi'
									);
									?>
									<div class="col-md-12">
										<label class="control-label"><?= $instansi['label']; ?></label><br>
										<input type="text" name="<?= $departemen['name']; ?>"
											   class="form-control input-sm"
											   readonly
											   placeholder="<?= $departemen['placeholder']; ?>"
											   value="<?= isset($get_dokumen) ? $get_dokumen->namaInstansi : null; ?>"/>
										<span class="help-block">
                                    <?= $instansi['help']; ?>
                                    <a href="javascript:;" onclick="helpInstansi()"><i
											class="fa fa-question-circle-o "
											style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<?php
										$kpl_instansi = array(
											'label' => 'Kepala Instansi',
											'name' => 'kpl_insDokumen',
											'placeholder' => 'Input kepala instansi...',
											'help' => 'Mohon input kepala instansi'
										);
										?>
										<label class="control-label"><?= $kpl_instansi['label']; ?></label>
										<input type="text" name="<?= $kpl_instansi['name']; ?>"
											   readonly
											   class="form-control input-sm"
											   placeholder="<?= $kpl_instansi['placeholder']; ?>"
											   value="<?= !empty($get_dokumen->kpl_insDokumen) ? $get_dokumen->kpl_insDokumen : null; ?>"/>
										<span class="help-block">
												<?= $kpl_instansi['help']; ?>
												<a href="javascript:;" onclick="help_kpl_insDokumen()"><i
														class="fa fa-question-circle-o "
														style="padding-left: 10px;font-size: 20px"></i></a>
											</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<?php
										$jbt_kplInstansi = array(
											'label' => 'Jabatan Kepala Instansi',
											'name' => 'jbt_kpl_insDokumen',
											'placeholder' => 'Input jabatan kepala instansi...',
											'help' => 'Mohon input jabatan kepala instansi'
										);
										?>
										<label class="control-label"><?= $jbt_kplInstansi['label']; ?></label>
										<input type="text" name="<?= $jbt_kplInstansi['name']; ?>"
											   readonly
											   class="form-control input-sm"
											   placeholder="<?= $jbt_kplInstansi['placeholder']; ?>"
											   value="<?= !empty($get_dokumen->jbt_kpl_insDokumen) ? $get_dokumen->jbt_kpl_insDokumen : null; ?>"/>
										<span class="help-block">
												<?= $jbt_kplInstansi['help']; ?>
												<a href="javascript:;" onclick="help_jbt_kpl_insDokumen()"><i
														class="fa fa-question-circle-o "
														style="padding-left: 10px;font-size: 20px"></i></a>
											</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<?php
										$judulDokumen = array(
											'label' => 'Judul Dokumen',
											'name' => 'judulDokumen',
											'placeholder' => 'Input judul dokumen...',
											'help' => 'Mohon input judul dokumen'
										);
										?>
										<label class="control-label"><?= $judulDokumen['label']; ?></label>
										<input type="text" name="<?= $judulDokumen['name']; ?>"
											   readonly
											   class="form-control input-sm"
											   placeholder="<?= $judulDokumen['placeholder']; ?>"
											   value="<?= isset($get_dokumen) ? $get_dokumen->judulDokumen : null; ?>"/>
										<span class="help-block">
                                    <?= $judulDokumen['help']; ?>
                                    <a href="javascript:;" onclick="helpJudulDokumen()">
                                        <i class="fa fa-question-circle-o "
										   style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<?php
										$nomorDokumen = array(
											'label' => 'Nomor Dokumen',
											'name' => 'nomorDokumen',
											'placeholder' => 'Input nomor dokumen...',
											'help' => 'Mohon input nomor dokumen'
										);
										?>
										<label class="control-label"><?= $nomorDokumen['label']; ?></label>
										<input type="text" name="<?= $nomorDokumen['name']; ?>"
											   readonly
											   class="form-control input-sm"
											   placeholder="<?= $nomorDokumen['placeholder']; ?>"
											   value="<?= isset($get_dokumen) ? $get_dokumen->nomorDokumen : null; ?>"/>
										<span class="help-block">
                                    <?= $nomorDokumen['help']; ?>
                                    <a href="javascript:;" onclick="helpNomorDokumen()">
                                        <i class="fa fa-question-circle-o "
										   style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-12">
										<?php
										$deskripsi = array(
											'label' => 'Deskripsi Dokumen',
											'name' => 'deskripsiDokumen',
											'placeholder' => 'Input deskripsi dokumen...',
											'help' => 'Mohon input deskripsi dokumen'
										);
										?>
										<label class="control-label"><?= $deskripsi['label']; ?></label>
										<hr>
										<div>
											<?= isset($get_dokumen) ? $get_dokumen->deskripsiDokumen : null; ?>
										</div>
										<hr>
										<span class="help-block">
                                    <?= $deskripsi['help']; ?>
                                    <a href="javascript:;" onclick="helpDiskripsi()">
                                        <i class="fa fa-question-circle-o "
										   style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">Tanggal Mulai Berlaku</label>
										<input
											value="<?= isset($get_dokumen) ? date("d/m/Y", strtotime($get_dokumen->tgl_terbitDokumen)) : null; ?>"
											type="text" readonly autocomplete="off" id="tglMulaiBerlaku"
											name="tgl_terbitDokumen" class="form-control" placeholder="Tanggal Mulai Berlaku">
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<?php
								if (isset($get_dokumen->tgl_habisDokumen)) {
									?>
									<div class="form-group">
										<div class="col-md-8">
											<label class="control-label">Berlaku Hingga</label>
											<input readonly
												   value="<?= isset($get_dokumen) ? date("d/m/Y", strtotime($get_dokumen->tgl_habisDokumen)) : null; ?>"
												   type="text" autocomplete="off" id="tglSelesaiBerlaku" name="tgl_habisDokumen"
												   class="form-control" placeholder="Tanggal Selesai Berlaku">
										</div>
										<div class="col-md-4">
											<label readonly="" class="control-label">Rentang Hari</label>
											<div class="input-group">
												<?php
												$differenceFormat = '%a';
												$tglawal = date_create(isset($get_dokumen) ? $get_dokumen->tgl_terbitDokumen : null);
												$tglakhir = date_create(isset($get_dokumen) ? $get_dokumen->tgl_habisDokumen : null);

												$hasil = date_diff($tglawal, $tglakhir);
												$tampilhasil = $hasil->format($differenceFormat);
												?>
												<input readonly value="<?= $tampilhasil; ?>" id="hasilTglBerlaku" type="number"
													   name="rentang_hari_berlakuDokumen" class="form-control"
													   placeholder="...">
												<span class="input-group-addon">Hari</span>
											</div>
										</div>
									</div>
									<?php
								} else if (empty($get_dokumen->tgl_habisDokumen)) {
									?>
									<hr>
									<h5 class="text-center text-warning animation-fadeInQuickInv">
										<i class="fa fa-info-circle"></i> Tanggal Berlaku dan Reminder akan aktif apabila status
										Expired Unlimited "Non Aktif"
									</h5>
									<hr>
									<?php
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">Mulai Reminder</label>
										<div class="input-group">
											<input readonly
												   value="<?= isset($get_dokumen) ? $get_dokumen->awalReminder : null; ?>"
												   type="number" name="mulaiReminder" class="form-control"
												   placeholder="Masukkan jumlah hari..">
											<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">Durasi Reminder</label>
										<div class="input-group">
											<input readonly
												   value="<?= isset($get_dokumen) ? $get_dokumen->durasiReminder : null; ?>"
												   type="number" name="durasiReminder" class="form-control"
												   placeholder="Masukkan jumlah hari..">
											<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
										</div>
									</div>
								</div>
							</div>

						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group form-actions text-center">
									<a href="<?= site_url('F_MonitoringDokumen/index'); ?>" class="btn btn-md btn-warning"><i
											class="fa fa-reply"></i> Kembali</a>
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php
				if (isset($get_dokumen)) {
					if (isset($get_dokumen->fileDokumen)) {
						?>
						<div class="tab-pane" id="pdf">
							<embed width="100%" height="1000px"
								   src="<?= site_url('assets/data_uploads/RSUP/Dokumen/' . $get_dokumen->fileDokumen); ?>">
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>

