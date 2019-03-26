<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formDepartemen" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            namaDepartemen: {
                required: true
            },
            singkatanDepartemen: {
                required: true
            },
            idDivisi: {
                required: true
            },
            idPerusahaan: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formDepartemen_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>
