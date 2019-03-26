<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 12:24
 */
?>
<script type="text/javascript">
    $('.input-datepicker, .input-daterange')
        .datepicker({weekStart: 1});
    $('.input-datepicker-close')
        .datepicker({weekStart: 1})
        .on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    $('#tglSelesaiBerlaku').on("changeDate", function () {
		var tglMulai = $('#tglMulaiBerlaku').val();
		var tglSelesai = $('#tglSelesaiBerlaku').val();
        var tanggalMulai = new Date(formatTanggal(tglMulai));
        var tanggalSelesai = new Date(formatTanggal(tglSelesai));
        var hari = 24 * 60 * 60 * 1000;
        var mulai = tanggalMulai.getTime();
        var selesai = tanggalSelesai.getTime();
        var total_hari = Math.round(Math.round((selesai - mulai) / hari));
        $("#hasilTglBerlaku").val(total_hari);
    });

    function formatTanggal(Tanggal) {
		var data = Tanggal.split("/");
		return data[1]+"/"+data[0]+"/"+data[2];
	}
</script>
