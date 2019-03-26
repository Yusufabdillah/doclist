<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>

<script>
    $(document).on("click", ".modalApprove", function () {
        var ap_idDokumen = $(this).data('ap_id');
        var ap_judulDokumen = $(this).data('ap_jdl');
		var ap_nomorDokumen = $(this).data('ap_no');
        $(".modal-body #ap_idDokumen").val(ap_idDokumen);
        $(".modal-body #ap_judulDokumen").val(ap_judulDokumen);
        $(".modal-body #ap_nomorDokumen").val(ap_nomorDokumen);
    });
	$(document).on("click", ".modalKeterangan", function () {
		var kt_judulDokumen = $(this).data('kt_jdl');
		var kt_ktr_pengajuan_editDokumen = $(this).data('kt_ktr');
		$(".modal-body #kt_judulDokumen").val(kt_judulDokumen);
		$(".modal-body #kt_ktr_pengajuan_editDokumen").html(kt_ktr_pengajuan_editDokumen);
	});
	$(document).on("click", ".modalDecline", function () {
		var de_idDokumen = $(this).data('de_id');
		var de_judulDokumen = $(this).data('de_jdl');
		var de_nomorDokumen = $(this).data('de_no');
		$(".modal-body #de_idDokumen").val(de_idDokumen);
		$(".modal-body #de_judulDokumen").val(de_judulDokumen);
		$(".modal-body #de_nomorDokumen").val(de_nomorDokumen);
	});
</script>
