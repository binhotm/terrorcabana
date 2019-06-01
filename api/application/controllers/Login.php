<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __contruct(){
        parente::__contruct();

    }
    
    public function logon(){

        $user = $this->input->post('user');
        $password = $this->input->post('password');

        $this->load->model('user_model');
        $this->user_model->doLogin($user, $password);        

    }

}
