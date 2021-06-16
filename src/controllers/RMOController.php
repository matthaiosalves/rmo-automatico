<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Control;
use \src\models\Moviment;
use \src\Models\User;
use \src\controllers\ApiController;
use \src\models\Registro;

class RMOController extends Controller {
    
    public function index(){
        $oficiais = ApiController::apiInfo();
        $control = Control::select()->get();
        $oficialOn = Moviment::select()->get();
        $data = Moviment::select()->execute();
        $resetar = count(Moviment::select()->where('verificacao', 1)->get()); 
        return $this->render('rmo', ['control'=>$control, 
        'oficialOn'=>$oficialOn, 
        'oficiais'=>$oficiais, 
        'horaStatus'=>$data, 
        'resetar'=>$resetar
    ]);// Pega todas as informações e manda pro view

    }
    public function controle(){
        $users = User::select()->one();
        $user = $users['nick'];
        $link = 'https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=gif&amp;user='.$user.'&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m';
        $token = md5(time().rand(0,9999).time());
        $_SESSION['token'] = $token;
        $control = count(Control::select()->get());
        $hora = date("H:i");
        $nick = $users['nick'];
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
        
        $nickname = count(Moviment::select()->where('nick', $user)->execute());

        if($nickname < 1){
            Moviment::insert([
                'nick'=>$nick,
                'status'=>'Ativo',
                'entrada'=>$hora,
                'tempo_inicio'=>$hora,
                'link'=>$link,
                'verificacao'=> 1
            ])->execute();
        }
        return $this->redirect('/');

        
    }


    public function sair($id){
        $hora = date("H:i");
        $nick = Control::select()->one();
        $id = $id['id'];
        if($id){
            Control::delete()->where('id', $id)->execute();
            Moviment::update(['verificacao'=> 0, 'tempo_final'=>$hora])->where('nick', $nick['nick'])->execute();
            return $this->redirect('/');
        }

    }

    public function inserir(){
        $oficial = filter_input(INPUT_POST, 'user_rmo');
        $link = 'https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=gif&amp;user='.$oficial.'&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m';
        $ofc = count(Moviment::select()->where('nick', $oficial)->get());
        $hora = date("H:i");
        if($ofc < 1){
            if($oficial){
                Moviment::insert([
                    'nick'=>$oficial,
                    'link'=>$link,
                    'tempo_inicio'=>$hora,
                    'entrada'=>$hora
                ])->execute();
            }else{
                return $this->redirect('/');
            }
        }
        Moviment::update([
            'verificacao'=> 1,
            'tempo_inicio'=>$hora
        ])->where('nick', $oficial)->execute();
        return $this->redirect('/');
    }
    public function remover($id){
        $nick = Moviment::select()->where('id', $id)->one();
        $date = date("Y:m:d");
        $hora = date("H:i");
        $id = $id['id'];
        Moviment::update([
            'tempo_final'=>$hora
        ])->where('id', $id)->execute();
        Moviment::update([
            'verificacao'=>0
        ])->where('id', $id)->execute();

        Registro::insert([
            'nick'=>$nick['nick'],
            'entrada'=>$nick['entrada'],
            'saida'=>$hora,
            'data'=>$date
        ])->execute();
        
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
        $hora = date('h:i');
        $id = $id['id'];
        Moviment::update([
            'status'=>'Ativo',
            'tempo_inicio'=>$hora
        ])->where('id', $id)->execute();
        return $this->redirect('/');
    }

    public function aus($id){
        $hora = date('h:i');
        $id = $id['id'];
        Moviment::update([
            'status'=>'Ausente',
            'tempo_inicio'=>$hora
        ])->where('id', $id)->execute();
        return $this->redirect('/');
    }
}