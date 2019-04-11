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
					<h2><strong><i class="fa fa-pencil-square-o"></i> Pengajuan</strong> Pengubahan Dokumen</h2>
				</div>
				<table class="table table-striped table-bordered" style="width:250%"></table>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/pengajuan_edit/JS_DT_Index');
$this->load->view('frontend/pengajuan_edit/JS');
$this->load->view('frontend/pengajuan_edit/modalApprove');
$this->load->view('frontend/pengajuan_edit/modalDecline');
$this->load->view('frontend/pengajuan_edit/modalKeterangan');
