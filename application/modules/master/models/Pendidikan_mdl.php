<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_mdl extends Main_mdl {

     function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'pendidikan',
            'coloum'    => array(
                'kode_pendidikan'     => array('label'=>'Kode Pendidikan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'nama_pendidikan'     => array('label'=>'Nama Pendidikan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'keyfield'  => 'kode_pendidikan',
            'order'     => array(
                array('nama_pendidikan', 'asc'),
            )
        );
    }
}