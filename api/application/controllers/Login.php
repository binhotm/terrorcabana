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
        
        echo "Ola mundo"; exit;

        
        $this->load->library('Api');
        $this->load->model('user_model');

        if($user == "" && $password == ""){
            $user = $this->input->post('user');
            $password = $this->input->post('password');
        }

        if(is_null($user) || is_null($password)){
            $this->api->error();
        }

        $arr = $this->user_model->doLogin($user, $password);        
        $this->api->expose($arr);
    }

}
