<?php
/**
 * Created by PhpStorm.
 * User: Axelandria
 * Date: 22/02/2019
 * Time: 16.58
 */
?>
<script type="text/javascript">
	$('#TambahReminder').click(function(e) {
		e.preventDefault();

		$("#List").append(
			'<div id="Input" class="input-group">'
			+ '<input type="text" autocomplete="off"  name="AR_tglReminder[]" class="form-control input-datepicker animation-fadeInQuickInv" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"> '
			+ '<span class="input-group-btn">'
			+ '<a id="HapusReminder" class="btn btn-danger animation-fadeInQuickInv"><i class="fa fa-trash"></i> Hapus</a>'
			+ '</span>'
			+ '</div>'
		);
		$('.input-datepicker, .input-daterange')
			.datepicker({weekStart: 1});
		$('.input-datepicker-close')
			.datepicker({weekStart: 1})
			.on('changeDate', function (e) {
				$(this).datepicker('hide');
			});
	});

	$('#List').on('click', '#HapusReminder', function(e) {
		e.preventDefault();
		$('#HapusReminder').remove();
		$('#Input').remove();
	});
</script>
