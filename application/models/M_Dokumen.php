<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:56
 */

class M_Dokumen extends CI_Model {

    private $PK = "idDokumen";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Fungsi   :   getDokumen
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getDokumen($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByDepartemen") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idDepartemen'] = $_SESSION['idDepartemen'];
			$Fetch = $this->guzzle->API_Get('F_Dokumen/getByDepartemen', $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getDataPengajuanEdit") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idDepartemen'] = $_SESSION['idDepartemen'];
			$Fetch = $this->guzzle->API_Get('F_Dokumen/getDataPengajuanEdit', $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		}
        else {
            self::getDokumen("getAll");
        }
    }

    public function getDokumenExpired($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            // $parsedBody['idUser'] = ;
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getAllExpired', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getDataExpired/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByDepartemen") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idDepartemen'] = $_SESSION['idDepartemen'];
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getByDepartemenExpired', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        else {
            self::getDokumen("getAll");
        }
    }
    /*
     * Fungsi   :   saveDokumen
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Create dan Update
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Update
     *              Jika data berisi dan tidak berisi PK maka STATUS = Create
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     */
    public function saveDokumen($DATA_POST = null, $FILES = null) {
		if (!empty($FILES['fileDokumen']['name'])) {
			/*
             * Proses Upload Codeigniter =======================================
             */
			$config['file_name'] = 'Dokumen(' . caseNumber($_SESSION['singkatanDepartemen'], '01') . ')(' . rand(0, 10000) . ')';
			$config['upload_path'] = "assets/data_uploads/(" . $_SESSION['idDepartemen'] . ")" . $_SESSION['singkatanDepartemen'] . "/Dokumen";
			$config['allowed_types'] = 'gif|jpg|png|pdf|doc|csv';
			$config['max_size'] = 100000;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('fileDokumen')) {
				$file = $DATA_POST['fileDokumen'];
			} else {
				$file = $this->upload->data('file_name');
			}
			//===================================================================
		}

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
             * Update data dokumen
             */
            if (isset($DATA_POST[$this->PK])) {
                $data = array(
                    $this->PK => $DATA_POST[$this->PK],
					'idDepartemen' => $DATA_POST['idDepartemen'],
					'idInstansi' => $DATA_POST['idInstansi'],
					'judulDokumen' => $DATA_POST['judulDokumen'],
					'nomorDokumen' => $DATA_POST['nomorDokumen'],
					'deskripsiDokumen' => $DATA_POST['deskripsiDokumen'],
					'expired_unlimitedDokumen' => isset($DATA_POST['expired_unlimitedDokumen']) ? $DATA_POST['expired_unlimitedDokumen'] : 0 ,
					'tgl_terbitDokumen' => isset($DATA_POST['tgl_terbitDokumen']) ? formatTanggal('/',$DATA_POST['tgl_terbitDokumen']) : null,
					'tgl_habisDokumen' => isset($DATA_POST['tgl_habisDokumen']) ? formatTanggal("/",$DATA_POST['tgl_habisDokumen']) : null,
					'rentang_hari_berlakuDokumen' => isset($DATA_POST['rentang_hari_berlakuDokumen']) ? $DATA_POST['rentang_hari_berlakuDokumen'] : null,
                    'awalReminder' => $DATA_POST['mulaiReminder'],
                    'durasiReminder' => $DATA_POST['durasiReminder'],
					// 'casenumberDokumen' => caseNumber($_SESSION['singkatanDepartemen'], '01'),
					'kpl_insDokumen' => $DATA_POST['kpl_insDokumen'],
					'jbt_kpl_insDokumen' => $DATA_POST['jbt_kpl_insDokumen'],
					'fileDokumen' => $file,
                    'createdBy' => $DATA_POST['createdBy'],
                    'createdDate' => $DATA_POST['createdDate'],
                    'updatedBy' => $this->session->idUser,
                    'updatedDate' => date("Y-m-d h:i:s"),
					'status_editDokumen' => 'NULL',
					'se_ajuan_statusDokumen' => 'NULL',
					'se_ajuan_olehDokumen' => 'NULL',
					'se_aju_dateDokumen' => 'NULL',
					'ktr_pengajuan_editDokumen' => 'NULL',
					'se_verifikasiDokumen' => 'NULL',
					'se_ver_dateDokumen' => 'NULL',
					'se_ver_tolakDokumen' => 'NULL',
					'ktr_tolak_editDokumen' => 'NULL'
                );

                $this->guzzle->API_Put('F_Dokumen/put/', $data);
				$idDokumen = $DATA_POST[$this->PK];

                $RETURN_VALUE = array(
                    "STATUS" => "Update",
                    "PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil dirubah"
                );
            }

            /*
             * Create data dokumen
             */
            if (empty($DATA_POST[$this->PK])) {
                $data = array(
                    'idDepartemen' => $DATA_POST['idDepartemen'],
                    'idInstansi' => $DATA_POST['idInstansi'],
                    'judulDokumen' => $DATA_POST['judulDokumen'],
                    'nomorDokumen' => $DATA_POST['nomorDokumen'],
                    'deskripsiDokumen' => $DATA_POST['deskripsiDokumen'],
                    'expired_unlimitedDokumen' => isset($DATA_POST['expired_unlimitedDokumen']) ? $DATA_POST['expired_unlimitedDokumen'] : 0 ,
                    'tgl_terbitDokumen' => isset($DATA_POST['tgl_terbitDokumen']) ? formatTanggal('/',$DATA_POST['tgl_terbitDokumen']) : null,
                    'tgl_habisDokumen' => isset($DATA_POST['tgl_habisDokumen']) ? formatTanggal("/",$DATA_POST['tgl_habisDokumen']) : null,
                    'rentang_hari_berlakuDokumen' => isset($DATA_POST['rentang_hari_berlakuDokumen']) ? $DATA_POST['rentang_hari_berlakuDokumen'] : null,
                    'casenumberDokumen' => caseNumber($_SESSION['singkatanDepartemen'], '01'),
                    'kpl_insDokumen' => $DATA_POST['kpl_insDokumen'],
                    'jbt_kpl_insDokumen' => $DATA_POST['jbt_kpl_insDokumen'],
                    'fileDokumen' => $file,
                    'createdBy' => $this->session->idUser,
                    'createdDate' => date("Y-m-d h:i:s"),
                    'updatedBy' => null,
                    'updatedDate' => null
                );

                $Post = $this->guzzle->API_Post('F_Dokumen/post/', $data);
                $idDokumen = $Post->idDokumen;

                $RETURN_VALUE = array(
                    "STATUS" => "Create",
                    "PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil dibuat",
                );
            }

            if (isset($DATA_POST['AR_tglReminder'])) {
				foreach ($DATA_POST['AR_tglReminder'] as $Data_Tgl) {
					$Reminder[] = formatKeDB($Data_Tgl)." ".$DATA_POST['waktuReminder'];
				}
				foreach ($Reminder as $DATETIME) {
					$Data_Reminder['idDokumen'] = $idDokumen;
					$Data_Reminder['tglReminder'] = $DATETIME;
					$Data_Reminder['createdBy'] = $this->session->idUser;
					$Data_Reminder['createdDate'] = date("Y-m-d h:i:s");
					$this->guzzle->API_Post('F_Reminder/post/', $Data_Reminder);
				}
			}

            /*
             * Return value untuk notification
             */
           return $RETURN_VALUE;
        }
    }

    /*
     * Fungsi   :   deleteDokumen
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Dokumen
     */
    public function deleteDokumen($DATA_POST = null) {
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
             * Delete data dokumen
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('F_Dokumen/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Dokumen ".$DATA_POST['namaDokumen']." successfuly deleted",
                "PK" => encode_str($DATA_POST[$this->PK])
            );
            return $RETURN_VALUE;
        }
    }

    public function pengajuanEdit($DATA_POST) {
		$data = array(
			$this->PK => $DATA_POST[$this->PK],
			'judulDokumen' => $DATA_POST['judulDokumen'],
			'se_ajuan_statusDokumen' => true,
			'se_ajuan_olehDokumen' => $this->session->idUser,
			'se_aju_dateDokumen' => date("Y-m-d h:i:s"),
			'ktr_pengajuan_editDokumen' => $DATA_POST['ktr_pengajuan_editDokumen'],
			'ktr_tolak_editDokumen' => 'NULL'
		);

		$this->guzzle->API_Put('F_Dokumen/put/', $data);

		$RETURN_VALUE = array(
			"STATUS" => "Update",
			"PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." menunggu verifikasi koordinator"
		);

		return $RETURN_VALUE;
	}

	public function approveEdit($DATA_POST) {
		$data = array(
			$this->PK => $DATA_POST[$this->PK],
			'judulDokumen' => $DATA_POST['judulDokumen'],
			'se_ajuan_statusDokumen' => false,
			'status_editDokumen' => true,
			'se_verifikasiDokumen' => $this->session->idUser,
			'se_ver_dateDokumen' => date("Y-m-d h:i:s"),
			'ktr_pengajuan_editDokumen' => 'NULL',
			'ktr_tolak_editDokumen' => 'NULL'
		);

		$this->guzzle->API_Put('F_Dokumen/put/', $data);

		$RETURN_VALUE = array(
			"STATUS" => "Approve",
			"PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil disetujui"
		);

		return $RETURN_VALUE;
	}

	public function declineEdit($DATA_POST) {
		$data = array(
			$this->PK => $DATA_POST[$this->PK],
			'judulDokumen' => $DATA_POST['judulDokumen'],
			'se_ajuan_statusDokumen' => false,
			'ktr_pengajuan_editDokumen' => 'NULL',
			'ktr_tolak_editDokumen' => $DATA_POST['ktr_tolak_editDokumen']
		);

		$this->guzzle->API_Put('F_Dokumen/put/', $data);

		$RETURN_VALUE = array(
			"STATUS" => "Decline",
			"PESAN" => "Dokumen ".$DATA_POST['judulDokumen']." berhasil ditolak"
		);

		return $RETURN_VALUE;
	}

}
