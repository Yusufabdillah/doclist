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
        var d_idProvinsi = $(this).data('d_id');
        var d_namaProvinsi = $(this).data('d_nama');
        $(".modal-body #d_idProvinsi").val(d_idProvinsi);
        $(".modal-body #d_namaProvinsi").val(d_namaProvinsi);
    });
</script>
