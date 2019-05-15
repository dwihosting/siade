<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_mdl extends Main_mdl {
     function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'agama',
            'coloum'    => array(
                'kode_agama'     => array('label'=>'Kode Agama','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_agama'     => array('label'=>'Nama Agama','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'keyfield'  => 'kode_agama',
            'order'     => array(
                array('nama_agama', 'asc'),
            )
        );
    }
    
}