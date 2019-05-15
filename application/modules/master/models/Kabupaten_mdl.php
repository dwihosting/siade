<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten_mdl extends Main_mdl {
     function __construct() {
        parent::__construct();
        $propinsilist = $this->all_propinsi->get_option();
        $this->table = array(
            'name'      => 'kabupaten',
            'coloum'    => array(
                'kode_propinsi'     => array('label'=>'Propinsi','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$propinsilist,'placeholder'=>''),
                'kode_kabupaten'    => array('label'=>'Kode Kabupaten','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_kabupaten'    => array('label'=>'Nama Kabupaten','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'join'      => array(
                array('propinsi', 'propinsi.kode_propinsi=kabupaten.kode_propinsi', 'left')
            )
        );
    }
    
    function get_list_filter($kode_propinsi)
    {
        $this->db->where('kode_propinsi', $kode_propinsi);
        $query = $this->db->get($this->table['name']);
        $data = $query->result();
        return $data;
    }
    
}