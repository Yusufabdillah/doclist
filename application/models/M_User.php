<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 9:36
 */

class M_User extends CI_Model {

    private $PK = "idUser";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Fungsi   :   getUser
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getUser($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_User/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === 'cekKode') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_User/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_User/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPerusahaan") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_User/getData/'.$_SESSION['idPerusahaan'].'/idPerusahaan', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getLogUser") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Log/getData/'.$value_pk.'/idUser', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getUser("getAll");
        }
    }

    /*
     * Fungsi   :   saveUser
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Create dan Update
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Update
     *              Jika data berisi dan tidak berisi PK maka STATUS = Create
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function saveUser($DATA_POST = null) {
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
            if (isset($DATA_POST['statusUser'])) {
                $statusUser = true;
            } if (!isset($DATA_POST['statusUser'])) {
                $statusUser = false;
            } if (isset($DATA_POST['statusAPI'])) {
                $statusAPI = true;
            } if (!isset($DATA_POST['statusAPI'])) {
                $statusAPI = false;
            } if (isset($DATA_POST['statusPIC'])) {
                $statusPIC = true;
            } if (!isset($DATA_POST['statusPIC'])) {
                $statusPIC = false;
            }


            /*
             * Update data user
             */
             $string_replace = array('-','_');
            if (isset($DATA_POST["_Update_"])) {
                if (isset($DATA_POST['profileUser'])) {
                    $profileUser = true;
                } else if (!isset($DATA_POST['profileUser'])) {
                    $profileUser = false;
                }
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
                    'idPerusahaan' => $DATA_POST['idPerusahaan'],
                    'idDepartemen' => $DATA_POST['idDepartemen'],
                    'idJabatan' => $DATA_POST['idJabatan'],
                    'idGrup' => $DATA_POST['idGrup'],
                    'namaUser' => $DATA_POST['namaUser'],
                    'passUser' => $DATA_POST['passUser'],
                    'statusUser' => $statusUser,
                    'statusAPI' => $statusAPI,
                    'statusPIC' => $statusPIC,
                    'telpUser' => str_replace($string_replace, '', $DATA_POST['telpUser']),
                    'createdBy' => $DATA_POST['createdBy'],
                    'createdDate' => $DATA_POST['createdDate'],
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s")
                );

                $this->guzzle->API_Put('B_User/put/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "PESAN" => "User account ".$DATA_POST['namaUser']." successfuly updated",
                    "PK" => encode_str($DATA_POST[$this->PK]),
                    "profileUser" => $profileUser
                );
            }

            /*
             * Create data user
             */
           
            if (!isset($DATA_POST["_Update_"])) {
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
                    'idPerusahaan' => $DATA_POST['idPerusahaan'],
                    'idDepartemen' => $DATA_POST['idDepartemen'],
                    'idJabatan' => $DATA_POST['idJabatan'],
                    'idGrup' => $DATA_POST['idGrup'],
                    'namaUser' => $DATA_POST['namaUser'],
                    'passUser' => encode_str("qwerty"),
                    'statusUser' => $statusUser,
                    'statusAPI' => $statusAPI,
                    'statusPIC' => $statusPIC,
                    'telpUser' => str_replace($string_replace, '', $DATA_POST['telpUser']),
                    'createdBy' => $this->session->idUser,
                    'createdDate' => date("Y-m-d h:i:s"),
                    'updatedBy' => null,
                    'updatedDate' => null
                );

                $this->guzzle->API_Post('B_User/post/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Create",
                    "PESAN" => "User account ".$DATA_POST['namaUser']." successfuly created",
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
     * Fungsi   :   deleteUser
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama User
     */
    public function deleteUser($DATA_POST = null) {
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
             * Delete data user
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('B_User/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "User account ".$DATA_POST['namaUser']." successfuly deleted",
                "PK" => encode_str($DATA_POST[$this->PK])
            );
            return $RETURN_VALUE;
        }
    }

    /*
     * Fungsi   :   changePassword
     * Tipe     :   Public
     * Tujuan   :   Untuk pengubahan password where = idUser
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function changePassword($DATA_POST = null) {
        if (empty($DATA_POST)) {
            $RETURN_VALUE = array(
                "STATUS" => "Gagal",
                "CLASS" => "b_dashboard",
                "METHOD" => "index",
                "PESAN" => "Maaf.. proses gagal, dikarenakan sesuatu yang error."
            );
            return $RETURN_VALUE;
        } if (isset($DATA_POST)) {
            if ($DATA_POST['retypePass'] !== $DATA_POST['passUser']) {
                $RETURN_VALUE = array(
                    "STATUS" => "Gagal",
                    "CLASS" => $DATA_POST['class'],
                    "METHOD" => $DATA_POST['method'],
                    "PESAN" => "Maaf.. proses gagal, karena password tidak sama.",
                    "PK" => encode_str($DATA_POST[$this->PK])
                );
            } if ($DATA_POST['retypePass'] == $DATA_POST['passUser']) {
                $data_user = self::getUser("getDataByPK", null, null, $this->session->idUser);
                $data = array(
                    $this->PK => $data_user->idUser,
                    'idPerusahaan' => $data_user->idPerusahaan,
                    'idDepartemen' => $data_user->idDepartemen,
                    'idJabatan' => $data_user->idJabatan,
                    'idGrup' => $data_user->idGrup,
                    'namaUser' => $data_user->namaUser,
                    'passUser' => encode_str($DATA_POST['passUser']),
                    'statusUser' => $data_user->statusUser,
                    'statusAPI' => $data_user->statusAPI,
                    'statusPIC' => $data_user->statusPIC,
                    'telpUser' => $data_user->telpUser,
                    'createdBy' => $data_user->createdBy,
                    'createdDate' => $data_user->createdDate,
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s")
                );

                $this->guzzle->API_Put('B_User/put/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "CLASS" => $DATA_POST['class'],
                    "METHOD" => $DATA_POST['method'],
                    "PESAN" => "Password ".$DATA_POST['namaUser']." berhasil dirubah",
                    "PK" => encode_str($DATA_POST[$this->PK])
                );
            }
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
        } else if (isset($DATA_POST['data'])) {
            return formatDateTime($DATA_POST['data'],'WIB');
        }
    }

}
