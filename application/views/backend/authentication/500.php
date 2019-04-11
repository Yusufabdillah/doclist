<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 11/04/2019
 * Time: 15.27
 */
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="row" style="margin-top: 5%">
		<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8 text-center">
			<h1 class="animation-fadeIn"><i style="font-size: 150px" class="fa fa-times-circle-o text-danger"></i>
				<span style="font-size: 150px" class="text-danger">500</span>
			</h1>
			<h2 style="color: black">Oops, mohon maaf ada kesalahan terhadap server, mohon untuk
				mengabari administrator...</h2>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
	<div class="row">
		<div class="col-md-2">&nbsp;</div>
		<div class="col-md-8 text-center">
			<a href="<?= site_url("Auth/logout"); ?>" class="btn btn-alt btn-danger">Logout</a>
		</div>
		<div class="col-md-2">&nbsp;</div>
	</div>
</div>

