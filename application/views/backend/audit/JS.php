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
        var d_idAkses = $(this).data('d_id');
        var d_namaAkses = $(this).data('d_nama');
        $(".modal-body #d_idAkses").val(d_idAkses);
        $(".modal-body #d_namaAkses").val(d_namaAkses);
    });
</script>
