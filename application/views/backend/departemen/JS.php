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
        var d_idDepartemen = $(this).data('d_id');
        var d_namaDepartemen = $(this).data('d_nama');
        $(".modal-body #d_idDepartemen").val(d_idDepartemen);
        $(".modal-body #d_namaDepartemen").val(d_namaDepartemen);
    });
</script>
