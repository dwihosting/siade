<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blok_mdl extends Main_mdl {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'tanah_blok',
            'coloum'    => array(
                'kode_akun'     => array('label'=>'Kode','visible'=>false ),
                'group_id'      => array('label'=>'Group','visible'=>true),
                'kode_kelurahan'=> array('label'=>'Kode Kelurahan','visible'=>false),
                'nama_akun'     => array('label'=>'Nama Akun','visible'=>true),
                'kata_sandi'    => array('label'=>'Kata Sandi','visible'=>true),
                'is_aktif'      => array('label'=>'Aktif','visible'=>true),
            ),
        );
    }
    
    
    
}