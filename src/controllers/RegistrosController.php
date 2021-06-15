<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Registro;
use \src\models\Moviment;

class RegistrosController extends Controller {

    public function registrar() {
        $date = date("Y:m:d");
        $hora = date("H:i");
        $users = Moviment::select()->get();
        foreach($users as $user){
            Registro::insert([
                'nick'=>$user['nick'],
                'entrada'=>$user['entrada'],
                'saida'=>$hora,
                'data'=>$date
            ])->execute();
        }
        Moviment::update(['verificacao'=> 0])->execute();
        return $this->redirect('/');
    }

    public function resetar(){
        Moviment::delete()->execute();
        return $this->redirect('/');
    }

}