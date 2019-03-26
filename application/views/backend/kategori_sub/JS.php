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
        var d_idSubk = $(this).data('d_id');
        var d_namaSubk = $(this).data('d_nama');
        $(".modal-body #d_idSubk").val(d_idSubk);
        $(".modal-body #d_namaSubk").val(d_namaSubk);
    });
</script>
