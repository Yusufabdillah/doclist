<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 21:28
 */

class M_Grup extends CI_Model {

    private $TABLE = "tbl_mstgrupuser";
    private $PK = "idGrup";
    private $Code_UNAUTHORIZED = '401';

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_MenuAkses_Backend', 'M_MenuAkses_Frontend', 'M_PerusahaanAkses'));
    }

    /*
     * Alasan kenapa M_Grup tidak ada Table View dikarenakan Tabel nya berdiri sendiri tanpa
     * "Foreign Key",
     * Bila dalam pengembangan kedepan ada menggunakan FK maka akan dibuatkan Tabel View nya
     */

    /*
     * Fungsi   :   getGrup
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getGrup($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Grup/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === 'cekKode') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Grup/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Grup/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getData") {
            $this->db->where($kolom, $value_kolom);
            $Query = $this->db->get($this->TABLE);
            $Fetch = $Query->result_array();
            return $Fetch[0];
        } else {
            self::getGrup("getAll");
        }
    }

    /*
     * Fungsi   :   saveGrup
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Create dan Update
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Update
     *              Jika data berisi dan tidak berisi PK maka STATUS = Create
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function saveGrup($DATA_POST = null) {
        /*
         * Bila $DATA_POST kosong maka akan mengembalikan data ke
         * controller dengan isi pesan pada $RETURN_VALUE
         * Bertujuan untuk pengecekan data.
         */
        if (empty($DATA_POST)) {
            $RETURN_VALUE = array(
                "STATUS" => "Error",
                "PESAN" => "Sorry... process unsuccessfuly, because something error."
            );
            return $RETURN_VALUE;
        } if (isset($DATA_POST)) {
            /*
             * Update data grup
             */
            if (isset($DATA_POST[$this->PK])) {
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
                    'idAkses' => $DATA_POST['idAkses'],
                    'idPerusahaan' => $DATA_POST['idPerusahaan'],
                    'namaGrup' => $DATA_POST['namaGrup'],
                    'createdBy' => $DATA_POST['createdBy'],
                    'createdDate' => $DATA_POST['createdDate'],
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s")
                );

                // simpan grup user terlebih dahulu
                $this->guzzle->API_Put('B_Grup/put/', $data);

                // hapus perusahaan akses terdahulu
                $this->guzzle->API_Delete('B_perusahaanAkses/delete/', $DATA_POST);

                // simpan perusahaan akses
                $this->M_PerusahaanAkses->savePerusahaanAkses($DATA_POST[$this->PK], $DATA_POST['aksesPerusahaan']);

                // hapus menu akses backend terdahulu
                $this->guzzle->API_Delete('B_menuAkses_backend/delete/', $DATA_POST);

                // simpan menu akses backend
                $this->M_MenuAkses_Backend->saveMenuAksesBackend($DATA_POST[$this->PK], $DATA_POST['menuback']);

                // hapus menu akses frontend terdahulu
                $this->guzzle->API_Delete('B_menuAkses_frontend/delete/', $DATA_POST);

                // simpan menu akses frontend
                $this->M_MenuAkses_Frontend->saveMenuAksesFrontend($DATA_POST[$this->PK], $DATA_POST['menufront']);

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "PESAN" => "Group user ".$DATA_POST['namaGrup']." successfuly updated",
                    "PK" => encode_str($DATA_POST[$this->PK])
                );
            }

            /*
             * Create data grup
             */
            if (empty($DATA_POST[$this->PK])) {
                //echo "<pre>";
                //echo print_r($DATA_POST);
                //echo "</pre>";
                $data = array(
                    'idAkses' => $DATA_POST['idAkses'],
                    'idPerusahaan' => $DATA_POST['idPerusahaan'],
                    'namaGrup' => $DATA_POST['namaGrup'],
                    'createdBy' => $this->session->idUser,
                    'createdDate' => date("Y-m-d h:i:s"),
                    'updatedBy' => null,
                    'updatedDate' => null
                );

                // simpan grup user
                $Post = $this->guzzle->API_Post('B_Grup/post/', $data);

                // simpan perusahaan akses
                $this->M_PerusahaanAkses->savePerusahaanAkses($Post->idGrup, $DATA_POST['aksesPerusahaan']);

                // simpan menu akses backend
                $this->M_MenuAkses_Backend->saveMenuAksesBackend($Post->idGrup, $DATA_POST['menuback']);

                // simpan menu akses frontend
                $this->M_MenuAkses_Backend->saveMenuAksesFrontend($Post->idGrup, $DATA_POST['menufront']);

                $RETURN_VALUE = array(
                    "STATUS" => "Create",
                    "PESAN" => "Group user ".$DATA_POST['namaGrup']." successfuly created",
                    "PK" => encode_str($this->db->insert_id())
                );
            }

            /*
             * Return value untuk notification
             */
            return $RETURN_VALUE;
        }
    }

    /*
     * Fungsi   :   deleteGrup
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Negara
     */
    public function deleteGrup($DATA_POST = null) {
        /*
         * Bila $DATA_POST kosong maka akan mengembalikan data ke
         * controller dengan isi pesan pada $RETURN_VALUE
         * Bertujuan untuk pengecekan data.
         */
        if (empty($DATA_POST)) {
            $RETURN_VALUE = array(
                "STATUS" => "Error",
                "PESAN" => "Sorry... process unsuccessfuly, because something error."
            );
            return $RETURN_VALUE;
        } if (isset($DATA_POST)) {

            // hapus perusahaan akses terdahulu
            $this->guzzle->API_Delete('B_perusahaanAkses/delete/', $DATA_POST);

            // hapus menu akses backend terdahulu
            $this->guzzle->API_Delete('B_menuAkses_backend/delete/', $DATA_POST);

            /*
             * Delete data grup
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('B_Grup/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Group user ".$DATA_POST['namaGrup']." successfuly deleted",
                "PK" => encode_str($DATA_POST[$this->PK])
            );
            return $RETURN_VALUE;
        }
    }

    /**
     * @param $id
     * @return bool|string
     *
     * Berguna untuk encode_str datatable Primary Key
     * lihat : custom_helper
     */
    public function AJAXencode($id) {
        return encode_str($id);
    }

    /**
     * @param $DATA_POST
     * @return string
     *
     * Untuk mengubah format data berbasis database default menjadi
     * format datatable yang sudah di kustom by programmer
     * lihat : custom_helper
     */
    public function AJAX_formatDateTime($DATA_POST) {
        if (isset($DATA_POST['createdDate'])) {
            return formatDateTime($DATA_POST['createdDate'],'WIB');
        } else if (isset($DATA_POST['updatedDate'])) {
            return formatDateTime($DATA_POST['updatedDate'],'WIB');
        }
    }

}