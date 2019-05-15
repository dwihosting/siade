<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_propinsi extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_option()
    {
        $this->db->order_by('nama_propinsi', 'asc');
        $query = $this->db->get('propinsi');
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->kode_propinsi] = $row->nama_propinsi;
        endforeach;
            
        return $data;
    }
}

