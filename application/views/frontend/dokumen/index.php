<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
<div class="row animation-fadeInQuick" >
    <div class="col-md-12" >
        <div class="block full table-responsive">
			<div class="block-title">
				<div class="block-options pull-right">
					<a href="<?= site_url('F_Dokumen/form') ?>" class="btn btn-alt btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Dokumen</a>
				</div>
				<h2><strong><i class="fa fa-file"></i></strong> Daftar Dokumen</h2>
			</div>
			<table class="table table-striped table-bordered" style="width:200%"></table>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/dokumen/JS_DT_Index');
$this->load->view('frontend/dokumen/JS');
//$this->load->view('frontend/dokumen/modalDelete');
$this->load->view('frontend/dokumen/modalPengajuanEdit');
$this->load->view('frontend/dokumen/modalKeteranganDecline');
$this->load->view('frontend/dokumen/modalMutasi', $get_departemen);
