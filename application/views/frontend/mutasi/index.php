<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/04/2019
 * Time: 16.02
 */
?>
<div class="row animation-fadeInQuick">
	<div class="col-md-3">
		<div class="block full">
			<!-- Navigation Tabs Title -->
			<div class="block-title">
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#verifikasi">Verifikasi</a></li>
					<li><a href="#termutasi">Dokumen Termutasi</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="verifikasi">
					<ul class="nav nav-pills nav-stacked">
						<li>
							<a id="AJAX_verifikasiFalse" href="#"><i style="font-size: 20px" class="fa fa-question-circle-o text-warning"></i> Belum Verifikasi</a>
						</li>
						<li>
							<a id="AJAX_verifikasiTrue" href="#"><i style="font-size: 20px"  class="fa fa-check-circle-o text-success"></i> Sudah Verifikasi</a>
						</li>
					</ul>
				</div>
				<div class="tab-pane" id="termutasi">
					<ul class="nav nav-pills nav-stacked">
						<li>
							<a id="AJAX_termutasiFalse" href="#"><i style="font-size: 20px"  class="fa fa-question-circle-o text-warning"></i> Belum Verifikasi</a>
						</li>
						<li>
							<a id="AJAX_termutasiTrue" href="#"><i style="font-size: 20px"  class="fa fa-check-circle-o text-success"></i> Sudah Verifikasi</a>
						</li>
						<li>
							<a id="AJAX_tolak" href="#"><i style="font-size: 20px"  class="fa fa-ban text-danger"></i> Dokumen Yang Ditolak</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9" id="AJAX_Respon_Tabel">
		<div class="widget animation-fadeInLeft">
			<div class="widget-extra themed-background-amethyst">
				<h2 style="color: white">
					<i class="fa fa-arrow-left"></i> Silahkan pilih menu disebelah...
				</h2>
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('frontend/mutasi/JS');
$this->load->view('frontend/mutasi/modalVerifikasi');
$this->load->view('frontend/mutasi/modalTolak');
$this->load->view('frontend/mutasi/AJAX');
