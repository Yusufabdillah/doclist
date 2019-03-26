<?php

/**
 * Created By 	: Yusuf Abdillah Putra
 * Created Date : 09:33 WIB
 * Credential	: PT Sambu Groups
 * Autoload 	: True
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification
{
	protected $_CI;
	private $db;
    private $data;
	private $table = 'tblmst_notif';
	private $pk = 'notifid';
	private $fk = 'idPengajuan';

    // Daftar Tabel Groupuser
	private $SYSTEM_ADMINISTRATOR = '1';
	private $DIREKSI = '2';
	private $KOORDINATOR_PERMIT = '3';
	private $PERMIT_OFFICER = '4';

	public function __construct()
	{
		$this->_CI = &get_instance();
		$this->db = $this->_CI->load->database('default', TRUE);
        $this->data = self::readDb();
        $this->hitung = self::readDb(true);
	}

    private function viewNotification($tipe, $isi, $date, $idPengajuan, $idNotif) {
	    if ($tipe == 'Submit') {
            $Notif_Data = array(
                'judul' => 'Submit',
                'warna' => 'success',
                'icon' => 'fa-file-powerpoint-o fa-fw',
                'redirect' => 'f_approve/detailPanel',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Decline_Submit') {
            $Notif_Data = array(
                'judul' => 'Decline Submit',
                'warna' => 'danger',
                'icon' => 'fa-user-times fa-fw',
                'redirect' => 'f_pengajuan/editPanel',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Approve') {
            $Notif_Data = array(
                'judul' => 'Approve Submission',
                'warna' => 'success',
                'icon' => 'fa-thumbs-up fa-fw',
                'redirect' => 'F_Suratterima/form',
                'id' => self::getID('tbl_trnsuratterima','idSuratterima',$idPengajuan)
            );
        } if ($tipe == 'Pending') {
            $Notif_Data = array(
                'judul' => 'Pending Document',
                'warna' => 'warning',
                'icon' => 'fa-hand-stop-o fa-fw',
                'redirect' => 'F_Monitoring/index',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Activated') {
            $Notif_Data = array(
                'judul' => 'Activated Document',
                'warna' => 'info',
                'icon' => 'fa-check-circle fa-fw',
                'redirect' => 'F_Suratterima/form',
                'id' => self::getID('tbl_trnsuratterima','idSuratterima',$idPengajuan)
            );
        } if ($tipe == 'Surat_Terima') {
            $Notif_Data = array(
                'judul' => 'Receipt Handling',
                'warna' => 'success',
                'icon' => 'fa-clipboard fa-fw',
                'redirect' => 'f_posting/editPanel',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Estafet') {
            $Notif_Data = array(
                'judul' => 'Document Estafet',
                'warna' => 'warning',
                'icon' => 'fa-exchange fa-fw',
                'redirect' => 'f_estafet/detailPanel',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Decline_Estafet') {
            $Notif_Data = array(
                'judul' => 'Estafet Decline',
                'warna' => 'danger',
                'icon' => 'fa-user-times fa-fw',
                'redirect' => 'f_posting/editPanel',
                'id' => $idPengajuan
            );
        } if ($tipe == 'Approve_Estafet') {
            $Notif_Data = array(
                'judul' => 'Approve Estafet',
                'warna' => 'info',
                'icon' => 'fa-thumbs-up fa-fw',
                'redirect' => 'F_Monitoring/index',
                'id' => $idPengajuan,
                'notifid' => $idNotif
            );
        } if ($tipe == 'PIC_Estafet') {
            $Notif_Data = array(
                'judul' => 'Document Estafet',
                'warna' => 'info',
                'icon' => 'fa-exchange fa-fw',
                'redirect' => 'f_pengajuan/editPanel',
                'id' => $idPengajuan,
            );
        } else if (empty($tipe)) {
            $Notif_Data = array(
                'judul' => 'Something Wrong...',
                'warna' => 'danger',
                'icon' => 'fa-info-circle fa-fw',
                'redirect' => ''
            );
        }
        ?>
        <form action="<?= site_url('Notify/index'); ?>" method="post">
            <?php //todo : notifid ini buat apa ? ?>
            <input type="hidden" name="notifid" value="<?= $idNotif; ?>">
            <input type="hidden" name="id_lainnya" value="<?= encode_str($Notif_Data['id']); ?>">
            <input type="hidden" name="idPengajuan" value="<?= encode_str($idPengajuan); ?>">
            <?php
            if (isset($Notif_Data['notifid'])) {
                ?>
                <input type="hidden" name="NOTIF_ID" value="<?= $Notif_Data['notifid']; ?>">
            <?php
            }
            ?>
            <input type="hidden" name="redirect" value="<?= $Notif_Data['redirect']; ?>">
            <button class="btn btn-block" type="submit" style="padding: 0px;">
                <div class="alert alert-<?= $Notif_Data['warna']; ?> alert-alt">
                    <small class="pull-right" style="margin-right: 6px;"><?= formatDateTime($date, "WIB"); ?> | <i style="color: black" class="fa fa-clock-o"></i></small><br>
                    <small class="pull-right"><?= $Notif_Data['judul']; ?> | <i style="color: black" class="fa <?= $Notif_Data['icon']; ?>"></i></small><br>
                    <div class="pull-left">
                        <?= $isi; ?>
                    </div>
                    <br>
                </div>
            </button>
        </form>
        <?php
    }

    public function setStatus($DATA_POST, $statusNotif = false) {
        $data = array(
            'statusNotif' => $statusNotif
        );
        // todo : apa kegunaan id lainnya ?
        if (!isset($DATA_POST['NOTIF_ID'])) {
            if (isset($DATA_POST['idPengajuan'])) {
                $this->db->where($this->fk, decode_str($DATA_POST['idPengajuan']));
            } if (!isset($DATA_POST['idPengajuan'])) {
                $this->db->where($this->pk, $DATA_POST['id_lainnya']);
            }
        } if (isset($DATA_POST['NOTIF_ID'])) {
            $this->db->where($this->pk, $DATA_POST['NOTIF_ID']);
        }
        $this->db->update($this->table, $data);
    }

    public function refreshHitungPage() {
        ?>
        <span class="label label-primary label-indicator animation-floating"><?= count($this->hitung); ?></span>
        <?php
    }

    public function read() {
        self::styleCSS();
        ?>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-2x fa-bell"></i> 
                <span id="refreshHitung" class="label label-primary label-indicator animation-floating"><?= count($this->hitung); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Notification</li>
                <li class="scroll" id="listNotify">
                    <?php
                    if (!empty($this->data)) {
                        foreach ($this->data as $KEY_ARRAY => $list) {
                            self::viewNotification($list['tipe'], $list['judulPengajuan'],$list['createddate'],$list['idPengajuan'],$list[$this->pk]);
                        }
                    } if (empty($this->data)) {
                        ?>
                        <h4 style="text-align: center">
                            <i class="fa fa-info-circle"></i> Empty Notification...
                        </h4>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </li>
        <?php
        self::JS();
    }

    public function refreshListPage() {
        ?>
        <li>
            <?php
            if (!empty($this->data)) {
                foreach ($this->data as $KEY_ARRAY => $list) {
                    self::viewNotification($list['tipe'], $list['judulPengajuan'],$list['createddate'],$list['idPengajuan'],$list[$this->pk]);
                }
            }  if (empty($this->data)) {
                ?>
            <h4 style="text-align: center">
                <i class="fa fa-info-circle"></i> Empty Notification...
            </h4>
            <?php
            }
            ?>
        </li>
        <?php
    }

    private function styleCSS() {
        ?>
        <style>
            .scroll{
              width: 300px;
              background: null;
              padding: 10px;
              overflow-y: auto;
              height: 300px;
              
              /*script tambahan khusus untuk IE */
              scrollbar-face-color: #CE7E00; 
              scrollbar-shadow-color: #FFFFFF; 
              scrollbar-highlight-color: #6F4709; 
              scrollbar-3dlight-color: #11111; 
              scrollbar-darkshadow-color: #6F4709; 
              scrollbar-track-color: #FFE8C1; 
              scrollbar-arrow-color: #6F4709;
            }
        </style>
        <?php
    }

    /**
     * todo : Bila di bawah 3000 Time interval maka sistem akan berat
     */
    private function JS($waktu = 3000, $statusNotif = true) {
        if ($statusNotif == true) {
            ?>
            <script type="text/javascript">
                $(setInterval(function (){
                    $('#refreshHitung').load('<?php echo base_url(); ?>Notify/refreshHitung'),
                    $('#listNotify').load('<?php echo base_url(); ?>Notify/refreshList')
                }, <?= $waktu; ?>));
            </script>
            <?php
        } 
    }

    public function readDb($count = false)
    {
        if (isset($_SESSION['idUser'])) {
            $this->db->where('tujuanNotif', $_SESSION['idUser']);
        }
        $this->db->where('statusNotif', '1');
        if ($count == false) {
            $this->db->limit(10);
        }
        $QUERY = $this->db->get('vw_mstnotif');
        $FETCH = $QUERY->result_array();
        return $FETCH;
    }

    public function getID($Tabel, $GET_FK, $idPengajuan) {
        $this->db->select($GET_FK);
        $this->db->where($this->fk, $idPengajuan);
        $Query = $this->db->get($Tabel);
        $Fetch = $Query->result_array();
        return $Fetch[0][$GET_FK];
    }

	public function delete($pk)
	{
		$this->db->delete($this->pk, $pk);
	}

    public function create($id, $tujuanNotif, $createdby, $tipe) {
        $data = array(
            'idPengajuan'   => $id,
            'tujuanNotif'        => $tujuanNotif,
            'statusNotif'        => true,
            'createdby'     => $createdby,
            'createddate'   => date('Y-m-d H:i:s'),
            'tipe'          => $tipe
        );
        $this->db->insert($this->table, $data);
    }

    public function createSubmitNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        // $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Submit"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createApproveNotif($idPengajuan, $picid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('picid', $picid);
        $query = $this->db->get('vwmst_pic');
        $fetch = $query->result_array();
        //============================

        /**
         * Insert data by login id where picid
         */
        $data = array(
            'idPengajuan'   => $idPengajuan,
            'tujuanNotif'        => $fetch[0]['loginid'],
            'statusNotif'        => true,
            'createddate'   => date('Y-m-d H:i:s'),
            'tipe'          => "Approve"
        );
        $this->db->insert($this->table, $data);
    }

    public function createDeclineSubmitNotif($idPengajuan, $draft_createdby) {
        /**
         * Insert data by login id where picid
         */
        $data = array(
            'idPengajuan'   => $idPengajuan,
            'tujuanNotif'        => $draft_createdby,
            'statusNotif'        => true,
            'createddate'   => date('Y-m-d H:i:s'),
            'tipe'          => "Decline_Submit"
        );
        $this->db->insert($this->table, $data);
    }

    public function createPendingNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Pending"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createActivatedNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Activated"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createSuratTerimaNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Surat_Terima"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createEstafetNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Estafet"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createDeclineEstafetNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Decline_Estafet"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createApproveEstafetNotif($idPengajuan, $perusahaanid) {
        /**
         * Ambil loginid untuk tujuanNotif
         */
        $this->db->select('loginid');
        $this->db->where('aksesid', $this->KOORDINATOR_PERMIT);
        $this->db->where('perusahaanid', $perusahaanid);
        $query = $this->db->get('vwutllogin');
        $fetch = $query->result_array();
        //=============

        /**
         * Insert sebanyak koordinator perusahaan
         */
        $hitung_koordinator = count($fetch);
        for ($i=0; $i<$hitung_koordinator; $i++) {
            $data = array(
                'idPengajuan'   => $idPengajuan,
                'tujuanNotif'        => $fetch[$i]['loginid'],
                'statusNotif'        => true,
                'createddate'   => date('Y-m-d H:i:s'),
                'tipe'          => "Approve_Estafet"
            );
            $this->db->insert($this->table, $data);
        }
    }

    public function createPICEstafetNotif($idPengajuan, $draft_createdby) {
        /**
         * Insert data by login id where picid
         */
        $data = array(
            'idPengajuan'   => $idPengajuan,
            'tujuanNotif'        => $draft_createdby,
            'statusNotif'        => true,
            'createddate'   => date('Y-m-d H:i:s'),
            'tipe'          => "PIC_Estafet"
        );
        $this->db->insert($this->table, $data);
    }

}
