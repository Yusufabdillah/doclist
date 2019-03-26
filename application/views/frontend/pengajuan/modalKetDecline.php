<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<div class="modal fade" id="modalKetDecline">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-book text-info"></i> Informasi Penolakan Pengajuan</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= isset($get_pengajuan) ? $get_pengajuan->ktrDecline : null; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
