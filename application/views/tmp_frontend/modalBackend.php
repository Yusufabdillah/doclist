<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 14:37
 */
?>
<div id="modalBackend" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-database"></i> Backend</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Tidak</button>
                <a class="btn btn-success" href="<?= site_url('B_Dashboard/index'); ?>"><i class="fa fa-check-circle"></i> Ya, Saya yakin</a>
            </div>
        </div>

    </div>
</div>
