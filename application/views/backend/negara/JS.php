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
        var d_idNegara = $(this).data('d_id');
        var d_namaNegara = $(this).data('d_nama');
        $(".modal-body #d_idNegara").val(d_idNegara);
        $(".modal-body #d_namaNegara").val(d_namaNegara);
    });
</script>
