<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_agama extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_agama'
        );
    }
    
    function get_option()
    {
        $this->db->order_by('nama_agama', 'asc');
        $query = $this->db->get($this->table['name']);
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->kode_agama] = $row->nama_agama;
        endforeach;
            
        return $data;
    }
}

