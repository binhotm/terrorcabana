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

}
