<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 17:00
 */
?>
<script type="text/javascript">
    $(document).on("click", ".modalDelete", function () {
        var d_idKelurahan = $(this).data('d_id');
        var d_namaKelurahan = $(this).data('d_nama');
        $(".modal-body #d_idKelurahan").val(d_idKelurahan);
        $(".modal-body #d_namaKelurahan").val(d_namaKelurahan);
    });
</script>
