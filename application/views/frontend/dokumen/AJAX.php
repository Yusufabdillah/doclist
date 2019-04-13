<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:17
 */
?>
<style>
	.pengaturanSwal{
		font-size: 15px;
	}
</style>
<script type="text/javascript">
	$('#AJAX_FO_nomorDokumen').focusout(function () {
		var data = $("#AJAX_FO_nomorDokumen").val();
		$.ajax({
			type: "POST",
			url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
			data: {
				'fungsi' : 'focusOutNomorDokumen',
				'nomorDokumen' : data
			},
			success: function(status){
				if (status == 'ada_yang_sama') {
					Swal.fire({
						title: 'Nomor Dokumen Sama !',
						allowOutsideClick: false,
						text: "Nomor dokumen yang anda masukkan sudah digunakan dokumen lain.",
						type: 'warning',
						customClass: 'pengaturanSwal',
						confirmButtonColor: '#7db831',
						confirmButtonText: 'Kembali menginput'
					}).then((result) => {
						if (result.value) {
							$('#AJAX_FO_nomorDokumen').focus();
						}
					});
				} else {
					return null;
				}
			}
		});
	});

    $('#AJAX_expired_unlimitedDokumen').change(function () {
        if(!this.checked) {
            //var data = $("#AJAX_exp_selamanyaDokumen").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toMasaBerlaku',
                    'status' : 'aktif'
                },
                success: function(msg){
                    $('#AJAX_tglBerlaku').html(msg);
                }
            });
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
					'fungsi' : 'toReminder',
					'status' : 'aktif'
				},
				success: function(msg){
					$('#AJAX_Reminder').html(msg);
				}
			});
        } else if (this.checked) {
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toMasaBerlaku',
                    'status' : 'tidak_aktif'
                },
                success: function(msg){
                    $('#AJAX_tglBerlaku').html(msg);
                }
            });
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
					'fungsi' : 'toReminder',
					'status' : 'tidak_aktif'
				},
				success: function(msg){
					$('#AJAX_Reminder').html(msg);
				}
			});
        }
    });

    /**
     * Untuk Instansi
     */
    $('#AJAX_idInstansi').change(function () {
        var data = $("#AJAX_idInstansi").val();
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toKepalaInstansi',
                'idInstansi': data
            },
            success: function(msg){
                $('#AJAX_kpl_insDokumen').html(msg);
            }
        })
    });
</script>
