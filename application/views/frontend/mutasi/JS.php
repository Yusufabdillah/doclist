<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>

<script type="text/javascript">
	$(document).on("click", ".modalVerifikasi", function () {
		var vr_idDokumen = $(this).data('vr_id_dok');
		var vr_idMutasi = $(this).data('vr_id_mut');
		var vr_judulDokumen = $(this).data('vr_jdl_dok');
		$(".modal-body #vr_idDokumen").val(vr_idDokumen);
		$(".modal-body #vr_idMutasi").val(vr_idMutasi);
		$(".modal-body #vr_judulDokumen").val(vr_judulDokumen);
	});
	$(document).on("click", ".modalTolak", function () {
		var tlk_idMutasi = $(this).data('tlk_id_mut');
		var tlk_idDokumen = $(this).data('tlk_id_dok');
		var tlk_judulDokumen = $(this).data('tlk_jdl_dok');
		$(".modal-body #tlk_idMutasi").val(tlk_idMutasi);
		$(".modal-body #tlk_idDokumen").val(tlk_idDokumen);
		$(".modal-body #tlk_judulDokumen").val(tlk_judulDokumen);
	});
</script>
