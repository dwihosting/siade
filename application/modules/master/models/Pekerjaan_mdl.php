<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_mdl extends Main_mdl {

     function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'pekerjaan',
            'coloum'    => array(
                'pekerjaan_id'     => array('label'=>'ID','visible'=>true, 'format'=>'TEXT', 'placeholder'=>''),
                'pekerjaan_nama'     => array('label'=>'Nama Pekerjaan','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'')
            ),
            'keyfield'  => 'pekerjaan_id',
            'order'     => array(
                array('pekerjaan_nama', 'asc'),
            )
        );
    }
}