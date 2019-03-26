<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 14:24
 */

$kurs = json_encode($get_currency);
?>
<textarea style="display: none" name="kurs_biayaPengajuan"><?= $kurs; ?></textarea>
<table style="display: none" class="table table-striped">
    <thead>
    <tr>
        <th>Mata Uang</th>
        <th>Konversi dari IDR</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($get_currency as $key => $data) {
        if ($key == 'IDR') {
            ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= number_format($data,2,',','.'); ?></td>
            </tr>
            <?php
        } else {
            ?>
            <tr>
                <td><?= $key; ?></td>
                <td><?= number_format($data,4,',','.'); ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>