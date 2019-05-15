<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $propinsilist = $this->all_propinsi->get_option();
        $this->table = array(
            'name'    => 'konfigurasi',
            'coloum'    => array(
                'kode_aktivasi'     => array('label'=>'Kode Aktivasi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nomor_registrasi'  => array('label'=>'Nomor Registrasi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'tanggal_registrasi'=> array('label'=>'Tanggal Registrasi','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'kode_propinsi'     => array('label'=>'Nama Propinsi','visible'=>true, 'format'=>'DROPDOWN_MDL', 'option'=>$propinsilist,'placeholder'=>''),
                'kode_kabupaten'    => array('label'=>'Nama Kabupaten','visible'=>true, 'format'=>'TEXT', 'format'=>'DROPDOWN_MDL', 'option'=>array(),'placeholder'=>''),
                'kode_kecamatan'    => array('label'=>'Nama Kecamatan','visible'=>true, 'format'=>'TEXT', 'format'=>'DROPDOWN_MDL', 'option'=>array(),'placeholder'=>''),
                'kode_kelurahan'    => array('label'=>'Kode Kelurahan/Desa','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_kelurahan'    => array('label'=>'Nama Kelurahan/Desa','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'alamat'            => array('label'=>'Alamat','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'kode_pos'          => array('label'=>'Kode Pos','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'telp'              => array('label'=>'Telp','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'fax'               => array('label'=>'Fax','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_lurah'        => array('label'=>'Nama Lurah/Ka Desa','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
            ),
        );
    }
    
    function update($nama,  $params)
    {
        $this->db->set($params);
        $this->db->where('kode_kelurahan', $params['kode_kelurahan']);
        $this->db->where('nama_konfigurasi', $nama);
        if ($this->db->update('konfigurasi')) { return true; } else { return false; };
    }        
    
}