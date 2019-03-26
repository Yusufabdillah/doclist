<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 21:59
 */

/**
 * Data session berasal dari M_Authentication
 * dimana logikanya usernam atau password salah atau tidak ada
 */
if (isset($_SESSION['akses_ditolak'])) {
    ?>
    <script>
        swal({
            title: 'Access denied',
            type: 'warning',
            html: $('<div>')
                .addClass('some-class')
                .text('Username or Password is wrong.'),
            animation: false,
            confirmButtonText: 'Back to login',
            customClass: 'animated tada'
        })
    </script>
    <?php
}

if (isset($_SESSION['non_aktif'])) {
    ?>
    <script>
        swal({
            title: 'User is not active',
            type: 'warning',
            html: $('<div>')
                .addClass('some-class')
                .text('Please tell administration to activated your account'),
            animation: false,
            confirmButtonText: 'Back to login',
            customClass: 'animated tada'
        })
    </script>
    <?php
}
?>
