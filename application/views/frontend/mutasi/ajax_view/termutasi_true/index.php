<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/04/2019
 * Time: 15.31
 */
?>
<div class="widget animation-fadeInLeft">
	<div class="widget-extra themed-background-success">
		<h3 class="widget-content-light">
			Dokumen Termutasi <i class="fa fa-long-arrow-right"></i> <i class="fa fa-check-circle-o"></i> Sudah Diverifikasi
		</h3>
	</div>
	<div class="widget-extra">
		<table class="table table-striped table-bordered" style="width:100%"></table>
	</div>
</div>
<?php
$this->load->view('frontend/mutasi/ajax_view/termutasi_true/JS_DT_Index');
$this->load->view('frontend/mutasi/JS');
