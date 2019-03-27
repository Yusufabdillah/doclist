<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
    $('#AJAX_idKeyword').on("change", function () {
		var data = $('#AJAX_idKeyword').val();
		if (data == '') {
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
					'fungsi' : 'toKeyword',
					'AR_idKeyword': 'NULL'
				},
				success: function(msg){
					$('#AJAX_dataDokumen').html(msg);
				}
			})
		} else if (data !== '') {
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
					'fungsi' : 'toKeyword',
					'AR_idKeyword': data
				},
				success: function(msg){
					$('#AJAX_dataDokumen').html(msg);
				}
			})
		}
    });
</script>
