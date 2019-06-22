<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __contruct(){
        parente::__contruct();
       
    }

    public function index(){
        echo "Hello Worlds";
    }
    
    public function logon($user= "", $password=""){
             
        // Deletado por enquanto nao tempos suporte a JSON $this->load->library('Api');   

        $this->load->model('player_model');

        if($user == "" && $password == ""){
            $user = $this->input->post('user');
            $password = $this->input->post('password');
        }

        if(is_null($user) || is_null($password)){
            echo 0;
        }

        $ret = $this->player_model->doLogin($user, $password);  
        
        echo $ret;
        
        //$this->api->expose($arr);
    }


    public function createAccount($name ="", $login="", $email="", $password="", $password2 = ""){
        
        $this->load->model('player_model');

        if($login == ""){
            echo "ERRO: Login em branco";
            die();
        }

      
        if(strlen($login) <= 3){
            echo "ERRO: Login pequeno de mais.";
            die();
        }

        if($password == ""){
            echo "ERRO: Password em branco";
            die();
        }

        if(strlen($password) <= 3){
            echo "ERRO: Password pequeno de mais.";
            die();
        }


        if(!$this->player_model->checkLogin($login)){
            echo "ERRO: Login ja existe!";
            die();
        }
        
        if($login == "" && $password == ""){
           echo "ERRO: Usuario ou Senha em Branco!";
           die();
        }

        if(!$password == $password2){
            echo "ERRO: Senhas não conferem.";
            die();
        } 


        $data['name'] = $name;
        $data['login'] = $login;
        $data['email'] = $email;
        $data['password'] = $password;
        
        $ret = $this->player_model->createAccount($data);

        if($ret != 0 || $ret != null){
            echo $ret;
        }else{
            echo "Erro ao cadastrar usuario! API ERROR 400.";
        }

        
    }

}
