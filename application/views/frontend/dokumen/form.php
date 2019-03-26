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
				<i class="fa fa-file-o"></i> Dokumen
			</h1>
		</div>
	</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
			<div class="block full">
				<div class="block-title">
					<h2><strong>Form</strong> Dokumen</h2>
				</div>
				<form enctype="multipart/form-data" id="formDokumen" action="<?= site_url('F_Dokumen/saveDokumen'); ?>"
					  method="post" class="form-horizontal">
					<?php
					if (isset($get_dokumen)) {
						?>
						<input type="hidden" name="idDokumen" value="<?= $get_dokumen->idDokumen; ?>">
						<input type="hidden" name="createdBy" value="<?= $get_dokumen->createdBy; ?>">
						<input type="hidden" name="createdDate" value="<?= $get_dokumen->createdDate; ?>">
						<?php
					}
					?>
					<input type="hidden" name="idDepartemen"
						   value="<?= isset($_SESSION) ? $_SESSION['idDepartemen'] : null; ?>" required>
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
										   value="<?= isset($_SESSION) ? $_SESSION['namaDepartemen'] : null; ?>"/>
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
									'name' => 'idInstansi',
									'id' => 'AJAX_idInstansi',
									'placeholder' => 'Pilih instansi',
									'help' => 'Mohon pilih instansi'
								);
								?>
								<div class="col-md-12">
									<label class="control-label"><?= $instansi['label']; ?></label><br>
									<select id="<?= $instansi['id']; ?>" name="<?= $instansi['name']; ?>"
											class="<?= $instansi['name']; ?>"
											data-placeholder="<?= $instansi['placeholder']; ?>" style="width: 100%;">
										<option></option>
										<?php
										foreach ($get_instansi as $data) {
											?>
											<option
												<?php
												if (isset($get_dokumen)) {
													if ($data->idInstansi == $get_dokumen->idInstansi) {
														echo "selected";
													}
												}
												?>
												value="<?= $data->idInstansi; ?>"><?= $data->namaInstansi ?></option>
											<?php
										}
										?>
									</select>
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
					<div id="AJAX_kpl_insDokumen">
						<?php
						if (isset($get_dokumen)) {
							?>
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
							<?php
						} else if (!isset($get_dokumen)) {
							?>
							<hr>
							<h5 class="text-center text-warning animation-fadeInQuickInv">
								<i class="fa fa-info-circle"></i> Kepala Instansi dan Jabatan Kepala Instansi akan aktif
								apabila form instansi sudah dipilih
							</h5>
							<hr>
							<?php
						}
						?>
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
									<textarea name="<?= $deskripsi['name']; ?>" class="ckeditor"
											  placeholder="<?= $deskripsi['placeholder']; ?>"><?= isset($get_dokumen) ? $get_dokumen->deskripsiDokumen : null; ?></textarea>
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
						<div class="col-md-9">
							<div class="form-group">
								<div class="col-md-12">
									<label class="control-label">File Dokumen</label>
									<input type="file" style="height: 30%" name="fileDokumen"
										   class="form-control input-sm"/>
									<span class="help-block">
                                        File berformat .pdf atau .doc
                                    <a href="javascript:;" onclick="helpFileDokumen()"><i
											class="fa fa-question-circle-o "
											style="padding-left: 10px;font-size: 20px"></i></a>
                                </span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<label>&nbsp;</label>
							<div class="form-group" style="margin-left: 10px">
								<label>Expired Unlimited</label>
								<?php if (isset($get_dokumen)) { ?>
									<?php if ($get_dokumen->expired_unlimitedDokumen == 1) {
										$Ac = "checked";
										$Na = "";
									} elseif ($get_dokumen->expired_unlimitedDokumen == 0) {
										$Ac = "";
										$Na = "checked";
									}
								} else {
									$Ac = "";
								} ?>
								<label class="switch switch-success"><input type="checkbox"
																			id="AJAX_expired_unlimitedDokumen"
																			name="expired_unlimitedDokumen"
																			value="" <?php echo $Ac ?>><span></span></label>
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
										type="text" autocomplete="off" id="tglMulaiBerlaku" name="tgl_terbitDokumen"
										class="form-control input-datepicker" data-date-format="dd/mm/yyyy"
										placeholder="Tanggal Mulai Berlaku">
								</div>
							</div>
						</div>
						<div class="col-md-8" id="AJAX_tglBerlaku">
							<?php
							if (isset($get_dokumen)) {
								if (isset($get_dokumen->tgl_habisDokumen)) {
									?>
									<div class="form-group">
										<div class="col-md-8">
											<label class="control-label">Berlaku Hingga</label>
											<input
												value="<?= isset($get_dokumen) ? date("d/m/Y", strtotime($get_dokumen->tgl_habisDokumen)) : null; ?>"
												type="text" autocomplete="off" id="tglSelesaiBerlaku"
												name="tgl_habisDokumen" class="form-control input-datepicker"
												data-date-format="dd/mm/yyyy" placeholder="Tanggal Selesai Berlaku">
										</div>
										<div class="col-md-4">
											<label class="control-label">Rentang Hari</label>
											<div class="input-group">
												<?php
												$differenceFormat = '%a';
												$tglawal = date_create(isset($get_dokumen) ? $get_dokumen->tgl_terbitDokumen : null);
												$tglakhir = date_create(isset($get_dokumen) ? $get_dokumen->tgl_habisDokumen : null);

												$hasil = date_diff($tglawal, $tglakhir);
												$tampilhasil = $hasil->format($differenceFormat);
												?>
												<input readonly value="<?= $tampilhasil; ?>" id="hasilTglBerlaku"
													   type="number" name="rentang_hari_berlakuDokumen" class="form-control"
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
										<i class="fa fa-info-circle"></i> Tanggal Berlaku akan aktif apabila
										status Expired Unlimited "Non Aktif"
									</h5>
									<hr>
									<?php
								}
							} else if (!isset($get_dokumen)) {
								?>
								<div class="form-group">
									<div class="col-md-8">
										<label class="control-label">Berlaku Hingga</label>
										<input
											value="<?= isset($get_dokumen) ? date("d/m/Y", strtotime($get_dokumen->tgl_habisDokumen)) : null; ?>"
											type="text" autocomplete="off" id="tglSelesaiBerlaku"
											name="tgl_habisDokumen" class="form-control input-datepicker"
											data-date-format="dd/mm/yy" placeholder="Tanggal Selesai Berlaku">
									</div>
									<div class="col-md-4">
										<label class="control-label">Rentang Hari</label>
										<div class="input-group">
											<?php
											$differenceFormat = '%a';
											$tglawal = date_create(isset($get_dokumen) ? $get_dokumen->tgl_terbitDokumen : null);
											$tglakhir = date_create(isset($get_dokumen) ? $get_dokumen->tgl_habisDokumen : null);

											$hasil = date_diff($tglawal, $tglakhir);
											$tampilhasil = $hasil->format($differenceFormat);
											?>
											<input readonly value="<?= $tampilhasil; ?>" id="hasilTglBerlaku"
												   type="number" name="rentang_hari_berlakuDokumen" class="form-control"
												   placeholder="...">
											<span class="input-group-addon">Hari</span>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<div class="row" id="AJAX_Reminder">
						<?php
						if (isset($get_dokumen)) {
							if ($get_dokumen->expired_unlimitedDokumen == 1) {
								?>
								<hr>
								<h5 class="text-center text-warning animation-fadeInQuickInv">
									<i class="fa fa-info-circle"></i> Reminder akan aktif apabila
									status Expired Unlimited "Non Aktif"
								</h5>
								<hr>
								<?php
							} else if ($get_dokumen->expired_unlimitedDokumen == 0) {
								?>
								<div class="col-md-6">
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Mulai Reminder</label>
											<div class="input-group">
												<input value="<?= isset($get_dokumen) ? $get_dokumen->awalReminder : null; ?>" type="number" name="mulaiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
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
												<input value="<?= isset($get_dokumen) ? $get_dokumen->durasiReminder : null; ?>" type="number" name="durasiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
												<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
						} else if (!isset($get_dokumen)) {
							?>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<label class="control-label">Mulai Reminder</label>
										<div class="input-group">
											<input value="<?= isset($get_dokumen) ? $get_dokumen->awalReminder : null; ?>" type="number" name="mulaiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
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
											<input value="<?= isset($get_dokumen) ? $get_dokumen->durasiReminder : null; ?>" type="number" name="durasiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
											<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					 <?php
                if (isset($get_dokumen)) {
                    if (isset($get_dokumen->fileDokumen)) {
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">Lihat File Dokumen</label>
                                        <a href="<?= site_url('assets/data_uploads/('.$get_dokumen->idDepartemen.')'.$get_dokumen->singkatanDepartemen.'/Dokumen/'.$get_dokumen->fileDokumen); ?>" class="btn btn-block btn-md btn-info"><i
                                        class="fa fa-download"></i> Download | <?= $get_dokumen->fileDokumen ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else if (empty($get_dokumen->fileDokumen) OR !isset($get_dokumen->fileDokumen)) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center text-warning">
                                    <i class="fa fa-info-circle"></i> File Dokumen Tidak Tersedia
                                </h3>
                            </div>
                        </div>
                        <?php
                    }
                }?>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group form-actions text-center">
								<a href="<?= site_url('F_Dokumen/index'); ?>" class="btn btn-md btn-warning"><i
										class="fa fa-reply"></i> Kembali</a>
								<button type="button" data-toggle="modal" data-target="#modalSubmit"
										class="btn btn-md btn-success"><i class="fa fa-arrow-right"></i> Submit
								</button>
							</div>
						</div>
					</div>
					<?php $this->load->view('frontend/dokumen/modalSubmit'); ?>
				</form>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/dokumen/JSSelect2');
$this->load->view('frontend/dokumen/JSCKEditor');
$this->load->view('frontend/dokumen/AJAX');
$this->load->view('frontend/dokumen/JSValidasi');
$this->load->view('frontend/dokumen/JSNotify');
$this->load->view('frontend/dokumen/JSDatepicker');

