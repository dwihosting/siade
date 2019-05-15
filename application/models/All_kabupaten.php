<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_kabupaten extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_kabupaten'
        );
    }
    
    function get_option()
    {
        $this->db->order_by('nama_kabupaten', 'asc');
        $query = $this->db->get($this->table['name']);
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->kode_kabupaten] = $row->nama_kabupaten;
        endforeach;
            
        return $data;
    }
}

