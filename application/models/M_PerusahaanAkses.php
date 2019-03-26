<?php
/**
 * Created by PhpStorm.
 * User: Ozan
 * Date: 26/02/2019
 * Time: 9:55
 */

class M_PerusahaanAkses extends CI_Model {

    private $TABLE = "tbl_utlperusahaanakses";
    private $PK = 'idGrup';
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
    public function getPerusahaanAkses($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = true){
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_perusahaanAkses/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === 'cekKode_lv1') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('B_perusahaanAkses/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        } if ($key === "getData") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
            $Fetch = $this->guzzle->API_Get('B_perusahaanAkses/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getView") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = encode_str($_SESSION['idGrup']);
            $Fetch = $this->guzzle->API_Get('B_perusahaanAkses/getView/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getGrup("getAll");
        }
    }

    public function savePerusahaanAkses($idGrup, $Site) {
        foreach ($Site as $data) {
            $data = array(
                'idGrup' => $idGrup,
                'idPerusahaan' => $data
            );
            $this->guzzle->API_Post('B_perusahaanAkses/post/', $data);
        }
    }
}