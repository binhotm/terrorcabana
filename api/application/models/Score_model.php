<?php

class Score_model extends CI_Model {

    private $id;
    private $player;
    private $time;
    private $win;
    private $lose;
    private $date;

    public function __construct()
    {
        parent::__construct();
    }

    /*
        @user Usuario
        @password Senha

    */
    public function saveScore(String $player, String $time, string $win, String $lose){
        
        $data = array(
            'player' => $player,
            'time' => $time,
            'win' => $win,
            'lose' => $lose);
        
    
        $this->db->insert('score', $data);    

        return 1;
    }

    public function checkScore(){
        $this->db->select('player.name, min(score.time) score');
        $this->db->from('score');
        $this->db->join('player', 'player.id_player = score.player');
        $this->db->group_by('score.player');
        $this->db->order_by('score', 'ASC');
        $this->db->limit(5);

        $query = $this->db->get();

        $str = "";
     
        if($query->num_rows() >= 1){

            foreach ( $query->result_array() as $score ){               
                $str .= $score['name'] . "|". $score['score'] . "|";
            }

           return $str;      
        }else{
           return 0;
        }    
    }
}