<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_mdl extends Main_mdl {
     function __construct() {
        parent::__construct();
        $propinsilist = $this->all_propinsi->get_option();
        $kabupatenlist = array();
     
        $this->table = array(
            'name'      => 'kecamatan',
            'coloum'    => array(
                'kode_propinsi'      => array('label'=>'Propinsi','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$propinsilist,'placeholder'=>''),
                'kode_kabupaten'     => array('label'=>'Kabupaten','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$kabupatenlist,'placeholder'=>''),
                'kode_kecamatan'     => array('label'=>'Kode Kecamatan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_kecamatan'     => array('label'=>'Nama Kecamatan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'join'      => array(
                array('kabupaten', 'kabupaten.kode_kabupaten=kecamatan.kode_kabupaten', 'left'),
                array('propinsi', 'propinsi.kode_propinsi=kabupaten.kode_propinsi', 'left')
            )
        );
    }
    
    function get_list_filter($kode_kabupaten)
    {
        $this->db->where('kode_kabupaten', $kode_kabupaten);
        $query = $this->db->get($this->table['name']);
        $data = $query->result();
        return $data;
    }
    
}