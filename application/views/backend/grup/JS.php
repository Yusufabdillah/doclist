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
        var d_idGrup = $(this).data('d_id');
        var d_namaGrup = $(this).data('d_nama');
        $(".modal-body #d_idGrup").val(d_idGrup);
        $(".modal-body #d_namaGrup").val(d_namaGrup);
    });
</script>
