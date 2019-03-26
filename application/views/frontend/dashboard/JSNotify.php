<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/02/2019
 * Time: 10:17
 */

$Flash = $this->session->flashdata('NOTIFY');
if (isset($Flash)) {
    $EXP = explode("/", $Flash);
    $NOTIFY_TYPE = $EXP[0];
    $TIPE = $NOTIFY_TYPE == 'Gagal' ? 'error' : 'success';
    $PESAN = $EXP[1];
    $WAKTU = 4000;
    $POSITION = 'top-end';
    ?>
    <style>
        .pengaturanSwal{
            padding: 2rem !important;
            font-size: 15px;
        }
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: '<?= $POSITION; ?>',
            showConfirmButton: false,
            timer: <?= $WAKTU; ?>,
            customClass: 'pengaturanSwal'
        });
        Toast.fire({
            type: '<?= $TIPE; ?>',
            title: '<?= $PESAN; ?>'
        });
    </script>
    <?php
}
