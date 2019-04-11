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
				<table class="table table-striped table-bordered" style="width:100%"></table>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/keyword/JSSelect2');
$this->load->view('frontend/keyword/JS_DT_Index');
