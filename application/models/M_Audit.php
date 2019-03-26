<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 16:56
 */

class M_Audit extends CI_Model {

    private $TABLE = "tbl_mstaudit";
    private $PK = "idAudit";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Alasan kenapa M_Audit tidak ada Table View dikarenakan Tabel nya berdiri sendiri tanpa
     * "Foreign Key",
     * Bila dalam pengembangan kedepan ada menggunakan FK maka akan dibuatkan Tabel View nya
     */

    /*
     * Fungsi   :   getAudit
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getAudit($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Audit/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === 'cekKode') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_Audit/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        } if ($key === "getDataByPK") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('B_Audit/getData/' . $value_pk, $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} else {
            self::getAudit("getAll");
        }
    }

	public function getRefAudit($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true) {
		if ($key === "getAll") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_RefAudit/getAll', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === 'cekKode') {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_RefAudit/getAll', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return 200;
			}
		} if ($key === "getDataByPK") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_RefAudit/getData/' . $value_pk, $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getDataByAudit") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idAudit'] = $value_pk;
			$Fetch = $this->guzzle->API_Get('F_RefAudit/getDataByAudit', $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getDataByDokumen") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idDokumen'] = $value_pk;
			$Fetch = $this->guzzle->API_Get('F_RefAudit/getDataByDokumen', $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch->data;
			}
		} else {
			self::getRefAudit("getAll");
		}
	}

    /*
     * Fungsi   :   saveAudit
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Create dan Update
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Update
     *              Jika data berisi dan tidak berisi PK maka STATUS = Create
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function saveAudit($DATA_POST = null) {
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
             * Update data audit
             */
            if (isset($DATA_POST[$this->PK])) {
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
                    'namaAudit' => $DATA_POST['namaAudit'],
                    'deskripsiAudit' => $DATA_POST['deskripsiAudit'],
                    'createdBy' => $DATA_POST['createdBy'],
                    'createdDate' => $DATA_POST['createdDate'],
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s")
                );

                $this->guzzle->API_Put('B_Audit/put/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "PESAN" => "Audit ".$DATA_POST['namaAudit']." successfuly updated",
                    "PK" => encode_str($DATA_POST[$this->PK])
                );
            }

            /*
             * Create data audit
             */
            if (empty($DATA_POST[$this->PK])) {
                $data = array(
                    'namaAudit' => $DATA_POST['namaAudit'],
					'deskripsiAudit' => $DATA_POST['deskripsiAudit'],
                    'createdBy' => $this->session->idUser,
                    'createdDate' => date("Y-m-d h:i:s"),
                    'updatedBy' => null,
                    'updatedDate' => null
                );

                $this->guzzle->API_Post('B_Audit/post/', $data);

                $RETURN_VALUE = array(
                    "STATUS" => "Create",
                    "PESAN" => "Audit ".$DATA_POST['namaAudit']." successfuly created",
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
     * Fungsi   :   deleteAudit
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Audit
     */
    public function deleteAudit($DATA_POST = null) {
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
             * Delete data audit
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('B_Audit/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Audit ".$DATA_POST['namaAudit']." successfuly deleted",
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

    public function tambahDokumen($DATA_POST) {
		$data = array(
			'idAudit' => $DATA_POST['idAudit'],
			'idDokumen' => $DATA_POST['idDokumen'],
			'createdBy' => $this->session->idUser,
			'createdDate' => date("Y-m-d h:i:s")
		);

		$this->guzzle->API_Post('F_RefAudit/post/', $data);

		$RETURN_VALUE = array(
			"STATUS" => "Tambah",
			"PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil ditambahkan",
			"PK" => encode_str($DATA_POST['idAudit'])
		);

		return $RETURN_VALUE;
	}

	public function hapusDokumen($DATA_POST) {
		$id['idRef_audit'] = $DATA_POST['idRef_audit'];
		$this->guzzle->API_Delete('F_RefAudit/delete/', $id);

		$RETURN_VALUE = array(
			"STATUS" => "Hapus",
			"PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil dihapuskan dari daftar",
			"PK" => encode_str($DATA_POST['idAudit'])
		);

		return $RETURN_VALUE;
	}

}
