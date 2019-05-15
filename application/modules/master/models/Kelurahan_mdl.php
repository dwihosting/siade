<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_mdl extends Main_mdl {

     function __construct() {
        parent::__construct();
        $propinsilist = $this->all_propinsi->get_option();
        $kabupatenlist = array();
        $kecamatanlist = array();
        
        $this->table = array(
            'name'      => 'kelurahan',
            'coloum'    => array(
                'kode_propinsi'      => array('label'=>'Propinsi','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$propinsilist,'placeholder'=>''),
                'kode_kabupaten'     => array('label'=>'Kabupaten','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$kabupatenlist,'placeholder'=>''),
                'kode_kecamatan'     => array('label'=>'Kecamatan','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$kecamatanlist, 'placeholder'=>''),
                
                'kode_kelurahan'     => array('label'=>'Kode Kelurahan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_kelurahan'     => array('label'=>'Nama Kelurahan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'join'      => array(
                array('kecamatan', 'kecamatan.kode_kecamatan=kelurahan.kode_kecamatan', 'left'),
                array('kabupaten', 'kabupaten.kode_kabupaten=kecamatan.kode_kabupaten', 'left'),
                array('propinsi', 'propinsi.kode_propinsi=kabupaten.kode_propinsi', 'left')
            )
        );
    }
    
    function get_list_filter($kode_kecamatan)
    {
        $this->db->where('kode_kecamatan', $kode_kecamatan);
        $query = $this->db->get($this->table['name']);
        $data = $query->result();
        return $data;
    }
}