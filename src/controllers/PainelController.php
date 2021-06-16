<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Control;
use \src\models\Moviment;
use \src\models\Registro;

class PainelController extends Controller {

    public function index() {
        $oficiais = ApiController::apiInfo();
        $control = Control::select()->get();
        $oficialOn = Moviment::select()->get();
        $data = Moviment::select()->get();
        $registro = Registro::select()->get();
        $this->render('painel', [
            'oficiais'=>$oficiais,
            'control'=>$control,
            'oficialOn'=>$oficialOn,
            'data'=>$data,
            'registros'=>$registro
        ]);
    }

}