<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-history"></i> Aktifitas Log
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="block full animation-fadeInQuick table-responsive">
    <?php
    if ($get_log == '401') {
        ?>
        <h1>
            API Dilarang
        </h1>
        <?php
    } else if ($get_log !== '401') {
        ?>
        <table id="tabel" class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center" width="20px">No</th>
                <th style="text-align: center" width="200px">Tanggal</th>
                <th style="text-align: center" width="200px">Login</th>
                <th style="text-align: center" width="200px">Logout</th>
                <th style="text-align: center" width="150px">Host</th>
                <th style="text-align: center" width="150px">Alamat IP</th>
                <th style="text-align: center" width="200px">Device</th>
                <th style="text-align: center" width="200px">Browser</th>
                <th style="text-align: center" width="200px">Platform</th>
                <th style="text-align: center" width="200px">User Agent</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($get_log as $KEY => $data) {
            ?>
            <tr>
                <td style="text-align: center"><?= $KEY+1; ?></td>
                <td style="text-align: center"><?= formatDateTime($data->tanggalLog,"WIB"); ?></td>
                <td style="text-align: center"><?= formatDateTime($data->signinLog, "WIB"); ?></td>
                <td style="text-align: center"><?= formatDateTime($data->signoutLog, "WIB"); ?></td>
                <td style="text-align: center"><?= $data->hostnameLog; ?></td>
                <td style="text-align: center"><?= $data->ipaddressLog; ?></td>
                <td style="text-align: center"><?= $data->deviceLog; ?></td>
                <td style="text-align: center"><?= $data->browserLog; ?></td>
                <td style="text-align: center"><?= $data->platformLog; ?></td>
                <td style="text-align: center"><?= $data->useragentLog; ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
<?php
$this->load->view('frontend/user_log/JSDatatable');


