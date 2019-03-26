<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/02/2019
 * Time: 17:28
 */

echo "<hr>";
if ($get_instansi == '404') {
    ?>
    <h5 class="text-center text-warning animation-fadeInQuickInv">
        <i class="fa fa-info-circle"></i> Kepala Instansi dan Jabatan Kepala Instansi akan aktif apabila form instansi sudah dipilih
    </h5>
    <?php
} else if ($get_instansi !== '404') {
    ?>
    <div class="row animation-fadeInQuickInv">
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <?php
                    $kpl_instansi = array(
                        'label' => 'Kepala Instansi',
                        'name' => 'kpl_insDokumen',
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
            <a href="javascript:;" onclick="help_kpl_insDokumen()"><i
                        class="fa fa-question-circle-o "
                        style="padding-left: 10px;font-size: 20px"></i></a>
        </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <?php
                    $jbt_kplInstansi = array(
                        'label' => 'Jabatan Kepala Instansi',
                        'name' => 'jbt_kpl_insDokumen',
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
            <a href="javascript:;" onclick="help_jbt_kpl_insDokumen()"><i
                        class="fa fa-question-circle-o "
                        style="padding-left: 10px;font-size: 20px"></i></a>
        </span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
echo "<hr>";
?>
