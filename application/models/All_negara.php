<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_negara extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_negara'
        );
    }
    
    function get_option()
    {
        $this->db->order_by('nama_negara', 'asc');
        $query = $this->db->get($this->table['name']);
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->kode_negara] = $row->nama_negara;
        endforeach;
            
        return $data;
    }
}

