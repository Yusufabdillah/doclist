<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/02/2019
 * Time: 11:36
 */

if (!empty($get_judul->rekom_syaratJudul)) {
?>
<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
        <a data-toggle="modal" href="#modalRekom" class="btn btn-block btn-warning"><i class="fa fa-info-circle"></i> Rekomendasi Persyaratan</a>
    </div>
</div>
    <div class="modal fade" id="modalRekom">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-info-circle text-info"></i> Rekomendasi Persyaratan</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $get_judul->rekom_syaratJudul; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
