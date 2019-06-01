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

        $this->db->select("count(*) as user");
        $this->db->where("login", $user);
        $this->db->where("password",$password);
        $this->db->from("player");
        $this->db->limit(1);

        $query = $this->db->get();        

        echo $query->num_rows();

      
    }


}