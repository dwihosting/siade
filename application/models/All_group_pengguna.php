<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_group_pengguna extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_pengguna_group'
        );
    }
    
    function get_option()
    {
        $this->db->order_by('group_nama', 'asc');
        $query = $this->db->get($this->table['name']);
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->pengguna_group_id] = $row->group_nama;
        endforeach;
            
        return $data;
    }
}

