<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }


    public function expose($data){


        $this->CI->output->set_header('HTTP/1.0 200 OK');
        $this->CI->output->set_header('HTTP/1.1 200 OK');
        $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->CI->output->set_header('Pragma: no-cache');    
        $this->CI->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
    }

    public function error(){
        $this->CI->output->set_header('HTTP/1.1 400 ');
        $this->CI->output->set_status_header(400, "Bad Request")->_display();
        die();
    }


}