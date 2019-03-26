<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#form-validation" ).validate({
        errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function(error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            e.closest('.help-block').remove();
        },
        rules: {
            idUser: {
                required: true
            },
            namaUser: {
                required: true
            },
            telpUser: {
                required: true
            }
        },
        messages: {
            idUser: {
                required: 'Username tidak boleh kosong'
            },
            namaUser: {
                required: 'Nama lengkap tidak boleh kosong'
            },
            telpUser: {
                required: 'Nomor telephone tidak boleh kosong'
            }
        }
    });
</script>
