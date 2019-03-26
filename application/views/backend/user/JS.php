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
        var d_idUser = $(this).data('d_id');
        var d_namaUser = $(this).data('d_nama');
        $(".modal-body #d_idUser").val(d_idUser);
        $(".modal-body #d_namaUser").val(d_namaUser);
    });
</script>
