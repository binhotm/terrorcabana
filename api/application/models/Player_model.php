<?php

class Player_model extends CI_Model {

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

        $this->db->select("id_player, login,password");
        $this->db->where("login", $user);
        $this->db->where("password",$password);
        $this->db->from("player");
        $this->db->limit(1);

        $query = $this->db->get();        

        if($query->num_rows() == 1){
           return (int) $query->result_array[0]['id_player'] ;       
        }else{
           return 0;
        }    
    }
}