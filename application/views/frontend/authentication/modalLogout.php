<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 15:58
 */
?>
<div id="modalLogout" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-power-off"></i> Logout</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Tidak</button>
                <a class="btn btn-danger" href="<?= site_url("Auth/logout"); ?>"><i class="fa fa-power-off"></i> Ya, Saya yakin</a>
            </div>
        </div>

    </div>
</div>

