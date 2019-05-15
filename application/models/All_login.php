<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_login extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function check_login($user, $pass)
    {
        $data = array();
        $this->db->where('username', $user);
        $this->db->where('password', md5($pass));
        $query = $this->db->get('pengguna');
        if ($query->num_rows() == 1){
            $data = (Array) $query->row();
        } 
        return $data;
    }        
}

