<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('encode_str')) {                                           //##++ Encode String
    function encode_str($value, $gembok = '')
    {
        $skey = (trim($gembok) == '' ? '1z2ben45tyu56yup' : $gembok);
        if (!$value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim(safe_b64encode($crypttext));
    }

    function safe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }
}

if (!function_exists('decode_str')) {                                           //##++ Decode String
    function decode_str($value, $gembok = '')
    {
        $skey = (trim($gembok) == '' ? '1z2ben45tyu56yup' : $gembok);
        if (!$value) {
            return false;
        }
        $crypttext = safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

    function safe_b64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
}

// mm/dd/yyyy
if (!function_exists('formatTanggalProUI')) {
    function formatTanggalProUI($tipe = null, $data = null, $db = false)
    {
        if ($tipe !== null) {
            $TGL_EXPLODE = explode($tipe, $data);
            if ($db == false) {
                $TANGGAL = $TGL_EXPLODE[1];
                $BULAN = $TGL_EXPLODE[0];
                $TAHUN = $TGL_EXPLODE[2];
                return $TAHUN . "-" . $BULAN . "-" . $TANGGAL;
            }
            if ($db == true) {
                $TANGGAL = $TGL_EXPLODE[2];
                $BULAN_ANGKA = $TGL_EXPLODE[1];
                if ($BULAN_ANGKA == '1') {
                    $BULAN = "Januari";
                }
                if ($BULAN_ANGKA == '2') {
                    $BULAN = "Februari";
                }
                if ($BULAN_ANGKA == '3') {
                    $BULAN = "Maret";
                }
                if ($BULAN_ANGKA == '4') {
                    $BULAN = "April";
                }
                if ($BULAN_ANGKA == '5') {
                    $BULAN = "Mei";
                }
                if ($BULAN_ANGKA == '6') {
                    $BULAN = "Juni";
                }
                if ($BULAN_ANGKA == '7') {
                    $BULAN = "Juli";
                }
                if ($BULAN_ANGKA == '8') {
                    $BULAN = "Agustus";
                }
                if ($BULAN_ANGKA == '9') {
                    $BULAN = "September";
                }
                if ($BULAN_ANGKA == '10') {
                    $BULAN = "Oktober";
                }
                if ($BULAN_ANGKA == '11') {
                    $BULAN = "November";
                }
                if ($BULAN_ANGKA == '12') {
                    $BULAN = "Desember";
                }
                $TAHUN = $TGL_EXPLODE[0];
                return $TANGGAL . " " . $BULAN . " " . $TAHUN;
            }
        } else if ($tipe == null) {
            return "Tipe Kosong";
        } else if ($data == null) {
            return "Tanggal Kosong";
        }
    }
}

if (!function_exists('formatKeDB')) {
	function formatKeDB($data = null)
	{
		if (empty($data)) {
			return "Data Tanggal Kosong";
		} else if (!empty($data)) {
			$TGL_EXPLODE = explode("-", $data);
			$TANGGAL = $TGL_EXPLODE[0];
			$BULAN = $TGL_EXPLODE[1];
			$TAHUN = $TGL_EXPLODE[2];
			return $TAHUN . "-" . $BULAN . "-" . $TANGGAL;
		}
	}
}

// dd/mm/yyyy
if (!function_exists('formatTanggal')) {
    function formatTanggal($tipe = null, $data = null, $db = false)
    {
        if ($tipe !== null) {
            $TGL_EXPLODE = explode($tipe, $data);
            if ($db == false) {
                $TANGGAL = $TGL_EXPLODE[0];
                $BULAN = $TGL_EXPLODE[1];
                $TAHUN = $TGL_EXPLODE[2];
                return $TAHUN . "-" . $BULAN . "-" . $TANGGAL;
            }
            if ($db == true) {
                $TANGGAL = $TGL_EXPLODE[2];
                $BULAN_ANGKA = $TGL_EXPLODE[1];
                if ($BULAN_ANGKA == '1') {
                    $BULAN = "Januari";
                }
                if ($BULAN_ANGKA == '2') {
                    $BULAN = "Februari";
                }
                if ($BULAN_ANGKA == '3') {
                    $BULAN = "Maret";
                }
                if ($BULAN_ANGKA == '4') {
                    $BULAN = "April";
                }
                if ($BULAN_ANGKA == '5') {
                    $BULAN = "Mei";
                }
                if ($BULAN_ANGKA == '6') {
                    $BULAN = "Juni";
                }
                if ($BULAN_ANGKA == '7') {
                    $BULAN = "Juli";
                }
                if ($BULAN_ANGKA == '8') {
                    $BULAN = "Agustus";
                }
                if ($BULAN_ANGKA == '9') {
                    $BULAN = "September";
                }
                if ($BULAN_ANGKA == '10') {
                    $BULAN = "Oktober";
                }
                if ($BULAN_ANGKA == '11') {
                    $BULAN = "November";
                }
                if ($BULAN_ANGKA == '12') {
                    $BULAN = "Desember";
                }
                $TAHUN = $TGL_EXPLODE[0];
                return $TANGGAL . " " . $BULAN . " " . $TAHUN;
            }
        } else if ($tipe == null) {
            return "Tipe Kosong";
        } else if ($data == null) {
            return "Tanggal Kosong";
        }
    }
}

if (!function_exists('formatDatePicker')) {
    function formatDatePicker($data = null, $db = true)
    {
        if ($db == true) {
            $EXPLODE = explode("/", $data);
            $TANGGAL = $EXPLODE[1];
            $BULAN = $EXPLODE[0];
            $TAHUN = $EXPLODE[2];
            return $TAHUN . "-" . $BULAN . "-" . $TANGGAL;
        }
        if ($db == false) {
            $EXPLODE = explode("-", $data);
            $TANGGAL = $EXPLODE[2];
            $BULAN = $EXPLODE[1];
            $TAHUN = $EXPLODE[0];
            return $BULAN . "/" . $TANGGAL . "/" . $TAHUN;
        }
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime($DateTime = null, $ZonaWaktu, $Line = false)
    {
        if ($DateTime !== null) {
            $EXPLODE = explode(" ", $DateTime);
            $TANGGAL = $EXPLODE[0];
            $WAKTU = $EXPLODE[1];

            //==============Tanggal=======================
            $TGL_EXPLODE = explode("-", $TANGGAL);
            $TANGGAL = $TGL_EXPLODE[2];
            $BULAN_ANGKA = $TGL_EXPLODE[1];
            if ($BULAN_ANGKA == '1') {
                $BULAN = "Januari";
            }
            if ($BULAN_ANGKA == '2') {
                $BULAN = "Februari";
            }
            if ($BULAN_ANGKA == '3') {
                $BULAN = "Maret";
            }
            if ($BULAN_ANGKA == '4') {
                $BULAN = "April";
            }
            if ($BULAN_ANGKA == '5') {
                $BULAN = "Mei";
            }
            if ($BULAN_ANGKA == '6') {
                $BULAN = "Juni";
            }
            if ($BULAN_ANGKA == '7') {
                $BULAN = "Juli";
            }
            if ($BULAN_ANGKA == '8') {
                $BULAN = "Agustus";
            }
            if ($BULAN_ANGKA == '9') {
                $BULAN = "September";
            }
            if ($BULAN_ANGKA == '10') {
                $BULAN = "Oktober";
            }
            if ($BULAN_ANGKA == '11') {
                $BULAN = "November";
            }
            if ($BULAN_ANGKA == '12') {
                $BULAN = "Desember";
            }
            $TAHUN = $TGL_EXPLODE[0];
            //======================================
            //===========Waktu======================
            $WKT_EXPLODE = explode(":", $WAKTU);
            $Break = $Line == true ? "<br>" : " ";
            return $TANGGAL . " " . $BULAN . " " . $TAHUN . $Break . $WKT_EXPLODE[0] . ":" . $WKT_EXPLODE[1] . " " . $ZonaWaktu;
        }
        if ($DateTime === null) {
            return "<i class='fa fa-info-circle'></i> Date & time not set";
        }
    }
}

if (!function_exists('reFormatTanggal')) {
    function reFormatTanggal($data)
    {
        $TGL_EXPLODE = explode("-", $data);
        $TANGGAL = $TGL_EXPLODE[2];
        $BULAN = $TGL_EXPLODE[1];
        $TAHUN = $TGL_EXPLODE[0];
        return $TANGGAL . "/" . $BULAN . "/" . $TAHUN;
    }
}

if (!function_exists('imgAspek')) {
    function imgAspek($aspekid = null)
    {
        if ($aspekid == '1') {
            return '1(Perusahaan).png';
        }
        if ($aspekid == '2') {
            return '2(Aset).png';
        }
        if ($aspekid == '3') {
            return '3(Sistem).png';
        }
        if ($aspekid == '4') {
            return '4(Personil).png';
        }
        if ($aspekid == '5') {
            return '5(Perjanjian).png';
        }
        if ($aspekid == '6') {
            return '6(Produk).png';
        }
        if ($aspekid == '7') {
            return '7(Sosial).png';
        } else if ($aspekid == null) {
            return '8(Kosong).png';
        }
    }
}

if (!function_exists('formatTier')) {
    function formatTier($tier = null)
    {
        if ($tier == null) {
            return "Belum ada tier";
        }
        if ($tier == '1') {
            return "Sangat Berpengalaman";
        }
        if ($tier == '2') {
            return "Berpengalaman";
        }
        if ($tier == '3') {
            return "Pemula";
        }
    }
}

if (!function_exists('formatPerusahaan')) {
    function formatPerusahaan($perusahaanid)
    {
        $CI =& get_instance();
        $CI->db->select("nama, lokasi");
        $CI->db->where("perusahaanid", $perusahaanid);
        $query = $CI->db->get("tblmst_perusahaan");
        $fetch = $query->result();
        return $fetch[0]->nama . " di " . $fetch[0]->lokasi;
    }
}

if (!function_exists('formatInstansi')) {
    function formatInstansi($instansiid)
    {
        $CI =& get_instance();
        $CI->db->select("namainstansi, kota");
        $CI->db->where("instansiid", $instansiid);
        $query = $CI->db->get("vwmst_instansi");
        $fetch = $query->result();
        return $fetch[0]->namainstansi . " di " . $fetch[0]->kota;
    }
}

if (!function_exists('formatStatusPengajuan')) {
    function formatStatusPengajuan($statusPengajuan = null)
    {
        if ($statusPengajuan == null) {
            return "Progress Empty";
        }
        if ($statusPengajuan == '1') {
            return "Draft";
        }
        if ($statusPengajuan == '2') {
            return "Waiting submission from coordinator";
        }
        if ($statusPengajuan == '3') {
            return "Approval coordinator";
        }
        if ($statusPengajuan == '4') {
            return "Receipt handling";
        }
    }
}

if (!function_exists('redirectStatusPengajuan')) {
    function redirectStatusPengajuan($statusPengajuan = null, $data = null)
    {
        $CI =& get_instance();
        ?>
        <a class="btn btn-md btn-success"
           href="<?= site_url('pengajuan/dtl_monitoringProgres/' . $data->transaksiid); ?>"><i class="fa fa-edit"></i>
            Lihat Detail</a>
        <?php


        if ($statusPengajuan == null) {
            return "Progress empty";
        }


        if ($statusPengajuan == '1') {
            if ($data->transaksiid !== null) {
                ?>
                <a class='btn btn-md btn-primary'
                   href='<?= site_url('pengajuan/editPanel/' . $data->transaksiid); ?>'>
                    <i class='fa fa-edit'></i> Edit Permit</a>
                <?php
            }
            if ($data->transaksiid == null) {
                return "Id not set";
            }
        }


        if ($statusPengajuan == '2') {
            ?>
            <a class='btn btn-md btn-warning'
               href='<?= site_url('Pengajuan/Approve_KO'); ?>'>
                <i class='fa fa-calendar-check-o fa-fw'></i> Approve Submission</a>
            <?php
        }


        if ($statusPengajuan == '3') {
            ?>
            <a class='btn btn-md btn-warning'
               href='<?= site_url('SuratTerima/form/' . $data->suratterimaid); ?>'>
                <i class='hi hi-list-alt'></i> Receipt Handling</a>
            <?php
            if ($data->pending !== null) {
                if ($data->pending == true) {
                    ?>
                    <div class="btn-group pull-right">
                        <!-- <a
                        data-dt_id="<?php //$data->transaksiid; ?>"
                        data-dt_jdl="<?php // $data->juduldokumen; ?>"
                        data-dt_ktr="<?php //$data->ktr_pending; ?>"

                        data-toggle="modal" class="modalKeterangan btn btn-md btn-warning" href="#modalKeterangan"><i class="fa fa-book"></i> Detail Pending Permit</a> -->
                        <a class="btn btn-md btn-info"
                           href="<?= site_url('pengajuan/editPanel/' . $data->transaksiid . "/pendingPermit"); ?>"><i
                                    class="fa fa-edit"></i> Edit</a>
                        <a
                                data-up_id="<?= $data->transaksiid; ?>"
                                data-up_jdl="<?= $data->juduldokumen; ?>"

                                data-toggle="modal" class="modalUnPending btn btn-md btn-success"
                                href="#modalUnPending"><i class="fa fa-check"></i> Activated</a>
                    </div>
                    <?php
                    //$CI->load->view('transaksi/pending_permit/modalKeterangan');
                    $CI->load->view('transaksi/pending_permit/modalUnPending');
                }
                if ($data->pending == false) {
                    ?>
                    <div class="btn-group pull-right">
                        <a
                                data-p_id="<?= $data->transaksiid; ?>"
                                data-p_jdl="<?= $data->juduldokumen; ?>"

                                data-toggle="modal" class="modalPending btn btn-md btn-danger" href="#modalPending"><i
                                    class="fa fa-times-circle-o"></i> Pending Permit</a>
                    </div>
                    <?php
                    $CI->load->view('transaksi/pending_permit/modalPending');
                }
                $CI->load->view('transaksi/pending_permit/JS');
            }
        }

        if ($statusPengajuan == '4') {
            ?>
            <a class='btn btn-md btn-info'
               href='<?= site_url('Document/list_upload_dokumen'); ?>'>
                <i class='fa fa-upload'></i> Upload Document</a>
            <?php
        }
    }
}

if (!function_exists('wizardProgress1')) {
    function wizardProgress1($statusPengajuan = null)
    {
        if ($statusPengajuan <= 2) {
            ?>
            <i class="fa fa-refresh fa-spin"></i>
            <?php
        } else if ($statusPengajuan > 2) {
            ?>
            <strong>Approved </strong><i class="fa fa-check"></i>
            <?php
        } else if ($statusPengajuan > 0 && $statusPengajuan < 2) {
            ?>
            <i class="fa fa-ellipsis-h"></i>
            <?php
        }
    }
}

if (!function_exists('wizardProgress2')) {
    function wizardProgress2($statusPengajuan = null)
    {
        if ($statusPengajuan > 3) {
            ?>
            <strong>Complete </strong><i class="fa fa-check"></i>
            <?php
        } else if ($statusPengajuan > 0 && $statusPengajuan < 3) {
            ?>
            <i class="fa fa-ellipsis-h"></i>
            <?php
        } else if ($statusPengajuan == 3) {
            ?>
            <i class="fa fa-refresh fa-spin"></i>
            <?php
        }
    }
}

if (!function_exists('wizardProgress3')) {
    function wizardProgress3($statusPengajuan = null)
    {
        if ($statusPengajuan > 4) {
            ?>
            <strong>Complete </strong><i class="fa fa-check"></i>
            <?php
        } else if ($statusPengajuan > 0 && $statusPengajuan < 4) {
            ?>
            <i class="fa fa-ellipsis-h"></i>
            <?php
        } else if ($statusPengajuan == 4) {
            ?>
            <i class="fa fa-refresh fa-spin"></i>
            <?php
        }
    }
}

if (!function_exists('cekSuratTerima')) {
    function cekSuratTerima($data, $transaksiid = null, $statusPengajuan = null)
    {
        foreach ($data as $st) {
            if ($st->transaksiid == $transaksiid) {
                if ($statusPengajuan > 4 && !empty($st->filesurat)) {
                    ?>
                    <strong>Complete </strong><i class="fa fa-check"></i>
                    <?php
                } else if ($statusPengajuan > 0 && $statusPengajuan < 4) {
                    ?>
                    <i class="fa fa-ellipsis-h"></i>
                    <?php
                } else if ($st->filesurat == NULL) {
                    ?>
                    <i class="fa fa-refresh fa-spin"></i>
                    <?php
                } else {
                    ?>
                    <i class="fa fa-ellipsis-h"></i>
                    <?php
                }
            }
        }
    }
}


if (!function_exists('labelStatus')) {
    function labelStatus($status)
    {
        if ($status == true) {
            ?>
            <span class="m-menu__link-badge">
                <span class="m-badge m-badge--success m-badge--brand m-badge--wide">
                    Active
                </span>
            </span>
            <?php
        }
        if ($status == false) {
            ?>
            <span class="m-menu__link-badge">
                <span class="m-badge m-badge--danger m-badge--brand m-badge--wide">
                    Non Active
                </span>
            </span>
            <?php
        }
    }
}

if (!function_exists('caseNumber')) {
    function caseNumber($singkatan, $tipe)
    {
        $CI =& get_instance();
        $CI->load->model('M_Dokumen');
        $Fetch = $CI->M_Dokumen->getDokumen();
        $str = count($Fetch);
        $kode = str_pad($str,4,"0", STR_PAD_LEFT);
        return $kode.$singkatan.date("Y").date("m").date("d")."-".$tipe;
    }
}



