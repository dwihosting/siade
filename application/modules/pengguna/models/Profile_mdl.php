<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'profile_akun',
            'coloum'    => array(
                'kode_profile'  => array('label'=>'Kode',),
                'kode_akun'     => array('label'=>'Kode',),
                'nama_lengkap'  => array('label'=>'Nama Lengkap'),
                'jabatan'       => array('label'=>'Jabatan'),
                'foto'          => array('label'=>'Foto'),
                'foto_folder'   => array('label'=>'Folder Foto'),                
            ),
            'keyfield'  => 'kode_profile'
        );
    }
    
    
    
}