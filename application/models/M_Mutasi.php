<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/04/2019
 * Time: 09.52
 */

class M_Mutasi extends CI_Model {

	private $Code_UNAUTHORIZED = '401';

	public function getMutasi($key = "getDataByDepartemenAsal", $json = false) {
		if ($key === "getDataByDepartemenAsal") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idDepartemen'] = $_SESSION['idDepartemen'];
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getDataByDepartemenAsal', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getListVerifikasiFalse") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getListVerifikasiFalse', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getListVerifikasiTrue") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getListVerifikasiTrue', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getListCreatedByFalse") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getListCreatedByFalse', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getListCreatedByTrue") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getListCreatedByTrue', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getListTolakMutasi") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Mutasi/getListTolakMutasi', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} else {
			self::getMutasi('getDataByDepartemenAsal', $json);
		}
	}

	public function mutasiDokumen($DATA_POST) {
		$dataDokumen = array(
			'idDokumen' => $DATA_POST['idDokumen'],
			'status_mutasi' => true,
			'updatedBy' => $this->session->idUser,
			'updatedDate' => date("Y-m-d h:i:s")
		);
		$this->guzzle->API_Put('F_Dokumen/put/', $dataDokumen);

		/**
		 * Tambahkan (Insert) data mutasi ke tbl_mstmutasi
		 */
		$dataMutasi = array(
			'idDokumen' => $DATA_POST['idDokumen'],
			'idDepartemen_asal' => $DATA_POST['idDepartemen_asal'],
			'idDepartemen_tujuan' => $DATA_POST['idDepartemen_tujuan'],
			'verifikasiBy' => $DATA_POST['idUser'],
			'createdBy' => $this->session->idUser,
			'createdDate' => date("Y-m-d h:i:s")
		);
		$this->guzzle->API_Post('F_Mutasi/post/', $dataMutasi);
	}

	public function verifikasiMutasi($DATA_POST) {
		/**
		 * Update departemen ke departemen tujuan
		 */
		$dataDokumen = array(
			'idDokumen' => $DATA_POST['idDokumen'],
			'idDepartemen' => $this->session->idDepartemen,
			'status_mutasi' => 'NULL',
			'updatedBy' => $this->session->idUser,
			'updatedDate' => date("Y-m-d h:i:s")
		);
		$this->guzzle->API_Put('F_Dokumen/put/', $dataDokumen);

		$dataMutasi = array(
			'idMutasi' => $DATA_POST['idMutasi'],
			'verifikasiDate' => date("Y-m-d h:i:s"),
			'verifikasiMutasi' => true
		);
		$this->guzzle->API_Put('F_Mutasi/put/', $dataMutasi);
	}

	public function tolakMutasi($DATA_POST) {
		$dataDokumen = array(
			'idDokumen' => $DATA_POST['idDokumen'],
			'status_mutasi' => 'NULL',
			'updatedBy' => $this->session->idUser,
			'updatedDate' => date("Y-m-d h:i:s")
		);
		$this->guzzle->API_Put('F_Dokumen/put/', $dataDokumen);

		$dataMutasi = array(
			'idMutasi' => $DATA_POST['idMutasi'],
			'tolakMutasi' => true
		);
		$this->guzzle->API_Put('F_Mutasi/put/', $dataMutasi);
	}

}
