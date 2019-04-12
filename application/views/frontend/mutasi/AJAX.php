<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/04/2019
 * Time: 15.32
 */
?>
<script type="text/javascript">
	$('#AJAX_verifikasiTrue').on('click', function () {
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class() . '/AJAXRouter')?>",
			data: {
				'fungsi': 'toVerifikasiTrue'
			},
			success: function (htmlReturn) {
				$('#AJAX_Respon_Tabel').html(htmlReturn);
			}
		});
	});
	$('#AJAX_verifikasiFalse').on('click', function () {
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class() . '/AJAXRouter')?>",
			data: {
				'fungsi': 'toVerifikasiFalse'
			},
			success: function (htmlReturn) {
				$('#AJAX_Respon_Tabel').html(htmlReturn);
			}
		});
	});
	$('#AJAX_termutasiTrue').on('click', function () {
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class() . '/AJAXRouter')?>",
			data: {
				'fungsi': 'toTermutasiTrue'
			},
			success: function (htmlReturn) {
				$('#AJAX_Respon_Tabel').html(htmlReturn);
			}
		});
	});
	$('#AJAX_termutasiFalse').on('click', function () {
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class() . '/AJAXRouter')?>",
			data: {
				'fungsi': 'toTermutasiFalse'
			},
			success: function (htmlReturn) {
				$('#AJAX_Respon_Tabel').html(htmlReturn);
			}
		});
	});
	$('#AJAX_tolak').on('click', function () {
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class() . '/AJAXRouter')?>",
			data: {
				'fungsi': 'toTermutasiTolak'
			},
			success: function (htmlReturn) {
				$('#AJAX_Respon_Tabel').html(htmlReturn);
			}
		});
	});
</script>
