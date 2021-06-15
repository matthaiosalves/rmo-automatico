<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Moviment;

class ApiController extends Controller {

    public static function apiInfo() {
        $url = "https://exbrhbofc.net/ctex/api/main/sup.json";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $oficiais = json_decode(curl_exec($ch));
        $array = json_decode(json_encode($oficiais),true);
        return $array;
    }

    public function apiBase(){
        $data = Moviment::select()->one();
        $dataH = explode(':', $data['tempo_inicio']);
        $dataAgora = $dataH[0].':'.$dataH[1];
        echo $dataAgora;

        
    }


}
