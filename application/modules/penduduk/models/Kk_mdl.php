<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kk_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $propinsilist   = $this->all_propinsi->get_option();
        $kabupatenlist   =$this->all_kabupaten->get_option();
        $kecamatanlist   = array();
        $kelurahanlist   = array();
        $this->table = array(
            'name'    => 'kartu_keluarga',
            'coloum'    => array(
                'nomor_kk'     		=> array('label'=>'Nomor Kartu Keluarga','visible'=>true, 'format'=>'TEXT','placeholder'=>'' ),
                'nama_kk'     		=> array('label'=>'Nama Kepala Keluarga','visible'=>true, 'format'=>'TEXT','placeholder'=>'' ),
                'tanggal_terbit'        => array('label'=>'Tanggal Terbit','visible'=>true, 'format'=>'DATEPICKER','placeholder'=>''),
		'kode_propinsi'         => array('label'=>'Kode Propinsi','visible'=>false, 'format'=>'DROPDOWN_MDL', 'option'=>$propinsilist,'placeholder'=>''),
                'kode_kabupaten'        => array('label'=>'Kode Kabupaten','visible'=>false, 'format'=>'DROPDOWN_MDL', 'option'=>$kabupatenlist,'placeholder'=>''),                
                'kode_kecamatan'        => array('label'=>'Kode Kecamatan','visible'=>false, 'format'=>'DROPDOWN_MDL', 'option'=>$kecamatanlist,'placeholder'=>''),
                'kode_kelurahan'        => array('label'=>'Kode Kelurahan','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$kelurahanlist,'placeholder'=>''),                
                'kode_pos'              => array('label'=>'Kode Pos','visible'=>true, 'format'=>'TEXT','placeholder'=>''),
                'pejabat_ttd'           => array('label'=>'Pejabat Penanda Tangan','visible'=>true, 'format'=>'TEXT','placeholder'=>''),                
            ),
            'keyfield'  => 'nomor_kk'
        );
    }
    
    
    
}