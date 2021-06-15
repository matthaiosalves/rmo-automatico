<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Control;
use \src\models\Moviment;
use \src\Models\User;
use \src\controllers\ApiController;

class RMOController extends Controller {
    
    public function index(){
        $oficiais = ApiController::apiInfo();
        $control = Control::select()->get();
        $oficialOn = Moviment::select()->get();
        return $this->render('rmo', ['control'=>$control, 'oficialOn'=>$oficialOn, 'oficiais'=>$oficiais]);

    }
    public function controle(){
        $users = User::select()->one();
        $user = $users['nick'];
        $link = 'https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=gif&amp;user='.$user.'&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m';
        $token = md5(time().rand(0,9999).time());
        $_SESSION['token'] = $token;
        $control = count(Control::select()->get());
        $hora = date("H:i");
      
        if($control < 1){
        Control::insert([
                'nick'=>$user,
                'token'=>$token,
                'link'=>$link,
                'tempo_inicio'=>$hora
            ])->execute();
        }
        User::update([
            'token'=>$token
        ])->where('id', 1)->execute();
        return $this->redirect('/');
    }


    public function sair($id){
        $id = $id['id'];
        if($id){
            Control::delete()->where('id', $id)->execute();
            return $this->redirect('/');

        }

    }

    public function inserir(){
        $oficial = filter_input(INPUT_POST, 'user_rmo');
        $link = 'https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=gif&amp;user='.$oficial.'&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m';
        $ofc = count(Moviment::select()->where('nick', $oficial)->get());
        $hora = date("H:i");
        if($ofc < 1){
            Moviment::insert([
                'nick'=>$oficial,
                'link'=>$link,
                'tempo_inicio'=>$hora
            ])->execute();
        }
        Moviment::update([
            'verificacao'=> 1
        ])->where('nick', $oficial)->execute();
        return $this->redirect('/');
    }
    public function remover($id){
        $hora = date("H:i");
        $id = $id['id'];
        Moviment::update([
            'tempo_final'=>$hora
        ])->where('id', $id)->execute();
        Moviment::update([
            'verificacao'=>0
        ])->where('id', $id)->execute();
        return $this->redirect('/');
    }

    public function pontoEletronico(){
        return $this->render('botao');

    }

    public function pontoEletronicoAction(){
        $token = $_SESSION['token'];
        $user = User::select()->where('token', $token)->one();
        $link = 'https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=gif&amp;user='.$user['nick'].'&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m';
        $ofc = count(User::select()->where('token', $token)->one());
        if($ofc < 1){
            Moviment::insert([
                'nick'=>$user['nick'],
                'link'=>$link
            ])->execute();
            echo 'ONLINE';
        }else{
            echo 'VOCE JA ESTA ON';
        } 
    }

    public function ativo($id){
        $id = $id['id'];
        Moviment::update([
            'status'=>'Ativo'
        ])->where('id', $id)->execute();
        return $this->redirect('/');
    }

    public function aus($id){
        $id = $id['id'];
        Moviment::update([
            'status'=>'Ausente'
        ])->where('id', $id)->execute();
        return $this->redirect('/');
    }
}