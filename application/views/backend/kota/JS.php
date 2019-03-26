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
        var d_idKota = $(this).data('d_id');
        var d_namaKota = $(this).data('d_nama');
        $(".modal-body #d_idKota").val(d_idKota);
        $(".modal-body #d_namaKota").val(d_namaKota);
    });
</script>
