<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formKelurahan" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            namaKelurahan: {
                required: true
            },
            idNegara: {
                required: true
            },
            idProvinsi: {
                required: true
            },
            idKota: {
                required: true
            },
            idKecamatan: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formKelurahan_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>
