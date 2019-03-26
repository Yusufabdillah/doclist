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
        var d_idJabatan = $(this).data('d_id');
        var d_namaJabatan = $(this).data('d_nama');
        $(".modal-body #d_idJabatan").val(d_idJabatan);
        $(".modal-body #d_namaJabatan").val(d_namaJabatan);
    });
</script>
