<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:13
 */

if ($status == 'aktif') {
    ?>
	<div class="form-group animation-fadeInQuickInv">
		<div class="col-md-8">
			<label class="control-label">Berlaku Hingga</label>
			<input type="text" autocomplete="off" id="tglSelesaiBerlaku" name="tgl_habisDokumen" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="Tanggal Selesai Berlaku">
		</div>
		<div class="col-md-4">
			<label class="control-label">Rentang Hari</label>
			<div class="input-group">
				<input readonly type="number" id="hasilTglBerlaku" name="rentang_hari_berlakuDokumen" class="form-control" placeholder="...">
				<span class="input-group-addon">Hari</span>
			</div>
		</div>
	</div>
    <?php
    $this->load->view('frontend/dokumen/JSDatepicker');
} else if ($status == 'tidak_aktif') {
    ?>
    <hr>
	<h5 class="text-center text-warning animation-fadeInQuickInv">
        <i class="fa fa-info-circle"></i> Tanggal Berlaku akan aktif apabila status Expired Unlimited "Non
        Aktif"
    </h5>
	<hr>
    <?php
}

