<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/02/2019
 * Time: 17:28
 */

if ($get_instansi == '404') {
    ?>
    <div class="form-group">
        <div class="col-md-12">
            <h4 class="text-warning"><i class="fa fa-info-circle"></i> Tolong pilih instansi diatas...</h4>
        </div>
    </div>
    <?php
} else if ($get_instansi !== '404') {
    ?>
    <div class="form-group">
        <div class="col-md-12">
            <?php
            $kpl_instansi = array(
                'label' => 'Kepala Instansi',
                'name' => 'kpl_instansiPengajuan',
                'placeholder' => 'Input kepala instansi...',
                'help' => 'Mohon input kepala instansi'
            );
            ?>
            <label class="control-label"><?= $kpl_instansi['label']; ?></label>
            <input type="text" name="<?= $kpl_instansi['name']; ?>"
                   class="form-control input-sm"
                   placeholder="<?= $kpl_instansi['placeholder']; ?>"
                   value="<?= isset($get_instansi) ? $get_instansi->kepalaInstansi : null; ?>"/>
            <span class="help-block">
            <?= $kpl_instansi['help']; ?>
            <a href="javascript:;" onclick="helpAgencyleader()"><i
                        class="fa fa-question-circle-o "
                        style="padding-left: 10px;font-size: 20px"></i></a>
        </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <?php
            $jbt_kplInstansi = array(
                'label' => 'Jabatan Kepala Instansi',
                'name' => 'jbt_kpl_insPengajuan',
                'placeholder' => 'Input jabatan kepala instansi...',
                'help' => 'Mohon input jabatan kepala instansi'
            );
            ?>
            <label class="control-label"><?= $jbt_kplInstansi['label']; ?></label>
            <input type="text" name="<?= $jbt_kplInstansi['name']; ?>"
                   class="form-control input-sm"
                   placeholder="<?= $jbt_kplInstansi['placeholder']; ?>"
                   value="<?= isset($get_instansi) ? $get_instansi->jbt_kplInstansi : null; ?>"/>
            <span class="help-block">
            <?= $jbt_kplInstansi['help']; ?>
            <a href="javascript:;" onclick="helpAgencyleader()"><i
                        class="fa fa-question-circle-o "
                        style="padding-left: 10px;font-size: 20px"></i></a>
        </span>
        </div>
    </div>
    <?php
}
?>
