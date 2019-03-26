<?php
/**
 * Created by PhpStorm.
 * User: Ozan
 * Date: 16/02/2019
 * Time: 11:49
 */

class M_MenuAkses_Backend extends CI_Model {

    private $TABLE = "tbl_utlmenuakses_backend";
    private $PK = "idGrup";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Alasan kenapa M_MenuAkses tidak ada Table View dikarenakan Tabel nya berdiri sendiri tanpa
     * "Foreign Key",
     * Bila dalam pengembangan kedepan ada menggunakan FK maka akan dibuatkan Tabel View nya
     */

    /*
     * Fungsi   :   getMenuAkses
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getMenuAkses_lv1($key = "getAll_lv1", $kolom = null, $value_kolom = null, $value_pk = null, $json = true){
    	if (isset($_SESSION['idUser'])) {
			if ($key === "getAll_lv1") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getAll_lv1', $parsedBody, $json);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} if ($key === 'cekKode_lv1') {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getAll_lv1', $parsedBody, $json);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return 200;
				}
			} if ($key === "getMenu_lv1") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getMenu_lv1/'.$value_pk, $parsedBody);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} if ($key === "getData_lv1") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getData_lv1/'.$value_pk, $parsedBody);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} else {
				self::getMenuAkses_lv1("getAll_lv1");
			}
		}
    }

    public function getMenuAkses_lv2($key = "getAll_lv2", $kolom = null, $value_kolom = null, $value_pk = null, $json = true){
		if (isset($_SESSION['idUser'])) {
			if ($key === "getAll_lv2") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getAll_lv2', $parsedBody, $json);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} if ($key === 'cekKode_lv2') {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getAll_lv2', $parsedBody, $json);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return 200;
				}
			} if ($key === "getMenu_lv2") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getMenu_lv2/'.$value_pk, $parsedBody);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} if ($key === "getData_lv2") {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
				$Fetch = $this->guzzle->API_Get('B_menuAkses_backend/getData_lv2/'.$value_pk, $parsedBody);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				} if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch;
				}
			} else {
				self::getMenuAkses_lv2("getAll_lv2");
			}
		}
    }

    public function saveMenuAksesBackend($idGrup, $Menu) {
        foreach ($Menu as $data) {
            $data = array(
                'idGrup' => $idGrup,
                'idMenu' => $data
            );
            $this->guzzle->API_Post('B_menuAkses_backend/post/', $data);
        }
    }
}
