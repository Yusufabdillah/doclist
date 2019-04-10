<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */

?>
	<div class="row animation-fadeInQuick">
		<div class="col-md-12">
			<div class="block full">
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="<?= site_url('F_Audit/index') ?>" class="btn btn-alt btn-sm btn-warning">
							<i class="fa fa-reply"></i> Kembali
						</a>
					</div>
					<h2><strong><i class="fa fa-book"></i> Audit <i class="fa fa-long-arrow-right"></i> <?= $get_audit->namaAudit ?></strong> <?= $get_audit->deskripsiAudit; ?></h2>
				</div>
				<table class="table table-striped table-bordered" style="width:200%"></table>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/audit/JS_DT_Form');
$this->load->view('frontend/audit/JS');
$this->load->view('frontend/audit/modalHapus');

