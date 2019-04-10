<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 14:02
 */
?>
	<div class="block full block-alt-noborder">
		<h3 class="sub-header text-center"><strong>Selamat Datang, <?= $_SESSION['namaUser'] ?></strong></h3>
		<div class="row">
			<div class="col-md-12">
				<div class="block full table-responsive">
					<div class="block-title">
						<h2><strong><i class="fa fa-home"></i> Daftar</strong> Dokumen Expired</h2>
					</div>
					<table id="tabel" class="table table-striped table-bordered" width="200%"></table>
				</div>
			</div>
		</div>
	</div>
<?php
$this->load->view('frontend/dashboard/JS_DT_Index');



