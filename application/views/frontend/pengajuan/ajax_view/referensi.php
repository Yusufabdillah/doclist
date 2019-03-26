<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 09/02/2019
 * Time: 11:23
 */
?>
<div class="col-md-6 animation-fadeInQuick">
    <div class="form-group">
        <div class="col-md-12">
            <?php
            $referensi = array(
                'label' => 'Referensi Persyaratan',
                'name' => 'persyaratanPengajuan',
                'id' => 'AJAX_idReferensi',
                'help' => 'Mohon pilih dokumen pendukung dan status OSS.'
            );
            ?>
            <label class="control-label"><?= $referensi['label']; ?></label>
            <table class="table table-striped">
                <?php
                if ($get_referensi == '404') {
                    ?>
                    <tr>
                        <td width="100%">
                            <h4>Referensi Kosong...</h4>
                        </td>
                    </tr>
                    <?php
                } else if ($get_referensi !== '404') {
                    foreach ($get_referensi as $data) {
                        ?>
                        <tr>
                            <td width="85%">
                                <?= $data->namaPersyaratan; ?>
                            </td>
                            <td width="*">
                                <label class="switch switch-success"><input type="checkbox" value="<?= $data->idReferensi; ?>" name="persyaratanPengajuan[]"><span></span></label>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <span class="help-block">
        <?= $referensi['help']; ?>
        <a href="javascript:;"
           onclick="helpReferensi()"><i class="fa fa-question-circle-o " style="padding-left: 10px;font-size: 20px"></i>
        </a>
    </span>
</div>
<div class="col-md-6 animation-fadeInQuick">
    <div class="form-group">
        <div class="col-md-12">
            <?php
            $OSS = array(
                'label' => '&nbsp;',
                'name' => 'statusOSSPengajuan'
            );
            ?>
            <label class="control-label"><?= $OSS['label']; ?></label>
            <table class="table table-striped">
                <tr>
                    <td width="85%">
                        Online Single Submission
                    </td>
                    <td width="*">
                        <label class="switch switch-success"><input type="checkbox" value="1" name="<?= $OSS['name']; ?>"><span></span></label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

