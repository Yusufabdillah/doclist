<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
	$(document).on("click", ".modalHapus", function () {
		var h_idRef_audit = $(this).data('h_id');
		var h_idAudit = $(this).data('h_audit');
		var h_judulDokumen = $(this).data('h_jdl');
		var h_nomorDokumen = $(this).data('h_no');
		$(".modal-body #h_idRef_audit").val(h_idRef_audit);
		$(".modal-body #h_idAudit").val(h_idAudit);
		$(".modal-body #h_judulDokumen").val(h_judulDokumen);
		$(".modal-body #h_nomorDokumen").val(h_nomorDokumen);
	});
</script>
