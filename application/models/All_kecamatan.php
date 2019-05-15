<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_kecamatan extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'tbl_kecamatan'
        );
    }
    
    function get_option()
    {
        $this->db->order_by('nama_kecamatan', 'asc');
        $query = $this->db->get($this->table['name']);
        $data[0] = 'Pilih Satu';
        foreach($query->result() as $row):
            $data[$row->kode_kecamatan] = $row->nama_kecamatan;
        endforeach;
            
        return $data;
    }
}

