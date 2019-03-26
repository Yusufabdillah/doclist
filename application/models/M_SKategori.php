<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 12:15
 */

class M_SKategori extends CI_Model {

    private $PK = "idSubk";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Fungsi   :   getSKategori
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getSKategori($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_SKategori/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === 'cekKode') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_SKategori/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_SKategori/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByKategori") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_SKategori/getData/'.$value_pk.'/idKategori', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getSKategori("getAll");
        }
    }

    /*
     * Fungsi   :   saveSKategori
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Create dan Update
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Update
     *              Jika data berisi dan tidak berisi PK maka STATUS = Create
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function saveSKategori($DATA_POST = null) {
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
             * Update data sub kategori
             */
            if (isset($DATA_POST[$this->PK])) {
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
                    'idKategori' => $DATA_POST['idKategori'],
                    'namaSubk' => $DATA_POST['namaSubk'],
                    'createdBy' => $DATA_POST['createdBy'],
                    'createdDate' => $DATA_POST['createdDate'],
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s")
                );

                $this->guzzle->API_Put('B_SKategori/put/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "PESAN" => "Sub Category ".$DATA_POST['namaSubk']." successfuly updated",
                    "PK" => encode_str($DATA_POST[$this->PK])
                );
            }

            /*
             * Create data sub kategori
             */
            if (empty($DATA_POST[$this->PK])) {
                $data = array(
                    'idKategori' => $DATA_POST['idKategori'],
                    'namaSubk' => $DATA_POST['namaSubk'],
                    'createdBy' => $this->session->idUser,
                    'createdDate' => date("Y-m-d h:i:s"),
                    'updatedBy' => null,
                    'updatedDate' => null
                );

                $this->guzzle->API_Post('B_SKategori/post/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Create",
                    "PESAN" => "Sub Category ".$DATA_POST['namaSubk']." successfuly created",
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
     * Fungsi   :   deleteSKategori
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Sub Kategori
     */
    public function deleteSKategori($DATA_POST = null) {
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
             * Delete data kategori
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('B_SKategori/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Sub Category ".$DATA_POST['namaSubk']." successfuly deleted",
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