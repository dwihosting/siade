<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $kklist         = $this->All_kartukeluarga->get_option();
        $agamalist      = $this->All_agama->get_option();
        $pekerjaanlist  = $this->All_pekerjaan->get_option();
        $negaralist     = $this->All_negara->get_option();
        $propinsilist   = $this->All_propinsi->get_option();
        $kabupatenlist   =$this->All_kabupaten->get_option();
        $kecamatanlist   = array();
        $kelurahanlist   = array();
        $kawinlist       = array('MENIKAH'=>'MENIKAH','TIDAK MENIKAH'=>'TIDAK MENIKAH','DUDA/JANDA'=>'DUDA/JANDA');   
        
        $this->table = array(
            'name'    => 'penduduk',
            'coloum'    => array(
                'nomor_kk'          => array('label'=>'Nomor Kartu Keluarga','visible'=>false, 'format'=>'DROPDOWN', 'option'=>$kklist,'placeholder'=>''),
                'nik'               => array('label'=>'NIK (Nomor Induk Kependudukan)','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'' ),
                'nama_lengkap'      => array('label'=>'Nama Lengkap','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'jenis_kelamin'     => array('label'=>'Jenis Kelamin','visible'=>true, 'format'=>'RADIO', 'option'=>array('LAKI-LAKI'=>'LAKI-LAKI', 'PEREMPUAN'=>'PEREMPUAN' ),'placeholder'=>''),
                'gol_darah'         => array('label'=>'Gol. Darah','visible'=>false, 'format'=>'RADIO','option'=>array('A'=>'A','B'=>'B', 'O'=>'O', 'AB'=>'AB'), 'placeholder'=>''),
                'tempat_lahir'      => array('label'=>'Tempat Lahir','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
                'tanggal_lahir'     => array('label'=>'Tanggal Lahir','visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>''),
		'alamat'            => array('label'=>'Alamat','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
                'rt'                => array('label'=>'RT','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
                'rw'                => array('label'=>'RW','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
		'kode_kecamatan'    => array('label'=>'Kecamatan','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
		'kode_kelurahan'    => array('label'=>'Kelurahan','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
                'kode_pos'          => array('label'=>'Kode Pos','visible'=>false, 'format'=>'TEXT', 'placeholder'=>''),
		'kode_agama'        => array('label'=>'Agama','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$agamalist,'placeholder'=>''),
                'status_perkawinan' => array('label'=>'Status Perkawinan','visible'=>false, 'format'=>'DROPDOWN_MDL','option'=>$kawinlist, 'placeholder'=>''),
		'kode_pekerjaan'    => array('label'=>'Pekerjaan','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$pekerjaanlist, 'placeholder'=>''),
                'kewarganegaraan'   => array('label'=>'Kewarganegaraan','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$negaralist, 'placeholder'=>''),
		'tanggal_terbit'    => array('label'=>'Tanggal Terbit','visible'=>false, 'format'=>'DATEPICKER', 'placeholder'=>''),
                'tanggal_berlaku'   => array('label'=>'Tanggal Berlaku','visible'=>false, 'format'=>'DATEPICKER', 'placeholder'=>''),				
            ),
            'keyfield'  => 'nik'
        );
    }
    
    
    
}