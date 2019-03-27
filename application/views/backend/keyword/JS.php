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
        var d_idKeyword = $(this).data('d_id');
        var d_namaKeyword = $(this).data('d_nama');
        $(".modal-body #d_idKeyword").val(d_idKeyword);
        $(".modal-body #d_namaKeyword").val(d_namaKeyword);
    });
</script>
