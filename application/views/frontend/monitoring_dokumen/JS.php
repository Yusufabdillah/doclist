<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>

<script>
    $(document).on("click", ".modalDelete", function () {
        var h_idDokumen = $(this).data('h_id');
        var h_judulDokumen = $(this).data('h_jdl');
        $(".modal-body #h_idDokumen").val(h_idDokumen);
        $(".modal-body #h_judulDokumen").val(h_judulDokumen);
    });
	$(document).on("click", ".modalKeteranganDecline", function () {
		var kt_judulDokumen = $(this).data('kt_jdl');
		var kt_ktr_tolak_editDokumen = $(this).data('kt_ktr');
		$(".modal-body #kt_judulDokumen").val(kt_judulDokumen);
		$(".modal-body #kt_ktr_tolak_editDokumen").html(kt_ktr_tolak_editDokumen);
	});
	$(document).on("click", ".modalPengajuanEdit", function () {
		var pe_idDokumen = $(this).data('pe_id');
		var pe_judulDokumen = $(this).data('pe_jdl');
		var pe_nomorDokumen = $(this).data('pe_no');
		$(".modal-body #pe_idDokumen").val(pe_idDokumen);
		$(".modal-body #pe_judulDokumen").val(pe_judulDokumen);
		$(".modal-body #pe_nomorDokumen").val(pe_nomorDokumen);
	});
</script>
