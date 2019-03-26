<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 19/01/2019
 * Time: 11:38
 */

USE GuzzleHttp\Client;
USE \GuzzleHttp\Exception\ClientException;

class Guzzle {

    protected $_CI;

    public function __construct()
    {
        $this->_CI =&get_instance();
        $this->base_uri = array(
            'base_uri' => 'http://localhost/doclist_API/'
        );
        $this->client = new Client($this->base_uri);
    }

    public function API_Get($uri, $Data_Post = null, $json = false){
        if (empty($Data_Post)) {
            $response = $this->client->get($uri);
        } if (!empty($Data_Post)) {
            /**
             * Mencoba untuk mendapatkan kode HTTP Request PSR7 "401"
             * atau bisa juga disebutkan UNAUTHORIZED
             * Sumber : https://httpstatuses.com/401
             *
             * Bertujuan untuk mengantisipasi pengguna yang tidak diberikan akses API
             * akan dilarang untuk mengakses data
             */
            try {
                $response = $this->client->get($uri,
                    array(
                        'form_params' => $Data_Post
                    )
                );
            } catch (ClientException $exception) {
                $HTTP_UNAUTHORIZED = $exception->getCode();
            }
            if (isset($HTTP_UNAUTHORIZED)) {
                return $HTTP_UNAUTHORIZED;
            } else if (!isset($HTTP_UNAUTHORIZED)) {
                if ($json == false) {
                    return json_decode($response->getBody()->getContents());
                } if ($json == true) {
                    return $response->getBody()->getContents();
                }
            }
        }
    }

    public function API_Post($uri, $Data_Post){
        $response = $this->client->post($uri,
            array(
                'form_params' => $Data_Post
            )
        );
        return json_decode($response->getBody()->getContents());
    }

    public function API_Put($uri, $Data_Post){
        $response = $this->client->put($uri,
            array(
                'form_params' => $Data_Post
            )
        );
        return json_decode($response->getBody()->getContents());
    }

    public function API_Delete($uri, $Data_Post){
        $response = $this->client->delete($uri,
            array(
                'form_params' => $Data_Post
            )
        );
        return json_decode($response->getBody()->getContents());
    }

}
