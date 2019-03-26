<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:13
 */

if ($status == 'aktif') {
    ?>
	<div class="col-md-6 animation-fadeInQuickInv">
		<div class="form-group">
			<div class="col-md-12">
				<label class="control-label">Mulai Reminder</label>
				<div class="input-group">
					<input type="number" name="mulaiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
					<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 animation-fadeInQuickInv">
		<div class="form-group">
			<div class="col-md-12">
				<label class="control-label">Durasi Reminder</label>
				<div class="input-group">
					<input type="number" name="durasiReminder" class="form-control" placeholder="Masukkan jumlah hari..">
					<span class="input-group-addon"><i class="fa fa-calendar"></i> Hari</span>
				</div>
			</div>
		</div>
	</div>
    <?php
} else if ($status == 'tidak_aktif') {
    ?>
    <hr>
	<h5 class="text-center text-warning animation-fadeInQuickInv">
        <i class="fa fa-info-circle"></i> Reminder akan aktif apabila status Expired Unlimited "Non
        Aktif"
    </h5>
	<hr>
    <?php
}

