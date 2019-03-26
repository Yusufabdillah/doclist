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
        var d_idInstansi = $(this).data('d_id');
        var d_namaInstansi = $(this).data('d_nama');
        $(".modal-body #d_idInstansi").val(d_idInstansi);
        $(".modal-body #d_namaInstansi").val(d_namaInstansi);
    });
</script>
