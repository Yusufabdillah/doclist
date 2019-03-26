<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formInstansi" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            namaInstansi: {
                required: true
            },
            idDifficulty: {
                required: true
            },
            idKota: {
                required: true
            },
            alamatInstansi: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formInstansi_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>
