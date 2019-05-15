<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_login extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_pengguna'
        );  
    }
    
    function check_login($user, $pass)
    {
        $data = array();
        $this->db->where('pengguna_surel', $user);
        $this->db->where('pengguna_katasandi', md5($pass));
        $query = $this->db->get($this->table['name']);
        if ($query->num_rows() == 1){
            $data = (Array) $query->row();
        } 
        return $data;
    }        
}

