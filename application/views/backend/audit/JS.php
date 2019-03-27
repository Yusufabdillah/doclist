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
        var d_idAudit = $(this).data('d_id');
        var d_namaAudit = $(this).data('d_nama');
        $(".modal-body #d_idAudit").val(d_idAudit);
        $(".modal-body #d_namaAudit").val(d_namaAudit);
    });
</script>
