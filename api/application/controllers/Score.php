<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends CI_Controller {

    public function __contruct(){
        parente::__contruct();
       
    }

    public function index(){
        echo "Hello Dude =^}";
    }

    public function checkScore(){
        $this->load->model('score_model');

        $ret = $this->score_model->checkScore();
                
        echo $ret;     

    }
    
    public function saveLose($player= "", $time=""){

        $this->load->model('score_model');

        if($player == "" || $time == ""){
            echo 0;
            exit;
        }

        $ret = $this->score_model->saveScore($player, $time, 0, 1);
                
        echo $ret;        
    
    }

    public function saveWin($player= "", $time=""){

        $this->load->model('score_model');

        if($player == "" || $time == ""){
            echo 0;
            exit;
        }

        $ret = $this->score_model->saveScore($player, $time, 1, 0);
                
        echo $ret;        
    
    }


}
