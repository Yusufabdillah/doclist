<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 14:02
 */
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-home"></i> Dashboard
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="block full block-alt-noborder">
    <h3 class="sub-header text-center"><strong>Selamat Datang, <?= $_SESSION['namaUser'] ?></strong></h3>
    <div class="row">
        <div class="col-md-12">
            <!-- <h3>Selamat Datang, <?= $_SESSION['namaUser'] ?></h3> -->
            <div class="block full table-responsive">
            <?php
            if ($get_dokumen == '401') {
                ?>
                <h1>
                    API Dilarang
                </h1>
                <?php
            } else if ($get_dokumen !== '401') {
                if (empty($get_dokumen)) {
                    ?>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-info-circle"></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Data Kosong</h2><br><small>Belum ada data dokumen...<?php echo count($get_dokumen)?></small>
                        </div>
                    </div>
                    <?php
                }else if (isset($get_dokumen->status)) {?>
                     <div class="row ">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-info-circle "></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Data Kosong</h2><br><small>Belum ada data yang akan expired...</small>
                        </div>
                    </div>
                <?php 
                } else if (!empty($get_dokumen)) {
                    ?>
                    <div class="block-title" >
                        <div class="block-options pull-right">
                          
                        </div>
                        <h2><strong>List</strong> Reminder Dokumen Expired</h2>
                    </div>
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;font-size: 13px" width="20px">No</th>
                            <th style="text-align: center;font-size: 13px" width="50px">Menjelang Expired</th>
                            <th style="text-align: center;font-size: 13px" >Departemen</th>
                            
                            <th style="text-align: center;font-size: 13px" width="100px">Nomor Dokumen</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Instansi</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Judul Dokumen</th>
                            <!-- <th style="text-align: center;font-size: 13px" width="150px">Deskripsi Dokumen</th> -->
                            <th style="text-align: center;font-size: 13px" width="100px">Dokumen Terbit</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Dokumen Valid</th>
                            <th style="text-align: center;font-size: 13px" width="80px">Action</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        

                            foreach ($get_dokumen as $KEY => $data) {
                               ?>
                                <tr>
                                    <td style="text-align: center;font-size: 10px"><?php echo $KEY+1; ?></td>
                                    <td style="font-size: 10px"><b style="color: red">
                                        <?php 
                                    if(date('Y-m-d') < $data->tgl_habisDokumen){
                                        if($data->tglAwal == $data->tgl_habisDokumen){
                                            $date1=date_create(date('Y-m-d'));
                                        }else{
                                            $date1=date_create(date('Y-m-d'));
                                        }
                                        $date2=date_create($data->tgl_habisDokumen);
                                        $diff=date_diff($date1,$date2);
                                        echo $diff->format("%a hari lagi");
                                    }else{
                                        echo "Dokumen telah expired";
                                    }?></b>
                                    </td>
                                    <td style="font-size: 10px"><?= $data->namaDepartemen; ?></td>
                                    
                                    <td style="font-size: 10px"><?= $data->nomorDokumen; ?></td>
                                    <td style="font-size: 10px"><?= $data->namaInstansi; ?></td>
                                    <td style="font-size: 10px"><?= $data->judulDokumen; ?></td>
                                    <!-- <td style="font-size: 10px"><?= $data->deskripsiDokumen; ?></td> -->
                                    <td style="font-size: 10px"><?= isset($data->tgl_terbitDokumen) ? formatTanggal("-", $data->tgl_terbitDokumen, true) : '-'; ?></td>
                                    <td style="font-size: 10px"><?= isset($data->tgl_habisDokumen) ? formatTanggal("-", $data->tgl_habisDokumen,true) : '-'; ?></td>
                                    <td style="text-align: center;font-size: 10px"><a href="<?= site_url('F_Dokumen/detail/'.encode_str($data->idDokumen)); ?>" title="Lihat Dokumen" class="btn btn-md btn-info"><i class="fa fa-book"></i></a></td>
                                  
                                </tr>
                                <?php
                                }
                            
                        
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
            }
            ?>
        </div>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/dokumen/JSDatatable');
$this->load->view('frontend/dokumen/JS');
$this->load->view('frontend/dokumen/modalDelete');
$this->load->view('frontend/dokumen/JSNotify');



