<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:17
 */
?>
<script type="text/javascript">
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
