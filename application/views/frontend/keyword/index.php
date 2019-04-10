<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
			<div class="block full table-responsive">
				<div class="block-title">
					<h2><strong><i class="fa fa-search"></i> Pencarian</strong> Berdasarkan Keyword</h2>
				</div>
				<form class="form-horizontal">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?php
								$refKeyword = array(
									'label' => 'Keyword',
									'name' => 'idKeyword[]',
									'id' => 'AJAX_idKeyword',
									'placeholder' => 'Pilih Keyword',
									'help' => 'Mohon pilih keyword untuk memulai pencarian dokumen'
								);
								?>
								<div class="col-md-12">
									<label class="control-label"><?= $refKeyword['label']; ?></label><br>
									<select multiple id="<?= $refKeyword['id']; ?>" name="<?= $refKeyword['name']; ?>"
											class="<?= $refKeyword['name']; ?>"
											data-placeholder="<?= $refKeyword['placeholder']; ?>"
											style="width: 100%;">
										<option></option>
										<?php
										foreach ($get_keyword as $data) {
											?>
											<option value="<?= $data->idKeyword; ?>"><?= $data->namaKeyword; ?></option>
											<?php
										}
										?>
									</select>
									<span class="help-block">
										<?= $refKeyword['help']; ?>
										<a href="javascript:;" onclick="helpInstansi()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>
				<hr>
				<div id="AJAX_dataDokumen">
					<div class="row">
						<div class="col-md-1">
							<i class="fa fa-5x fa-info-circle"></i>
						</div>
						<div class="col-md-11">
							<h2>Keyword belum dipilih</h2><br><small>Tolong pilih keyword diatas...</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/keyword/JSDatatable');
$this->load->view('frontend/keyword/JSSelect2');
$this->load->view('frontend/keyword/AJAX');
