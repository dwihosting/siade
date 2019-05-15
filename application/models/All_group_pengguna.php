<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_group_pengguna extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_option()
    {
        $this->db->order_by('group_nama', 'asc');
        $query = $this->db->get('pengguna_group');
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->group_pengguna_id] = $row->group_nama;
        endforeach;
            
        return $data;
    }
}

