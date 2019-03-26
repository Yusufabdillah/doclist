<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 0:37
 */
?>
<div class="modal fade" id="modalFrontend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="flaticon-background"></i> Frontend
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah anda yakin ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times-circle"></i> Tidak.
                </button>
                <a href="<?= site_url("F_Dashboard/index"); ?>" class="btn m-btn--pill btn-success">
                    <i class="fa fa-check-circle"></i> Ya, Saya yakin.
                </a>
            </div>
        </div>
    </div>
</div>
