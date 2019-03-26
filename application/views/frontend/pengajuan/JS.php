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
        var h_idPengajuan = $(this).data('h_id');
        var h_namaJudul = $(this).data('h_jdl');
        $(".modal-body #h_idPengajuan").val(h_idPengajuan);
        $(".modal-body #h_namaJudul").val(h_namaJudul);
    });

    $(document).on("click", ".modalKetTolak", function () {
        var t_idPengajuan = $(this).data('t_id');
        var t_namaJudul = $(this).data('t_jdl');
        var t_tolak_ktr = $(this).data('t_ket');
        var t_TLK_namaUser = $(this).data('t_user');
        $(".modal-body #t_idPengajuan").val(t_idPengajuan);
        $(".modal-body #t_namaJudul").val(t_namaJudul);
        $(".modal-body #t_tolak_ktr").html(t_tolak_ktr);
        $(".modal-body #t_TLK_namaUser").val(t_TLK_namaUser);
    });

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');
    
</script>
