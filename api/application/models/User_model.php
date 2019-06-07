<?php

class User_model extends CI_Model {

    private $id;
    private $login;
    private $password;
    private $nome;
    private $email;

    public function __construct()
    {
        parent::__construct();
    }

    /*
        @user Usuario
        @password Senha

    */
    public function doLogin(String $user, String $password){

        $this->db->select("login,password");
        $this->db->where("login", $user);
        $this->db->where("password",$password);
        $this->db->from("player");
        $this->db->limit(1);

        $query = $this->db->get();        

        if($query->num_rows() == 1){
            $result_js['status'] = 'SUCCESS';
            $result_js['message'] = 'Login efetuado com sucesso!';
        }else{
            $result_js['status'] = 'ERROR';
            $result_js['message'] = 'Usuario ou senha invalidos!';
        }

        return $result_js;      
    }


}