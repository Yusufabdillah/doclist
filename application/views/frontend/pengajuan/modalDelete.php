<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<div class="modal fade" id="modalDelete">
    <form action="<?= site_url('F_Pengajuan/deletePengajuan'); ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-trash-o text-danger"></i> Hapus Pengajuan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPengajuan" id="h_idPengajuan" required>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Judul Dokumen</label>
                                <input type="text" name="namaJudul" class="form-control" id="h_namaJudul" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Tidak</button>
                    <button type="submit" class="btn btn-danger btn-outline"><i class="fa fa-check"></i>&nbsp; Ya, saya yakin</button>
                </div>
            </div>
        </div>
    </form>
</div>
