<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_akun_mdl extends Main_mdl {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'    => 'pengguna_group',
            'coloum'    => array(
                'group_pengguna_id'     => array('label'=>'ID', 'idkey'=>true, 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>''),
                'group_nama'            => array('label'=>'Nama Group','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'keyfield'=> 'group_pengguna_id'
        );
    }
    
}